<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $rolle = Role::all();
        $permissions = Permission::all();
        $user = User::where('id', $id)->first();
      return view('user.rolle',compact('rolle','user','permissions'));
    }

    public function assignRole(Request $request,  $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $rolle = Role::where('id',$request->rolle)->firstOrFail();
        $user->assignRole($rolle);
        return back();
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('success', 'Role removed.');
        }

        return back()->with('success', 'Role not exists.');
    }



    public function givePermission(Request $request,  $id)
    {
                         $user = User::where('id', $id)->firstOrFail();
                        $permission = Permission::where('id',$request->permision_name)->firstOrFail();   
                $user->givePermissionTo($permission);
                return back();

    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoked.');
        }
        return back()->with('success', 'Permission not exists.');
    }





    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        Session::flash('password', $request->password);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);



        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];


        User::create($user);
        return redirect()->to('user')->with('success', 'succes add');

    }
}
