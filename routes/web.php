<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\VenueController;
use App\Models\Artist;
use App\Models\Venue;

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

// Route::get('/', function () {
//     return view('client.index');
// });

Route::get('/', [ClientController::class,'index'])->name('client.index');
Route::get('/show-ticket/{id}', [ClientController::class,'showTicket'])->name('client.showTicket');
Route::get('show-ticket/order/{id}', [ClientController::class,'order'])->name('client.order');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('artist', [ArtistController::class,'index'])->name('artist.index');
Route::get('artist/create', [ArtistController::class,'create'])->name('artist.create');
Route::post('artist/store', [ArtistController::class,'store'])->name('artist.store');
Route::get('artist/show/{id}', [ArtistController::class,'show'])->name('artist.show');
Route::get('artist/edit/{id}', [ArtistController::class,'edit'])->name('artist.edit');
Route::post('artist/update/{id}', [ArtistController::class,'update'])->name('artist.update');
Route::get('artist/delete/{id}', [ArtistController::class,'destroy'])->name('artist.destroy');



Route::get('venues', [VenueController::class,'index'])->name('venues.index');
Route::get('venues/create', [VenueController::class,'create'])->name('venues.create');
Route::post('venues/store', [VenueController::class,'store'])->name('venues.store');
Route::get('venues/show/{id}', [VenueController::class,'show'])->name('venues.show');
Route::get('venues/edit/{id}', [VenueController::class,'edit'])->name('venues.edit');
Route::post('venues/update/{id}', [VenueController::class,'update'])->name('venues.update');
Route::get('venues/delete/{id}', [VenueController::class,'destroy'])->name('venues.destroy');



Route::get('ticket', [TicketController::class,'index'])->name('ticket.index');
Route::get('ticket/create', [TicketController::class,'create'])->name('ticket.create');
Route::post('ticket/store', [TicketController::class,'store'])->name('ticket.store');
Route::get('ticket/show/{id}', [TicketController::class,'show'])->name('ticket.show');
Route::get('ticket/edit/{id}', [TicketController::class,'edit'])->name('ticket.edit');
Route::post('ticket/update/{id}', [TicketController::class,'update'])->name('ticket.update');
Route::get('ticket/delete/{id}', [TicketController::class,'destroy'])->name('ticket.destroy');


// Route::get('artist/{id}/delete',[ArtistController::class,'destroy'])->name('artist.delete');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
