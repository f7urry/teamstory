<?php
namespace App\Http\Controllers\Tools;

use App\Helper\StorageUtil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StorageController extends Controller {

    public function index(Request $request) {
        if($request->mode=="download")
            return StorageUtil::downloadFile($request->f);
        else if($request->mode=="view"){
            $path="/assets/app/img/user.png";
            if($request->f!=$path)
                $path=$request->f;
            return StorageUtil::viewFile($path);
        }else
            abort(404);
    }
}