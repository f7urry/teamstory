<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $guarded=['id'];
    protected $table = 'm_warehouses';
}
