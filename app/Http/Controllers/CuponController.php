<?php

namespace App\Http\Controllers;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $cupons = Cupon::where('cupon_status',1)->orderBy('cupon_id','DESC')->get();
        return view('admin.cupon.index',compact('cupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
       return view('admin.cupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    $this->validate($request,[
      'cupon_title' => ['required'],
      'cupon_code' => ['required'],
      'cupon_starting' => ['required'],
      'cupon_ending' => ['required'],

    ],[
       'cupon_title.required' => 'Please insert Cupon Title',
       'cupon_code.required' => 'Please insert cupon code',
       'cupon_starting' => 'Please insert Cupon satrting Date',
       'cupon_ending' => 'Please insert Cupon ending Date',
    ]);

    $slug = 'cupon'. uniqid();
    $creator = Auth::user()->id;
      $insert = Cupon:: InsertGetId([
        'cupon_title' => $request->cupon_title,
        'cupon_code' => $request->cupon_code,
        'cupon_starting' => $request->cupon_starting,
        'cupon_ending' => $request->cupon_ending,
        'cupon_remarks' => $request->cupon_remarks,
        'cupon_creator' => $creator,
        'cupon_slug' => $slug,
        'cupon_status' => 1,
        'created_at' => Carbon::now()->toDateTimestring(),
      ]);
      if($insert){
          Session::flash('success','Successfully Insert');
          return redirect()->back();
      }else{
          Session::flash('error', 'Insert Failed');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){
      $data = Cupon::where('cupon_status',1)->where('cupon_slug',$slug)->firstorFail();
         return view("admin.cupon.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug){
        $data = Cupon::where('cupon_status',1)->where('cupon_slug',$slug)->firstorFail();
        return view("admin.cupon.edit", compact('data'));
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
            'cupon_title' => ['required'],
            'cupon_code' => ['required'],
            'cupon_starting' => ['required'],
            'cupon_ending' => ['required'],

          ],[
             'cupon_title.required' => 'Please insert Cupon Title',
             'cupon_code.required' => 'Please insert cupon code',
             'cupon_starting' => 'Please insert Cupon satrting Date',
             'cupon_ending' => 'Please insert Cupon ending Date',
          ]);


          $editor = Auth::user()->id;
            $update = Cupon::where('cupon_status',1)->where('cupon_slug',$slug)->update([
              'cupon_title' => $request->cupon_title,
              'cupon_code' => $request->cupon_code,
              'cupon_starting' => $request->cupon_starting,
              'cupon_ending' => $request->cupon_ending,
              'cupon_remarks' => $request->cupon_remarks,
              'cupon_creator' => $editor,
              'updated_at' => Carbon::now()->toDateTimestring(),
            ]);
            if($update){
                Session::flash('success','Successfully update');
                return redirect()->back();
            }else{
                Session::flash('error', 'Insert update');
            }
    }

    public function softdelete($slug){
      $softdelete = Cupon::where('cupon_status',1)->where('cupon_slug',$slug)->update([
         'cupon_status' => 0,
         'updated_at' =>Carbon::now()->toDateTimestring(),
      ]);
      if($softdelete){
        Session::flash('success','Successfully delete');
        return redirect()->back();
    }else{
        Session::flash('error', 'Delete Failed');
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
