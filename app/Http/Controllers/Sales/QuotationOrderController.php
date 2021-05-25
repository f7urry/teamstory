<?php
namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Uom;
use App\Models\Sales\QuotationOrder;
use App\Models\Sales\QuotationOrderDetail;
use App\Models\Sales\QuotationOrderHistory;
use App\Service\Core\CodeSequenceService;
use Illuminate\Support\Facades\Auth;

class QuotationOrderController extends Controller {

    public function __construct() {
        $this->codeseq = new CodeSequenceService();
    }

    public function index() {
        $qry = QuotationOrder::query();
        $map['list_data'] = $qry->orderBy("id","desc")->paginate(5);
        return view("pages.quotation_order.index", $map);
    }

    public function create() {
        $map['uoms']=Uom::all();
        return view("pages.quotation_order.add", $map);
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $p=new QuotationOrder($request->except([
                '_token',
                "product_id",
                "qty",
                "price",
            ]));
            $p->code=$this->codeseq->generate("QTN");
            $p->save();

            foreach($request->product_id as $i=>$prod){
                $detail=new QuotationOrderDetail();
                $detail->quotation_order_id=$p->id;
                $detail->product_id=$request->product_id[$i];
                $detail->qty=$request->qty[$i];
                $detail->price=$request->price[$i];
                $detail->save();
            }

            $history=new QuotationOrderHistory();
            $history->quotation_order_id=$p->id;
            $history->status="RFQ SUBMIT";
            $history->save();
            DB::commit();
            return redirect(url("/quotationorder"));
        } catch (Exception $e) {
            DB::rollBack();
            abort(500, $e->getMessage());
        }
    }

    public function show(QuotationOrder $quotationorder) {
        $map['ord']=QuotationOrder::find($quotationorder->id);
        return view("pages.quotation_order.edit",$map);
    }

    public function edit(Party $customer) {}

    public function update(Request $request, QuotationOrder $quotationorder) {
        $p=QuotationOrder::find($quotationorder->id);
        $p->update($request->except(["_token"]));
        return redirect(url("/quotationorder/".$quotationorder->id));
    }

    public function destroy(QuotationOrder $quotationorder) {
        $quotationorder = QuotationOrder::find($quotationorder->id);
        $quotationorder->delete();
        return redirect(url("/quotationorder"));
    }

    public function show_print(Request $request){
        return view("pages.quotation_order.print");
    }
    public function show_print_invoice(Request $request){
        return view("pages.quotation_order.print-invoice");
    }
}
