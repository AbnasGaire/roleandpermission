<?php
namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class Userrepository{

    public function adduser($req){
        // $this->validate($req,[
        //     'name'=>'required',
            
        // ]);
        
        DB::transaction(function() use($req){
            $user=new User();
            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $role_data=Role::find($req->role);

            $user->role=$role_data->name;

            $user->assignRole($req->role);

            // $role=Role::where('id',$req->role)->get();
            $role = Role::findById($req->role);
            // dd($role->id);
            $per_ids=DB::table('role_has_permissions')->where('role_id',$role->id)->get();
            
            
            foreach($per_ids as $per){
                
                $per=Permission::findById($per->permission_id);
                // dd($per->name);
                $user->givePermissionTo($per->name);
                // print($user->givePermissionTo($per->name));
                
            }
            
            
            $user->save();

        });

    }

    public function listuser(){
        $users=User::all();
        return $users;
    }

    public function edituser($id){
        $user=User::find($id);
        $role=$user->role; // user ko role select garna help garxa
        $roles=Role::all();

        return ['user'=>$user,'role'=>$role,'roles'=>$roles];
    }

    public function updateuser($id,$req){
        
        if($req->wantsJson()){
            // return response()->json($user);
            $user=User::find($id);
            $user->name=$req->name;
            $user->email=$req->email;
        
            $role_data=Role::findById($req->role);
            // dd($req->role);
            $user->role=$role_data->name; //yyyyy
            // $user->role=$user->assignRole($role_data->name);
            // $user->role=$role_data["name"]; //yyyyy
        
            $user->save();
            return response()->json($user);
        }

        $user=User::find($id);
        $user->name=$req->name;
        $user->email=$req->email;
        
        $role_data=Role::findById($req->role);
        // dd($req->role);
        $user->role=$role_data->name; //yyyyy
        // $user->role=$role_data["name"]; //yyyyy
        
        $user->save();
        return $user;
        
    }

    public function deleteuser($id){
        $user=User::find($id);
        $user->delete();
        if($user->delete()){
            return true;
        
        }
        else{
            return false;
        }
    }

}