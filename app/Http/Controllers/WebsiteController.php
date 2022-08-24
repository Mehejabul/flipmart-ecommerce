<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\str;
use Illuminate\Validation\Rules;
class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    return view('website.home');

    }

    public function login()
    {
        return view('website.login.login');
    }

    public function user_access(Request $request) {
        if(User::where('email',$request->email)->exists()){
            $db_pass = User::where('email',$request->email)->first();
            if(Hash::check($request->password,$db_pass->password)){
                return redirect('/');
            }else{
                return back()->with('Password_wrong',"Your Passsword Incorrect!");
            }
        }else{
            return back()->with('WrongMail',"Your Email Incorrect!");
        }

// if (User::where('email',$request->email)->exists()) {
//       $db_pass = User::where('email',$request->email)->first()->password;
//         if (Hash::check($request->password,$db_pass)) {
//           if (Auth::attempt($request->except('_token'))) {
//           return redirect()->intended('/');

//         }else {
//           return back()->with('customer_login_errors','Your Email Or Password Worng!');
//         }
//     }else {
//       return back()->with('customer_login_error','Your Email Address Not Found!');
//     }

  }




    public function user_regestation(Request $request)
    {
    //    dd($request->all());
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'slug' => Str::slug('u'. $request->name .'-'),
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->back();

    }

}
