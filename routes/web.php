<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketCategoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use App\Models\Artist;
use App\Models\TicketCategory;
use App\Models\Venue;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/show-ticket/{id}', [ClientController::class, 'showTicket'])->name('client.showTicket');
Route::get('show-ticket/order/{id}', [ClientController::class, 'order'])->name('client.order');
Route::middleware(['auth'])->group(function () {
    Route::get('show-ticket/order/{id}/create-order', [TransactionController::class, 'viewPemesanan'])->name('client.viewPemesanan');
    Route::post('show-ticket/order/{id}/create-order', [TransactionController::class, 'createPemesanan'])->name('client.createPemesanan');
    Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');
    Route::post('/profile/update', [ClientController::class, 'updateProfile'])->name('client.updateProfile');
    Route::get('/pemesanan', [ClientController::class, 'pemesanan'])->name('client.pemesanan');
    Route::get('/pemesanan/bukti-pembayaran/{id}', [ClientController::class, 'buktiPembayaran'])->name('client.buktiPembayaran');
    Route::get('/pemesanan/bukti-pembayaran/{id}/methodPembayaran', [ClientController::class, 'methodPembayaran'])->name('client.methodPembayaran');
    Route::post('/pemesanan/bukti-pembayaran/{id}/upload-bukti', [ClientController::class, 'uploadPembayaran'])->name('client.uploadBukti');
});

Route::middleware(['role:admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('artist', [ArtistController::class, 'index'])->name('artist.index');
        Route::get('artist/create', [ArtistController::class, 'create'])->name('artist.create');
        Route::post('artist/store', [ArtistController::class, 'store'])->name('artist.store');
        Route::get('artist/show/{id}', [ArtistController::class, 'show'])->name('artist.show');
        Route::get('artist/edit/{id}', [ArtistController::class, 'edit'])->name('artist.edit');
        Route::post('artist/update/{id}', [ArtistController::class, 'update'])->name('artist.update');
        Route::get('artist/delete/{id}', [ArtistController::class, 'destroy'])->name('artist.destroy');

        Route::get('venues', [VenueController::class, 'index'])->name('venues.index');
        Route::get('venues/create', [VenueController::class, 'create'])->name('venues.create');
        Route::post('venues/store', [VenueController::class, 'store'])->name('venues.store');
        Route::get('venues/show/{id}', [VenueController::class, 'show'])->name('venues.show');
        Route::get('venues/edit/{id}', [VenueController::class, 'edit'])->name('venues.edit');
        Route::post('venues/update/{id}', [VenueController::class, 'update'])->name('venues.update');
        Route::get('venues/delete/{id}', [VenueController::class, 'destroy'])->name('venues.destroy');

        Route::get('ticket', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('ticket/create', [TicketController::class, 'create'])->name('ticket.create');
        Route::post('ticket/store', [TicketController::class, 'store'])->name('ticket.store');
        Route::get('ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
        Route::get('ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
        Route::post('ticket/update/{id}', [TicketController::class, 'update'])->name('ticket.update');
        Route::get('ticket/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.destroy');
        Route::get('ticket/{id}/create-category', [TicketCategoryController::class, 'create'])->name('ticketCategory.create');
        Route::post('ticket/{id}/store-category', [TicketCategoryController::class, 'store'])->name('ticketCategory.store');

        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('user/update', [UserController::class, 'update'])->name('user.update');
        Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

        // Route::get('user/index', [UserController::class,'index'])->name('user.index');

        Route::get('role', [RoleController::class, 'index'])->name('role.index');
        Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('role/update', [RoleController::class, 'update'])->name('role.update');
        Route::get('role/show/{id}', [RoleController::class, 'show'])->name('role.show');
        Route::get('role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');



        Route::get('order', [OrderController::class, 'index'])->name('order.index');
        Route::get('order/export', [OrderController::class, 'export'])->name('order.export');
    });
});


// Route::get('artist/{id}/delete',[ArtistController::class,'destroy'])->name('artist.delete');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
