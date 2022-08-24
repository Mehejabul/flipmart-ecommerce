<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use File;
use Image;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $category = ProductCategory::where('pro_cate_status',1)->orderBy('pro_cate_id', "DESC")->get();
      return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // return $request->all();
        $this->validate($request,[
            'pro_cate_name' => ['required'],

        ],[

            'pro_cate_name.required' => 'Please insert Category name'

        ]);

         //Category Image
                if($request->hasfile('pro_cate_image')){
                 $image = $request->file('pro_cate_image');
                 $category_img = 'category_img' . time().rand(10000,100000) . '.' . $image->getClientOriginalExtension();
                 Image::make($image)->resize(250,250)->save('uploads/category/image/' . $category_img);
             }else{
                $category_img = '';
             }

         //Category Icon
              if($request->hasfile('pro_cate_icon')){
                $image = $request->file('pro_cate_icon');
                $category_icon = 'category_icon' . time() . rand(10000,100000). '.' . $image->getClientOriginalExtension();
                Image::make($image)->resize(250,250)->save('uploads/category/icon/' . $category_icon);
            }else{
                $category_icon = '';
            }

    $insert = ProductCategory::InsertGetId([
        'pro_cate_name' => $request['pro_cate_name'],
        'pro_cate_parent' => $request['pro_cate_parent'],
        'pro_cate_order' => $request['pro_cate_order'],
        'pro_cate_creator' => Auth::user()->id,
        'pro_cate_icon' => $category_icon,
        'pro_cate_image' => $category_img,
        'pro_cate_slug' => Str::slug($request->pro_cate_name, '-'),
        'pro_cate_status' => 1,
        'created_at' => Carbon::now()->toDateTimestring(),

    ]);

        if($insert){
            Session::flash('success', 'Successfully create category Information');
            return redirect()->back();
        }else{
            Session::flash('error', 'Opps! something errror');
            return redirect()->back();
     }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug){
        $category_data = ProductCategory::where('pro_cate_status', 1)->where('pro_cate_slug',$slug)->firstorFail();
        return view('admin.category.edite', compact('category_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug){
               // dd($request->all());
               $this->validate($request,[
                'pro_cate_name' => ['required'],
            ],[
                'pro_cate_name.required' => 'Please insert Category name'
            ]);

            $category = ProductCategory::where('pro_cate_status', 1)->where('pro_cate_slug', $slug)->first();
             //Category Image
             if($request->hasfile('pro_cate_image')){

             if(File::exists('uploads/category/image/' .$category->pro_cate_image)){
              File::delete('uploads/category/image/' .$category->pro_cate_image);
             }
             $image = $request->file('pro_cate_image');
             $category_img = 'category_img' . time().rand(10000,100000) . '.' . $image->getClientOriginalExtension();
             Image::make($image)->resize(250,250)->save('uploads/category/image/' . $category_img);
         }else{
              $category_img = $category->pro_cate_image;
         }

         //Category Icon
         if($request->hasfile('pro_cate_icon')){

         if(File::exists('uploads/category/icon/' .$category->pro_cate_icon)){
         File::delete('uploads/category/icon/' .$category->pro_cate_icon);
        }
           $image = $request->file('pro_cate_icon');
           $category_icon = 'category_icon' . time().rand(10000,100000) . '.' . $image->getClientOriginalExtension();
           Image::make($image)->resize(250,250)->save('uploads/category/icon/' . $category_icon);
        }else{
            $category_icon = $category->pro_cate_icon;
         }

        $update= ProductCategory::where('pro_cate_status',1)->where('pro_cate_slug', $slug)->update([
            'pro_cate_name' => $request['pro_cate_name'],
            'pro_cate_parent' => $request['pro_cate_parent'],
            'pro_cate_order' => $request['pro_cate_order'],
            'pro_cate_editor' => Auth::user()->id,
            'pro_cate_icon' => $category_icon,
            'pro_cate_image' => $category_img,
            'pro_cate_slug' => Str::slug($request->pro_cate_name, '-'),
            'pro_cate_status' => 1,
            'updated_at' => Carbon::now()->toDateTimestring(),

        ]);

            if($update){
                Session::flash('success', 'Successfully Updated');
                return redirect()->back();
            }else{
                Session::flash('error', 'Opps! Updated failed');
                return redirect()->back();
         }
    }

    public function softdelete($slug){
    $softdelete = ProductCategory::where('pro_cate_status',1)->where('pro_cate_slug', $slug)->update([
        'pro_cate_status' => 0,
        'updated_at' => Carbon::now()->toDateTimestring(),
    ]) ;

    if($softdelete){
        Session::flash('success', 'Successfully Deleted');
        return redirect()->back();
    }else{
        Session::flash('error', 'Opps! Delete failed');
        return redirect()->back();
 }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
