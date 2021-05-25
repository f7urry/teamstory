<?php

namespace App\Http\Controllers\Core;

use App\Helper\ApiHelper;
use DataTables;
use App\Models\User;
use App\Models\Core\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

    public function index() {
        $qry=User::query();
        $qry->where("status",0);
        $map['data']=$qry->get();
        return view("pages.core.user.index",$map);
    }

    public function create() {
        return view("pages.core.user.create");
    }

    public function store(Request $request)
    {
        $user=new User();
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        foreach($request->roles as $i=>$id){
            $role=new UserRole();
            $role->user_id=$user->id;
            $role->role_access_id=$id;
            $role->save();
        }
        return redirect("/users");
    }

    public function show(User $user){
        $map['user']=User::find($user->id);
        return view('pages.core.user.edit',$map);
    }

    public function edit(User $user){
        abort(404);
    }

    public function update(Request $request, User $user)
    {
        $user=User::find($user->id);
        $param=$request->except(['_token']);
        $user->update($param);

        $list_role=$request->role_ids;
        foreach($list_role as $i=>$id){
            if($id!=0){
                $userrole=UserRole::find($id);
                $userrole->role_access_id=$request->roles[$i];
                $userrole->update();
            }else{
                $userrole=new UserRole();
                $userrole->role_access_id=$request->roles[$i];
                $userrole->user_id=$user->id;
                $userrole->status=1;
                $userrole->save();

                $list_role[$i]=$userrole->id;
            }
        }
        foreach($user->roles as $userrole){
            $found=false;
            if(!in_array($userrole->id,$list_role))
                $userrole->delete();
        }
        return redirect()->back();
    }
    public function destroy(User $user)
    {
        if ($user->delete()) {
            $message = 'User Has Successfully Been Deleted!';
            flash($message)->error();
            return redirect()->route('users.index');
        }
        $message = 'Something Wrong!';
        flash($message)->error();
        return redirect()->back();
    }
    public function soft_delete(Request $request, User $user)
    {
        $user=User::find($user->id);
        $user->status=1;
        $user->update();
        return redirect()->route('users.index');
    }

    public function edit_pass(User $user){
        $map['user']=User::find($user->id);
        return view("pages.core.user.changepass",$map);
    }
    public function update_pass(Request $request,User $user){
        $message="Warning: Update password failure";
        $param=$request->except(['_token']);
        $user=User::find($user->id);
        $user->update([
            "password"=>Hash::make($param['password'])
        ]);
        $message="Success: Change Password Successful";
        return redirect("/users/".$user->id."/changepass")->with(["message"=>$message]);
    }

}
