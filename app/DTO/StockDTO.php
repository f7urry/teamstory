<?php
namespace App\DTO;
/**
* This class DTO for adjusting stock
* * warehouse_id; 
* * barcode;
* * item_id;
* * quantity;
* * grid_code;
* * date;
* * reference_id;
* * reference_code;
* * reference_type;
*/
class StockDTO{
    public $warehouse_id;
    public $barcode;
    public $item_id;
    public $qty;
    public $grid_code;
    public $date;
    public $reference_id;
    public $reference_code;
    public $reference_type;
}