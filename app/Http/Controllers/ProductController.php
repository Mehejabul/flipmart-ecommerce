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
      ],[
          'product_name.required' =>'Please Inesrt Product Name',
      ]);
         //Category Image
         if($request->hasfile('product_image')){
              $image = $request->file('product_image');
            $product_img = 'product' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save('uploads/product/' . $product_img);
        }

        //Brand Feature
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
            'product_image' => $product_img,
            'product_gallery' => $request->product_gallery,
            'product_feature' => $product_feature,
            'product_order' => $request->product_order,
            'product_creator' => $creator,
            'product_slug' => $request->product_slug,
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
