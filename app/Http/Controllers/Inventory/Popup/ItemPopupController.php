<?php

namespace App\Http\Controllers\Inventory\Popup;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Uom;
use Illuminate\Http\Request;

class ItemPopupController extends Controller
{
    public function create(){
        $map['uoms']=Uom::all();
        $map['attributes']=ItemAttribute::all();
        $map['groups']=ItemGroup::all();
        return view("pages.inventory.item.popup.create",$map);
    }

    public function store(Request $request) {
        $item=new Item($request->except(['_token']));
        $item->save();

        if(isset($request->is_variant)){
            foreach($request->variants as $i=>$var){
                $variant=new ItemVariant();
                $variant->item_id=$item->id;
                $variant->item_attribute_id=$var;
                $variant->save();
            }
        }
        $map["message"]="Success Membuat Item";
        $map["new"]["id"]=$item->id;
        $map["new"]["text"]=$item->item_name;
        return response()->json($map);
    }
}
