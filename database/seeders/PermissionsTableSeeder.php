<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'certificate_mangment_access',
            ],
            [
                'id'    => 18,
                'title' => 'main_certificate_type_create',
            ],
            [
                'id'    => 19,
                'title' => 'main_certificate_type_edit',
            ],
            [
                'id'    => 20,
                'title' => 'main_certificate_type_show',
            ],
            [
                'id'    => 21,
                'title' => 'main_certificate_type_delete',
            ],
            [
                'id'    => 22,
                'title' => 'main_certificate_type_access',
            ],
            [
                'id'    => 23,
                'title' => 'sub_certificate_type_create',
            ],
            [
                'id'    => 24,
                'title' => 'sub_certificate_type_edit',
            ],
            [
                'id'    => 25,
                'title' => 'sub_certificate_type_show',
            ],
            [
                'id'    => 26,
                'title' => 'sub_certificate_type_delete',
            ],
            [
                'id'    => 27,
                'title' => 'sub_certificate_type_access',
            ],
            [
                'id'    => 28,
                'title' => 'major_create',
            ],
            [
                'id'    => 29,
                'title' => 'major_edit',
            ],
            [
                'id'    => 30,
                'title' => 'major_show',
            ],
            [
                'id'    => 31,
                'title' => 'major_delete',
            ],
            [
                'id'    => 32,
                'title' => 'major_access',
            ],
            [
                'id'    => 33,
                'title' => 'academic_facility_create',
            ],
            [
                'id'    => 34,
                'title' => 'academic_facility_edit',
            ],
            [
                'id'    => 35,
                'title' => 'academic_facility_show',
            ],
            [
                'id'    => 36,
                'title' => 'academic_facility_delete',
            ],
            [
                'id'    => 37,
                'title' => 'academic_facility_access',
            ],
            [
                'id'    => 38,
                'title' => 'awp_emp_data_create',
            ],
            [
                'id'    => 39,
                'title' => 'awp_emp_data_edit',
            ],
            [
                'id'    => 40,
                'title' => 'awp_emp_data_show',
            ],
            [
                'id'    => 41,
                'title' => 'awp_emp_data_delete',
            ],
            [
                'id'    => 42,
                'title' => 'awp_emp_data_access',
            ],
            [
                'id'    => 43,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
