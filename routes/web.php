<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Models\User;
use App\Models\Role;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User::all();
    return view('dashboard',compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/allusers', function () {
    $users = User::all();
    return view('allusers/index',compact('users'));
})->middleware(['auth', 'verified'])->name('allusers.index');

Route::get('/categories', function () {
    return view('categories/index');
})->middleware(['auth', 'verified'])->name('categories.index');

Route::get('/products', function () {
    return view('products/index');
})->middleware(['auth', 'verified'])->name('products.index');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/permissons', [PermissionController::class, 'index'])->name('permissions.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});                                                 

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});


require __DIR__.'/auth.php';
