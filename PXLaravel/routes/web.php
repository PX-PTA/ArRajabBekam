<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductInventoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {    
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }else{
        return view('welcome');
    }
});


Route::get('/404', function () {
    return view('notfound');
})->name('notFound');

Route::get('/blank', function () {
    return view('starter');
})->name('starter');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', [UsersController::class, 'index'])->middleware(['auth', 'verified'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->middleware(['auth', 'verified'])->name('users.create');
Route::get('/users/{id}', [UsersController::class, 'detail'])->middleware(['auth', 'verified'])->name('users.detail');
Route::get('/patient/notify/{patient}', [UsersController::class, 'notify'])->middleware(['auth', 'verified'])->name('user.notify');

Route::get('/patient', [PatientController::class, 'index'])->middleware(['auth', 'verified'])->name('patient.index');
Route::get('/patient/create', [PatientController::class, 'create'])->middleware(['auth', 'verified'])->name('patient.create');
Route::get('/patient/detail/{patient}', [PatientController::class, 'show'])->middleware(['auth', 'verified'])->name('patient.show');
Route::get('/patient/print/{patient}', [PatientController::class, 'print'])->middleware(['auth', 'verified'])->name('patient.print');
Route::get('/patient/{patient}/medical-records', [PatientController::class, 'detail-medical'])->middleware(['auth', 'verified'])->name('patient.detail-medical');
Route::get('/patient/edit/{patient}', [PatientController::class, 'edit'])->name('patient.edit');
Route::get('/patient/destroy/{patient}', [PatientController::class, 'destroy'])->name('patient.destroy');
Route::post('/patient/update/{patient}', [PatientController::class, 'update'])->name('patient.update');
Route::post('/patient/store', [PatientController::class, 'store'])->name('patient.store');

Route::get('/print-medical-record/{medicalRecord}', [MedicalRecordController::class, 'print'])->middleware(['auth', 'verified'])->name('print-medical');
Route::get('/medical-records', [MedicalRecordController::class, 'index'])->middleware(['auth', 'verified'])->name('medical-record.index');
Route::get('/medical-records/create/{curPat?}', [MedicalRecordController::class, 'create'])->middleware(['auth', 'verified'])->name('medical-record.create');
Route::get('/medical-records/{medicalRecord}', [MedicalRecordController::class, 'show'])->middleware(['auth', 'verified'])->name('medical-record.show');
Route::get('/medical-records/edit/{medicalRecord}', [MedicalRecordController::class, 'edit'])->name('medical-record.edit');
Route::get('/medical-records/destroy/{medicalRecord}', [MedicalRecordController::class, 'destroy'])->name('medical-record.destroy');
Route::post('/medical-records/update/{medicalRecord}', [MedicalRecordController::class, 'update'])->name('medical-record.update');
Route::post('/medical-records/store', [MedicalRecordController::class, 'store'])->name('medical-record.store');
Route::get('/medical/export', [MedicalRecordController::class, 'exportexcel'])->name('medical-record.export');

Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('product.index');
Route::get('/product/create/', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('product.create');
Route::get('/product/{product}', [ProductController::class, 'show'])->middleware(['auth', 'verified'])->name('product.show');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/product/stok/', [ProductController::class, 'stok'])->name('product.stok');
Route::get('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/sales', [SaleController::class, 'index'])->middleware(['auth', 'verified'])->name('sale.index');
Route::get('/sale/create/', [SaleController::class, 'create'])->middleware(['auth', 'verified'])->name('sale.create');
Route::get('/sale/show/{sale}', [SaleController::class, 'show'])->middleware(['auth', 'verified'])->name('sale.show');
Route::post('/sale/store', [SaleController::class, 'store'])->name('sale.store');

Route::get('/inventories', [ProductInventoryController::class, 'index'])->middleware(['auth', 'verified'])->name('inventory.index');

Route::get('/finance', [FinanceController::class, 'index'])->middleware(['auth', 'verified'])->name('finance.index');
Route::get('/finance/create/{curMedical?}', [FinanceController::class, 'create'])->middleware(['auth', 'verified'])->name('finance.create');
//Route::get('/finance/detail/{finance}', [PatientController::class, 'show'])->middleware(['auth', 'verified'])->name('finance.show');
Route::post('/finance/store/{curMedical?}', [FinanceController::class, 'store'])->name('finance.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
