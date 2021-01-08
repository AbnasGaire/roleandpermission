<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function register(Request $req){
        $this->validate($req,[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);
        $user=new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->role=$req->role;
        $user->password=Hash::make($req->password);
        $user->save();

        $token=$user->createToken("abinash")->accessToken;
        return response()->json(['token'=>$token,'user'=>$user]);
    }

    public function login(Request $req){
        $this->validate($req,[
            
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);
        $credentials=[
            'email' => $req->email,
            'password' => $req->password
        ];

        if(Auth::attempt($credentials)){
            $token=auth()->user()->createToken("abinash")->accessToken;
            return response()->json(['token'=>$token]);
        }
        
        else{
            return response()->json(["Login"=>"No Access"]);
        }
}



}
