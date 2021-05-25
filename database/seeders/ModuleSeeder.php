<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //SYSTEM
        DB::table('sys_module')->insert([[
            'name'=>'Users',
            'path' => 'users',
            'fa_icon' => 'fa-circle',
        ],[
            'name'=>'Role',
            'path' => 'role',
            'fa_icon' => 'fa-circle',
        ]]);
    }
}
