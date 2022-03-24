<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;
use App\Notifications\TicketPaid;

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

Route::get('/notification', function () {
    $cart_paid = Cart::find(1);
    return (new TicketPaid($cart_paid))->toMail($cart_paid->owner);
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// View Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/{event}', [EventController::class, 'show'])->name('events.show');

// Show Event

// Buy Tickets

// View Ticket Status

// Brands Index
Route::get('/brands', [EventController::class, 'index'])->name('brands.index');

/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/
