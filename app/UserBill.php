<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBill extends Model
{
     protected $fillable = [
        'user_id', 'bill_date','breakfast', 'tea_break', 'lunch', 'other', 'total_bill'
    ];
}
