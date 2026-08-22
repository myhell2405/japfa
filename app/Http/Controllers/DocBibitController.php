<?php

namespace App\Http\Controllers;

use App\Models\DocBibit;
use Illuminate\Http\Request;

class DocBibitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = DocBibit::orderBy('tanggal_terima','desc')->paginate(15);
        return view('manajer.master.doc-bibit.index', ['items' => $items]);
    }

    public function create()
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.doc-bibit.create', compact('mitras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'supplier_id' => 'nullable|exists:mitras,id',
            'batch_number' => 'nullable|string|max:255',
            'tanggal_terima' => 'nullable|date',
            'jumlah' => 'nullable|integer',
            'umur_hari' => 'nullable|integer',
            'harga_satuan' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        DocBibit::create($data);

        return redirect()->route('manajer.master.doc-bibit.index')->with('success','DOC/Bibit dibuat.');
    }

    public function show(DocBibit $docBibit)
    {
        return view('manajer.master.doc-bibit.show', compact('docBibit'));
    }

    public function edit(DocBibit $docBibit)
    {
        $mitras = \App\Models\Mitra::orderBy('name')->get();
        return view('manajer.master.doc-bibit.edit', compact('docBibit','mitras'));
    }

    public function update(Request $request, DocBibit $docBibit)
    {
        $data = $request->validate([
            'kode' => 'nullable|string|max:100',
            'nama' => 'required|string|max:255',
            'supplier_id' => 'nullable|exists:mitras,id',
            'batch_number' => 'nullable|string|max:255',
            'tanggal_terima' => 'nullable|date',
            'jumlah' => 'nullable|integer',
            'umur_hari' => 'nullable|integer',
            'harga_satuan' => 'nullable|numeric',
            'notes' => 'nullable|string',
        ]);

        $docBibit->update($data);

        return redirect()->route('manajer.master.doc-bibit.index')->with('success','DOC/Bibit diperbarui.');
    }

    public function destroy(DocBibit $docBibit)
    {
        $docBibit->delete();
        return redirect()->route('manajer.master.doc-bibit.index')->with('success','DOC/Bibit dihapus.');
    }
}
