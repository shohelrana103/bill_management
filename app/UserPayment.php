<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
     protected $fillable = [
        'user_id', 'paid_amount','payment_date', 'transection_id', 'payment_details_id', 'payment_type', 'comment'
    ];
}
