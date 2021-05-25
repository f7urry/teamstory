<?php

namespace App\Models\Vms;

use App\Models\Admin\Party;
use App\Models\Base\Model;
use App\Models\User;

class VehicleBooking extends Model{
    protected $guarded=['id'];
    protected $table = 't_vehicle_booking';
    public const STATUS_REQUEST="REQUESTED";
    public const STATUS_REJECTED="REJECTED";
    public const STATUS_APPROVED="APPROVED";
    public const STATUS_ONGOING="ONGOING";
    public const STATUS_COMPLETED="COMPLETED";

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function driver(){
        return $this->belongsTo(Party::class);
    }
    public function createdBy(){
        return $this->belongsTo(User::class, "created_by");
    }
}