<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $is_exist = User::where('email', 'shohel.rana1521@gmail.com')->first();
        if (is_null($is_exist)){
            $user = new User();
            $user->name = 'Shohel Rana';
            $user->email = 'shohel.rana1521@gmail.com';
            $user->bup_id = 'shohel.rana1521@gmail.com';
            $user->designation_id = 'SuperAdmin';
            $user->department_id = 'SuperAdmin';
            $user->emp_type_id = '3';
            $user->password = Hash::make('12345678');
            $user->save();
            $user->assignRole('SuperAdmin');
        }
        $is_exist_admin = User::where('email', 'admin@bup.edu.bd')->first();
        if (is_null($is_exist_admin)){
            $admin = new User();
            $admin->name = 'Admin';
            $admin->email = 'admin@bup.edu.bd';
            $admin->bup_id = 'admin@bup.edu.bd';
            $admin->designation_id = 'Admin';
            $admin->department_id = 'Admin';
            $admin->emp_type_id = '3';
            $admin->password = Hash::make('admin@123');
            $admin->save();
            $admin->assignRole('Admin');
        }
    }
}
