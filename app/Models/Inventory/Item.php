<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class Item extends Model{
    protected $guarded=['id'];
    protected $table = 'm_item';
    protected $appends = ['current_stock'];

    public function variants(){
        return $this->hasMany(ItemVariant::class);
    }
    public function uom(){
        return $this->belongsTo(Uom::class,"uom_id");
    }
    public function stock(){
        return $this->hasMany(Stock::class,"item_id");
    }
    public function getCurrentStockAttribute(){
        $total=0;
        foreach ($this->stock as $stock) {
            $total+=$stock->qty;
        }
        return $total;
    }
}