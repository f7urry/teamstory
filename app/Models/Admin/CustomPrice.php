<?php

namespace App\Models\Admin;

use App\Models\Base\Model;
use App\Models\Inventory\Item;

class CustomPrice extends Model{
    protected $guarded=['id'];
    protected $table = 'm_party_custom_price';
    
    public function party(){
        return $this->belongsTo(Party::class);
    }
    public function item(){
        return $this->belongsTo(Item::class);
    }
}