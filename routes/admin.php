<!-- admin.php -->
<?php

use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\LoginnController as AuthLoginnController;
use App\Http\Controllers\Dashboard\PackageController;
use App\Http\Controllers\Dashboard\SettingController;
use Illuminate\Support\Facades\Route;

    Route::get('/dashboard', [IndexController::class,'index'])->name('dashboard');
    Route::middleware('auth')->group(function () {
        Route::get('profile', [SettingController::class,'index'])->name('profile.setting.index');
        Route::get('profile', [SettingController::class, 'edit'])->name('profile.edit');
        Route::put('profile/{id}', [SettingController::class, 'updateProfile'])->name('profile.update');
    });
    // Route::put('/profile/{setting}/update',[SettingController::class,'Update'])->name('dashboard.profile.update');

    Route::group(['as' => 'dashboard.', 'middleware' => ['auth']], function () {
        Route::get('Packages/ajax', [PackageController::class,'getall'])->name('packages.getall');

        Route::post('dashboard/ajax_search',[PackageController::class, 'ajax_search'])->name('packages.search');
        Route::delete('/dashboard/Packages/delete/{id}', [PackageController::class, 'delete'])
        ->name('packages.delete')
        ->middleware(['auth']);



        Route::resource('Packages', PackageController::class)->except('destroy');
    });

