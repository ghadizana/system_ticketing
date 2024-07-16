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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('/register', [RegisterController::class, 'register'])->name('register');

Route::controller(DataUserController::class)->group(function () {
    Route::get('/master-user-detail/{userId}', 'show')->name('detailUser');
    Route::get('/master-user-edit/{userId}', 'edit')->name('editUser');

    Route::post('/master-user', 'store')->name('addUser');
    Route::put('/master-user-update/{userId}', 'update')->name('updateUser');
    Route::delete('/master-user/{userId}', 'destroy')->name('deleteUser');
});

Route::get('/master-user', [DataUserController::class, 'index'])->name('masterUser');

Route::controller(GrupUserController::class)->group(function () {
    Route::get('/grup-user', 'index')->name('grupUser');
    Route::get('/grup-user-edit/{idGrupUser}', 'edit')->name('editGrupUser');

    Route::post('/grup-user', 'store')->name('addGrupUser');
    Route::put('/grup-user-update/{idGrupUser}', 'update')->name('updateGrupUser');
    Route::delete('/grup-user/{idGrupUser}', 'destroy')->name('deleteGrupUser');
});

Route::controller(AksesMenuController::class)->group(function () {
    Route::get('/akses-menu', 'index')->name('aksesMenu');
    Route::get('/akses-menu-edit/{idAksesMenu}', 'edit')->name('editAksesMenu');
    Route::post('/akses-menu', 'store')->name('addAksesMenu');
    Route::delete('/akses-menu/{idAksesMenu}', 'destroy')->name('deleteAksesMenu');
    Route::put('/akses-menu-edit/{idAksesMenu}', 'update')->name('updateAksesMenu');
});

Route::controller(MenuController::class)->group(function () {
    Route::get('/menu', 'index')->name('menu');
    Route::get('/menu-edit/{idAksesMenu}', 'edit')->name('editMenu');
    Route::post('/menu', 'store')->name('addMenu');
    Route::put('/menu-edit/{idMenu}', 'update')->name('updateMenu');
    Route::delete('/menu/{idMenu}', 'destroy')->name('deleteMenu');

    Route::get('{slug}', 'showByLink')->name('link.show');
});