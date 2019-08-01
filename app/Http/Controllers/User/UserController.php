<?php

namespace App\Http\Controllers\User;

use App\Model\CustomerProfileModel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signup(){
        return view('admin.user.signup');
    }
    public function signup_submit(Request $request){
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required|unique:users',
           'phone'=>'required',
           'password'=>'required'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password)
        ]);
        return redirect()->back()->with('success','Register Successful');
    }
    public function user_login(){
        return view('admin.user.login');
    }
    public function login_submit(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt(['email' => $email,'password' => $password])) {
            return redirect(route('user_dashboard'));
        }
        else {
            return redirect()->route('user_login')->with('error','Invalid Inputs.');
        }
    }
    public function user_logout(){
        Auth::logout();
        return redirect()->route('user_login')->with('success','Logout Successful');
    }
    public function user_dashboard(){
        $user_id = Auth::user()->id;
        $customers = CustomerProfileModel::where('user_id',$user_id)->get();
        return view('admin.dashboard.index',compact('customers'));
    }
}
