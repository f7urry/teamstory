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

class ProfileAddressController extends Controller {
    public function index(){
        $qry = PartyAddress::query();
        $qry->where("party_id",Party::where("user_id",Auth::user()->id)->first()->id);
        $map['address']=$qry->get();
        return view("pages.admin.profile-address.index",$map);
    }

    public function create() {
        $map['party']=Party::where("user_id",Auth::user()->id)->first();
        return view("pages.admin.profile-address.create",$map);
    }

    public function store(Request $request) {
        $p=new PartyAddress($request->except(['_token']));
        $party=Party::find($p->party_id);
        if($request->pic==null || $request->pic=="")
            $p->pic_name=$party->party_name;
        $p->save();
        return redirect("/profileaddress")->with("message","Success: Address has been saved");
    }

    public function show(PartyAddress $profileaddress) {
        $map['address']=PartyAddress::find($profileaddress->id);
        return view("pages.admin.profile-address.edit", $map);
    }

    public function edit(PartyAddress $category) {
    }

    public function update(Request $request, PartyAddress $profileaddress) {
        $p=PartyAddress::find($profileaddress->id);
        $p->update($request->except(["_token"]));
        $party=Party::find($p->party_id);
        return redirect("/profileaddress")->with("message","Success: Address has been updated");
    }

     public function setdefault($id) {
        $p=PartyAddress::find($id);
        $party=Party::find($p->party_id);
        $party->address_id=$id;
        return redirect("/profileaddress")->with("message","Success: Default Address has been updated");
    }

    public function destroy(PartyAddress $profileaddress) {
        $p=PartyAddress::find($profileaddress->id);
        $p->delete();
        return redirect("/profileaddress")->with("message","Success: Address has been deleted");
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