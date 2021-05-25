<?php
namespace App\Http\Controllers\Inventory;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Inventory\ItemGroup;
use Illuminate\Http\Request;

class ItemGroupController extends Controller {
    public function index() {
        $qry=ItemGroup::orderBy("group_name", "asc");
        $map['list_data']=$qry->paginate(15);
        return view("pages.inventory.item-group.index", $map);
    }

    public function create() {
        return view("pages.inventory.item-group.create");
    }

    public function store(Request $request) {
        $p=new ItemGroup($request->except(['_token']));
        $p->save();
        return redirect(url("/itemgroup/".$p->id))->with("message","Success: Group Created");
    }

    public function show(ItemGroup $itemgroup) {
        $map['item']=ItemGroup::find($itemgroup->id);
        return view("pages.inventory.item-group.edit", $map);
    }

    public function edit(ItemGroup $category) {
    }

    public function update(Request $request, ItemGroup $itemgroup) {
        $p=ItemGroup::find($itemgroup->id);
        $p->update($request->except(["_token"]));
        return redirect("/itemgroup/".$p->id)->with("message","Success: Group Updated");
    }

    public function destroy(ItemGroup $itemgroup) {
        $p=ItemGroup::find($itemgroup->id);
        $p->delete();
        return redirect("/itemgroup");
    }
    public function options(Request $request) {
        $party=ItemGroup::query();
        if ($request->term=='') {
            $party->orderBy("name", "asc");
        } else {
            $party->where("name", "like", "%$request->term%");
        }

        $party->limit(10);
        return SelectHelper::generate($party, "id", "name");
    }
}
