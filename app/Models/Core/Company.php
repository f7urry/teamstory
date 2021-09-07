<?php

namespace App\Models\Core;

use App\Models\Base\Model;
use App\Models\User;

class Company extends Model{
    protected $guarded=['id'];
    protected $table = 'sys_company';
}