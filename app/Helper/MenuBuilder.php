<?php

namespace App\Helper;
use App\Models\Core\ModuleGroup;
use App\Models\Core\RoleAccessPermission;
use Illuminate\Support\Facades\Auth;

class MenuBuilder{
    private $menus=[];
    private $menusGroup=[];

    public static function generate(){
        $builder=new MenuBuilder();
        $builder->accessModules();
        $root="";
        $root=$builder->addRootMenu($root);
        foreach (ModuleGroup::whereNull("parent_id")->orderBy("menu_index","asc")->get() as $group)
           $root=$builder->addMenu($root,$group);
        return $root;
    }
    public function addRootMenu($root){
        $menu="";
        foreach ($this->menus as $module) {
            if(array_key_exists($module->id,$this->menus) && $module->group_id==null){
                $menu.="<a class='nav-link' href='".url('/'.$module->path)."'>";
                $menu.="<div class='sb-nav-link-icon'><i class='fa $module->fa_icon'></i></div><span>$module->name</span>";
                $menu.="</a>";
            }
        }
        return $menu;
    }
    public function addMenu($root,$group){
        if (array_key_exists($group->id, $this->menusGroup)) {
            $found=false;
            $menu="";
            $menu.="<a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#col_group_".$group->id."' id='group_".$group->id."'>";
            $menu.="<div class='sb-nav-link-icon'><i class='fa ".$group->fa_icon."'></i></div>";
            $menu.="<span>".$group->name."</span>";
            if ($group->childs->count()>0) {
                $found=true;
            }
            if ($group->modules->count()>0) {
                $found=true;
            }
            $menu.="<div class='sb-sidenav-collapse-arrow'><i class='fas fa-angle-down'></i></div>";
            $menu.="</a>";
            if ($found) {
                $root.=$menu;
                $root.="<div class='collapse' id='col_group_".$group->id."' data-parent='#group_".$group->id."'>";
                $root.="<nav class='sb-sidenav-menu-nested nav'>";
                $root.=$this->addModule($group);
                foreach ($group->childs as $child) {
                    $root=$this->addMenu($root, $child);
                }
                $root.="</nav></div>";
            }
        }
        return $root;
    }
    public function addModule($group){
        $menu="";
        foreach ($group->modules as $module) {
            if(array_key_exists($module->id,$this->menus)){
                $menu.="<a class='nav-link' href='".url('/'.$module->path)."'>";
                $menu.="<div class='sb-nav-link-icon'><i class='fa $module->fa_icon'></i></div><span>$module->name</span>";
                $menu.="</a>";
            }
        }
        return $menu;
    }
    public function accessModules(){
        $menus=[];
        $menusGroup=[];
        $user=Auth::user();
        foreach ($user->roles as $role) {
            $permission=RoleAccessPermission::where("role_access_id",$role->roleaccess->id)
                        ->join("sys_module","sys_module.id","=","sys_role_access_permission.module_id")
                        ->orderBy("sys_module.menu_index")
                        ->get();
                        
            foreach ($permission as $permit) {
                if ($permit->module->is_menu==1) {
                    $menus[$permit->module->id]=$permit->module;
                    $menusGroup[$permit->module->group_id]=$permit->module;
                }
            }
        }
        $this->menus=$menus;
        $this->menusGroup=$menusGroup;
        $this->menus=$menus;
        $this->menusGroup=$menusGroup;
    }
}