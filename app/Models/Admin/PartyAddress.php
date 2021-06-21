<?php

namespace App\Models\Admin;

use App\Models\Core\Geographic;
use Illuminate\Database\Eloquent\Model;

class PartyAddress extends Model{
    public const ADDRESS_HOME="HOME";
    public const ADDRESS_WORK="WORK";
    protected $guarded=['id'];
    protected $table = 'm_party_address';
    
    public function city(){
        return $this->belongsTo(Geographic::class, "city_id");
    }
    public function province(){
        return $this->belongsTo(Geographic::class, "province_id");
    }
}