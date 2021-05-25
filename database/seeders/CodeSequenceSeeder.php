<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeSequenceSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        //SYSTEM
        DB::table('sys_code_sequence')->insert([
            'year'=>'0',
            'month' => '0',
            'prefix' => 'FILLER',
            'seq_number' => '3',
        ]);
    }
}
