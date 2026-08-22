<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Kontrak::with('mitra')->orderBy('start_date','desc')->paginate(15);
        return view('manajer.master.kontrak.index', ['kontraks' => $items]);
    }

    public function create()
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.kontrak.create', compact('mitras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kontrak_number' => 'required|string|unique:kontraks,kontrak_number',
            'mitra_id' => 'required|exists:mitras,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'nilai_kontrak' => 'nullable|numeric',
            'status' => 'nullable|string',
            'terms' => 'nullable|string',
        ]);

        Kontrak::create($data);

        return redirect()->route('manajer.master.kontrak.index')->with('success','Kontrak dibuat.');
    }

    public function show(Kontrak $kontrak)
    {
        return view('manajer.master.kontrak.show', compact('kontrak'));
    }

    public function edit(Kontrak $kontrak)
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.kontrak.edit', compact('kontrak','mitras'));
    }

    public function update(Request $request, Kontrak $kontrak)
    {
        $data = $request->validate([
            'kontrak_number' => 'required|string|unique:kontraks,kontrak_number,' . $kontrak->id,
            'mitra_id' => 'required|exists:mitras,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'nilai_kontrak' => 'nullable|numeric',
            'status' => 'nullable|string',
            'terms' => 'nullable|string',
        ]);

        $kontrak->update($data);

        return redirect()->route('manajer.master.kontrak.index')->with('success','Kontrak diperbarui.');
    }

    public function destroy(Kontrak $kontrak)
    {
        $kontrak->delete();
        return redirect()->route('manajer.master.kontrak.index')->with('success','Kontrak dihapus.');
    }
}
