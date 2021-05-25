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

        //TRANSACTION
        DB::table('sys_module')->insert([[
            'name'=>'Goods Receipt',
            'path' => 'goodsreceipt',
            'fa_icon' => 'fa-circle',
        ],[
            'name'=>'Goods Issue',
            'path' => 'goodsissue',
            'fa_icon' => 'fa-circle',
        ]]);

        //INVENTORY
        DB::table('sys_module')->insert([[
            'name'=>'Item Group',
            'path' => 'itemgroup',
            'fa_icon' => 'fa-circle',
        ],[
            'name'=>'Item Attribute',
            'path' => 'itemattribute',
            'fa_icon' => 'fa-circle',
        ],[
            'name'=>'Item',
            'path' => 'item',
            'fa_icon' => 'fa-circle',
        ],[
            'name'=>'Unit Of Measure',
            'path' => 'uom',
            'fa_icon' => 'fa-circle',
        ],[
            'name'=>'Warehouse',
            'path' => 'warehouse',
            'fa_icon' => 'fa-circle',
        ]]);
    }
}
