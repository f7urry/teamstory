<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class ItemRegister extends Model{
    protected $guarded=['id'];
    protected $table = 't_item_register';

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
    public function items(){
        return $this->hasMany(ItemRegisterDetail::class, "item_register_id");
    }

}