<?php
namespace App\Http\Controllers\Inventory;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Helper\NumberHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemAttribute;
use App\Models\Inventory\ItemBrand;
use App\Models\Inventory\ItemGroup;
use App\Models\Inventory\ItemVariant;
use App\Models\Inventory\Uom;
use Illuminate\Http\Request;

class ItemController extends Controller {

    public function index() {
        return view("pages.inventory.item.index");
    }
    
    public function list($var = null) {
        $qry = Item::query();
        $qry->where("item_type","GOODS");
        return DatatableHelper::generate($var, $qry->get(), "item", array("show"=>true,"delete"=>true))->make(true);
    }

    public function create(){
        $map['uoms']=Uom::all();
        $map['attributes']=ItemAttribute::all();
        $map['groups']=ItemGroup::all();
        $map['brands']=ItemBrand::all();
        return view("pages.inventory.item.create",$map);
    }
    public function store(Request $request) {
        $p=new Item($request->except(['_token']));

        if (isset($request->fileimage)) {
            $filename = StorageUtil::uploadFile("item", $request->fileimage);
            $p->item_image = $filename;
        }
        $p->save();

        if(isset($request->is_variant)){
            foreach($request->variants as $i=>$var){
                $variant=new ItemVariant();
                $variant->item_id=$p->id;
                $variant->item_attribute_id=$var;
                $variant->save();
            }
        }
        return redirect(url("/item/".$p->id));
    }
    public function show(Item $item) {
        $item=Item::find($item->id);
        $map['uoms']=Uom::all();
        $map['item']=$item;
        $map['attributes']=ItemAttribute::all();
        $map['groups']=ItemGroup::all();
        $map['brands']=ItemBrand::all();
        
        return view("pages.inventory.item.edit", $map);
    }

    public function update(Request $request, Item $item) {
        $param=$request->except(['_token']);
        $p = Item::find($item->id);
        if (isset($request->fileimage)) {
            $filename = StorageUtil::uploadFile("item", $request->fileimage);
            $param['item_image'] = $filename;
        }
        $p->update($param);

        $list_variants=is_null($request->variants)?[]:$request->variants;
        if(isset($p->is_variant)){
            foreach ($p->variants as $var) {
                $found=false;
                if (in_array($var->item_attribute_id, $list_variants))
                    $found=true;
                if(!$found)
                    $var->delete();
            }
            foreach($list_variants as $i=>$var){
                if (!in_array($var, $p->variants->pluck("item_attribute_id")->all())) {
                    $variant=new ItemVariant();
                    $variant->item_id=$p->id;
                    $variant->item_attribute_id=$var;
                    $variant->save();
                }
            }
        }
        return redirect("/item/" . $item->id)->with(["message"=>"Success: Data telah diupdate"]);
    }
    public function destroy(Item $item) {
        $p = Item::find($item->id);
        $p->delete();
        return redirect("/item/")->with(["message"=>"Success: Data telah dihapus"]);
    }

    public function options(Request $request) {
        $qry = Item::query();
        $qry->where("item_type","GOODS");
        $qry->where("code", "like", "%$request->term%");
        $qry->limit(10);
        return SelectHelper::generate($qry, "id", 'concat(code," - ",item_name)',true);
    }

    public function get(Item $item){
        $p=Item::find($item->id);
        $p->brand=$p->brand;
        $p->attr=$p->attr;
        $p->model=$p->model;
        return response()->json($p);
    }
}