<x-layouts.app title="Tambah DOC / Bibit">
  <a href="{{ route('manajer.master.doc-bibit.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.doc-bibit.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>Kode</label><input name="kode" class="w-full border p-2" value="{{ old('kode') }}"/></div>
      <div><label>Nama</label><input name="nama" class="w-full border p-2" required value="{{ old('nama') }}"/></div>
      <div><label>Supplier</label><select name="supplier_id" class="w-full border p-2"><option value="">- Pilih -</option>@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->name }}</option>@endforeach</select></div>
      <div><label>Batch Number</label><input name="batch_number" class="w-full border p-2" value="{{ old('batch_number') }}"/></div>
      <div class="flex gap-3"><div class="flex-1"><label>Tanggal Terima</label><input type="date" name="tanggal_terima" class="w-full border p-2" value="{{ old('tanggal_terima') }}"/></div><div class="flex-1"><label>Jumlah</label><input type="number" name="jumlah" class="w-full border p-2" value="{{ old('jumlah') }}"/></div></div>
      <div><label>Harga Satuan</label><input name="harga_satuan" class="w-full border p-2" value="{{ old('harga_satuan') }}"/></div>
      <div><label>Notes</label><textarea name="notes" class="w-full border p-2">{{ old('notes') }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>