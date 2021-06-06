<?php
namespace App\Http\Controllers\Admin;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use Illuminate\Http\Request;
use App\Service\Admin\PartyService;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;

class CustomerController extends Controller {

    public function __construct() {
        $this->service = new PartyService();
    }

    public function index(Request $request) {
        return view("pages.admin.customer.index");
    }
    public function list($var = null) {
        $qry = Party::query();
        $qry->where("party_role","CUSTOMER");
        return DatatableHelper::generate($var, $qry->get(), "customer", array(
            "delete" => true,
            "show" => true,
        ))->make(true);
    }

    public function create(Request $request) {
        return view("pages.admin.customer.create", $this->service->create());
    }

    public function store(Request $request) {
        $customer=$this->service->store($request);
        return redirect(url("/customer/".$customer->id))->with(["message"=>"Success: Customer has been saved"]);
    }

    public function show(Party $customer) {
        $map['party'] = Party::find($customer->id);
        return view("pages.admin.customer.edit", $map);
    }
    public function edit(Party $customer) {
    }

    public function update(Request $request, Party $customer) {
        $customer=$this->service->update($request, $customer);
        return redirect(url("/customer/".$customer->id))->with(["message"=>"Success: Customer has been updated"]);
    }

    public function destroy(Party $customer) {
        $this->service->delete($customer);
        return redirect(url("/customer"));
    }

    public function options(Request $request) {
        $qry = Party::query();
        $qry->where("party_role","CUSTOMER");
        if ($request->term != '')
            $qry->where("party_name", "like", "%$request->term%");
        $qry->limit(10);
        return SelectHelper::generate($qry, "id", "party_name");
    }
}
