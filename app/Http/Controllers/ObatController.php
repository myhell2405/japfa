<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Obat::orderBy('nama')->paginate(15);
        return view('manajer.master.obat.index', ['items' => $items]);
    }

    public function create()
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.obat.create', compact('mitras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string',
            'supplier_id' => 'nullable|exists:mitras,id',
            'dosis' => 'nullable|string',
            'satuan' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'safety_stock' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        Obat::create($data);

        return redirect()->route('manajer.master.obat.index')->with('success','Obat dibuat.');
    }

    public function show(Obat $obat)
    {
        return view('manajer.master.obat.show', compact('obat'));
    }

    public function edit(Obat $obat)
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.obat.edit', compact('obat','mitras'));
    }

    public function update(Request $request, Obat $obat)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string',
            'supplier_id' => 'nullable|exists:mitras,id',
            'dosis' => 'nullable|string',
            'satuan' => 'nullable|string',
            'harga' => 'nullable|numeric',
            'safety_stock' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        $obat->update($data);

        return redirect()->route('manajer.master.obat.index')->with('success','Obat diperbarui.');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect()->route('manajer.master.obat.index')->with('success','Obat dihapus.');
    }
}
