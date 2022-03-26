<?php

use BaconQrCode\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QrController;



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

// ROute to generate and return the QR based on a text code
Route::get('/qr/{code}', [QrController::class, 'qr'])->name('qr');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
