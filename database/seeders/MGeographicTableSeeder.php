<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MGeographicTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('m_geographic')->delete();
        
        \DB::table('m_geographic')->insert(array (
            0 => 
            array (
                'id' => 1,
                'code' => NULL,
                'location' => 'Indonesia',
                'parent_id' => NULL,
                'level' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'code' => NULL,
                'location' => 'Aceh',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'code' => NULL,
                'location' => 'Sumatra Utara',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'code' => NULL,
                'location' => 'Sumatra Barat',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'code' => NULL,
                'location' => 'Riau',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'code' => NULL,
                'location' => 'Kepulauan Riau',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'code' => NULL,
                'location' => 'Jambi',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'code' => NULL,
                'location' => 'Bengkulu',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'code' => NULL,
                'location' => 'Sumatra Selatan',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'code' => NULL,
                'location' => 'Kepulauan Bangka Belitung',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'code' => NULL,
                'location' => 'Lampung',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'code' => NULL,
                'location' => 'Banten',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'code' => NULL,
                'location' => 'Jawa Barat',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'code' => NULL,
                'location' => 'DKI Jakarta',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'code' => NULL,
                'location' => 'Jawa Tengah',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'code' => NULL,
                'location' => 'Jawa Timur',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'code' => NULL,
                'location' => 'DI Yogyakarta',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'code' => NULL,
                'location' => 'Bali',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'code' => NULL,
                'location' => 'Nusa Tenggara Barat',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'code' => NULL,
                'location' => 'Nusa Tenggara Timur',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'code' => NULL,
                'location' => 'Kalimantan Barat',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'code' => NULL,
                'location' => 'Kalimantan Selatan',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'code' => NULL,
                'location' => 'Kalimantan Tengah',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'code' => NULL,
                'location' => 'Kalimantan Timur',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'code' => NULL,
                'location' => 'Kalimantan Utara',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'code' => NULL,
                'location' => 'Gorontalo',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'code' => NULL,
                'location' => 'Sulawesi Selatan',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'code' => NULL,
                'location' => 'Sulawesi Tenggara',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'code' => NULL,
                'location' => 'Sulawesi Tengah',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'code' => NULL,
                'location' => 'Sulawesi Utara',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'code' => NULL,
                'location' => 'Sulawesi Barat',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'code' => NULL,
                'location' => 'Maluku',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'code' => NULL,
                'location' => 'Maluku Utara',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'code' => NULL,
                'location' => 'Papua',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'code' => NULL,
                'location' => 'Papua Barat',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'code' => NULL,
                'location' => 'Kabupaten Bandung',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'code' => NULL,
                'location' => 'Kabupaten Bandung Barat',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'code' => NULL,
                'location' => 'Kabupaten Bekasi',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'code' => NULL,
                'location' => 'Kabupaten Bogor',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'code' => NULL,
                'location' => 'Kabupaten Ciamis',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'code' => NULL,
                'location' => 'Kabupaten Cianjur',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'code' => NULL,
                'location' => 'Kabupaten Cirebon',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'code' => NULL,
                'location' => 'Kabupaten Garut',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'code' => NULL,
                'location' => 'Kabupaten Indramayu',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'code' => NULL,
                'location' => 'Kabupaten Karawang',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'code' => NULL,
                'location' => 'Kabupaten Kuningan',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'code' => NULL,
                'location' => 'Kabupaten Majalengka',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'code' => NULL,
                'location' => 'Kabupaten Pangandaran',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'code' => NULL,
                'location' => 'Kabupaten Purwakarta',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'code' => NULL,
                'location' => 'Kabupaten Subang',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'code' => NULL,
                'location' => 'Kabupaten Sukabumi',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'code' => NULL,
                'location' => 'Kabupaten Sumedang',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'code' => NULL,
                'location' => 'Kabupaten Tasikmalaya',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'code' => NULL,
                'location' => 'Kota Bandung',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'code' => NULL,
                'location' => 'Kota Banjar',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'code' => NULL,
                'location' => 'Kota Bekasi',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'code' => NULL,
                'location' => 'Kota Bogor',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'code' => NULL,
                'location' => 'Kota Cimahi',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'code' => NULL,
                'location' => 'Kota Cirebon',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'code' => NULL,
                'location' => 'Kota Depok',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'code' => NULL,
                'location' => 'Kota Sukabumi',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'code' => NULL,
                'location' => 'Kota Tasikmalaya',
                'parent_id' => 13,
                'level' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 199,
                'code' => NULL,
                'location' => 'US',
                'parent_id' => 1,
                'level' => 1,
                'created_at' => '2021-06-17 21:49:23',
                'updated_at' => '2021-06-17 21:49:23',
            ),
            63 => 
            array (
                'id' => 201,
                'code' => NULL,
                'location' => 'Ubud',
                'parent_id' => 12,
                'level' => 2,
                'created_at' => '2021-06-17 22:15:23',
                'updated_at' => '2021-06-17 22:16:36',
            ),
            64 => 
            array (
                'id' => 202,
                'code' => NULL,
                'location' => 'Jakarta Selatan',
                'parent_id' => 14,
                'level' => 2,
                'created_at' => '2021-06-22 20:24:31',
                'updated_at' => '2021-06-22 20:24:31',
            ),
            65 => 
            array (
                'id' => 203,
                'code' => NULL,
                'location' => 'Sleman',
                'parent_id' => 17,
                'level' => 2,
                'created_at' => '2021-07-05 11:22:07',
                'updated_at' => '2021-07-05 11:22:07',
            ),
            66 => 
            array (
                'id' => 204,
                'code' => NULL,
                'location' => 'Klaten',
                'parent_id' => 17,
                'level' => 2,
                'created_at' => '2021-07-05 11:22:25',
                'updated_at' => '2021-07-05 11:22:25',
            ),
            67 => 
            array (
                'id' => 205,
                'code' => NULL,
                'location' => 'Jakarta Utara',
                'parent_id' => 14,
                'level' => 2,
                'created_at' => '2021-07-05 11:22:45',
                'updated_at' => '2021-07-05 11:22:45',
            ),
            68 => 
            array (
                'id' => 206,
                'code' => NULL,
                'location' => 'Jakarta Barat',
                'parent_id' => 14,
                'level' => 2,
                'created_at' => '2021-07-05 11:23:04',
                'updated_at' => '2021-07-05 11:23:04',
            ),
            69 => 
            array (
                'id' => 207,
                'code' => NULL,
                'location' => 'Jakarta Timur',
                'parent_id' => 14,
                'level' => 2,
                'created_at' => '2021-07-05 11:23:28',
                'updated_at' => '2021-07-05 11:23:28',
            ),
        ));
        
        
    }
}