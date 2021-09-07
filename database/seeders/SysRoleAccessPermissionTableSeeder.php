<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysRoleAccessPermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_role_access_permission')->delete();
        
        \DB::table('sys_role_access_permission')->insert(array (
            0 => 
            array (
                'id' => 1,
                'role_access_id' => 1,
                'module_id' => 1,
                'is_read' => 1,
                'is_create' => 1,
                'is_delete' => 1,
                'is_update' => 1,
                'status' => 0,
                'created_at' => '2021-09-06 15:39:28',
                'updated_at' => '2021-09-06 15:39:28',
                'created_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'role_access_id' => 1,
                'module_id' => 2,
                'is_read' => 1,
                'is_create' => 1,
                'is_delete' => 1,
                'is_update' => 1,
                'status' => 0,
                'created_at' => '2021-09-06 15:39:33',
                'updated_at' => '2021-09-06 15:39:33',
                'created_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'role_access_id' => 1,
                'module_id' => 3,
                'is_read' => 1,
                'is_create' => 1,
                'is_delete' => 1,
                'is_update' => 1,
                'status' => 0,
                'created_at' => '2021-09-06 15:39:37',
                'updated_at' => '2021-09-06 15:39:37',
                'created_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'role_access_id' => 1,
                'module_id' => 4,
                'is_read' => 1,
                'is_create' => 1,
                'is_delete' => 1,
                'is_update' => 1,
                'status' => 0,
                'created_at' => '2021-09-06 15:39:43',
                'updated_at' => '2021-09-06 15:39:43',
                'created_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'role_access_id' => 1,
                'module_id' => 5,
                'is_read' => 1,
                'is_create' => 1,
                'is_delete' => 1,
                'is_update' => 1,
                'status' => 0,
                'created_at' => '2021-09-06 15:39:43',
                'updated_at' => '2021-09-06 15:39:43',
                'created_by' => NULL,
            ),
        ));
        
        
    }
}