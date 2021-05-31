<?php

namespace App\Models\Sales;

use App\Models\Base\Model;
use App\Models\Admin\Party;
use App\Models\Accounting\Receivable;
use App\Models\Inventory\Item;

class SalesOrderItem extends Model{
    protected $guarded=['id'];
    protected $table = 't_sales_order_item';

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function salesorder(){
        return $this->belongsTo(SalesOrder::class);
    }
}