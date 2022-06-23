<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    Public function index(){
        $roles = Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' =>['required','min:3']
        ]);

        Role::  create($validated)->with('success','Role has Created .');
        return to_route('admin.roles.index')->with('success','Roles Created Suceess .');
    }
     
    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request ,Role $role){
        $validated = $request->validate (['name'=>'required']);
        $role ->update($validated);
        return to_route('admin.roles.index')->with('success','Roles Updated Success. ');
    }
    
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success','Permission Deleted');
    }
    
    public function givePermission(Request $request , Role $role){

        // dd($request->all(),$role);

        if($role->hasPermissionTo($request->permission)){
            return back()->with('success','Permission Exists.');
            
        }

        
        $role->givePermissionTo($request->permission);
          return back()->with('success','Permission Added.');
    }

    public function revokePermission(Role $role ,Permission $permission){
            if($role->hasPermissionTo($permission))
            {
                $role->revokePermissionTo($permission);
            return back()->with('success','Permissions Deleted');
    }          
         return back()->with('success','Permission Not Exists.');


}
}