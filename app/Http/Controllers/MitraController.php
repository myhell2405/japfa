<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitras = Mitra::orderBy('name')->paginate(15);
        return view('manajer.master.mitra.index', compact('mitras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manajer.master.mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:mitras,name',
            'code' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        Mitra::create($data);

        return redirect()->route('manajer.master.mitra.index')->with('success', 'Mitra berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mitra $mitra)
    {
        return view('manajer.master.mitra.show', compact('mitra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mitra $mitra)
    {
        return view('manajer.master.mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mitra $mitra)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:mitras,name,' . $mitra->id,
            'code' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'contact_person' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
        ]);

        $mitra->update($data);

        return redirect()->route('manajer.master.mitra.index')->with('success', 'Mitra berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mitra $mitra)
    {
        $mitra->delete();
        return redirect()->route('manajer.master.mitra.index')->with('success', 'Mitra dihapus.');
    }
}
