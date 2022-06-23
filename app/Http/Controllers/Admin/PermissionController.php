<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function index(){
    $permissions  = Permission::all();
    return view('admin.permissions.index',compact('permissions'));
  }
  public function create(){
    return view('admin.permissions.create');
  }

   public function store(Request $request){
        $validated = $request->validate([
            'name' =>['required','min:3']
        ]);

        Permission:: create($validated);
        return to_route('admin.permissions.index')->with('success',' Permission  Created Success.');
    }

   public function edit(Permission $permission){
    $roles = Role::all();
    return view('admin.permissions.edit',compact('permission','roles'));
   }
   public function update(Request $request ,Permission $permission){
         $validated = $request->validate(['name'=>'required']);
         $permission->update($validated);
         return to_route('admin.permissions.index')->with('success','Permission Value Updated');
   }
   public function destroy(Permission $permission)
   {
     $permission->delete();
     return back()->with('success','Permission Deleted');
   }

 public function assignRole(Request $request, Permission $permission){
  if($permission->hasRole($request->role)){
    return back()->with('success','Role Exists.');
  }
  $permission->assignRole($request->role);
  return back()->with('success','Role Assigned.');
   
}

public function removeRole(Permission $permission , Role $role ){
  if($permission->hasRole($role))
  {
      $permission->removeRole($role);
  return back()->with('success','Role Removed');
}          
return back()->with('success','Role  does not Exists.');


}

}
