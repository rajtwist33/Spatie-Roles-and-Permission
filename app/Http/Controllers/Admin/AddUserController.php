<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;


class AddUserController extends Controller
{
    public function create_user(){
        return view('admin.users.create_user');
      }
      
      
      public function add_user(Request $request)
      {
      
      
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', ],
        //     'password_confirmation' => ['required','same:password'],
        // ]);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

    return redirect()->route('admin.users.index')->with('success','New User Added. ');
      
      
      }
}
