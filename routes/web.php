<?php


use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/property/{id}', [PropertyController::class, 'single'])->name('single-property');
    Route::get('/properties/', [PropertyController::class, 'index'])->name('properties');
    Route::get('/page/{slug}', [PageController::class, 'single'])->name('page');
    Route::post('/property-inquiry/{id}', [ContactController::class, 'propertyInquiry'])->name('property-inquiry');
});


// admin routes

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
    Route::get('/dashboard/properties', [DashboardController::class, 'properties'])->name('dashboard-properties');
    Route::get('/dashboard/add-property', [DashboardController::class, 'addProperty'])->name('add-property');
    Route::post('/dashboard/create-property', [DashboardController::class, 'createProperty'])->name('create-property');

    Route::get('/dashboard/edit-property/{id}', [DashboardController::class, 'editProperty'])->name('edit-property');
});

require __DIR__.'/auth.php';
