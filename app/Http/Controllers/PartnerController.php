<?php

namespace App\Http\Controllers;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use File;
use Image;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $partners = Partner::where('partner_status',1)->orderBy('partner_id', "DESC")->get();
      return view('admin.partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request->all());
      $this->validate($request,[
         'partner_name' => ['required'],
         'partner_url' =>['required'],
         'partner_image' =>['required'],

      ],[
          'partner_name.required' => 'please insert Partner name',
          'partner_url.required' => 'Please insert your Partner Url',
          'partner_image.required' => 'Plese insert your paertner Image',
      ]);
   //Partner Image
      if($request->hasfile('partner_image')){
      $image = $request->file('partner_image');
      $partner_img = 'partner' . time() . '.' .$image->getClientOriginalExtension();
      Image::make($image)->resize('250,250')->save('uploads/partner/'.$partner_img);
    }else{
        $partner_img = '';
    }

    $insert = Partner::InsertGetId([
       'partner_name' => $request['partner_name'],
       'partner_url' => $request['partner_url'],
       'partner_order' => $request['partner_order'],
       'partner_image' => $partner_img,
       'partner_creator' => Auth::user()->id,
       'partner_slug' => Str::slug($request->partner_name .'-'),
       'partner_status' => 1,
       'created_at' => Carbon::now()->toDateTimestring(),
    ]);

    if($insert){
        Session::flash('success', 'Successfully Insert');
        return redirect()->back();
    }else{
        Session::flash('error', 'Insert Failed');
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
    $data = Partner::where('partner_status',1)->where('partner_slug', $slug)->firstorFail();
      return view('admin.partner.edit', compact('data'));
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
           'partner_name' => ['required'],
           'partner_url' => ['required'],
         ],[
         'partner_name.required' => 'Please update partner name',
         'partner_url.required' => 'please update partner url',
         ]);

    // Partner image
    $partners = Partner::where('partner_status',1)->where('partner_slug',$slug)->firstorFail();
    if($request->hasfile('partner_image')){

        if(File::exists('uploads/partner/'. $partners->partner_image)){
            File::delete('uploads/partner/'. $partners->partner_image);
        }

        $image = $request->file('partner_image');
        $partner_img = 'partner' . time() . '-' . $image->getClientOriginalExtension();
        image::make($image)->resize(120,120)->save('uploads/partner/'.$partner_img);
    }else{
        $partner_img = $partners->partner_image;
    }

    $update = Partner::where('partner_status', 1)->where('partner_slug',$slug)->update([
        'partner_name' => $request['partner_name'],
        'partner_url' => $request['partner_url'],
        'partner_order' => $request['partner_order'],
        'partner_image' => $partner_img,
        'partner_editor' => Auth::user()->id,
        'partner_slug' => Str::slug($request->partner_name .'-'),
        'updated_at' => Carbon::now()->toDateTimestring(),
    ]);
    if($update){
        Session::flash('success', 'Successfully update');
        return redirect()->route('partner.index');
    }else{
        Session::flash('error','updated failed');
        return redirect()->route('partner.index');
    }


    }
    public function softdelete($slug) {
        $softdel = Partner::where('partner_status',1)->where('partner_slug',$slug)->update([
            'partner_status' => 0,
            'updated_at' => Carbon::now()->toDateTimestring(),
        ]);
        if($softdel){
            Session::flash('success', 'Successfully delete');
            return redirect()->back();
        }else{
            Session::flash('error', 'delete failed');
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
