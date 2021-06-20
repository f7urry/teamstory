<?php

namespace App\Models\Sales;

use App\Models\Base\Model;
use App\Models\Admin\Party;
use App\Models\Accounting\Receivable;
use App\Models\Admin\PartyAddress;
use App\Models\Inventory\Item;

class SalesOrder extends Model{
    public const STATUS_PAID="PAID";
    public const STATUS_UNPAID="UNPAID";
    
    public const STATUS_IN_PROCESS="IN_PROCESS";
    public const STATUS_COMPLETE="COMPLETE";
    public const STATUS_CANCEL="CANCEL";


    public const TYPE_CASH="CASH";
    public const TYPE_CREDIT="CREDIT";

    protected $guarded=['id'];
    protected $table = 't_sales_order';
    protected $appends = ['paid_amount','amount_discount'];

    public function party(){
        return $this->belongsTo(Party::class,"party_id");
    }
    public function items(){
        return $this->hasMany(SalesOrderItem::class);
    }
    public function payment(){
        return $this->hasMany(Receivable::class);
    }
    public function shipping_address(){
        return $this->belongsTo(PartyAddress::class,"shipping_address_id");
    }
    public function getPaidAmountAttribute(){
        $total=0;
        foreach($this->payment as $payment)
            $total+=$payment->amount;

        return $total;
    }
    public function getAmountDiscountAttribute(){
        $total=0;
        foreach ($this->items as $item) {
            $amount=$item->price*$item->qty;
            $amount=($amount*$item->discount)/100;
            $total+=$amount;
        }

        return $total;
    }
}