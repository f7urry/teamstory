<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('sys_users')->insert([[
            'username'=>'admin',
            'name' => 'Administrator',
            'email' => 'admin@localhost.com',
            'password' => '$2y$10$Cq2Zi8nUUACHu4L2kB0w8OrzCQGNCLFJpfJiuHPGw46AtFHaLw6o.',
            'avatar'=>'avatar/00d3f5c1bc717d4a1495801c725d2558.png',
            'status'=> 0,
            'level'=> 1,
        ],[
            'username'=>'user',
            'name' => 'User',
            'email' => 'user@localhost.com',
            'password' => '$2y$10$Cq2Zi8nUUACHu4L2kB0w8OrzCQGNCLFJpfJiuHPGw46AtFHaLw6o.',
            'avatar'=>'avatar/00d3f5c1bc717d4a1495801c725d2558.png',
            'status'=> 0,
            'level'=> 10,
        ]]);
    }
}
