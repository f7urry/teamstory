<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model{
    protected $table="sys_user_role";
    protected $guard=['id'];

    public function roleaccess(){
        return $this->belongsTo(RoleAccess::class,"role_access_id");
    }
}