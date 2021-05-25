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

class VehicleBookingRequestController extends Controller {

    public function index(Request $request) {
        return view("pages.vms.vehicle-booking.request.index");
    }
    public function list($var = null) {
        $qry = VehicleBooking::query();
        $qry->with("vehicle");
        $qry->with("vehicle.driver");
        $qry->where("created_by",Auth::user()->id);
        return DatatableHelper::generate(
            $var, 
            $qry->get(), 
            "requestbooking"
        )
        ->addColumn("vehicle_code",function($booking){
            return ($booking->vehicle_id!=null)?$booking->vehicle->code:"";
        })
        ->addColumn("vehicle_driver",function($booking){
            return ($booking->vehicle_id!=null)?$booking->vehicle->driver->party_name:"";
        })
        ->make(true);
    }

    public function create(Request $request) {
        $map['vehicles']=Vehicle::all();
        $map['drivers']=Party::where("party_role",PartyRole::DRIVER)->get();
        return view("pages.vms.vehicle-booking.request.create",$map);
    }

    public function store(Request $request) {
        $booking=VehicleBooking::create($request->all());
        $booking->code=CodeGenerator::generate("VB");
        $booking->created_by=Auth::user()->id;
        $booking->save();
        return redirect(url("/bookingrequest"));
    }
}
