<?php

namespace App\Models\Admin;

use App\Models\Base\Model;

class Party extends Model{
    protected $guarded=['id'];
    protected $table = 'm_party';
    
    public function address(){
        return $this->hasOne(PartyAddress::class,"party_id");
    }
}