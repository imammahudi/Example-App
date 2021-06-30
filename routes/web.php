<?php

use App\Http\Controllers\Api\SysinfoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TestController;
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
    return view('welcome');
});
Route::get('/index', [ItemController::class, 'index']);
Route::post('save', [ItemController::class, 'store']);
Route::get('/create', [ItemController::class, 'create']);
Route::get('/edit/{id}', [ItemController::class, 'edit']);
Route::post('/update/{id}', [ItemController::class, 'update']);
Route::get('/testdb', [ItemController::class, 'testDb']);
Route::get('/graphics', [ItemController::class, 'graphics']);
Route::get('/get-items', [ItemController::class, 'getItems']);
Route::get('/Autoload', [ItemController::class, 'autoLoad']);
Route::post('/get-api', [ItemController::class, 'getApi']);

Route::get('/sysinfo-site/{site_id}', [ItemController::class, 'getSysinfoSite']);

Route::get('test', [SysinfoController::class, 'test']);

// Route::get('/sysInfo', [ItemController::class, 'getSysinfo']);
