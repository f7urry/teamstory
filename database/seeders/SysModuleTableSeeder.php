<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysModuleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_module')->delete();
        
        \DB::table('sys_module')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Profile',
                'path' => 'profile',
                'fa_icon' => 'fa-circle',
                'status' => NULL,
                'is_menu' => 0,
                'menu_index' => 0,
                'group_id' => NULL,
                'created_at' => '2021-03-31 18:15:56',
                'updated_at' => '2021-03-31 18:15:56',
                'created_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Role',
                'path' => 'roles',
                'fa_icon' => 'fa-key',
                'status' => NULL,
                'is_menu' => 1,
                'menu_index' => 1,
                'group_id' => 2,
                'created_at' => '2021-03-31 17:40:50',
                'updated_at' => '2021-03-31 17:40:50',
                'created_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Users',
                'path' => 'users',
                'fa_icon' => 'fa-user',
                'status' => NULL,
                'is_menu' => 1,
                'menu_index' => 2,
                'group_id' => 2,
                'created_at' => '2021-03-31 17:40:50',
                'updated_at' => '2021-03-31 17:40:50',
                'created_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Module',
                'path' => 'modules',
                'fa_icon' => 'fa-star',
                'status' => NULL,
                'is_menu' => 1,
                'menu_index' => 3,
                'group_id' => 2,
                'created_at' => '2021-08-25 16:11:41',
                'updated_at' => '2021-08-25 16:11:41',
                'created_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Company',
                'path' => 'company',
                'fa_icon' => 'fa-building',
                'status' => NULL,
                'is_menu' => 1,
                'menu_index' => 4,
                'group_id' => 2,
                'created_at' => '2021-08-25 16:11:41',
                'updated_at' => '2021-08-25 16:11:41',
                'created_by' => NULL,
            )
        ));
        
        
    }
}