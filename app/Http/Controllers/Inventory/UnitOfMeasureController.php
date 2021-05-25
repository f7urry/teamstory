<?php
namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventory\Uom;

class UnitOfMeasureController extends Controller {
    public function index() {
        $qry=Uom::orderBy("id", "desc");
        $map['list_data']=$qry->paginate(15);
        return view("pages.uom.index", $map);
    }

    public function create() {
        return view("pages.uom.add");
    }

    public function store(Request $request) {
        $p=new Uom($request->except(['_token']));
        $p->save();
        return redirect(url("/uom"));
    }

    public function show(Uom $uom) {
        $map['uom']=Uom::find($uom->id);
        return view("pages.uom.edit", $map);
    }

    public function edit(City $category) {
    }

    public function update(Request $request, Uom $uom) {
        $p=Uom::find($uom->id);
        $p->update($request->except(["_token"]));
        return redirect(url("/uom"));
    }

    public function destroy(Uom $uom) {
        $p=Uom::find($uom->id);
        $p->delete();
        return redirect(url("/uom"));
    }

}
