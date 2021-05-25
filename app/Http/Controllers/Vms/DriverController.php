<?php
namespace App\Http\Controllers\Vms;

use App\Helper\DatatableHelper;
use Illuminate\Http\Request;
use App\Service\Admin\PartyService;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;

class DriverController extends Controller {

    public function __construct() {
        $this->service = new PartyService();
    }

    public function index(Request $request) {
        return view("pages.vms.drivers.index");
    }
     public function list($var = null) {
        $qry = Party::query();
        $qry->where("party_role","DRIVER");
        return DatatableHelper::generate($var, $qry->get(), "drivers", array(
            "delete" => true,
            "show" => true,
        ))->make(true);
    }

    public function create(Request $request) {
        return view("pages.vms.drivers.create", $this->service->create());
    }

    public function store(Request $request) {
        $p=$this->service->store($request);
        return redirect(url("/drivers/".$p->id));
    }

    public function show(Party $driver) {
        $map['party'] = Party::find($driver->id);
        return view("pages.vms.drivers.edit", $map);
    }
    public function edit(Party $driver) {
    }

    public function update(Request $request, Party $driver) {
        $p=$this->service->update($request, $driver);
        return redirect(url("/drivers/".$p->id));
    }

    public function destroy(Party $driver) {
        $this->service->delete($driver);
        return redirect(url("/drivers"));
    }
}
