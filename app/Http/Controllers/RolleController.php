<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;


class RolleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('permission:rolle index', ['only' => ['index']]);
         $this->middleware('permission:create rolle', ['only' => ['create', 'store']]);
         $this->middleware('permission:edit rolle', ['only' => ['edit', 'update']]);
         $this->middleware('permission:delete rolle', ['only' => ['destroy']]);
         $this->middleware('permission:create permision in rolle', ['only' => ['givePermission']]);
         $this->middleware('permission:delete permision in rolle', ['only' => ['revokePermission']]);
     }

    public function index()
    {
       // $roles = Role::whereNotIn('name', ['admin'])->get();
       $roles = Role::orderBy('id', 'desc')->get();
       return view('rolle.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rolle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);
        return redirect('/rolle')->with('success', 'Successfully input data');
        // return to_route('rolleindex')->with('message', 'Role Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $permissions = Permission::all();
         $role = Role::where('id', $id)->first();
      return view('rolle/edit',compact('role','permissions'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
        Session::flash('name', $request->name);

        $request->validate([
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
           
        ];

        Role::where('id', $id)->update($data);
        return redirect('/rolle')->with('success', 'Successfully update data');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role->delete();
        // return back()->with('message', 'Role deleted.');
        Role::where('id', $id)->delete();
        return redirect('/rolle')->with('success', 'Delete data successfully');
    }


    public function givePermission(Request $request,  $id)
    {
                        $role = Role::where('id', $id)->firstOrFail();
                        $permission = Permission::where('id',$request->permision_name)->firstOrFail();   
                $role->givePermissionTo($permission);
                return back();

    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Permission revoked.');
        }
        return back()->with('success', 'Permission not exists.');
    }
}
