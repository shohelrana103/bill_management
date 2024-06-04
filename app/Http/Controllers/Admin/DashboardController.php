<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class DashboardController extends Controller
{
    public function index(){
        $all_users = User::where('emp_type_id', '!=', 3)->get();
        return view('admin.add-bill', compact('all_users'));
    }
}
