<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Layanan;
use Auth;

class FavouriteController extends Controller
{
    // Tambah favorit
    public function add($id)
    {
        Favourite::firstOrCreate([
            'user_id'   => Auth::id(),
            'layanan_id'=> $id
        ]);

        return back()->with('success','Ditambahkan ke Favorit!');
    }

    // Hapus favorit
    public function remove($id)
    {
        Favourite::where('user_id', Auth::id())
                 ->where('layanan_id', $id)
                 ->delete();

        return back()->with('success','Dihapus dari Favorit');
    }

    // Halaman daftar favorit
    public function index()
    {
        $data = Favourite::where('user_id', Auth::id())
                        ->with('layanan')
                        ->get();

        return view('customer.favourite.index', compact('data'));
    }
}