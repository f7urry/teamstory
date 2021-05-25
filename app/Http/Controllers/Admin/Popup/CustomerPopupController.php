<?php
namespace App\Http\Controllers\Admin\Popup;

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;
use App\Models\Admin\PartyRole;
use Illuminate\Http\Request;
use App\Exceptions\RestException;

class CustomerPopupController extends CustomerController {

    public function index(Request $request) {
        $qry = Party::where("party_role", "LIKE", "%" . PartyRole::CUSTOMER . "%");
        $map['list_data'] = $qry->paginate(6);
        return view("pages.customer.popup.index", $map);
    }

    public function create(Request $request) {
        return view("pages.customer.popup.create", $this->service->create());
    }

    public function store(Request $request) {
        $p = $this->service->store($request);
        if($p instanceof Party)
            return response()->json([
                "message" => "OK",
                "data" => array(
                    "id"=>$p->id,
                    "text"=>$p->party_name
                )

            ], 200);
        else
            return $p;
    }
}