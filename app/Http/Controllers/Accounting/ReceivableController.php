<?php
namespace App\Http\Controllers\Accounting;

use App\Helper\DatatableHelper;
use App\Helper\CodeGenerator;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Accounting\Receivable;
use App\Models\Sales\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceivableController extends Controller {

    public function index() {
        return view("pages.accounting.receivable.index");
    }

    public function list($var = null) {
        $qry = Receivable::query();
        $qry->with("salesorder");
        return DatatableHelper::generate($var, $qry->get(), "receivable", array(
            "delete" => true,
            "show" => true,
        ))->make(true);
    }

    public function create(Request $request) {
        $map["ref"]="";
        if($request->ref!=null){
            $so=SalesOrder::find($request->ref);
            $map["ref"]=$so;
        }
        return view("pages.accounting.receivable.create",$map);
    }

    public function store(Request $request) {
        DB::beginTransaction();
        $p = new Receivable($request->except([
            '_token'
        ]));
        $so=SalesOrder::find($p->sales_order_id);
        $p->code=CodeGenerator::generate("RV");
        $p->type=Receivable::TYPE_MANUAL;
        $p->amount=NumberHelper::toValue($p->amount);
        $p->current_unpaid=$so->unpaid_amount-$p->amount;
        $p->current_payment=$so->paidAmount+$p->amount;
        $p->current_status=SalesOrder::STATUS_UNPAID;
        if($p->current_unpaid<=0){
            $p->current_unpaid=0;
            $p->current_status=SalesOrder::STATUS_PAID;
            $p->sales_status=SalesOrder::STATUS_COMPLETE;
        }
        $p->save();
        if($p->id!=null){
            $so->unpaid_amount=$p->current_unpaid;
            $so->status=$p->current_status;
            $so->update();
            DB::commit();
            return redirect("/receivable");
        }else{
            DB::rollBack();
            return response()->back();
        }
    }

    public function update(Request $request, Receivable $receivable) {
        $p = Receivable::find($receivable->id);
        $p->update($request->except([
            '_token'
        ]));
        return redirect("/receivable");
    }

    public function show(Receivable $receivable) {
        $map['rec'] = Receivable::find($receivable->id);
        return view("pages.accounting.receivable.detail", $map);
    }

    public function print(Receivable $receivable) {
        $map['rec'] = Receivable::find($receivable->id);
        return view("pages.accounting.receivable.print", $map);
    }

    public function destroy(Receivable $receivable) {
        $m = Receivable::find($receivable->id);
        $m->delete();

        $so=SalesOrder::find($m->sales_order_id);
        $so->unpaid_amount+=$m->amount;
        $so->status=SalesOrder::STATUS_UNPAID;
        $so->update();
        return redirect("/receivable");
    }

    public function monthlyAmount(Request $request){
        $type=$request->type;
        
        $qry=Receivable::query();
        $qry->whereMonth("created_at",date("m"));
        $qry->with("salesorder");
        $qry->whereHas("salesorder",function($so) use ($type){
            $so->where("type",$type);
        });
        return $qry->select(DB::raw("sum(amount) as 'amount'"))->first();
    }
}