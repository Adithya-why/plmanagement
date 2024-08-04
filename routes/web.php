<?php

use App\Http\Controllers\placementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\studentController;
use App\Http\Middleware\isAdmin;
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
//they all use the auth and isAdmin middleware
//is admin is used to check wehether useris an admin and allowed in admin route
//if not redirected to student parts

Route::middleware(['auth', isAdmin::class]) -> group(function(){

    //route to view the admin dashboard
    Route::get('/admin/dashboard', [ placementController::class, 'showDashBoard']) -> name('admin.dashboard');


    //route to show new company form
    Route::get('/admin/newcompany', [placementController::class, 'showNewForm']) -> name('admin.newcompany');


    //route to get data from newcompanyForm and store it
    Route::post('/admin/newcompany', [placementController::class, 'storeNewCompany']) -> name('admin.newcompanyStore');


    //route to get all people registered for a given company id
    Route::get('/admin/registered/{id}', [placementController::class, 'showRegistered']) -> name('admin.showRegistered');


});





//routes in the student side of the application

//to view the student dashboard
Route::get('student/dashboard', [studentController::class, 'showCompanies']) -> middleware('auth') -> name('student.dashbaord');



//to register for a company
Route::post('student/register', [studentController::class, 'studentRegister']) -> middleware('auth')  -> name('student.register');










require __DIR__.'/auth.php';
