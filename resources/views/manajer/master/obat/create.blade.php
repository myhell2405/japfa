<x-layouts.app title="Tambah Obat / Vitamin / Vaksin">
  <a href="{{ route('manajer.master.obat.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.obat.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>Nama</label><input name="nama" class="w-full border p-2" required value="{{ old('nama') }}"/></div>
      <div><label>Kategori</label><input name="kategori" class="w-full border p-2" value="{{ old('kategori') }}"/></div>
      <div><label>Supplier</label><select name="supplier_id" class="w-full border p-2"><option value="">- Pilih -</option>@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->name }}</option>@endforeach</select></div>
      <div><label>Dosis</label><input name="dosis" class="w-full border p-2" value="{{ old('dosis') }}"/></div>
      <div><label>Satuan</label><input name="satuan" class="w-full border p-2" value="{{ old('satuan') }}"/></div>
      <div><label>Harga</label><input name="harga" class="w-full border p-2" value="{{ old('harga') }}"/></div>
      <div><label>Safety Stock</label><input name="safety_stock" type="number" class="w-full border p-2" value="{{ old('safety_stock') }}"/></div>
      <div><label>Notes</label><textarea name="notes" class="w-full border p-2">{{ old('notes') }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>