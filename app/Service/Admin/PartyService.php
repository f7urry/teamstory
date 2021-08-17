<?php
namespace App\Service\Admin;

use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Admin\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\RestException;
use App\Helper\CodeGenerator;
use App\Helper\StorageUtil;
use App\Models\Admin\PartyAddress;

class PartyService {

    public function index($role){
        $qry = Party::where("party_role", "LIKE", "%" . $role . "%")->orderBy("id","desc");
        $map['list_data'] = $qry->paginate(10);
        return $map;
    }
    public function create() {
        return array();
    }

    public function store(Request $request) {
        DB::beginTransaction();
        try {
            $p = new Party();
            $p->code=CodeGenerator::generate("PY");
            $p->party_role=$request->party_role;
            $p->party_name=$request->party_name;
            $p->company_name=$request->company_name;
            $p->dob=$request->dob;
            $p->pob=$request->pob;
            $p->identity_number=$request->identity_number;

            if (isset($request->identityimage)) {
                $filename = StorageUtil::uploadFile("party_id", $request->identityimage);
                $p->image_id = $filename;
            }
            if (isset($request->photoimage)) {
                $filename = StorageUtil::uploadFile("party_image", $request->photoimage);
                $p->image_party = $filename;
            }
            $p->save();

            $address=new PartyAddress();
            $address->party_id=$p->id;
            if($request->pic_name!=null || $request->pic_name!="")
                $address->pic_name=$request->pic_name;
            else
                $address->pic_name=$request->party_name;
                
            $address->phone=$request->phone;
            $address->email=$request->email;
            $address->city_id=$request->city_id;
            $address->province_id=$request->province_id;
            $address->zip_code=$request->zip_code;
            $address->address=$request->address;
            $address->address_type=PartyAddress::ADDRESS_HOME;
            $address->save();

            $p->address_id=$address->id;
            $p->update();

            DB::commit();
            return $p;
        } catch (Exception $e) {
            DB::rollBack();
            return RestException::error($e->getTraceAsString());
        }
    }

    public function update(Request $request, Party $customer) {
        $p = Party::find($customer->id);
        DB::transaction(function () use ($request, $customer, $p) {
            if (isset($request->identityimage)) {
                $filename = StorageUtil::uploadFile("party_id", $request->identityimage);
                $p->image_id = $filename;
            }
            if (isset($request->photoimage)) {
                $filename = StorageUtil::uploadFile("party_image", $request->photoimage);
                $p->image_party = $filename;
            }
            $p->party_name=$request->party_name;
            $p->company_name=$request->company_name;
            $p->dob=$request->dob;
            $p->pob=$request->pob;
            $p->identity_number=$request->identity_number;
            $p->update();

            $address=$p->address;
            $address->party_id=$p->id;
            $address->pic_name=$request->party_name;
            $address->phone=$request->phone;
            $address->email=$request->email;
            $address->city=$request->city;
            $address->region=$request->region;
            $address->country=$request->country;
            $address->zip_code=$request->zip_code;
            $address->address=$request->address;
            $address->address_type=PartyAddress::ADDRESS_HOME;
            $address->update();

            /*
             * if ($customer->user_id!=null) {
             * $u = User::find($customer->user_id);
             * $u->email = $param['email'];
             * $u->update();
             * }
             */
        });
        return $p;
    }

    public function delete(Party $customer) {
        $p = Party::find($customer->id);
        $p->delete();
    }
}
