<?php
namespace App\Http\Controllers\Vms;

use App\Helper\CodeGenerator;
use App\Helper\SelectHelper;
use App\Helper\StorageUtil;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;
use App\Models\Vms\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller {
    public function index() {
        $qry=Vehicle::orderBy("code", "asc");
        $map['list_data']=$qry->get();
        return view("pages.vms.vehicle.index", $map);
    }

    public function create() {
        $map['drivers']=Party::where("party_role","DRIVER")->get();
        return view("pages.vms.vehicle.create",$map);
    }

    public function store(Request $request) {
        $p=new Vehicle($request->except(['_token']));
        $p->unique_code=CodeGenerator::generate("VH");
        if (isset($request->fileimage)) {
            $filename = StorageUtil::uploadFile("vehicle", $request->fileimage);
            $p->vehicle_image = $filename;
        }
        $p->save();
        return redirect(url("/vehicles/".$p->id));
    }

    public function show(Vehicle $vehicle) {
        $map['vehicle']=Vehicle::find($vehicle->id);
        $map['drivers']=Party::where("party_role","DRIVER")->get();
        return view("pages.vms.vehicle.edit", $map);
    }
    public function print(Vehicle $vehicle){
        $map["vehicle"]=Vehicle::find($vehicle->id);
        return view("pages.vms.vehicle.print",$map);
    }

    public function edit(Vehicle $vehicle) {
    }

    public function update(Request $request, Vehicle $vehicle) {
        $p=Vehicle::find($vehicle->id);
        $param=$request->except(["_token","fileimage"]);
        if (isset($request->fileimage)) {
            $filename = StorageUtil::uploadFile("vehicle", $request->fileimage);
            $param['vehicle_image'] = $filename;
        }
        $p->update($param);
        return redirect("/vehicles/".$p->id)->with("message","Success: Vehicle updated");
    }

    public function destroy(Vehicle $vehicle) {
        $p=Vehicle::find($vehicle->id);
        $p->delete();
        return redirect("/vehicles");
    }
    public function options(Request $request) {
        $party=Vehicle::query();
        if ($request->term=='') {
            $party->orderBy("name", "asc");
        } else {
            $party->where("name", "like", "%$request->term%");
        }

        $party->limit(10);
        return SelectHelper::generate($party, "id", "name");
    }
}
