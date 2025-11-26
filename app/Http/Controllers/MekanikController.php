<?php

namespace App\Http\Controllers;

use App\Models\Mekanik;
use Illuminate\Http\Request;

class MekanikController extends Controller
{
    public function index()
    {
        $data = Mekanik::all();
        return view('admin.mekanik.index', compact('data'));
    }

    public function create()
    {
        return view('admin.mekanik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keahlian' => 'required'
        ]);

        Mekanik::create($request->all());

        return redirect('/admin/mekanik')->with('success', 'Mekanik berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Mekanik::findOrFail($id);
        return view('admin.mekanik.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Mekanik::findOrFail($id);
        $data->update($request->all());

        return redirect('/admin/mekanik')->with('success', 'Mekanik berhasil diupdate');
    }

    public function destroy($id)
    {
        Mekanik::destroy($id);
        return redirect('/admin/mekanik')->with('success', 'Mekanik berhasil dihapus');
    }
}
