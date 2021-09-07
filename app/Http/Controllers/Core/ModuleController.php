<?php

namespace App\Http\Controllers\Core;

use App\Helper\ApiHelper;
use App\Helper\SelectHelper;
use DataTables;
use App\User;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use App\Models\Core\Module;
use App\Models\Core\ModuleGroup;
use App\Models\Core\RoleAccess;
use App\Models\Core\RoleAccessPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller {

    public function index() {
        $map['data']=ModuleGroup::all();
        return view("pages.core.module.index",$map);
    }
    
    public function create(){
        $map['parents']=ModuleGroup::all();
        return view("pages.core.module.create",$map);
    }
    public function store(Request $request) {
        $module=new ModuleGroup($request->except(['_token']));
        $module->save();
        return redirect(url("/modules/".$module->id));
    }
    public function show($module) {
        $moduleGroup=ModuleGroup::find($module);
        $map['group']=$moduleGroup;
        $map['parents']=ModuleGroup::all();
        return view("pages.core.module.edit", $map);
    }

    public function update(Request $request,$module) {
        $param=$request->only("fa_icon", "name", "parent_id", "menu_index");
        $group=ModuleGroup::find($module);
        $group->update($param);

        if($request->module_id!=null)
            $list_module=$request->module_id;
        else
            $list_module=[];
        foreach($list_module as $i=>$id){
            if($id!=0){
                $mdl=Module::find($id);
                $mdl->name=$request->module_name[$i];
                $mdl->fa_icon=$request->module_icon[$i];
                $mdl->path=$request->module_path[$i];
                $mdl->is_menu=$request->module_menu[$i];
                $mdl->menu_index=$request->module_index[$i];
                $mdl->group_id=$group->id;
                $mdl->update();
            }else{
                $mdl=new Module();
                $mdl->name=$request->module_name[$i];
                $mdl->fa_icon=$request->module_icon[$i];
                $mdl->path=$request->module_path[$i];
                $mdl->is_menu=$request->module_menu[$i];
                $mdl->menu_index=$request->module_index[$i];
                $mdl->group_id=$group->id;
                $mdl->save();
                $list_module[$i]=$mdl->id;
            }
        }
        foreach($group->modules as $mdl){
            $found=false;
            if(!in_array($mdl->id,$list_module)){
                $mdl->delete();
                RoleAccessPermission::where("module_id", $mdl->id)->delete();
            }
        }
        return redirect()->back()->with(["message"=>"Success: Data telah diupdate"]);
    }
    public function destroy($module) {
        $group = ModuleGroup::find($module);
        foreach($group->modules as $mdl){
            $mdl->delete();
            RoleAccessPermission::where("module_id", $mdl->id)->delete();
        }
        $group->delete();
        return redirect("/modules/")->with(["message"=>"Success: Data telah dihapus"]);
    }

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
