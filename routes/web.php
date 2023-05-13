<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CategoryController;
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

Route::get('/products', function () {
    return view('products/index');
})->middleware(['auth', 'verified'])->name('products.index');

// Role and Permission
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/permissons', [PermissionController::class, 'index'])->name('permissions.index');
});

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});                                                 

// Check Admin
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});


Route::middleware('auth')->group(function () {
    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
     // Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
     Route::post('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
});                                                 



require __DIR__.'/auth.php';
