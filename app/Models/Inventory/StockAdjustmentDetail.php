<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class StockAdjustmentDetail extends Model{
    protected $guarded=['id'];
    protected $table = 't_stock_adjustment_detail';

    public function item(){
        return $this->belongsTo(Item::class,"item_id");
    }
    public function adjustment(){
        return $this->hasMany(Stock::class, "stock_adjustment_id");
    }

}