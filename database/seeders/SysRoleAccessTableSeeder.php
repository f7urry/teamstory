<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysRoleAccessTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_role_access')->delete();
        
        \DB::table('sys_role_access')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ADMIN',
                'access_type' => 1,
                'created_at' => '2021-03-31 10:59:05',
                'updated_at' => '2021-04-08 15:52:33',
                'created_by' => NULL,
            ),
        ));
        
        
    }
}