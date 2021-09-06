<?php

namespace App\Models\Admin;

use App\Models\Base\Model;
use App\Models\User;

class Company extends Model{
    protected $guarded=['id'];
    protected $table = 'm_company';
}