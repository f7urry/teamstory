<?php

namespace App\Models\Admin;

use App\Models\Base\Model;
use App\Models\User;

class Party extends Model{
    protected $guarded=['id'];
    protected $table = 'm_party';
    
    public function address(){
        return $this->hasOne(PartyAddress::class,"party_id");
    }
    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
    public function company(){
        return $this->belongsTo(Company::class, "company_id");
    }
}