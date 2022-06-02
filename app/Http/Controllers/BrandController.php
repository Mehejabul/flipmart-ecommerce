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
        $brand_img = 'banner' . time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(250,250)->save('uploads/banner/' . $brand_img);
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
    public function edit($id)
    {
        //
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
