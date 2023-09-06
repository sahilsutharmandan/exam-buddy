<?php

use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
// Admin route here


Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
});


// Route::middleware('auth:admin')->group(function () {
//     Route::get('tests', [TestController::class,'index'])->name('tests.index');
//     Route::get('tests/create', [TestController::class,'create'])->name('tests.create');
//     Route::post('tests/store', [TestController::class,'store'])->name('tests.store');
//     Route::get('tests/{id}/edit', [TestController::class,'edit'])->name('tests.edit');
//     Route::put('tests/{id}/update', [TestController::class,'update'])->name('tests.update');
//     Route::get('tests/{id}/delete', [TestController::class,'destroy'])->name('tests.delete');
//     Route::get('tests/{id}', [TestController::class,'view'])->name('tests.view');
// });




// User route here
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('tests', [TestController::class,'index'])->name('tests.index');
    Route::get('tests/create', [TestController::class,'create'])->name('tests.create');
    Route::post('tests/store', [TestController::class,'store'])->name('tests.store');
    Route::get('tests/{id}/edit', [TestController::class,'edit'])->name('tests.edit');
    Route::put('tests/{id}/update', [TestController::class,'update'])->name('tests.update');
    Route::get('tests/{id}/delete', [TestController::class,'destroy'])->name('tests.delete');
    Route::get('tests/{id}', [TestController::class,'view'])->name('tests.view');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/AdminAuth.php';
