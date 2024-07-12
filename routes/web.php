<?php

use App\Http\Controllers\AksesMenuController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\GrupUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\Role;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

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

// Register Route
Route::get('/register', [RegisterController::class, 'register'])->name('register');

// Login Route
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'actionLogin'])->name('actionLogin');

// Master User Route'
Route::get('/master-user', [DataUserController::class, 'index'])->name('masterUser');
Route::get('/master-user-detail/{userId}', [DataUserController::class, 'show'])->name('detailUser');
Route::get('/master-user-edit/{userId}', [DataUserController::class, 'edit'])->name('editUser');

Route::post('/master-user', [DataUserController::class, 'store'])->name('addUser');
Route::put('/master-user-update/{userId}', [DataUserController::class, 'update'])->name('updateUser');
Route::delete('/master-user/{userId}', [DataUserController::class, 'destroy'])->name('deleteUser');

// Grup User Route
Route::get('/grup-user', [GrupUserController::class, 'index'])->name('grupUser');
Route::get('/grup-user-edit/{idGrupUser}', [GrupUserController::class, 'edit'])->name('editGrupUser');

Route::post('/grup-user', [GrupUserController::class, 'store'])->name('addGrupUser');
Route::put('/grup-user-update/{idGrupUser}', [GrupUserController::class, 'update'])->name('updateGrupUser');
Route::delete('/grup-user/{idGrupUser}', [GrupUserController::class, 'destroy'])->name('deleteGrupUser');

// Akses Menu Route
Route::get('/akses-menu', [AksesMenuController::class, 'index'])->name('aksesMenu');
Route::get('/akses-menu-edit/{idAksesMenu}', [AksesMenuController::class, 'edit'])->name('editAksesMenu');
Route::post('/akses-menu', [AksesMenuController::class, 'store'])->name('addAksesMenu');
Route::delete('/akses-menu/{idAksesMenu}', [AksesMenuController::class, 'destroy'])->name('deleteAksesMenu');
Route::put('/akses-menu-edit/{idAksesMenu}', [AksesMenuController::class, 'update'])->name('updateAksesMenu');

// Menu Route
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu-edit/{idAksesMenu}', [MenuController::class, 'edit'])->name('editMenu');
Route::post('/menu', [MenuController::class, 'store'])->name('addMenu');
Route::put('/menu-edit/{idMenu}', [MenuController::class, 'update'])->name('updateMenu');
Route::delete('/menu/{idMenu}', [MenuController::class, 'destroy'])->name('deleteMenu');

// Base URL
Route::get('{slug}', [MenuController::class, 'showByLink'])->name('link.show');