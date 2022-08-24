<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::where('product_status',1)->orderBy('product_id', "DESC")->get();
       return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

      $this->validate($request,[
        'product_name' => ['required'],
        'pro_cate_id' => ['required'],
        'brand_id' => ['required'],
        'product_price' => ['required'],
        'product_quantity' => ['required'],
         'product_image' => ['required'],

      ],[
          'product_name.required' =>'Please Inesrt Product Name',
      ]);
      //Product Image
      if($request->hasfile('product_image')){
            $main_image = $request->file('product_image');
            $main_image_name = 'product' . time() .rand(10000,100000) . '.' . $main_image->getClientOriginalExtension();
            Image::make($main_image)->resize(250,250)->save('uploads/product/pro_img/' . $main_image_name);
        }

        //Multiple Image
        if($request->hasfile('product_gallery')){
            $gallerys = $request->file('product_gallery');
            foreach($gallerys as $gallery){
                $gallery_name = 'pro' . '-' . rand(10000,100000) . '.' . $gallery->getClientOriginalExtension();
                Image::make($gallery)->resize(120,120)->save('uploads/product/gallery/' . $gallery_name);
                $gal_data[] = $gallery_name;
            }
        }else{
            $gal_data[] = " ";
        }

        //PRODUCT Feature
        if($request->product_feature == 'on'){
            $product_feature = 1;
         }else{
             $product_feature = 0 ;
         }

         $slug = 'pro'.uniqid();
         $creator = Auth::user()->id;
         $insert = Product::InsertGetId([
            'product_name' => $request->product_name,
            'pro_cate_id' => $request->pro_cate_id,
            'brand_id' => $request->brand_id,
            'product_price' => $request->product_price,
            'product_discount_price' => $request->product_discount_price,
            'product_unit' => $request->product_unit,
            'product_quantity' => $request->product_quantity,
            'product_details' => $request->product_details,
            'product_description' => $request->product_description,
            'product_image' => $main_image_name,
            'product_gallery' => implode(',',$gal_data),
            'product_feature' => $product_feature,
            'product_order' => $request->product_order,
            'product_creator' => $creator,
            'product_slug' => $slug,
            'product_status' => 1,
            'created_at' => Carbon::now()->toDateTimestring(),
         ]);

         if($insert){
             Session::flash('success', 'successfully insert');
             return redirect()->back();

         }else{
             Session::flash('error', 'Inset failed failed');
             return redirect()->back();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
    $data = Product::where('product_status', 1)->where('product_slug', $slug)->firstorFail();
         return view('admin.product.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug){
     $data = Product::where('product_status', 1)->where('product_slug', $slug)->firstorFail();
       return view('admin.product.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function softdelete($slug){
          $softdelete = Product::where('product_status',1)->where('product_slug',$slug)->update([
            'product_status' => 0,
            'updated_at' => Carbon::now()->toDateTimestring(),
     ]);

     if($softdelete){
           Session::flash('success','successfully Delete');
             return redirect()->back();
     }else{
         Session::flash('error','Delete faild');
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
