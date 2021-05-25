<?php

namespace App\Models\Inventory;

use App\Models\Base\Model;

class GoodsReceipt extends Model
{
    protected $guarded=['id'];
    protected $table = 't_goods_receipt';

    public function goodsReceiptItems()
    {
        return $this->hasMany(GoodsReceiptItem::class, 'goods_receipt_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
}
