<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolleController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\PermisiController;
use App\Http\Controllers\PermisionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');



Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
//module
Route::resource('module',ModuleController::class);

//sistem
Route::resource('system',SystemController::class);

//action
Route::resource('action',ActionController::class);

//permision
Route::resource('permision',PermisionController::class);



Route::resource('rolle',RolleController::class);


// Route::post('/roles/{role}/permissions', [RolleController::class, 'givePermission'])->name('roles.permissions');
// Route::delete('/roles/{role}/permissions/{permission}', [RolleController::class, 'revokePermission'])->name('roles.permissions.revoke');

Route::post('/rolle/{id}/edit', [RolleController::class, 'givePermission']);
Route::delete('/roles/{role}/permissions/{permission}', [RolleController::class, 'revokePermission'])->name('roles.permissions.revoke');




Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/{id}/show', [UserController::class, 'show'])->name('users.show');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::post('/user/{id}/ya', [UserController::class, 'assignRole'])->name('users.roles');
Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');

Route::post('/user/{id}/show', [UserController::class, 'givePermission'])->name('users.permissions');
Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user/create', [UserController::class, 'store'])->name('users.store');
});



