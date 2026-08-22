<?php

namespace App\Http\Controllers;

use App\Models\Kandang;
use Illuminate\Http\Request;

class KandangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Kandang::orderBy('code')->paginate(15);
        return view('manajer.master.kandang.index', ['kandangs' => $items]);
    }

    public function create()
    {
        return view('manajer.master.kandang.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|max:100|unique:kandangs,code',
            'name' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string',
            'kapasitas' => 'nullable|integer',
            'status' => 'nullable|string',
            'tipe' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Kandang::create($data);

        return redirect()->route('manajer.master.kandang.index')->with('success','Kandang dibuat.');
    }

    public function show(Kandang $kandang)
    {
        return view('manajer.master.kandang.show', compact('kandang'));
    }

    public function edit(Kandang $kandang)
    {
        return view('manajer.master.kandang.edit', compact('kandang'));
    }

    public function update(Request $request, Kandang $kandang)
    {
        $data = $request->validate([
            'code' => 'required|string|max:100|unique:kandangs,code,' . $kandang->id,
            'name' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string',
            'kapasitas' => 'nullable|integer',
            'status' => 'nullable|string',
            'tipe' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $kandang->update($data);

        return redirect()->route('manajer.master.kandang.index')->with('success','Kandang diperbarui.');
    }

    public function destroy(Kandang $kandang)
    {
        $kandang->delete();
        return redirect()->route('manajer.master.kandang.index')->with('success','Kandang dihapus.');
    }
}
