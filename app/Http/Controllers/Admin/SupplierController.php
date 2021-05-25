<?php
namespace App\Http\Controllers\Admin;

use App\Helper\DatatableHelper;
use Illuminate\Http\Request;
use App\Service\Admin\PartyService;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;

class SupplierController extends Controller {

    public function __construct() {
        $this->service = new PartyService();
    }

    public function index(Request $request) {
        return view("pages.supplier.index");
    }
     public function list($var = null) {
        $qry = Party::query();
        $qry->where("party_role","SUPPLIER");
        return DatatableHelper::generate($var, $qry->get(), "supplier", array(
            "delete" => true,
            "show" => true,
        ))->make(true);
    }

    public function create(Request $request) {
        return view("pages.supplier.add", $this->service->create());
    }

    public function store(Request $request) {
        $this->service->store($request);
        return redirect(url("/supplier"));
    }

    public function show(Party $customer) {
        $map['party'] = Party::find($customer->id);
        return view("pages.supplier.edit", $map);
    }
    public function edit(Party $customer) {
    }

    public function update(Request $request, Party $customer) {
        $this->service->update($request, $customer);
        return redirect(url("/supplier"));
    }

    public function destroy(Party $customer) {
        $this->service->delete($customer);
        return redirect(url("/supplier"));
    }
}
