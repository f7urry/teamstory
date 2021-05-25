<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class GoodsIssueItem extends Model
{
    protected $guarded=['id'];
    protected $table = 't_goods_issue_item';

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function goodsIssue()
    {
        return $this->belongsTo(GoodsIssue::class, 'goods_issue_id', 'id');
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class, 'uom_id', 'id');
    }
}
