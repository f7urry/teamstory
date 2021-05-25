<?php
namespace App\Http\Controllers\Vms\Api;

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
use Illuminate\Support\Facades\DB;

class VehicleBookingController extends Controller {

     public function get_vehicle(Request $request,$uniquecode) {
        $map=[];
        $vehicle=Vehicle::with("driver")->where("unique_code",$uniquecode)->first();
        $booking=DB::select(DB::raw("SELECT * FROM t_vehicle_booking WHERE vehicle_id='$vehicle->id' AND status IN ('APPROVED','ONGOING') ORDER BY id DESC LIMIT 0,1"));
        if (count($booking)!=0) {
            $booking=$booking[0];
            $map['vehicle']=$vehicle;
            $map['booking']=$booking;
        }
        return response()->json($map);
        //return response()->json($map);
    }
    public function show(VehicleBooking $vehiclebooking) {
        $map['booking']=VehicleBooking::find($vehiclebooking->id);
        $map['vehicles']=Vehicle::all();
        $map['drivers']=Party::where("party_role",PartyRole::DRIVER)->get();
        return response()->json($map);
    }

    public function update(Request $request, $uniquecode) {
        $map=[];
        $vehicle=Vehicle::with("driver")->where("unique_code",$uniquecode)->first();
        $booking=DB::select(DB::raw("SELECT * FROM t_vehicle_booking WHERE vehicle_id='$vehicle->id' AND status IN ('APPROVED','ONGOING') ORDER BY id DESC LIMIT 0,1"));
        if (count($booking)!=0) {
            $booking=(object)$booking[0];
            if ($booking->status==VehicleBooking::STATUS_APPROVED) {
                $booking->date_start=date("Y-m-d H:i:s");
                $booking->odometer_start=$request->odometer;
                $booking->status=VehicleBooking::STATUS_ONGOING;
                $map['result']=DB::statement("UPDATE t_vehicle_booking SET status='$booking->status',date_start='$booking->date_start',odometer_start='$booking->odometer_start' WHERE id='$booking->id'");
            } else {
                $booking->date_end=date("Y-m-d H:i:s");
                $booking->odometer_end=$request->odometer;
                $booking->status=VehicleBooking::STATUS_COMPLETED;
                $map['result']=DB::statement("UPDATE t_vehicle_booking SET status='$booking->status',date_end='$booking->date_end',odometer_end='$booking->odometer_end' WHERE id='$booking->id'");
            }
        }
        return response()->json($map);
    }
}
