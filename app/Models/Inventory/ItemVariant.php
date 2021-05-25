<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class ItemVariant extends Model{
    protected $guarded=['id'];
    protected $table = 'm_item_variant';

    public function attribute(){
        return $this->belongsTo(ItemAttribute::class,"item_attribute_id");
    }
}