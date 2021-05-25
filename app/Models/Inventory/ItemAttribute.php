<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class ItemAttribute extends Model{
    protected $guarded=['id'];
    protected $table = 'm_item_attribute';

    public function details(){
        return $this->hasMany(ItemAttributeDetail::class);
    }

}