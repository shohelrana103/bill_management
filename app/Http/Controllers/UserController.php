<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    private function create_or_update_employee($data_val){
        foreach ($data_val as $key =>  $employee) {
            // return $employee; die();
            // return $employee['BupNo'];die;
            if ($employee['Email'] == 'N/A'){
                $employee['Email'] = $employee['BupNo'];
            }
            if (isset($employee['Office'])){
                $employee['Office'] = $employee['Office'];
            }
            else{
                $employee['Office'] = $employee['Department'];
            }
            $employee_get = User::where('email',  $employee['Email'])->first();
            if ($employee_get){
                $employee_get->bup_id=$employee['BupNo'];
                $employee_get->name=$employee['NameEng'];
                $employee_get->designation_id=$employee['Designation'];
                $employee_get->department_id=$employee['Office'];
                $employee_get->emp_type_id=$employee['AppointmentType'];
                $employee_get->mobile=$employee['Mobile'];
                $employee_get->photo=$employee['PhotoPath'];
                $employee_get->rank=$employee['Rank'];
                $employee_get->blood_group=$employee['BloodGroup'];
                $employee_get->save();
            }
            else{
                $employee_create = User::create(
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
                $employee_create->assignRole('GeneralUser');
            }
         
        }
    }
    public function getUserFromApi(){
         $client = new Client();
         // Staff API
         $response = $client->request('GET','https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
         // return $response->getBody();
        $json_reponse_data = json_decode($response->getBody(),true);
        $this->create_or_update_employee($json_reponse_data);
        // Faculty Staff API
         $f_staff_response = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseStaffProfile?departmentId=0&facultyId=0');
         // return $response->getBody();
        $f_staff_reponse_json = json_decode($f_staff_response->getBody(),true);
        $this->create_or_update_employee($f_staff_reponse_json);
        // Faculty/Teacher API
         $f_staff_response = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
         // return $response->getBody();
        $f_staff_reponse_json = json_decode($f_staff_response->getBody(),true);
        $this->create_or_update_employee($f_staff_reponse_json);
        
    }
}
