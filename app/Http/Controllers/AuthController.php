<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function register(){
        return view("auth.register");
    }

    public function changePassword(){
        return view("auth.changePassword");
    }

    public function loginProcess(Request $request){
        $attempt = Auth::attempt([
            "email"     => $request->email,
            "password"  => $request->password,
        ]);

        if($attempt){
            $request->session()->regenerate();
            return redirect()->intended() ?? redirect()->route("dashboard");
        } else {
            if(User::where("email", $request->email)->count("id") > 0){
                return redirect()->back()->with("fail", "Your password is wrong!");
            }
            return redirect()->back()->with("fail", "Your credential is not found!");
        }
    }

    public function registerProcess(Request $request){
        $role_id = Role::min("id");
        $password = bcrypt($request->password);
        $request->request->add([
            "password"  => $password,
            "role_id"   => $role_id,
        ]);
        User::create($request->all());
        return redirect("login")->with("success", "Your account is created. Please login!");
    }

    public function changePasswordProcess(Request $request){
        if($request->password == $request->password2){
            User::whereId(Auth()->user()->id)->update(["password" => bcrypt($request->password)]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect("login");
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }
}
