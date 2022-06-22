<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;


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
        return view('admin.roles.edit',compact('role'));
    }

    public function update(Request $request ,Role $role){
        $validated = $request->validate (['name'=>'required']);
        $role ->update($validated);
        return to_route('admin.roles.index')->with('success','Roles Updated Success. ');
    }
    public function destroy(Role $role)
    {
       $role->delete();
       return back()->with('success','Roles Deleted.');

    }
}
