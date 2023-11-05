<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MalasngodingController;
use App\Http\Controllers\AdminLTEController;
use App\Http\Controllers\SessionController;



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





Route::get('/sesi',  [SessionController::class, 'index']);
Route::post('/sesi/login',  [SessionController::class, 'login']);
Route::get('/sesi/logout',  [SessionController::class, 'logout']);
Route::get('/sesi/register',  [SessionController::class, 'register']);
Route::post('/sesi/create',  [SessionController::class, 'create']);



    Route::get('/', function () {
        return view('master');
    })->middleware('StatusLogin');
    Route::post('/', function () {
        return view('master');
    })->middleware('StatusLogin');;
    
    
    
    Route::get('/forms',  [AdminLTEController::class, 'forms'])->middleware('StatusLogin');;
    Route::get('/table', [AdminLTEController::class, 'data'])->middleware('StatusLogin');;
    Route::get('/{id}',  [AdminLTEController::class, 'edit'])->name('edit');
    Route::post('/table', [AdminLTEController::class, 'table']);
    Route::put('/table/{id}', [AdminLTEController::class, 'editdata']);
    Route::delete('/table/{id}', [AdminLTEController::class, 'destroy'])->name('delete');

    Route::get('/table/agama', [AdminLTEController::class, 'agama'])->middleware('StatusLogin');;
    Route::get('/table/jenisp', [AdminLTEController::class, 'jenisp'])->middleware('StatusLogin');;
    Route::get('/table/statusp', [AdminLTEController::class, 'statusp'])->middleware('StatusLogin');;
    Route::get('/table/pendidikan', [AdminLTEController::class, 'pendidikan'])->middleware('StatusLogin');;
    Route::get('/table/kelamin', [AdminLTEController::class, 'kelamin'])->middleware('StatusLogin');;
    





//2023 pertemuan 3
Route::get('/page', [PageController::class, 'index']);




