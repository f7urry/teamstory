<?php
namespace App\Http\Controllers\Vms;

use App\Helper\CodeGenerator;
use App\Helper\DatatableHelper;
use Illuminate\Http\Request;
use App\Service\Admin\PartyService;
use App\Http\Controllers\Controller;
use App\Models\Admin\Party;
use App\Models\Admin\PartyRole;
use App\Models\Vms\Vehicle;
use App\Models\Vms\VehicleBooking;
use Illuminate\Support\Facades\Auth;

class VehicleBookingController extends Controller {

    public function index(Request $request) {
        return view("pages.vms.vehicle-booking.index");
    }
    public function list($var = null) {
        $qry = VehicleBooking::query();
        $qry->with("vehicle");
        $qry->with("driver");
        $qry->with("createdBy");
        return DatatableHelper::generate(
            $var, 
            $qry->get(), 
            "vehiclebookings", 
            array("delete" => true,"show" => true)
        )->make(true);
    }
    public function create(Request $request) {
        $map['vehicles']=Vehicle::all();
        $map['drivers']=Party::where("party_role",PartyRole::DRIVER)->get();
        return view("pages.vms.vehicle-booking.create",$map);
    }

    public function store(Request $request) {
        $booking=VehicleBooking::create($request->all());
        $booking->code=CodeGenerator::generate("VB");
        $booking->created_by=Auth::user()->id;
        $booking->save();
        return redirect(url("/vehiclebookings"));
    }

    public function show(VehicleBooking $vehiclebooking) {
        $map['booking']=VehicleBooking::find($vehiclebooking->id);
        $map['vehicles']=Vehicle::all();
        $map['drivers']=Party::where("party_role",PartyRole::DRIVER)->get();
        return view("pages.vms.vehicle-booking.edit",$map);
    }
    public function edit(VehicleBooking $vehiclebooking) {
    }

    public function update(Request $request, VehicleBooking $vehiclebooking) {
        $booking=VehicleBooking::find($vehiclebooking->id);
        $booking->status=$request->status;
        $booking->date_from=$request->date_from;
        $booking->date_to=$request->date_to;
        $booking->notes=$request->notes;
        $booking->request_by=$request->request_by;
        $booking->destination=$request->destination;

        if ($request->vehicle_id!=null) {
            $booking->vehicle_id=$request->vehicle_id;
        }
        $booking->update();
        return redirect(url("/vehiclebookings"));
    }

    public function destroy(VehicleBooking $vehiclebooking) {
        $vehiclebooking=VehicleBooking::find($vehiclebooking->id);
        $vehiclebooking->delete();
        return redirect(url("/vehiclebookings"));
    }
}
