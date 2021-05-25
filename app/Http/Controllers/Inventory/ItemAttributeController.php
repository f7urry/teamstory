<?php
namespace App\Http\Controllers\Inventory;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemAttributeDetail;
use Illuminate\Http\Request;

class ItemAttributeController extends Controller {

   public function index() {
        $qry=ItemAttribute::orderBy("attribute_name", "asc");
        $map['list_data']=$qry->paginate(15);
        return view("pages.inventory.item-attribute.index", $map);
    }

    public function create(){
        return view("pages.inventory.item-attribute.create");
    }
    public function store(Request $request) {
        $p=new ItemAttribute($request->except(['_token']));
        $p->save();
        return redirect(url("/itemattribute/".$p->id));
    }
    public function show(ItemAttribute $itemattribute) {
        $map['itemattribute'] = ItemAttribute::find($itemattribute->id);
        return view("pages.inventory.item-attribute.edit", $map);
    }

    public function update(Request $request, ItemAttribute $itemattribute) {
        $param=$request->except(['_token']);
        $p = ItemAttribute::find($itemattribute->id);
        $p->update($param);

        if($request->attribute_details!=null){
            //removing
            foreach($p->details as $detail){
                $found=false;
                foreach($request->attribute_details as $i=>$val){
                    if($detail->id==$val){
                        $found=true;
                    }
                }
                if(!$found)
                    $detail->delete();
            }

            //new detail
            foreach($request->attribute_details as $id=>$val){
                if($val==0){
                    $detail=new ItemAttributeDetail();
                    $detail->item_attribute_id=$p->id;
                    $detail->attribute_code=$request->attribute_codes[$id];
                    $detail->attribute_value=$request->attribute_values[$id];
                    $detail->save();
                }else{
                    $detail=ItemAttributeDetail::find($val);
                    $detail->attribute_code=$request->attribute_codes[$id];
                    $detail->attribute_value=$request->attribute_values[$id];
                    $detail->update();
                }
            }
        }
        return redirect("/itemattribute/" . $itemattribute->id)->with(["message"=>"Success: Data telah diupdate"]);
    }

    public function options(Request $request) {
        $qry = ItemAttribute::query();
        $qry->where("product_type","GOODS");
        $qry->where("code", "like", "%$request->term%");
        $qry->limit(10);
        return SelectHelper::generate($qry, "id", "code");
    }

    public function get(ItemAttribute $item){
        $p=ItemAttribute::find($item->id);
        $p->brand=$p->brand;
        $p->attr=$p->attr;
        $p->model=$p->model;
        return response()->json($p);
    }
}