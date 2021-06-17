<?php

namespace App\Models\Core;

use App\Models\Base\Model;

class Geographic extends Model{
    protected $table="m_geographic";
    protected $guarded=['id'];

    public function parent(){
        return $this->belongsTo(Geographic::class, "parent_id");
    }
}