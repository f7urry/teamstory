<?php
namespace App\Http\Controllers\Inventory\Popup;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemAttributeDetail;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\ItemVariantDetail;
use Illuminate\Http\Request;

class ItemVariantPopupController extends Controller {

   public function index(Request $request,Item $item) {
        $map['item']=$item;
        return view("pages.inventory.item-attribute.create-popup", $map);
    }

    public function store(Request $request,Item $item) {
        $item = Item::find($item->id);
        $inputs=$request->attribute_details;
        $cats=array();
        foreach($inputs as $in){
            $cat=explode("_",$in)[0];
            $val=explode("_",$in)[1];
            if(array_key_exists($cat, $cats))
                array_push($cats[$cat], $val);
            else
                $cats[$cat] = [$val];
        }

        $keys = array_keys($cats);
        $print ="";
        $this->__generate_name($print, $cats, $keys, 0,$item);
        $map["message"]="Success Membuat Varian";
        return response()->json($map);
    }
    private function __generate_name($print, $arrays, $keys, $c,$item) {
        if($c<count($keys)){
            foreach($arrays[$keys[$c]] as $value) {
                $newPrint = $print .(($c!=0)?"-":""). $value;
                $newCounter = $c + 1;
                
                if($newCounter <= count($keys)) {
                    $this->__generate_name($newPrint, $arrays, $keys, $newCounter,$item);
                }
            }
        }
        else{
            $name="";
            $code="";
            $copy = $item->replicate();
            $copy->save();

            $var=explode("-",$print);
            foreach($var as $i=>$v){
                $p=new ItemVariantDetail();
                $p->item_id=$copy->id;
                $p->item_attribute_detail_id=$v;
                $p->save();

                $name.=($i!=0?"-":"").ItemAttributeDetail::find($v)->attribute_value;
                $code.=($i!=0?"-":"").ItemAttributeDetail::find($v)->attribute_code;
            }
            $copy->code=$copy->code."-".$code;
            $copy->item_name=$copy->item_name."-".$name;
            $copy->item_parent_id=$item->id;
            $copy->is_variant=2;
            $copy->update();
        }
                
    }
}