<?php
namespace App\Repositories;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class Rolerepository{

    public function addrole($req){

        // $this->validate($req,[
        //     'name'=>'required',
            
        // ]);

        $success=DB::transaction(function() use($req){
            $role=new Role();
            $role->name=$req->name;
            $data[]=$req->per;
            $role->givePermissionTo($data);
            $role->save();
            
        });
        return $success;
    }

    public function listrole($req){
            $roles=Role::all();
            // foreach($roles as $role){    for api 
            //     $pers[]=$role->permissions;
            // }
           
            return $roles;
        }

    // public function editrole($id){
        
       
    //     return Role::with(array('permissions'=>function($query){
    //         $query->select('name','id');
    //     }))
    //     ->select('name','id')
    //     ->find($id);
       

    // }


    public function editrole($id){
        // if($req->wantsJson()){

        //     // $val= Role::with(array('permissions'=>function($query){
        //     //     $query->select('name','id');
        //     // }))
        //     // ->select('name','id')
        //     // ->find($id);
        //     $role=Role::find($id);
        //     return response()->json(['role'=>$role]);
        // }
        
        // $permission_datas=DB::table('role_has_permissions')->where('role_id',$role->id)->get();
        // dd($permission_datas);
        // $num=count($permission_datas);
        // $i;
        // for($i=0;$i<$num;$i++){
        //     $permission=Permission::findById($perdata->permission_id);
        //     print($permission);
        // }
        // dd();
        // foreach($permission_datas as $perdata){
            
        //     $per_check=array();
        //     $i=0;
        //     $permission=Permission::where('id',$perdata->permission_id)->get();
        //     // $permission=Permission::find($perdata->permission_id)->get();
        //     // print($permission);
        //     array_push($per_check,$permission);
        //     print($per_check);
            
            
            
        

        // }
        // dd($per_check);
       
        // $permissions=DB::table('role_has_permissions')->where('role_id',$id)->get();
        // dd($permissions);
        $role=Role::find($id);
        $permissions = $role->permissions;
        // print($permissions);
        // $var=array_column($permissions, 'name');
        // dd($var);
        // dd(array_value($permissions));
        // dd($a);
        // dd($permissions);
        // $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        //     ->where("role_has_permissions.role_id",$id)
        //     ->get();
        
        // print($rolePermissions);
        // dd();
        // foreach($permissions as $permission){
        //     $per=Permission::find($permission->permission_id);
        //     // print($per);
        //     $pers=$per;
        //     print($pers);
        // }
        // print($pers);

        // foreach(($pers as $per  use ($pers)){
        //     print($per);
        // }
        // dd();
        return ['role'=>$role,'permissions'=>$permissions];

    }

    
    public function updaterole($id,$req){
        $role=Role::find($id);
        $role->name=$req->name;
        $data[]=$req->per;
        // dd($data);
        // $role->givePermissionTo($data);
        $role->syncPermissions($data);
        $role->save();
        return $role;
        
    }

    public function deleterole($id){
        $role=Role::find($id);
        $res=$role->delete();
        return $res;
    }
}