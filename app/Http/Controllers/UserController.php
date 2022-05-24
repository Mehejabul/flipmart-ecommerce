<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $all = User::where('status',1)->orderBy('id', "DESC")->get();
      return view('admin.user.index',compact("all"));
    }

   public function create(){
     return view('admin.user.create');
   }

   public function store(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' =>['required'],
            'role' =>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'name.required'  => 'Please Insert your Full name',
            'email.required' => 'Please Insert your Email',
            'phone.required' => 'please insert your phone',
            'role.required' => 'please inert Role',
            'password.required' => 'please Insert Password',
        ]);

        $insert = User:: insertGetId([
            'name' =>$request['name'],
            'phone' =>$request['phone'],
            'email' =>$request['email'],
            'role' =>$request['role'],
            'address'=>$request['address'],
            'password' =>Hash::make($request->password),
                'slug' =>str::slug($request->name, '-'),
                'status'=> 1,
                'created_at' =>Carbon::now()->toDateTimestring(),

        ]);

        if($insert){
            Session::flash('success', 'Update User');
            return redirect()->back();
        }else{
            Session::flash('error', 'update faild');
            return redirect()->back();
        }
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $alls = User::where('status',1)->where('id',$id)->get();
    return view("admin.user.show",compact('alls'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug){
        $data = User::where('status',1)->where('slug',$slug)->firstOrFail();
         return view("admin.user.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $id = $request['id'];
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'phone' =>['required'],
            'role' =>['required'],
        ],[
            'name.required'  => 'Please Update your Full name',
            'phone.required' => 'please Update your phone',
            'role.required' => 'please  Update Role',

        ]);

        $update = User::where('status',1)->where('id',$id)->update([
            'name' =>$request['name'],
            'phone' =>$request['phone'],
            'email' =>$request['email'],
            'role' =>$request['role'],
            'address'=>$request['address'],
            'status' => 1,
            'updated_at' =>Carbon::now()->toDateTimestring(),
        ]);

        if($update){
            Session::flash('success', 'Successfully Update');
            return redirect()->back();
        }else{
            Session::flash('error', 'Opps update Failed');
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
