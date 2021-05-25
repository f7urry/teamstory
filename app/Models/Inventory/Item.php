<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class Item extends Model{
    protected $guarded=['id'];
    protected $table = 'm_item';


    public function variants(){
        return $this->hasMany(ItemVariant::class);
    }
    public function uom(){
        return $this->belongsTo(Uom::class,"uom_id");
    }
}