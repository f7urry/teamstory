<?php
namespace App\Http\Controllers\Sales;

use App\Helper\DatatableHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use Illuminate\Http\Request;

class ConsumerProductController extends Controller {
    public function index() {
        $qry = Item::query();
        $qry=$qry->with("uom");
        $qry=$qry->with("group");
        $qry=$qry->where("item_type","GOODS");
        $qry=$qry->paginate(10);
        $map['data']=$qry;
        return view("pages.sales.consumer-product.index",$map);
    }

    public function list($var = null,Request $request) {
        $qry = Item::query();
        $qry=$qry->with("uom");
        $qry=$qry->with("group");
        if($request->group!=null)
            $qry=$qry->where("item_group_id", $request->group);
        $qry=$qry->where("item_type","GOODS");
        $qry=$qry->paginate(10);
        return response()->json($qry);
    }
}
