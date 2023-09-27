<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\InsuranceCompaniesController;
use App\Http\Controllers\Admin\InsurancePoliciesStatusesController;
use App\Http\Controllers\Admin\DocumentTypesController;
use App\Http\Controllers\Admin\AssetsTypesController;
use App\Http\Controllers\Admin\DriversController;
use App\Http\Controllers\Admin\WorkshopsController;
use App\Http\Controllers\Admin\ExecutivesController;
use App\Http\Controllers\Admin\BanksController;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Admin\InsurancePoliciesController;
use App\Http\Controllers\Admin\IncidentController;
use App\Http\Controllers\Admin\AssetController;
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

Route::redirect('/dashboard', '/admin/dashboard');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('/users', UsersController::class);    
    Route::resource('/insurance_companies', InsuranceCompaniesController::class);    
    Route::resource('/insurance_policies_statuses', InsurancePoliciesStatusesController::class);    
    Route::resource('/document_types', DocumentTypesController::class);    
    Route::resource('/customer_types', CustomerTypesController::class);    
    Route::resource('/assets_types', AssetsTypesController::class);    
    Route::resource('/drivers', DriversController::class);    
    Route::resource('/workshops', WorkshopsController::class);    
    Route::resource('/executives', ExecutivesController::class);    
    Route::resource('/banks', BanksController::class);    
    Route::get('/assets_type/{id}', [AssetsTypesController::class, 'addAttributeToAsset']);    
    Route::post('/add_assets_type_attribute', [AssetsTypesController::class, 'storeAttributeToAsset']);    
    Route::resource('/customers', CustomersController::class);    
    Route::get('/customerFilter', [CustomersController::class, 'customersFilter']);    

    Route::prefix('insurance_policies')->group(function () {
        Route::get('/', [InsurancePoliciesController::class, 'index'])->name('insurance_policy.index');
        Route::get('/filter', [InsurancePoliciesController::class, 'insurancePoliciesFilter'])->name('insurance_policy.filter');
        Route::get('/create', [InsurancePoliciesController::class, 'create'])->name('insurance_policy.create');
        Route::post('/store', [InsurancePoliciesController::class, 'store']);
        Route::post('/addNewEndorse', [InsurancePoliciesController::class, 'addNewEndorse']);
        Route::get('/show/{id}', [InsurancePoliciesController::class, 'show']);
        Route::get('/edit/{id}', [InsurancePoliciesController::class, 'edit']);
        Route::put('/update/{id}', [InsurancePoliciesController::class, 'update']);        
    });

    Route::prefix('incidents')->group(function () {
        Route::get('/', [IncidentController::class, 'index'])->name('incidents.index');
        Route::get('/create/{asset_id}', [IncidentController::class, 'create'])->name('incidents.create');
        Route::post('/store', [IncidentController::class, 'store'])->name('incidents.store');
        Route::get('/filter', [IncidentController::class, 'filter'])->name('incidents.filter');
        Route::get('/show/{id}', [IncidentController::class, 'show'])->name('incidents.show');
    });

    Route::prefix('assets')->group(function () {
        Route::get('/search_index', [AssetController::class, 'search'])->name('assets.search.index');
        Route::get('/search_assets', [AssetController::class, 'getAssetByAttributeValue'])->name('assets.search');
    });
   
});
require __DIR__.'/auth.php';
