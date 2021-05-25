<?php

namespace App\Http\Controllers\Core;

use App\Helper\ApiHelper;
use App\Helper\SelectHelper;
use DataTables;
use App\User;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Models\Core\Module;
use App\Models\Core\RoleAccess;
use App\Models\Core\RoleAccessPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller {

    public function options(Request $request){
        $opts=Module::query();
        if($request->term=='')
            $opts->orderBy("name","asc");
        else
            $opts->where("name","like","%$request->term%");

        $opts->limit(10);
        return SelectHelper::generate($opts,"id","name");
    }
}
