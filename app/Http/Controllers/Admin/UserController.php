<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function destroy(User $user){
    $user->delete();
     return back()->with('succecss','Account Deleted'); 
    }

    public function show(User $user){
       $roles = Role::all();
       $permissions = Permission::all();
        return view('admin.users.role',compact('user','roles','permissions'));
    }

    
      public function assignRole(Request $request, User $user ){
        // dd($user);
        if($user->hasRole($request->roll)){
          return back()->with('success','Role Exists.');
         
        }
        $user->assignRole($request->roll);
        return back()->with('success','Role Assigned.');
         
      }  

      public function removeRole(User $user , Role $role ){
        if($user->hasRole($role))
        {
         $user->removeRole($role);
        return back()->with('success','Role Removed');
      }          
      return back()->with('success','Role  does not Exists.');
      }
      
    public function givePermission(Request $request , user $user){

      //  dd($request->all(),$user);

      if($user->hasPermissionTo($request->permission)){
          return back()->with('success','Permission Exists.');
          
      }
         $user->givePermissionTo($request->permission);
        return back()->with('success','Permission Added.');
  }

  public function revokePermission(user $user ,Permission $permission){
          if($user->hasPermissionTo($permission))
          {
              $user->revokePermissionTo($permission);
          return back()->with('success','Permissions Deleted');
  }          
       return back()->with('success','Permission Not Exists.');


}



}
