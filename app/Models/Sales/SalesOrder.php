<?php

namespace App\Models\Sales;

use App\Models\Base\Model;
use App\Models\Admin\Party;
use App\Models\Accounting\Receivable;
use App\Models\Inventory\Item;

class SalesOrder extends Model{
    public const PAID="PAID";
    public const UNPAID="UNPAID";
    public const CANCEL="CANCEL";

    public const TYPE_CASH="CASH";
    public const TYPE_CREDIT="CREDIT";

    protected $guarded=['id'];
    protected $table = 't_sales_order';
    protected $appends = ['tenor_left','payment_amount','tenor_amount','next_due'];

    public function party(){
        return $this->belongsTo(Party::class,"party_id");
    }
    public function item(){
        return $this->belongsTo(Item::class,"product_id");
    }
    public function payment(){
        return $this->hasMany(Receivable::class);
    }
    public function getPaymentAmountAttribute(){
        $total=0;
        foreach($this->payment as $payment)
            $total+=$payment->amount;

        return $total;
    }
    public function getTenorLeftAttribute(){
        return $this->tenor_count-$this->hasMany(Receivable::class)->count();
    }
    public function getTenorAmountAttribute(){
        if($this->tenor_count!=null)
            return ($this->sell_price-$this->prepayment_amount)/$this->tenor_count;
        else
            return 0;
    }
    public function getNextDueAttribute(){
        return 0;
    }
}