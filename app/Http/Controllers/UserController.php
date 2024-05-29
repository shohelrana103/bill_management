<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function getUserFromApi(){
            $client = new Client();
         $response = $client->request('GET','https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
         // return $response->getBody();
        $json_reponse_data = json_decode($response->getBody(),true);
        foreach ($json_reponse_data as $key =>  $employee) {
            // return $employee; die();
            // return $employee['BupNo'];die;
            if ($employee['Email'] == 'N/A'){
                $employee['Email'] = $employee['BupNo'];
            }
            $employee = User::updateOrCreate(
                [
                    'bup_id' =>  $employee['BupNo'],
                    'name' =>  $employee['NameEng'],
                    'designation_id' =>  $employee['Designation'],
                    'department_id' =>  $employee['Office'],
                    'emp_type_id' =>  $employee['AppointmentType'],
                    'email' =>  $employee['Email'],
                    'mobile' =>  $employee['Mobile'],
                    'photo' =>  $employee['PhotoPath'],
                    'rank' =>  $employee['Rank'],
                    'blood_group' =>  $employee['BloodGroup'],
                    'password' => Hash::make($employee['BupNo'])
                ]
            );
         
        }
    }
}
