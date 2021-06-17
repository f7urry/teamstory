<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class ItemGroup extends Model{
    protected $guarded=['id'];
    protected $table = 'm_item_group';

    public function items(){
        return $this->hasMany(Item::class, "item_group_id");
    }
}