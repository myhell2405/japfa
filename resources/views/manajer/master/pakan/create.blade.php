<x-layouts.app title="Tambah Pakan">
  <a href="{{ route('manajer.master.pakan.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.pakan.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>Nama</label><input name="nama" class="w-full border p-2" required value="{{ old('nama') }}"/></div>
      <div><label>Type</label><input name="type" class="w-full border p-2" value="{{ old('type') }}"/></div>
      <div><label>Supplier</label><select name="supplier_id" class="w-full border p-2"><option value="">- Pilih -</option>@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->name }}</option>@endforeach</select></div>
      <div><label>Price per unit</label><input name="price_per_unit" class="w-full border p-2" value="{{ old('price_per_unit') }}"/></div>
      <div><label>Unit</label><input name="unit" class="w-full border p-2" value="{{ old('unit','kg') }}"/></div>
      <div><label>Stok Minimal</label><input name="stok_minimal" type="number" class="w-full border p-2" value="{{ old('stok_minimal') }}"/></div>
      <div><label>Notes</label><textarea name="notes" class="w-full border p-2">{{ old('notes') }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>