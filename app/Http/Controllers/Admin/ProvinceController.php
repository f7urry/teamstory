<?php
namespace App\Http\Controllers\Admin;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Core\Geographic;
use Illuminate\Http\Request;

class ProvinceController extends Controller {
    public function index() {
        $qry=Geographic::orderBy("location", "asc")->where("level",1);
        $map['list_data']=$qry->get();
        return view("pages.admin.province.index", $map);
    }

    public function create() {
        return view("pages.admin.province.create");
    }

    public function store(Request $request) {
        $p=Geographic::create($request->except(["_token"]));
        $p->save();
        return redirect(url("/province/".$p->id))->with("message","Success: Province Created");
    }

    public function show(Geographic $province) {
        $map['province']=Geographic::find($province->id);
        return view("pages.admin.province.edit", $map);
    }

    public function edit(Geographic $province) {
    }

    public function update(Request $request, Geographic $province) {
        $p=Geographic::find($province->id);
        $p->update($request->except(["_token"]));
        return redirect("/province/".$p->id)->with("message","Success: Province Updated");
    }

    public function destroy(Geographic $province) {
        $p=Geographic::find($province->id);
        $p->delete();
        return redirect("/province");
    }
    public function options(Request $request) {
        $geo=Geographic::query();
        $geo->where("level", 1);
        if ($request->term=='') {
            $geo->orderBy("location", "asc");
        } else {
            $geo->where("location", "like", "%$request->term%");
        }

        $geo->limit(10);
        return SelectHelper::generate($geo, "id", "location");
    }
}
