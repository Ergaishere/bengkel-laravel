<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::all();
        return view('admin.jadwal.index', compact('data'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'jam' => 'required'
        ]);

        Jadwal::create($request->all());

        return redirect('/admin/jadwal')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Jadwal::findOrFail($id);
        return view('admin.jadwal.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Jadwal::findOrFail($id);
        $data->update($request->all());

        return redirect('/admin/jadwal')->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        Jadwal::destroy($id);
        return redirect('/admin/jadwal')->with('success', 'Jadwal berhasil dihapus');
    }
}
