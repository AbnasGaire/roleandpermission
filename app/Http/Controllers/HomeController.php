<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        // Role::create(['name' => 'writer']);
        //Permission::create(['name' => 'edit articles']);
        
        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'editor']);

        // Permission::create(['name' => 'write articles']);
        // Permission::create(['name' => 'view articles']);
        // Auth::user()->givePermissionTo('edit articles');
        // $permission=Permission::find(2);
        // $role=Role::find(2);
        // $role->givePermissionTo($permission);
        // $user=User::find(2);
        // $user->assignRole('writer');
        // $role=Role::find(1);
        // $role->givePermissionTo('write articles');
        // $user=User::find(1);
        // $user->givePermissionTo('view articles');
        // $user=User::find(1);
        // $user->assignRole('writer');
        // $user->assignRole('editor');
        // $user=User::find(2);
        // $user->assignRole('admin');
        // $user=User::find(3);
        // $user->assignRole('admin');


        return view('home');
    }
}
