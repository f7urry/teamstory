<?php
namespace App\Service\Core;

use App\Models\Core\RoleAccess;
use App\Models\Core\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function create(Request $request) {
        $user=new User();
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        $role=new UserRole();
        $role->user_id=$user->id;
        $role->role_access_id=RoleAccess::where("access_type",20)->first()->id;
        $role->save();

        return $user;
    }
}
