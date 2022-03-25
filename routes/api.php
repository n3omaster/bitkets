<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

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
Route::get('/qr/{code}', function (Request $request, $code) {
    $svg = (new Writer(new ImageRenderer(new RendererStyle(100, 1, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))), new SvgImageBackEnd)))
        ->writeString(base64_decode($code));

    return trim(substr($svg, strpos($svg, "\n") + 1));
})->name('qr');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
