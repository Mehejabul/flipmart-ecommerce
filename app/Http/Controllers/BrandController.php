<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use File;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $brands = Brand::where('brand_status',1)->orderBy('brand_id', 'DESC')->get();
    return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    $this->validate($request,[
        'brand_name' => ['required'],
    ],[
        'brand_name.required' => 'please insert Brand Name',
    ]);

    //Brand Image
    if($request->hasfile('brand_image')){
        $image = $request->file('brand_image');
        $brand_img = 'brand' . time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(250,250)->save('uploads/brand/' . $brand_img);
        }

        //Brand Feature
        if($request->brand_feature == 'on'){
            $brand_feature = 1;
         }else{
             $brand_feature = 0 ;
         }

         $insert = Brand::InsertGetId([
             'brand_name' => $request['brand_name'],
             'brand_remarks' => $request['brand_remarks'],
             'brand_slug' => Str::slug($request->brand_name, '-'),
             'brand_creator' => Auth::user()->id,
             'brand_feature' => $brand_feature,
             'brand_image' =>  $brand_img,
             'brand_status' => 1,
             'created_at' => Carbon::now()->toDatetimestring(),
         ]);

         if($insert){
            Session::flash('success', 'Successfully create');
            return redirect()->back();
             }else{
                 Session::flash('error', 'Opps! there some error');
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
    public function edit($slug){
$data = Brand::where('brand_status', 1)->where('brand_slug',$slug)->firstorFail();
    return view('admin.brand.edite', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug){
        $this->validate($request,[
            'brand_name' => ['required'],
        ],[
            'brand_name.required' => 'please insert Brand Name',
        ]);
         //Brand Image
         $brand = Brand::where('brand_slug', $slug)->firstOrFail();

        if($request->hasfile('brand_image')){
            if (File::exists('uploads/brand/' . $brand->brand_image)) {
                File::delete('uploads/brand/' . $brand->brand_image);
            }
            $image = $request->file('brand_image');
            $brand_img = 'brand' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save('uploads/brand/' . $brand_img);
        }else{
            $brand_img = $brand->brand_image;
        }
         //Brand Feature
         if($request->brand_feature == 'on'){
            $brand_feature = 1;
         }else{
             $brand_feature = 0 ;
         }

         $update = Brand::where('brand_status',1)->where('brand_slug', $slug)->update([
            'brand_name' => $request['brand_name'],
            'brand_remarks' => $request['brand_remarks'],
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_editor' => Auth::user()->id,
            'brand_feature' => $brand_feature,
            'brand_image' =>  $brand_img,
            'brand_status' => 1,
            'updated_at' => Carbon::now()->toDatetimestring(),
        ]);

        if($update){
           Session::flash('success', 'Successfully create');
           return redirect()->back();
            }else{
                Session::flash('error', 'Opps! there some error');
                return redirect()->back();
            }
    }

    public function softdelet($slug){
       $softdelet = Brand::where('brand_status', 1)->where('brand_slug',$slug)->update([
        'brand_status' => 0,
        'updated_at' => Carbon::now()->toDateTimestring(),
       ]);
       if($softdelet){
           Session::flash('success', 'successfuly delete');
           return redirect()->route('brand.index');
       }else{
           Session::flash('error', 'Delete failed');
           return redirect()->route('brand.index');
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
