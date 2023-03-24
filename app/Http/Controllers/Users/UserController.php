<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function roles()
    {
        $roles = Role::all();
        return view('users.roles', compact('roles'));
    }
    public function permissions()
    {
        $permissions = Permission::all();
        return view('users.permissions', compact('permissions'));
    }
    public function storeRole(Request $request)
    {
        $data = $request->validate(['name' => ['required', Rule::unique(Role::class)]]);
        
        $data['slug'] = strtolower($data['name']);
        $data['slug'] = str_replace(' ', '-', $data['slug']);
        
        Role::create($data);
        return back();
    }
    public function storePermission(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', Rule::unique(Permission::class)],
            'descreption' => ['required','string'],
        ]);
        $data['slug'] = strtolower($data['name']);
        $data['slug'] = str_replace(' ', '-', $data['slug']);

        
        Permission::create($data);
        return back();
    }
}
