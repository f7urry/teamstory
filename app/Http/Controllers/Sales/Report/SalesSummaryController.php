<?php
namespace App\Http\Controllers\Sales\Report;

use App\Helper\DatatableHelper;
use App\Helper\DateHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Report\LedgerSummary;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\SalesOrder;
use Illuminate\Http\Request;

class SalesSummaryController extends Controller {

    public function index() {
        $map["warehouses"]=Warehouse::all();
        return view("report.sales.sales-summary.index",$map);
    }
    
    public function store(Request $request) {
        $qry=SalesOrder::query();
        if($request->customer!=null)
            $qry->where("party_id","=", $request->customer);
        if($request->status!=null)
            $qry->where("status", $request->status);
       /*  $qry->whereMonth("date", "=", $request->month);
        $qry->whereYear("date", "=", $request->year); */
        if($request->from!=null)
            $qry->where("date", ">=", DateHelper::toValue($request->from));
        if($request->to!=null)
            $qry->where("date", "<=", DateHelper::toValue($request->to));
        $map["sales"]=$qry->get();
        return view("report.sales.sales-summary.print", $map);
    }
}