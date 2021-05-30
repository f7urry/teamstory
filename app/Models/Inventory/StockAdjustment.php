<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class StockAdjustment extends Model{
    protected $guarded=['id'];
    protected $table = 't_stock_adjustment';

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
    public function details(){
        return $this->hasMany(StockAdjustmentDetail::class, "stock_adjustment_id");
    }

}