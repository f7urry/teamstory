<?php

namespace App\Models\Vms;

use App\Models\Admin\Party;
use App\Models\Base\Model;

class Vehicle extends Model{
    protected $guarded=['id'];
    protected $table = 'm_vehicle';

    public function driver(){
       return $this->belongsTo(Party::class,"driver_id");
    }

}