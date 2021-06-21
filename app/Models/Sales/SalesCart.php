<?php

namespace App\Models\Sales;

use App\Models\Base\Model;
use App\Models\Admin\Party;
use App\Models\Accounting\Receivable;
use App\Models\Admin\PartyAddress;
use App\Models\Inventory\Item;

class SalesCart extends Model{

    protected $guarded=['id'];
    protected $table = 't_sales_cart';
    protected $appends = ['amount'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function getAmountAttribute(){
        $total=0;
        $total=$this->price*$this->qty;
        return $total;
    }
}