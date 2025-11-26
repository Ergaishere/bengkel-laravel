<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Rating;
use Illuminate\Http\Request;
use Auth;

class RatingController extends Controller
{
    // Form rating
    public function form($id)
    {
        $booking = Booking::with('rating')->findOrFail($id);

        // Hanya bisa rating kalau selesai
        if ($booking->status != 'selesai') {
            abort(403, 'Booking belum selesai, tidak bisa memberi rating');
        }

        return view('customer.booking.rating', compact('booking'));
    }


    // Simpan rating
    public function store(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status != 'selesai') {
            abort(403);
        }

        Rating::updateOrCreate(
            ['booking_id' => $booking->id],
            [
                'user_id' => Auth::id(),
                'rating' => $request->rating,
                'komentar' => $request->komentar
            ]
        );

        return redirect('/booking-riwayat')->with('success', 'Rating berhasil disimpan!');
    }
}