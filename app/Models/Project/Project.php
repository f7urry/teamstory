<?php

namespace App\Models\Project;

use App\Models\Base\Model;
use App\Models\Core\Company;
use App\Models\User;

class Project extends Model{
    protected $guarded=['id'];
    protected $table = 't_project';
    
    public function company(){
        return $this->belongsTo(Company::class, "company_id");
    }
}