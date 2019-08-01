<?php

namespace App\Http\Controllers\User;

use App\Model\ActivityModel;
use App\Model\CustomerProfileModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function add_customer(){
        return view('admin.user.customer');
    }
    public function save_customer(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);
        CustomerProfileModel::create([
            'user_id' => Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'status'=>$request->status,
        ]);
        return redirect()->route('user_dashboard')->with('success','Customer Added Successful');
    }
    public function activities($customer_id){
        $user_id = Auth::user()->id;
        $customer_details = CustomerProfileModel::where('customer_id',$customer_id)->first();
        $activities = ActivityModel::where('user_id',$user_id)->where('customer_id',$customer_id)->get();
        return view('admin.dashboard.activities',compact('activities','customer_id','customer_details'));
    }
    public function add_activities($customer_id){
        $user_id = Auth::user()->id;
        return view('admin.dashboard.add_activities',compact('customer_id'));
    }
    public function save_activities(Request $request,$customer_id){
        $user_id = Auth::user()->id;
        $this->validate($request,[
            'activity_type'=>'required',
            'time'=>'required',
            'description'=>'required',
            'next_act_desc'=>'required',
            'next_act_time'=>'required',
        ]);
        ActivityModel::create([
            'user_id' => $user_id,
            'customer_id' => $customer_id,
            'activity_type'=>$request->activity_type,
            'time'=>$request->time,
            'description'=>$request->description,
            'next_act_desc'=>$request->next_act_desc,
            'next_act_time'=>$request->next_act_time,
        ]);
        return redirect()->route('activities',$customer_id)->with('success','Customer Added Successful');
    }
}
