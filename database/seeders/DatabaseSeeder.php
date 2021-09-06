<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(FailedJobsTableSeeder::class);
        $this->call(MGeographicTableSeeder::class);
        $this->call(MPartyTableSeeder::class);
        $this->call(MPartyAddressTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(SysCodeSequenceTableSeeder::class);
        $this->call(SysModuleTableSeeder::class);
        $this->call(SysModuleGroupTableSeeder::class);
        $this->call(SysRoleAccessTableSeeder::class);
        $this->call(SysRoleAccessPermissionTableSeeder::class);
        $this->call(SysUserRoleTableSeeder::class);
        $this->call(SysUsersTableSeeder::class);
    }
}
