<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class ItemRegisterDetail extends Model{
    protected $guarded=['id'];
    protected $table = 't_item_register_detail';

    public function item(){
        return $this->belongsTo(Item::class,"item_id");
    }
    public function register(){
        return $this->hasMany(Stock::class, "item_register_id");
    }

}