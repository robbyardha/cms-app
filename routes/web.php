<?php

use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GivePermissionController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'role_or_permission:developer|penulis'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified', 'role_or_permission:developer|/dashboard']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified', 'role_or_permission:developer|/dashboard']);


    Route::get('/access/role', [RoleController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/role']);
    Route::get('/access/role/getDataAjax', [RoleController::class, 'getDataAjax'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/role']);
    Route::post('/access/role/create', [RoleController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/role/create']);
    Route::get('/access/role/edit/{id}', [RoleController::class, 'edit'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/role/edit']);
    Route::post('/access/role/update/{id}', [RoleController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/role/update']);
    Route::delete('/access/role/delete/{id}', [RoleController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/role/delete']);

    Route::get('/access/menu/select2', [MenuController::class, 'select2'])->name('menus.select2');
    Route::get('/access/menu/getDataAjax', [MenuController::class, 'getDataAjax'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/menu']);
    Route::get('/access/menu', [MenuController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/menu']);
    Route::post('/access/menu/create', [MenuController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/menu/create']);
    Route::get('/access/menu/edit/{id}', [MenuController::class, 'edit'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/menu/edit']);
    Route::post('/access/menu/update/{id}', [MenuController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/menu/update']);
    Route::delete('/access/menu/delete/{id}', [MenuController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/menu/delete']);

    Route::get('/access/submenu/getDataAjax', [SubMenuController::class, 'getDataAjax'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu']);
    Route::get('/access/submenu', [SubMenuController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu']);
    Route::post('/access/submenu/create', [SubMenuController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu/create']);
    Route::get('/access/submenu/edit/{id}', [SubMenuController::class, 'edit'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu/edit']);
    Route::post('/access/submenu/update/{id}', [SubMenuController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu/update']);
    Route::delete('/access/submenu/delete/{id}', [SubMenuController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu/delete']);

    Route::get('/access/permission/getDataAjax', [PermissionController::class, 'getDataAjax'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/submenu']);
    Route::get('/access/permission', [PermissionController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/permission']);
    Route::post('/access/permission/create', [PermissionController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/permission/create']);
    Route::get('/access/permission/edit/{id}', [PermissionController::class, 'edit'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/permission/edit']);
    Route::post('/access/permission/update/{id}', [PermissionController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/permission/update']);
    Route::delete('/access/permission/delete/{id}', [PermissionController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/permission/delete']);


    Route::get('/access/give-permission', [GivePermissionController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/give-permission']);
    Route::post('/access/give-permission/create', [GivePermissionController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/give-permission/create']);
    Route::post('/access/give-permission/update', [GivePermissionController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/give-permission/update']);
    Route::post('/access/give-permission/delete', [GivePermissionController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/access/give-permission/delete']);


    Route::get('/master/user', [UserController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/user']);
    Route::post('/master/user/create', [UserController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/user/create']);
    Route::post('/master/user/update', [UserController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/user/update']);
    Route::post('/master/user/delete', [UserController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/user/delete']);

    Route::get('/master/tag', [UserController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/tag']);
    Route::post('/master/tag/create', [UserController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/tag/create']);
    Route::post('/master/tag/update', [UserController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/tag/update']);
    Route::post('/master/tag/delete', [UserController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/master/tag/delete']);

    Route::get('/cms/post', [UserController::class, 'index'])->middleware(['auth', 'verified', 'role_or_permission:developer|/cms/post']);
    Route::post('/cms/post/create', [UserController::class, 'create'])->middleware(['auth', 'verified', 'role_or_permission:developer|/cms/post/create']);
    Route::post('/cms/post/update', [UserController::class, 'update'])->middleware(['auth', 'verified', 'role_or_permission:developer|/cms/post/update']);
    Route::post('/cms/post/delete', [UserController::class, 'delete'])->middleware(['auth', 'verified', 'role_or_permission:developer|/cms/post/delete']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');
});

require __DIR__ . '/auth.php';
