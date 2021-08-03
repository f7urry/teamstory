<?php
namespace App\Http\Controllers\Admin;

use App\Helper\DatatableHelper;
use App\Helper\NumberHelper;
use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\CustomPrice;
use App\Models\Admin\Party;
use App\Models\Inventory\Item;
use App\Models\Inventory\ItemBrand;
use Illuminate\Http\Request;

class CustomPriceController extends Controller {

    public function list($var = null,Request $request) {
        $qry = CustomPrice::query();
        $qry->with("item");
        $qry->where("party_id",$request->id);
        return DatatableHelper::generate($var, $qry->get(), "customprice", array(
            "delete" => true,
        ))->make(true);
    }

    public function create($id) {
        $map['party']=Party::find($id);
        return view("pages.admin.custom-price.create",$map);
    }

    public function store(Request $request) {
        $p=new CustomPrice($request->except(['_token']));
        $p->discount=NumberHelper::toValue($p->discount);
        $p->price=NumberHelper::toValue($p->price);
        $p->save();
        return redirect(strtolower($p->party->party_role)."/".$p->party_id)->with("message","Success: Custom Price has been saved");
    }

    public function show(CustomPrice $customprice) {
        $map['price']=CustomPrice::find($customprice->id);
        return view("pages.admin.custom-price.edit", $map);
    }

    public function edit(ItemBrand $category) {
    }

    public function update(Request $request, CustomPrice $customprice) {
        $p=CustomPrice::find($customprice->id);
        $p->update($request->except(["_token"]));
        return redirect(strtolower($p->party->party_role)."/".$p->party_id)->with("message","Success: Custom Price has been updated");
    }

    public function destroy(CustomPrice $customprice) {
        $p=CustomPrice::find($customprice->id);
        $p->delete();
        return redirect(strtolower($p->party->party_role)."/".$p->party_id)->with("message","Success: Custom Price has been deleted");
    }
     public function get(Party $party,Item $item){
        $price=CustomPrice::query();
        $price->with("item");
        $price->with("party");
        $price->where("party_id",$party->id);
        $price->where("item_id",$item->id);
        return response()->json($price->first());
    }
    public function options(Request $request) {
        $party=CustomPrice::query();
        if ($request->term=='') {
            $party->orderBy("name", "asc");
        } else {
            $party->where("name", "like", "%$request->term%");
        }

        $party->limit(10);
        return SelectHelper::generate($party, "id", "name");
    }
}
