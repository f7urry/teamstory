<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class ItemVariantDetail extends Model{
    protected $guarded=['id'];
    protected $table = 'm_item_variant_detail';


    public function attributeDetail(){
        return $this->belongsTo(ItemAttributeDetail::class,"item_attribute_detail_id");
    }
}