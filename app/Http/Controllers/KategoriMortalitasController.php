<?php

namespace App\Http\Controllers;

use App\Models\KategoriMortalitas;
use Illuminate\Http\Request;

class KategoriMortalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KategoriMortalitas::orderBy('nama')->paginate(15);
        return view('manajer.master.kategori-mortalitas.index', ['items' => $items]);
    }

    public function create()
    {
        return view('manajer.master.kategori-mortalitas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'aktif' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        KategoriMortalitas::create($data);

        return redirect()->route('manajer.master.kategori-mortalitas.index')->with('success','Kategori Mortalitas dibuat.');
    }

    public function show(KategoriMortalitas $kategoriMortalitas)
    {
        return view('manajer.master.kategori-mortalitas.show', compact('kategoriMortalitas'));
    }

    public function edit(KategoriMortalitas $kategoriMortalitas)
    {
        return view('manajer.master.kategori-mortalitas.edit', compact('kategoriMortalitas'));
    }

    public function update(Request $request, KategoriMortalitas $kategoriMortalitas)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'aktif' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $kategoriMortalitas->update($data);

        return redirect()->route('manajer.master.kategori-mortalitas.index')->with('success','Kategori Mortalitas diperbarui.');
    }

    public function destroy(KategoriMortalitas $kategoriMortalitas)
    {
        $kategoriMortalitas->delete();
        return redirect()->route('manajer.master.kategori-mortalitas.index')->with('success','Kategori Mortalitas dihapus.');
    }
}
