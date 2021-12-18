<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admins\RoleController;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LogController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');




Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'can:accessAdmins'])->name('admin.')->group(function() {
Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
Route::resource('roles', RoleController::class)->except(['edit']);
Route::resource('admins', AdminController::class)->parameters(['admins' => 'user'])->only(['index', 'show', 'update']);
Route::resource('users', UserController::class)->only(['index', 'show', 'update']);
});





Route::resource('products', ProductController::class);
Route::resource('admin', AdminDashboardController::class);
//Route::resource('admins', AdminController::class);




	
Route::middleware(['auth:sanctum','verified'])
	->get('/products',[ProductController::class, 'index'])
	->name('products.index');
	
Route::middleware(['auth:sanctum','verified'])
	->get('/users', [UserController::class, 'index'])
	->name('users.index');




    Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
        $limiter = config('fortify.limiters.login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])
            ->middleware(array_filter([
                'guest',
                $limiter ? 'throttle:'.$limiter : null,
            ]));
           
    });
    
    Route::resource('activitylog', LogController::class);