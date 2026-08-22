<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use Illuminate\Http\Request;

class PakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Pakan::orderBy('nama')->paginate(15);
        return view('manajer.master.pakan.index', ['items' => $items]);
    }

    public function create()
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.pakan.create', compact('mitras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'type' => 'nullable|string',
            'supplier_id' => 'nullable|exists:mitras,id',
            'price_per_unit' => 'nullable|numeric',
            'unit' => 'nullable|string|max:20',
            'stok_minimal' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        Pakan::create($data);

        return redirect()->route('manajer.master.pakan.index')->with('success','Pakan dibuat.');
    }

    public function show(Pakan $pakan)
    {
        return view('manajer.master.pakan.show', compact('pakan'));
    }

    public function edit(Pakan $pakan)
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.pakan.edit', compact('pakan','mitras'));
    }

    public function update(Request $request, Pakan $pakan)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'type' => 'nullable|string',
            'supplier_id' => 'nullable|exists:mitras,id',
            'price_per_unit' => 'nullable|numeric',
            'unit' => 'nullable|string|max:20',
            'stok_minimal' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        $pakan->update($data);

        return redirect()->route('manajer.master.pakan.index')->with('success','Pakan diperbarui.');
    }

    public function destroy(Pakan $pakan)
    {
        $pakan->delete();
        return redirect()->route('manajer.master.pakan.index')->with('success','Pakan dihapus.');
    }
}
