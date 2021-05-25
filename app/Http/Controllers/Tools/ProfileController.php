<?php

namespace App\Http\Controllers\Tools;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helper\StorageUtil;

class ProfileController extends Controller {

    public function edit(Request $request){
        $map['user']=User::find(Auth::user()->id);
        return view("pages.profile.detail",$map);
    }

    public function update(Request $request){
        $param=$request->except(['_token','password']);
        $user=User::find($param['id']);
        if(Hash::check($request->password,$user->password)){
            if(isset($request->avatar))
                $param['avatar']=StorageUtil::uploadFile("avatar",$request->avatar);
            $user->update($param);
            $message="Success: Profile Updated";
        }else{
            $message="Error: Password Not Match";
        }
        return redirect("/profile")->with(["message"=>$message]);
    }
    public function editpass(){
        $map['user']=User::find(Auth::user()->id);
        return view("pages.profile.changepass",$map);
    }

    public function updatepass(Request $request){
        $message="Warning: Update password failure";
        $param=$request->except(['_token']);
        $user=User::find(Auth::user()->id);
        if(Hash::check($param['oldpassword'],$user->password)){
            $user->update([
                "password"=>Hash::make($param['password'])
            ]);
            $message="Success: Change Password Successful";
        }else
            $message="Warning: Password Not Match";
        return redirect("/profile/changepass")->with(["message"=>$message]);
    }
}
