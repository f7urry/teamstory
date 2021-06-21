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
use App\Models\Sales\SalesCart;
use App\Models\Sales\SalesOrder;
use App\Models\Sales\SalesOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {

    public function index() {
        $cart=SalesCart::query()->where("created_by",Auth::user()->id)->get();
        $map['party']=Party::where('user_id', Auth::user()->id)->first();
        $map['data']=$cart;
        return view("pages.sales.cart.index",$map);
    }
    public function store(Request $request) {
        $cart=SalesCart::where("item_id",$request->item_id)
                ->where("created_by",Auth::user()->id)->first();
        if($cart==null){
            $cart=new SalesCart();
            $cart->item_id=$request->item_id;
            $cart->price=$request->price;
            $cart->discount=0;
            $cart->qty=1;
            $cart->created_by=Auth::user()->id;
            $cart->save();
        }else{
            $cart->qty+=1;
            $cart->update();
        }
        return response()->json(["data"=>$cart,"message"=>"Success: Added To Cart"]);
    }

    public function destroy(SalesCart $cart) {
        $p = SalesCart::find($cart->id);
        $p->delete();
        return redirect("/cart")->with(["message"=>"Success: Sales Order has been deleted"]);
    }
    public function checkout(Request $request) {
        DB::beginTransaction();
        $so=new SalesOrder();
        $so->code=CodeGenerator::generate("SSO");
        $so->invoice_code=CodeGenerator::generate("INV");
        $so->date=date("Y-m-d");
        $so->due_date=date("Y-m-d");
        $so->amount=$request->gtotal;
        $so->tax=$so->amount*0.1;
        $so->unpaid_amount=$request->gtotal;
        $so->reference=$request->reference;
        $so->note=$request->note;
        $so->party_id=Party::where("user_id", Auth::user()->id)->first()->id;
        $so->status=SalesOrder::STATUS_UNPAID;
        $so->sales_status=SalesOrder::STATUS_WAITING;
        $so->currency="IDR";
        $so->shipping_address_id=$request->shipping_address;

        if ($so->save()) {
            foreach ($request->cart_id as $i=>$cart) {
                $cart=SalesCart::find($cart);
                $item=new SalesOrderItem();
                $item->item_id=$cart->item_id;
                $item->qty=$cart->qty;
                $item->price=$cart->price;
                $item->discount=$cart->discount;
                $item->total=$cart->amount;
                $item->sales_order_id=$so->id;
                $item->save();

                $cart->delete();
            }
            DB::commit();
        }else{
            DB::rollback();
        }
        return redirect(url("/usertransaction"))->with(["message"=>"Success: Your order has been received"]);
    }
}