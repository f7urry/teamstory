<?php

namespace App\Models;

use App\Models\Core\RoleAccessPermission;
use App\Models\Core\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;
    protected $table = 'sys_users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->hasMany(UserRole::class);
    }
    public function rolesIndex(){
        $index=9999;
        foreach ($this->roles as $role) {
            if($index>$role->roleaccess->access_type)
                $index=$role->roleaccess->access_type;
        }
        return $index;
    }

    public function checkPermission(){
        $row=new RoleAccessPermission();
        $row->id=0;
        $row->is_read=0;
        $row->is_update=0;
        $row->is_create=0;
        $row->is_delete=0;

        $path=url()->current();
        $path=explode("/",$path);
        if(count($path)>3 && strpos(url()->current(),"api")==0)
            $path=$path[3];
        else if(count($path)>3 && strpos(url()->current(),"api")>0)
            $path=$path[4];
        else
            $path="home";

        if ($path!="home" && $path!="profile" && $path!="file") {
            foreach ($this->roles as $role) {
                foreach ($role->roleaccess->permissions as $permit) {
                    if ($permit->module->path==$path)
                        $row=$permit;

                    if ($row->id!=0)
                        break;
                }
                if ($row->id!=0)
                    break;
            }
        }else
             $row->is_read=1;
        return $row;
    }
}
