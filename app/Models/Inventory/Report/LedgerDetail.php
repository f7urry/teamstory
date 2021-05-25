<?php

namespace App\Models\Inventory\Report;

use App\Models\Base\Model;
use App\Models\Inventory\Item;

class LedgerDetail extends Model{
    protected $guarded=['id'];
    protected $table = 'r_ledger_detail';

    public function item(){
        return $this->belongsTo(Item::class,"item_id");
    }
}