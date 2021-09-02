<?php
namespace App\Http\Controllers\Admin;

use App\Helper\DatatableHelper;
use App\Helper\SelectHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;
use App\Models\Admin\PartyAddress;
use App\Models\Purchase\PurchaseOrder;
use App\Models\Sales\SalesOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartyAddressController extends Controller {
    public function list($var = null,Request $request) {
        $qry = PartyAddress::query();
        $qry->with("city", "province");
        $qry->where("party_id",$request->id);
        return DatatableHelper::generate($var, $qry->get(), "address", array(
            "delete" => true,
            "show" => true,
        ))->make(true);
    }

    public function create($id) {
        $map['party']=Party::find($id);
        return view("pages.admin.party-address.create",$map);
    }

    public function store(Request $request) {
        $p=new PartyAddress($request->except(['_token']));
        $p->save();
        $p->party=Party::find($p->party_id);
        return redirect(strtolower($p->party->party_role)."/".$p->party_id)->with("message","Success: Address has been saved");
    }

    public function show(PartyAddress $address) {
        $map['address']=PartyAddress::find($address->id);
        return view("pages.admin.party-address.edit", $map);
    }

    public function edit(PartyAddress $category) {
    }

    public function update(Request $request, PartyAddress $address) {
        $p=PartyAddress::find($address->id);
        $p->update($request->except(["_token"]));
        $party=Party::find($p->party_id);
        return redirect(strtolower($party->party_role)."/".$party->id)->with("message","Success: Address has been updated");
    }

     public function setdefault($id) {
        $p=PartyAddress::find($id);
        $party=Party::find($p->party_id);
        $party->address_id=$id;
        return redirect(strtolower($party->party_role)."/".$party->id)->with("message","Success: Default Address has been updated");
    }

    public function destroy(PartyAddress $address) {
        $p=PartyAddress::find($address->id);
        $party=Party::find($p->party_id);
        $p->delete();
        return redirect(strtolower($party->party_role)."/".$party->id)->with("message","Success: Address has been deleted");
    }
    public function options(Request $request) {
        $party=PartyAddress::query();
        if($request->mine!=null)
            $party->where("party_id",Party::where("user_id",Auth::user()->id)->first()->id);
        else
            $party->where("party_id",$request->party);
        $party->limit(15);
        return SelectHelper::generate($party,"id",'concat(pic_name,",",address)',true);
    }
    public function get(PartyAddress $address){
        $address=PartyAddress::with("city")->with("province")->find($address->id);
        return response()->json($address);
    }
}