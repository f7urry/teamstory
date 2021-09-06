<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SysCodeSequenceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sys_code_sequence')->delete();
        
        \DB::table('sys_code_sequence')->insert(array (
            0 => 
            array (
                'id' => 1,
                'year' => 0,
                'month' => 0,
                'prefix' => 'FILLER',
                'seq_number' => 3,
                'created_at' => '2021-04-06 13:43:58',
                'updated_at' => '2021-04-06 13:43:58',
                'created_by' => NULL,
            ),
        ));
        
        
    }
}