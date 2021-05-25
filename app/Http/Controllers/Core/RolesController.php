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
use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller {

    public function index() {
        $qry=RoleAccess::query();
        $map['data']=$qry->get();
        return view("pages.core.role_access.index",$map);
    }

    public function create() {
        return view("pages.core.role_access.create");
    }

    public function store(Request $request)
    {
        $role=new RoleAccess();
        $role->name=$request->name;
        $role->access_type=$request->access_type;
        $role->save();

        if ($request->modules!=null) {
            foreach ($request->modules as $i=>$mod) {
                $permit=new RoleAccessPermission();
                $permit->module_id=$mod;
                $permit->role_access_id=$role->id;
                $permit->is_read=$request->is_read[$i];
                $permit->is_create=$request->is_create[$i];
                $permit->is_update=$request->is_update[$i];
                $permit->is_delete=$request->is_delete[$i];
                $permit->status=1;
                $permit->save();
            }
        }
        return redirect("/roles/".$role->id);
    }

    public function show(RoleAccess $role){
        $map['role']=RoleAccess::find($role->id);
        $map['modules']=Module::all();
        return view('pages.core.role_access.edit',$map);
    }

    public function edit(RoleAccess $RoleAccess){
        abort(404);
    }

    public function update(Request $request, RoleAccess $role)
    {
        $role=RoleAccess::find($role->id);
        $role->name=$request->name;
        $role->access_type=$request->access_type;
        $role->update();

        $list_permission=$request->permission_id;
        foreach($list_permission as $i=>$id){
            if($id!=0){
                $permit=RoleAccessPermission::find($id);
                $permit->module_id=$request->module_id[$i];
                $permit->is_read=$request->is_read[$i];
                $permit->is_create=$request->is_create[$i];
                $permit->is_update=$request->is_update[$i];
                $permit->is_delete=$request->is_delete[$i];
                $permit->update();
            }else{
                $permit=new RoleAccessPermission();
                $permit->role_access_id=$role->id;
                $permit->module_id=$request->module_id[$i];
                $permit->is_read=$request->is_read[$i];
                $permit->is_create=$request->is_create[$i];
                $permit->is_update=$request->is_update[$i];
                $permit->is_delete=$request->is_delete[$i];
                $permit->status=1;
                $permit->save();

                $list_permission[$i]=$permit->id;
            }
        }
        foreach($role->permissions as $permit){
            $found=false;
            if(!in_array($permit->id,$list_permission))
                $permit->delete();
        }
        return redirect()->back();
    }
    public function destroy(RoleAccess $role)
    {
        if ($role->delete()) {
            $message = 'User Has Successfully Been Deleted!';
            return redirect()->back();
        }
        $message = 'Something Wrong!';
        return redirect()->back();
    }
    public function options(Request $request){
        $opts=RoleAccess::query();
        if($request->term=='')
            $opts->orderBy("name","asc");
        else
            $opts->where("name","like","%$request->term%");

        $opts->limit(10);
        return SelectHelper::generate($opts,"id","name");
    }
    public function get(){
        echo "hi";
    }
}
