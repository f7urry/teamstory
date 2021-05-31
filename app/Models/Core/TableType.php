<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class TableType extends Model {
    public const GOODS_ISSUE="GOODS ISSUE";
    public const GOODS_RECEIPT="GOODS RECEIPT";
    public const STOCK_ADJUSTMENT="STOCK_ADJUSTMENT";
    public const SALES_ORDER="SALES_ORDER";
}
