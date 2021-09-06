<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_users')->delete();
        
        \DB::table('sys_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'name' => 'Administrator',
                'email' => 'admin@localhost.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vP2NyDt4bahyKGsX.QsOae.0FlyzShtQB4WmVXb2niAeJqcTv7u8W',
                'remember_token' => NULL,
                'avatar' => '/assets/app/img/user.png',
                'status' => 0,
                'created_at' => NULL,
                'updated_at' => '2021-08-17 17:52:06',
                'api_token' => 'hpysolution2021',
                'level' => 1,
            ),
        ));
        
        
    }
}