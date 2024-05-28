<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserBill;
use Session;
use App\User;
use App\UserPayment;
class BillController extends Controller
{
    public function addUserBill(Request $request)
    {
        // return $request->all();
        $user_id = $request->input('user_id');
        $bill_date = $request->input('bill_date');
        $breakfast = $request->input('breakfast');
        $tea_break = $request->input('tea_break');
        $lunch = $request->input('lunch');
        if ($breakfast == null){$breakfast=0;}
        if ($tea_break == null){$tea_break=0;}
        if ($lunch == null){$lunch=0;}
        UserBill::create([
            'user_id' => $user_id,
            'bill_date' => $bill_date,
            'breakfast' => $breakfast,
            'tea_break' => $tea_break,
            'lunch' => $lunch,
            'total_bill' => $breakfast+$tea_break+$lunch
        ]);
        Session::flash('message', "Bill Successfully Added");
        return redirect()->back();
    }
    public function getUserBill(Request $request){
        $all_users = User::all();
        $user_id = $request->input('user_id');
        if ($user_id !=null){
            // return $request->all();
            $user_bills = UserBill::where('user_id', $user_id)->get();
            $user = User::find($user_id);
            return view('admin.bill-history', compact('user_bills', 'all_users', 'user', 'bup_id', 'name'));
            return json_encode( $user_bills );
        }
        else{
            $user_bills=[];
            return view('admin.bill-history', compact('user_bills', 'all_users'));
        }
    }
    public function userBillPayment(){
        return view('admin.bill-payment-history');
    }
    public function userPaymentHistory(Request $request){
        $all_users = User::all();
        $user_id = $request->input('user_id');
        if ($user_id !=null){
            // return $request->all();
            $total_bill = UserBill::where('user_id', $user_id)->sum('total_bill');
            $total_paid = UserPayment::where('user_id', $user_id)->sum('paid_amount');
            $user = User::find($user_id);
            return view('admin.payment-history', compact('total_bill', 'total_paid', 'user', 'all_users'));
            return json_encode( $user_bills );
        }
        else{
            $total_bill=null;
            return view('admin.payment-history', compact('total_bill', 'all_users'));
        }
    }
}