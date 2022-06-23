<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

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
}
