<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Repositories\Userrepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class Usercontroller extends Controller
{   
    
    protected $userrepo;

    public function __construct(Userrepository $userrepo){
        $this->userrepo=$userrepo;
    }

    public function viewuser(){
        $roles=Role::all();
        return view('User.user')->with('roles',$roles);
    }

    public function adduser(Request $req){
        
            $this->userrepo->adduser($req);
            session()->put('success' ,'Successfully added');
            return redirect('/user');
        
        
    }


    public function listuser(Request $req){

        $users=$this->userrepo->listuser($req);
        if($req->wantsJson()){
            return response()->json($users);
        }
        return view('User.listuser',['users'=>$users]);
    }

    public function edituser($id,Request $req){
       
        $values=$this->userrepo->edituser($id);
        $user=$values["user"];
        $role=$values["role"];
        $roles=$values["roles"];
        if($req->wantsJson()){
            return response()->json($user);
        }
        return view('User.edituser',['user'=>$user,'role'=>$role,'roles'=>$roles]);
    }

    public function updateuser($id,Request $req){
        
        $user=$this->userrepo->updateuser($id,$req);
        // if($req->wantsJson()){
        //     return response()->json($user);
        // }
        session()->put('edituser','Successfully Edited');
        return redirect('userlist');

    }

    public function deleteuser($id,Request $req){
        $user=$this->userrepo->deleteuser($id);
        if($req->wantsJson()){
            return response()->json(["sucess"=>"successfully deltete"]);
        }
        session()->put('deletuser','Successfully deleted');
        return redirect('userlist');
    }


    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
