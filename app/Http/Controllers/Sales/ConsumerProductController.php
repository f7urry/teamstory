<?php
namespace App\Http\Controllers\Sales;

use App\Helper\DatatableHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use Illuminate\Http\Request;

class ConsumerProductController extends Controller {
    public function index() {
        return view("pages.sales.consumer-product.index");
    }

    public function list(Request $request) {
        $qry = Item::query();
        $qry=$qry->with("uom");
        $qry=$qry->with("group");
        if($request->group!=null)
            $qry=$qry->where("item_group_id", $request->group);
        if($request->filter!=null)
            $qry=$qry->where("item_name", "LIKE", "%".$request->filter."%");
        $qry=$qry->where("item_type","GOODS");
        $qry=$qry->paginate(5);
        return response()->json($qry);
    }
}
