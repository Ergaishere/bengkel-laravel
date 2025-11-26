<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Controllers
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\HomeController;


// =============================
// LANDING PAGE
// =============================
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role == 'admin'
            ? redirect('/admin/dashboard')
            : redirect('/customer/dashboard');
    }
    return view('landing');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


// =============================
// ADMIN AREA (rapi, tidak duplikat)
// =============================

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('layanan', LayananController::class);
    Route::resource('mekanik', MekanikController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('booking', BookingController::class);

    Route::get('/logs', function () {
        $logs = DB::table('booking_logs')
            ->join('users', 'booking_logs.admin_id', '=', 'users.id')
            ->join('bookings', 'booking_logs.booking_id', '=', 'bookings.id')
            ->select('booking_logs.*', 'users.name as admin')
            ->orderBy('booking_logs.id', 'DESC')
            ->get();

        return view('admin.logs.index', compact('logs'));
    });
});


// =============================
// CUSTOMER AREA
// =============================
Route::middleware('auth')->group(function () {

    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    });

    // Booking Customer
    Route::get('/booking', [BookingController::class, 'formCustomer']);
    Route::post('/booking', [BookingController::class, 'bookingCustomer']);
    Route::get('/booking-riwayat', [BookingController::class, 'riwayat']);

    // Rating
    Route::get('/booking/{id}/rating', [RatingController::class, 'form']);
    Route::post('/booking/{id}/rating', [RatingController::class, 'store']);

    // Favourite
    Route::get('/favourite', [FavouriteController::class, 'index']);
    Route::get('/favourite/add/{id}', [FavouriteController::class, 'add']);
    Route::get('/favourite/remove/{id}', [FavouriteController::class, 'remove']);

    // Cetak Nota
    Route::get('/booking/cetak/{id}', [BookingController::class, 'cetak']);

    // List Layanan Customer
    Route::get('/layanan-list', function () {
        return view('customer.layanan.index', [
            'layanans' => \App\Models\Layanan::all()
        ]);
    });
});


// =============================
// AUTH
// =============================
Auth::routes();

// Default Home (Laravel)
Route::get('/home', [HomeController::class, 'index'])->name('home');