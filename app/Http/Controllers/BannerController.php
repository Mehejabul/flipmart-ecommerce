<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;
use Image;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $all = Banner::where('banner_status',1)->orderBy('banner_id', 'DESC')->get();
    return view('admin.banner.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    return view('admin.banner.create');
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
            'banner_title' => ['required'],
            'banner_mid_title' => ['required'],
            'banner_subtitle' => ['required'],
            'banner_button' => ['required'],
            'banner_url' => ['required'],
            'banner_order'=>['required'],

        ],[
            'banner_title.required' => 'Please insert banner title',
            'banner_mid_title.required' => 'Please insert banner title',
            'banner_subtitle.required' => 'Please insert banner title',
            'banner_button.required' => 'Please insert banner title',
            'banner_url.required' => 'Please insert banner title',
            'banner_order.required' => 'Please insert banner title',

        ]);

        //Banner Image
        if($request->hasfile('banner_image')){
            $image = $request->file('banner_image');
            $ban_img = 'banner' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(250,250)->save('uploads/banner/' . $ban_img);
            }else{
                $ban_img = $basic->banner_image;
            }

                $insert = Banner::InsertGetId([
            'banner_title' =>$request['banner_title'],
            'banner_mid_title' =>$request['banner_mid_title'],
            'banner_subtitle' =>$request['banner_subtitle'],
            'banner_button' =>$request['banner_button'],
            'banner_url' =>$request['banner_url'],
            'banner_order' =>$request['banner_order'],
            'banner_order' =>$request['banner_order'],
            'banner_publish' => Auth::user()->id,
            'banner_creator' => Auth::user()->id,
            'banner_slug' =>Str::slug($request->banner_title, '-'),
            'banner_status' => 1,
            'banner_image' => $ban_img,
            'created_at' =>Carbon::now()->toDateTimestring(),

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
        $data = Banner::where('banner_status', 1)->where('banner_slug', $slug)->firstorFail();
   return view('admin.banner.edit', compact('data'));
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
