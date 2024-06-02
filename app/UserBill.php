<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserPayment;
use Illuminate\Support\Facades\DB;

class UserBill extends Model
{
     protected $fillable = [
        'user_id', 'bill_date','breakfast', 'tea_break', 'lunch', 'other', 'total_bill'
    ];
    // public static fucntion getUserDue($user_id){
    //   $total_bill = DB::table('user_bills')->where('user_id', $user_id)->sum('total_bill');
    //   $total_paid = UserPayment::where('user_id', $user_id)->sum('paid_amount');
    //   return $total_paid;
    // }
}
