<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function logout(Request $request){
        $request->session()->forget("user");
        return view("login", ["error_list" => []]);
    }
    public function login(Request $request){

        $errorList = array();
        $userLogged = $request->session()->get("user");

        if($userLogged != null){
            if($userLogged->rol == 1){ // Admin
                return redirect('/answers'); 
            }else if($userLogged->rol == 2) { // User
                return redirect('/question'); 
            }
            return redirect('/'); 
        }
        
        $validation = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|alphaNum' 
        ]);
        if($validation["email"] && $validation["password"]){

            $user = User::where([
                ['email', '=', $validation["email"]],
                ['password', '=', $validation["password"]],
            ])->get()->first();

            if($user != NULL){
                unset($user->password);
                $request->session()->put("user",$user);
                if($user->rol == 1){ // Admin
                    return redirect('/answers'); 
                }else if($user->rol == 2) { // User
                    return redirect('/question'); 
                }
            }
            $errorList[] = "Usuario o contraseña erronea";
            return view("login", ["error_list" => $errorList]);
        }else{
            if(!$validation["email"]){
                $errorList[] = "Email no válido";
            }
            if(!$validation["password"]){
                $errorList[] = "Password no válido";
            }
        }

        return view("login", ["error_list" => $errorList]);
    }
}
