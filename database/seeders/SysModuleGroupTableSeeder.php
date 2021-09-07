<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysModuleGroupTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_module_group')->delete();
        
        \DB::table('sys_module_group')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ROOT',
                'parent_id' => NULL,
                'fa_icon' => '',
                'group_name' => NULL,
                'menu_index' => 1,
                'created_at' => '2021-04-05 08:37:23',
                'updated_at' => '2021-04-05 08:37:23',
                'created_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Settings',
                'parent_id' => NULL,
                'fa_icon' => 'fa-cog',
                'group_name' => NULL,
                'menu_index' => 1,
                'created_at' => '2021-04-05 08:37:23',
                'updated_at' => '2021-04-05 08:37:23',
                'created_by' => NULL,
            ),
        ));
        
        
    }
}