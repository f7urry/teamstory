<?php
namespace App\Http\Controllers\Sales;

use App\DTO\StockDTO;
use App\Helper\CodeGenerator;
use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Http\Service\Inventory\StockService;
use App\Models\Admin\Party;
use App\Models\Core\TableType;
use App\Models\Inventory\Uom;
use App\Models\Inventory\Warehouse;
use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserTransactionController extends Controller {

    public function index() {
        return view("pages.sales.user-transaction.index");
    }
     public function list($var = null) {
        $qry = SalesOrder::query();
        $qry->with("party");
        $qry->where("party_id", Party::where("user_id",Auth::user()->id)->first()->id);
        return DatatableHelper::generate($var, $qry->get(), "usertransaction", array("show"=>true))->make(true);
    }
    public function create(){
        return view("pages.sales.sales-order.create");
    }
    public function destroy(SalesOrder $salesorder) {
        $p = SalesOrder::find($salesorder->id);
        $p->delete();
        return redirect("/stockadjustment/")->with(["message"=>"Success: Sales Order has been deleted"]);
    }
    public function show(SalesOrder $usertransaction) {
        $map['so'] = $usertransaction;
        return view("pages.sales.user-transaction.edit", $map);
    }
    public function update(Request $request, Item $item) {
    }
     public function print(SalesOrder $salesorder) {
        $map['so'] = SalesOrder::with("party")->with("shipping_address")->find($salesorder->id);
        return view("pages.sales.sales-order.print", $map);
    }
    public function options(Request $request) {
        $qry = DB::table(SalesOrder::tablename()." as s");
        $qry->join(Party::tablename()." as c","s.party_id","c.id");
        if ($request->term == '')
            $qry->orderBy("s.code", "asc");
        else{
            $qry->where(function($q) use($request){
                $q->where("c.party_name","like", "%$request->term%");
                $q->orWhere("s.code","like", "%$request->term%");
            });
        }
        if($request->status!='')
            $qry->where("s.status",$request->status);
        $qry->limit(10);
        return SelectHelper::generate($qry, "s.id", "concat(s.code,' - ',c.party_name)",true);
    }

    public function get(SalesOrder $salesorder){
        $so=SalesOrder::find($salesorder->id);
        $so->party=$so->party;
        $so->party->address=$so->party->address;
        return response()->json($so);
    }
}