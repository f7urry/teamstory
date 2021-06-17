<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Model;

class Module extends Model{
    protected $table="sys_module";
    protected $guarded=['id'];
}