<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AllUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SellController;
use App\Models\Product;
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
    $products = Product::latest()->paginate(8);
    return view('home',compact('products'));
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () {
    $users = User::all();
    return view('dashboard',compact('users'));
})->middleware(['auth', 'verified','role:admin'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function(){
    Route::get('/user', [FrontendController::class, 'index'])->name('user.index');
    Route::get('/user/products', [FrontendController::class, 'products'])->name('user.products');
    Route::get('/user/productslive', [FrontendController::class, 'productslive'])->name('user.productslive');
    Route::get('/user/{id}/productdetail',[FrontendController::class,'productdetail'])->name('user.productdetail');
    Route::get('/user/buyersell',[FrontendController::class,'buyersell'])->name('user.buyersell');
    Route::get('/user/sellersell',[FrontendController::class,'sellersell'])->name('user.sellersell');

    // Sell
    Route::get('/user/sell/',[SellController::class,'index'])->name('user.sell.index');
    Route::get('/user/sell/manageproducts',[SellController::class,'manageproducts'])->name('user.sell.manageproducts');
    Route::get('/user/sell/managestocks',[SellController::class,'managestocks'])->name('user.sell.managestocks');

    // Cart and Orders
    Route::get('/user/orders/',[FrontendController::class,'orders'])->name('user.orders.index');
    Route::get('/user/orders/cart',[CartController::class,'index'])->name('user.orders.cart');
    Route::post('/user/orders/cart/store',[CartController::class,'store'])->name('user.orders.cart.store');
    

});

// Role and Permission
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
    Route::get('/roles/{id}/edit',[RoleController::class,'edit'])->name('roles.edit');
    Route::post('/roles/{id}/update',[RoleController::class,'update'])->name('roles.update');
    Route::get('/roles/{id}/assignpermission',[RoleController::class,'assignpermission'])->name('roles.assignpermission');
    Route::post('/roles/{id}/updatepermission',[RoleController::class,'updatepermission'])->name('roles.updatepermission');
    Route::post('/roles/destroy',[RoleController::class,'destroy'])->name('roles.destroy');

    Route::get('/permissons', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store',[PermissionController::class,'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit',[PermissionController::class,'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}/update',[PermissionController::class,'update'])->name('permissions.update');
     Route::post('/permissions/destroy',[PermissionController::class,'destroy'])->name('permissions.destroy');
    
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

    // All Users
    Route::get('/allusers', [AllUserController::class, 'index'])->name('allusers.index');
    Route::get('/allusers/create', [AllUserController::class, 'create'])->name('allusers.create');
    Route::get('/allusers/{id}/edit',[AllUserController::class,'edit'])->name('allusers.edit');

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class,'update'])->name('category.update');
     // Route::get('/category/{id}/destroy',[CategoryController::class,'destroy'])->name('category.destroy');
     Route::post('/category/destroy',[CategoryController::class,'destroy'])->name('category.destroy');

     // Product
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store',[ProductController::class,'store'])->name('products.store');
    Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name('products.edit');
    Route::post('/products/{id}/update',[ProductController::class,'update'])->name('products.update');
    Route::post('/products/destroy',[ProductController::class,'destroy'])->name('products.destroy');

});                                                 



require __DIR__.'/auth.php';
