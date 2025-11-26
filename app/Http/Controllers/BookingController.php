<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Layanan;
use App\Models\Mekanik;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Auth;
use PDF;

class BookingController extends Controller
{
    // ADMIN : LIST BOOKING
    public function index(Request $request)
 {
    $search = $request->search;

    $data = Booking::with(['user','layanan','mekanik','jadwal'])
        ->when($search, function ($q) use ($search) {
            $q->whereHas('user', function ($u) use ($search) {
                $u->where('name', 'like', "%{$search}%");
            })
            ->orWhereHas('layanan', function ($l) use ($search) {
                $l->where('nama', 'like', "%{$search}%");
            })
            ->orWhereHas('mekanik', function ($m) use ($search) {
                $m->where('nama', 'like', "%{$search}%");
            })
            ->orWhere('status', 'like', "%{$search}%");
        })
        ->orderBy('id', 'DESC')
        ->get();

    return view('admin.booking.index', compact('data'));
 }

    // CUSTOMER : FORM BOOKING
    public function formCustomer()
    {
        return view('customer.booking.form', [
            'layanans' => Layanan::all(),
            'mekaniks' => Mekanik::all(),
            'jadwals' => Jadwal::all(),
        ]);
    }

    // CUSTOMER : SIMPAN BOOKING
    public function bookingCustomer(Request $request)
    {
        Booking::create([
            'user_id' => Auth::id(),
            'layanan_id' => $request->layanan_id,
            'mekanik_id' => $request->mekanik_id,
            'jadwal_id' => $request->jadwal_id,
            'status' => 'pending'
        ]);

        return redirect('/booking-riwayat')->with('success','Booking berhasil!');
    }

    // CUSTOMER : RIWAYAT BOOKING
    public function riwayat()
    {
        $data = Booking::where('user_id', Auth::id())
                ->with(['layanan','mekanik','jadwal'])
                ->get();

        return view('customer.booking.riwayat', compact('data'));
    }

    // ADMIN : EDIT BOOKING
    public function edit($id)
    {
        $data = Booking::findOrFail($id);
        return view('admin.booking.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

    // Simpan log
    \DB::table('booking_logs')->insert([
        'booking_id' => $booking->id,
        'admin_id'   => auth()->id(),
        'old_status' => $booking->status,
        'new_status' => $request->status,
        'created_at' => now()
    ]);

    // Update booking
    $booking->update([
        'status' => $request->status,
        'status_updated_at' => now()
    ]);

    return redirect('/admin/booking')->with('success', 'Status booking diupdate');
    }

    public function destroy($id)
    {
        Booking::destroy($id);
        return redirect('/admin/booking')->with('success','Booking dihapus');

    }


    public function cetak($id)
   {
    $booking = Booking::with(['user','layanan','mekanik','jadwal'])
                ->findOrFail($id);

    $pdf = PDF::loadView('pdf.booking', compact('booking'))
              ->setPaper('A4', 'portrait');

    return $pdf->download('nota-booking-'.$booking->id.'.pdf');
    }
}
