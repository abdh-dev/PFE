<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PhaseController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProfileController;
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

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
  Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

  Route::get('/pr/{project}', [DashboardController::class, 'showProject'])
    ->name('dashboard.project');
});

//Route::get('/dashboard', [DashboardController::class, "index"])
//    ->name('dashboard')
//    ->middleware('auth');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('projects', ProjectController::class)
  ->except(['index', 'show'])
  ->middleware('auth');

Route::resource('projects.phases', PhaseController::class)
  ->only(['store', 'update', 'destroy'])
  ->middleware('auth');

Route::resource('tasks', TaskController::class)
  ->only(['store', 'update', 'destroy'])
  ->middleware('auth');

Route::resource('task/attachments', MediaController::class)
  ->only(['store', 'update', 'destroy'])
  ->middleware('auth');

Route::post('/uploads/process', [FileUploadController::class, 'process'])
  ->name('uploads.process');

Route::delete('/uploads/revert', [FileUploadController::class, 'revert'])
  ->name('uploads.destroy');

Route::prefix('/fresh')->group(function () {
  Route::get('/', function () {
    Artisan::call('migrate:fresh --seed');
    Artisan::call('cache:clear');
    return redirect()->route('dashboard');
  });

  Route::get('/no-seed', function () {
    Artisan::call('migrate:fresh --seed --seeder=UserSeeder');
    Artisan::call('cache:clear');
    return redirect()->route('dashboard');
  });
});


//Route::get("/projects", function () {
//    return redirect()->route("dashboard");
//});
//
//Route::get("/projects/{any}", function () {
//    return redirect()->route("dashboard");
//})->where("any", ".*");

require __DIR__.'/auth.php';
