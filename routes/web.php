<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RencanaKerjaController;
use App\Http\Controllers\Admin\MasterUnitController;
use App\Http\Controllers\Admin\MasterImplementController;
use App\Http\Controllers\Admin\MasterActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
   // return view('welcome');
   return redirect('/admin/dashboard');
})->name('index');


Route::group(['as' => 'auth.'], function () {
   Route::group(['middleware' => 'auth'], function () {
      Route::post('logout', [LoginController::class, 'logout'])->name('logout');
   });

   Route::group(['middleware' => 'guest'], function () {
      // Authentication
      Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
      Route::post('login', [LoginController::class, 'login']);
   });
});

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'permission:user.access.index'])->group(function () {
   Route::get('/home', [HomeController::class, 'index'])->name('home');
});
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'permission:admin.access.index'])->group(function () {
   Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
      Route::redirect('/', '/admin/dashboard', 301);

      Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

      Route::group(['prefix' => 'news', 'as' => 'news.', 'middleware' => 'permission:admin.access.news'], function () {
         Route::get('/', [NewsController::class, 'index'])->name('index');
         Route::get('datatable', [NewsController::class, 'datatable'])->name('datatable');
         Route::get('create', [NewsController::class, 'create'])->name('create');
         Route::get('{id}/edit', [NewsController::class, 'edit'])->name('edit');
         Route::post('store', [NewsController::class, 'store'])->name('store');
         Route::delete('{id}/destroy', [NewsController::class, 'destroy'])->name('destroy');
      });

      Route::group(['prefix' => 'rencana_kerja', 'as' => 'rencana_kerja.', 'middleware' => 'permission:admin.access.rencana_kerja'], function () {
         Route::get('/', [RencanaKerjaController::class, 'index'])->name('index');
         Route::get('create', [RencanaKerjaController::class, 'create'])->name('create');
         Route::put('{id}/update', [RencanaKerjaController::class, 'update'])->name('update');
         Route::get('{id}/edit', [RencanaKerjaController::class, 'edit'])->name('edit');
         Route::delete('{id}/destroy', [RencanaKerjaController::class, 'destroy'])->name('destroy');
         Route::post('store', [RencanaKerjaController::class, 'store'])->name('store');
         Route::get('datatable', [RencanaKerjaController::class, 'datatable'])->name('datatable');
      });

      Route::group(['prefix' => 'unit', 'as' => 'unit.', 'middleware' => 'permission:admin.access.unit'], function () {
         Route::get('/', [MasterUnitController::class, 'index'])->name('index');
         Route::get('create', [MasterUnitController::class, 'create'])->name('create');
         Route::put('{id}/update', [MasterUnitController::class, 'update'])->name('update');
         Route::get('{id}/edit', [MasterUnitController::class, 'edit'])->name('edit');
         Route::delete('{id}/destroy', [MasterUnitController::class, 'destroy'])->name('destroy');
         Route::post('store', [MasterUnitController::class, 'store'])->name('store');
         Route::get('datatable', [MasterUnitController::class, 'datatable'])->name('datatable');
      });

      Route::group(['prefix' => 'implement', 'as' => 'implement.', 'middleware' => 'permission:admin.access.implement'], function () {
         Route::get('/', [MasterImplementController::class, 'index'])->name('index');
         Route::get('create', [MasterImplementController::class, 'create'])->name('create');
         Route::put('{id}/update', [MasterImplementController::class, 'update'])->name('update');
         Route::get('{id}/edit', [MasterImplementController::class, 'edit'])->name('edit');
         Route::delete('{id}/destroy', [MasterImplementController::class, 'destroy'])->name('destroy');
         Route::post('store', [MasterImplementController::class, 'store'])->name('store');
         Route::get('datatable', [MasterImplementController::class, 'datatable'])->name('datatable');
      });

      Route::group(['prefix' => 'activity', 'as' => 'activity.', 'middleware' => 'permission:admin.access.activity'], function () {
         Route::get('/', [MasterActivityController::class, 'index'])->name('index');
         Route::get('create', [MasterActivityController::class, 'create'])->name('create');
         Route::put('{id}/update', [MasterActivityController::class, 'update'])->name('update');
         Route::get('{id}/edit', [MasterActivityController::class, 'edit'])->name('edit');
         Route::delete('{id}/destroy', [MasterActivityController::class, 'destroy'])->name('destroy');
         Route::post('store', [MasterActivityController::class, 'store'])->name('store');
         Route::get('datatable', [MasterActivityController::class, 'datatable'])->name('datatable');
      });

      Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'permission:admin.access.user'], function () {
         Route::get('/', [UserController::class, 'index'])->name('index');
         Route::get('datatable', [UserController::class, 'datatable'])->name('datatable');
         Route::get('create', [UserController::class, 'create'])->name('create');
         Route::get('{id}/edit', [UserController::class, 'edit'])->name('edit');
         Route::post('store', [UserController::class, 'store'])->name('store');
         Route::delete('{id}/destroy', [UserController::class, 'destroy'])->name('destroy');
      });

      Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => 'permission:admin.access.profile'], function () {
         Route::get('/', [ProfileController::class, 'index'])->name('index');
         Route::post('store', [ProfileController::class, 'store'])->name('store');
      });
   });
});
