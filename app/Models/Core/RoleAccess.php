<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class RoleAccess extends Model{
    protected $table="sys_role_access";
    protected $guard=['id'];

    public function permissions(){
        return $this->hasMany(RoleAccessPermission::class);
    }
}