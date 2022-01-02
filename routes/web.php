<?php


use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;




Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/property/{id}', [PropertyController::class, 'single'])->name('single-property');
Route::get('/properties/', [PropertyController::class, 'index'])->name('properties');
Route::get('/page/{slug}', [PageController::class, 'single'])->name('page');
Route::post('/property-inquiry/{id}', [ContactController::class, 'propertyInquiry'])->name('property-inquiry');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
