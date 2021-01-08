<?php

namespace App\Http\Controllers;

use App\Repositories\Rolerepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Rolecontroller extends Controller
{
    
    protected $rolerepo;

    public function __construct(Rolerepository $rolerepo){
        $this->rolerepo=$rolerepo;
    }


    public function viewrole(){
        return view('Role.role');
    }

    public function addrole(Request $req){
        $success=$this->rolerepo->addrole($req);

        if($req->wantsJson()){
            return response()->json(["success"=>"added successfully"]);
        }
        else{
            if($success){
                session()->put('success' ,'Successfully added');
                    return view('Role.role');
                }
                else{
                    return redirect()->back();
                }
        }
        
       
    }

    public function listrole(Request $req){

        $roles=$this->rolerepo->listrole($req);
        if($req->wantsJson()){
            return response()->json($roles);
        }
        else{
            return view('Role.listrole',['roles'=>$roles]);
        }
        
    }

    public function editrole($id,Request $req){
    
        
        $val=$this->rolerepo->editrole($id);
        
        // dd($val);
        // if($req->wantsJson()){
        //     return response()->json($val);
        // }
        // else{
        //     $role=$val["role"];
        //     $permissions=$val["permissions"];
        //     // dd($role);
        //     return view('Role.editrole',['role'=>$role,'permissions'=>$permissions]);
        // }
        if($req->wantsJson()){
            // $data=$val->pluck('name');
            // $role=$val["role"];
            
            // // $array = array_only($role, array('id', 'name'));
            // $array = array_pluck($role,'id','name');

            // $permissions=$val["permissions"];
            // $permissionsname=$permissions->pluck("name");
            // $res= Role::with(array('permissions'=>function($query){
            //     $query->select('name','id');
            // }))
            // ->select('name','id')
            // ->find($id);
            return response()->json(['role'=>$val["role"],'permissions'=>$val["permissions"]]);
        }
        else{
            
            $role=$val["role"];
            $permissions=$val["permissions"];
            
            return view('Role.editrole',['role'=>$role,'permissions'=>$permissions]);
        }
        

        
    }

    public function updaterole($id,Request $req){
        $role=$this->rolerepo->updaterole($id,$req);
        if($req->wantsJson()){
            return response()->json($role);
        }
        else{
            session()->put('editrole','Successfully Edited');
            return redirect()->back();
        }
        

    }

    public function deleterole($id,Request $req){
        $result=$this->rolerepo->deleterole($id);
        
            if($req->wantsJson()){
                {       
                    if($result){
                        return response()->json(['delete'=>"successfully deleted"]);
                    }
                    
                }
                
            }
            else{
                session()->put('deletrole','Successfully deleted');
                return redirect('rolelist');
            }
            
        
        
        
    }
}


