<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::all();
        return view('admin.layanan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
        ]);

        Layanan::create($request->all());
        return redirect('/admin/layanan')->with('success','Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Layanan::findOrFail($id);
        $data->update($request->all());
        return redirect('/admin/layanan')->with('success','Layanan berhasil diupdate');
    }

    public function destroy($id)
    {
        Layanan::destroy($id);
        return redirect('/admin/layanan')->with('success','Layanan berhasil dihapus');
    }
}
