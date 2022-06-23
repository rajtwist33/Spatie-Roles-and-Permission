<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
        Route::get('/',[IndexController::class,'index'])->name('index');
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions',[RoleController::class,'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}',[RoleController::class,'revokePermission'])->name('roles.permissions.revoke');
        Route::resource('/permissions',PermissionController::class);
        Route:: post('/permissions/{permission}/roles',[PermissionController::class,'assignRole'])->name('permissions.roles');
        Route:: delete('/permissions/{permission}/roles/{role}',[PermissionController::class,'removeRole'])->name('permissions.roles.remove');
        Route::get('/users',[UserController::class,'index'])->name('users.index');
        Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.delete');
});

require __DIR__.'/auth.php';
