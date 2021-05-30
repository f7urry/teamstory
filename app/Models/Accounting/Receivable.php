<?php

namespace App\Models\Accounting;

use App\Models\Base\Model;
use App\Models\Sales\SalesOrder;

class Receivable extends Model{
    protected $guarded=['id'];
    protected $table = 't_receivable';

    public const TYPE_AUTO="MANUAL";
    public const TYPE_MANUAL="MANUAL";

    public function salesorder(){
        return $this->belongsTo(SalesOrder::class,"sales_order_id");
    }
}