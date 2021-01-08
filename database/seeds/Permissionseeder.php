<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=['role_create',
        'role_view','role_edit','role_delete','product_create','product_view','product_edit',
        'product_delete','user_create','user_view','user_edit','user_delete'];

        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }
        // for(i=0,i<$permissions.length(),i++){
        //     Permission::createorupdete(['name'=value])
        // }
       
        // DB::table('permissions')->insert([
        //     'name'=>'role_create'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'role_edit'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'role_view'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'role_delete'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'user_create'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'user_edit'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'user_view'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'user_delete'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'product_create'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'product_edit'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'product_view'
        // ]);
        // DB::table('permissions')->insert([
        //     'name'=>'product_delete'
        // ]);
        
    }
}
