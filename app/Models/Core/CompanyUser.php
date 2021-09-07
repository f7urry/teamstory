<?php

namespace App\Models\Core;

use App\Models\Base\Model;
use App\Models\User;

class CompanyUser extends Model{
    protected $guarded=['id'];
    protected $table = 'sys_company_user';

    public function company(){
        return $this->belongsTo(Company::class, "company_id");
    }
}