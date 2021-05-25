<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class RoleAccessPermission extends Model{
    protected $table="sys_role_access_permission";
    protected $guard=['id'];

    public function module(){
        return $this->belongsTo(Module::class);
    }
}