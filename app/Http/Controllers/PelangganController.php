<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::all();
        return view('admin.pelanggan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pelanggans,email',
            'telp' => 'required'
        ]);

        Pelanggan::create($request->all());

        return redirect('/admin/pelanggan')->with('success','Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pelanggan::findOrFail($id);

        $data->update($request->all());

        return redirect('/admin/pelanggan')->with('success','Pelanggan berhasil diupdate');
    }

    public function destroy($id)
    {
        Pelanggan::destroy($id);

        return redirect('/admin/pelanggan')->with('success','Pelanggan berhasil dihapus');
    }
}
