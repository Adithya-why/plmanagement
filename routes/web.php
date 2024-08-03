<?php

use App\Http\Controllers\placementController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//routes regarding placement admin

//route to view the admin dashboard
Route::get('/admin/dashboard', [ placementController::class, 'showDashBoard'])->middleware('auth') -> name('admin.dashboard');


//route to show new company form
Route::get('admin/newcompany', [placementController::class, 'showNewForm'])->middleware('auth')->name('admin.newcompany');


//route to get data from newcompanyForm and store it
Route::post('admin/newcompany', [placementController::class, 'storeNewCompany']) -> middleware('auth') -> name('admin.newcompanyStore');










require __DIR__.'/auth.php';
