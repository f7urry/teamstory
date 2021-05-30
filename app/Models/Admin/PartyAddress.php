<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PartyAddress extends Model{
    public const ADDRESS_HOME="HOME";
    public const ADDRESS_WORK="WORK";
    protected $guarded=['id'];
    protected $table = 'm_party_address';
    
}