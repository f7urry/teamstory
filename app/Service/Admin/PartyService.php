<?php
namespace App\Service\Admin;

use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Admin\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Exceptions\RestException;
use App\Helper\StorageUtil;

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
            $p = new Party($request->except(["_token"]));
            if (isset($request->identityimage)) {
                $filename = StorageUtil::uploadFile("driver_id", $request->identityimage);
                $p->image_id = $filename;
            }
            if (isset($request->photoimage)) {
                $filename = StorageUtil::uploadFile("driver_photo", $request->photoimage);
                $p->image_party = $filename;
            }
            $p->save();
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
            $param = $request->except([
                "_token"
            ]);
            if (isset($request->identityimage)) {
                $filename = StorageUtil::uploadFile("driver_id", $request->identityimage);
                $p->image_id = $filename;
            }
            if (isset($request->photoimage)) {
                $filename = StorageUtil::uploadFile("driver_photo", $request->photoimage);
                $p->image_party = $filename;
            }
            $p->update($param);

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
