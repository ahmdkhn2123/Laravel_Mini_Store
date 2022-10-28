<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use session;
class UserController extends Controller
{
    public function show_reg()
    {
        return view('register');
    }

    public function show_login()
    {
        return view('login');
    }
    public function showP()
    {
        return view('addP');
    }



    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'cpassword'=>'required|same:password'
        ]);

        $user=new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $result=$user->save();
        if($result)
        {
            return redirect()->back()->with('success', 'Your account has been registered');
        }else{
            return redirect()->back()->with('fail', 'Something Fishy !!');

        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user=User::where('email','=',$request->input('email'))->first();
        if ($user && (Hash::check($request->password,$user->password)))
        {
            $request->session()->put('user',$user);
            return redirect('addP');
        }else{
            return redirect()->back()->with('fail', 'Email or Password Are invalid !!');

        }
    }

    public function logout()
    {
        if (session()->has('user')){
            session()->pull('user');
            return redirect('login')->with('success', 'successfully loggedOut');
        }
    }
}
