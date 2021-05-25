<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class ModuleGroup extends Model{
    protected $table="sys_module_group";
    protected $guard=['id'];

    public function parent(){
        return $this->belongsTo(ModuleGroup::class,"parent_id");
    }
    public function childs(){
        return $this->hasMany(ModuleGroup::class,"parent_id")->orderBy('menu_index');
    }
    public function modules(){
        return $this->hasMany(Module::class,"group_id")->orderBy('menu_index');
    }
}