<?php
namespace App\Http\Controllers\Admin;

use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Core\Geographic;
use Illuminate\Http\Request;

class CityController extends Controller {
    public function index() {
        $qry=Geographic::orderBy("location", "asc")->where("level",2);
        $map['list_data']=$qry->get();
        return view("pages.admin.city.index", $map);
    }

    public function create() {
        return view("pages.admin.city.create");
    }

    public function store(Request $request) {
        $p=Geographic::create($request->except(["_token"]));
        $p->save();
        return redirect(url("/city/".$p->id))->with("message","Success: City Created");
    }

    public function show(Geographic $city) {
        $map['city']=Geographic::find($city->id);
        return view("pages.admin.city.edit", $map);
    }

    public function edit(Geographic $category) {
    }

    public function update(Request $request, Geographic $city) {
        $p=Geographic::find($city->id);
        $p->update($request->except(["_token"]));
        return redirect("/city/".$p->id)->with("message","Success: City Updated");
    }

    public function destroy(Geographic $city) {
        $p=Geographic::find($city->id);
        $p->delete();
        return redirect("/city");
    }
    public function options(Request $request) {
        $geo=Geographic::query();
        $geo->where("level", 2);
        if($request->province!=null)
            $geo->where("parent_id", $request->province);
        if ($request->term=='') {
            $geo->orderBy("location", "asc");
        } else {
            $geo->where("location", "like", "%$request->term%");
        }

        $geo->limit(10);
        return SelectHelper::generate($geo, "id", "location");
    }
    public function get(Geographic $city){
        $p=Geographic::find($city->id);
        return response()->json($p);
    }
}
