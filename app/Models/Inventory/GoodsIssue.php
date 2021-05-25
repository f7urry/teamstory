<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class GoodsIssue extends Model
{
    protected $guarded=['id'];
    protected $table = 't_goods_issue';

    public function goodsIssueItems()
    {
        return $this->hasMany(GoodsIssueItem::class, 'goods_issue_id', 'id');
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id', 'id');
    }
}
