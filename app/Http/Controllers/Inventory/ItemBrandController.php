<?php
namespace App\Http\Controllers\Inventory;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\ItemBrand;
use Illuminate\Http\Request;

class ItemBrandController extends Controller {
    public function index() {
        $qry=ItemBrand::orderBy("name", "asc");
        $map['list_data']=$qry->paginate(15);
        return view("pages.inventory.item-brand.index", $map);
    }

    public function create() {
        return view("pages.inventory.item-brand.create");
    }

    public function store(Request $request) {
        $p=new ItemBrand($request->except(['_token']));
        $p->save();
        return redirect(url("/itembrand/".$p->id))->with("message","Success: Brand Created");
    }

    public function show(ItemBrand $itembrand) {
        $map['item']=ItemBrand::find($itembrand->id);
        return view("pages.inventory.item-brand.edit", $map);
    }

    public function edit(ItemBrand $category) {
    }

    public function update(Request $request, ItemBrand $itembrand) {
        $p=ItemBrand::find($itembrand->id);
        $p->update($request->except(["_token"]));
        return redirect("/itembrand/".$p->id)->with("message","Success: Brand Updated");
    }

    public function destroy(ItemBrand $itembrand) {
        $p=ItemBrand::find($itembrand->id);
        $p->delete();
        return redirect("/itembrand");
    }
    public function options(Request $request) {
        $party=ItemBrand::query();
        if ($request->term=='') {
            $party->orderBy("name", "asc");
        } else {
            $party->where("name", "like", "%$request->term%");
        }

        $party->limit(10);
        return SelectHelper::generate($party, "id", "name");
    }
}
