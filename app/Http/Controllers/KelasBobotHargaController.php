<?php

namespace App\Http\Controllers;

use App\Models\KelasBobotHarga;
use Illuminate\Http\Request;

class KelasBobotHargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = KelasBobotHarga::orderBy('nama')->paginate(15);
        return view('manajer.master.kelas-bobot-harga.index', ['items' => $items]);
    }

    public function create()
    {
        return view('manajer.master.kelas-bobot-harga.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'bobot_min' => 'nullable|numeric',
            'bobot_max' => 'nullable|numeric',
            'harga_per_kg' => 'nullable|numeric',
            'currency' => 'nullable|string|max:10',
            'aktif' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        KelasBobotHarga::create($data);

        return redirect()->route('manajer.master.kelas-bobot-harga.index')->with('success','Kelas Bobot dibuat.');
    }

    public function show(KelasBobotHarga $kelasBobotHarga)
    {
        return view('manajer.master.kelas-bobot-harga.show', compact('kelasBobotHarga'));
    }

    public function edit(KelasBobotHarga $kelasBobotHarga)
    {
        return view('manajer.master.kelas-bobot-harga.edit', compact('kelasBobotHarga'));
    }

    public function update(Request $request, KelasBobotHarga $kelasBobotHarga)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'bobot_min' => 'nullable|numeric',
            'bobot_max' => 'nullable|numeric',
            'harga_per_kg' => 'nullable|numeric',
            'currency' => 'nullable|string|max:10',
            'aktif' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        $kelasBobotHarga->update($data);

        return redirect()->route('manajer.master.kelas-bobot-harga.index')->with('success','Kelas Bobot diperbarui.');
    }

    public function destroy(KelasBobotHarga $kelasBobotHarga)
    {
        $kelasBobotHarga->delete();
        return redirect()->route('manajer.master.kelas-bobot-harga.index')->with('success','Kelas Bobot dihapus.');
    }
}
