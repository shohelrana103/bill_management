<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::updateOrCreate(['name' => 'SuperAdmin']);
        $admin = Role::updateOrCreate(['name' => 'Admin']);
        $general_user = Role::updateOrCreate(['name' => 'GeneralUser']);
        // $general_user = Role::updateOrCreate(['name' => 'General user']);

        $permissions = [
            [
                'group_name' => 'user',
                'permissions' => [
                    // admin Permissions
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete',
                    'user.bill'
                ]
            ],
            [
                'group_name' => 'bill',
                'permissions' => [
                    // admin Permissions
                    'bill.add',
                    'bill.view',
                    'bill.edit',
                    'bill.delete'
                ]
            ],
            [
                'group_name' => 'payment',
                'permissions' => [
                    // admin Permissions
                    'payment.add_manual_payment',
                    'payment.view',
                    'payment.edit',
                    'payment.delete',
                    'payment.history',
                    'payment.pay_bill'
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete'
                ]
            ],
        ];
        // Assign persmission
        // $permission = Permission::create(['name' => 'blog.create']);
   //      for($i=0; $i < count($persmissions); $i++) { 
   //       $permission = Permission::create(['name' => $persmissions[$i]]);
   //       $roleAdmin->givePermissionTo($permission);
            // $permission->assignRole($roleAdmin);
   //      }
          // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $superAdmin->givePermissionTo($permission);
                $permission->assignRole($superAdmin);
            }
        }
    }
}
