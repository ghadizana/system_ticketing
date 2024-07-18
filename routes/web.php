<?php

use App\Http\Controllers\AksesMenuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\GrupUserController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'actionLogin')->name('actionLogin');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::controller(DataUserController::class)->group(function () {
        Route::get('/master-user', 'index')->name('masterUser');
        Route::get('/master-user-detail/{userId}', 'show')->name('detailUser');
        Route::get('/master-user-edit/{userId}', 'edit')->name('editUser');
    
        Route::post('/master-user', 'store')->name('addUser');
        Route::put('/master-user-update/{userId}', 'update')->name('updateUser');
        Route::delete('/master-user/{userId}', 'destroy')->name('deleteUser');
    });
    
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
});