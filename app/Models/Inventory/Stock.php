<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class Stock extends Model{
    protected $guarded=['id'];
    protected $table = 't_stock';

    public function item(){
        return $this->belongsTo(Item::class,"item_id");
    }
    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}