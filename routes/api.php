<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SysinfoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['ipcheck']], function () {
    
    // Route get sysinfo
    Route::get('sysInfo', [SysinfoController::class, 'getSysinfo']);
    Route::get('test', [SysinfoController::class, 'test']);    
    Route::get('/sysinfo-site/{site_id}', [SysinfoController::class, 'getSysinfoSite']);
});