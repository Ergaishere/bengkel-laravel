<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BookingController;


Route::get('/', function () {
    // Kalau sudah login, langsung arahkan sesuai role
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/customer/dashboard');
        }
    }

    // Kalau belum login, tampilkan landing page
    return view('landing');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::middleware(['auth'])->group(function () {

    Route::resource('layanan', LayananController::class);
    Route::resource('mekanik', MekanikController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('booking', BookingController::class);

});



// DASHBOARD ADMIN
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/layanan', App\Http\Controllers\LayananController::class);
    Route::resource('/admin/mekanik', App\Http\Controllers\MekanikController::class)
    ->middleware('auth');
    Route::resource('/admin/jadwal', App\Http\Controllers\JadwalController::class)
    ->middleware('auth');
    Route::resource('/admin/pelanggan', App\Http\Controllers\PelangganController::class)
    ->middleware('auth');
    Route::resource('/admin/booking', App\Http\Controllers\BookingController::class)
    ->middleware('auth');
});

Route::get('/admin/logs', function () {
    $logs = DB::table('booking_logs')
        ->join('users', 'booking_logs.admin_id', '=', 'users.id')
        ->join('bookings', 'booking_logs.booking_id', '=', 'bookings.id')
        ->select('booking_logs.*', 'users.name as admin')
        ->orderBy('booking_logs.id', 'DESC')
        ->get();

    return view('admin.logs.index', compact('logs'));
});

// DASHBOARD CUSTOMER
Route::get('/customer/dashboard', function () {
    return view('customer.dashboard');
})->middleware('auth');

Route::get('/dashboard-admin', function () {
    return view('dashboard-admin');
})->middleware('auth');

Route::get('/booking', [App\Http\Controllers\BookingController::class, 'formCustomer'])
    ->middleware('auth');

Route::post('/booking', [App\Http\Controllers\BookingController::class, 'bookingCustomer'])
    ->middleware('auth');

Route::get('/booking-riwayat', [App\Http\Controllers\BookingController::class, 'riwayat'])
    ->middleware('auth');

Auth::routes();

Route::get('/layanan-list', function () {
    return view('customer.layanan.index', [
        'layanans' => \App\Models\Layanan::all()
    ]);
})->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/booking/{id}/rating', [App\Http\Controllers\RatingController::class, 'form'])
    ->middleware('auth');

Route::post('/booking/{id}/rating', [App\Http\Controllers\RatingController::class, 'store'])
    ->middleware('auth');

    // LIST FAVORIT
Route::get('/favourite', [App\Http\Controllers\FavouriteController::class, 'index'])->middleware('auth');

// TAMBAH FAV
Route::get('/favourite/add/{id}', [App\Http\Controllers\FavouriteController::class, 'add'])->middleware('auth');

// HAPUS FAV
Route::get('/favourite/remove/{id}', [App\Http\Controllers\FavouriteController::class, 'remove'])->middleware('auth');


Route::get('/booking/cetak/{id}', [App\Http\Controllers\BookingController::class, 'cetak'])->middleware('auth');
