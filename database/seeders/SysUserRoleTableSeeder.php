<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysUserRoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_user_role')->delete();
        
        \DB::table('sys_user_role')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'role_access_id' => 1,
                'status' => 1,
                'created_at' => '2021-09-06 15:47:25',
                'updated_at' => '2021-09-06 15:47:25',
                'created_by' => NULL,
            ),
        ));
        
        
    }
}