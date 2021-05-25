<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class GoodsReceiptItem extends Model
{
    protected $guarded=['id'];
    protected $table = 't_goods_receipt_item';

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function goodsReceipt()
    {
        return $this->belongsTo(GoodsReceipt::class, 'goods_receipt_id', 'id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }
}
