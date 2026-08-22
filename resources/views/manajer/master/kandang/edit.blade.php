<x-layouts.app title="Edit Kandang">
  <a href="{{ route('manajer.master.kandang.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.kandang.update', $kandang) }}" method="POST">@csrf @method('PUT')
    <div class="space-y-3">
      <div><label>Kode</label><input name="code" class="w-full border p-2" required value="{{ old('code', $kandang->code) }}"/></div>
      <div><label>Nama</label><input name="name" class="w-full border p-2" value="{{ old('name', $kandang->name) }}"/></div>
      <div><label>Lokasi</label><input name="lokasi" class="w-full border p-2" value="{{ old('lokasi', $kandang->lokasi) }}"/></div>
      <div><label>Kapasitas</label><input name="kapasitas" type="number" class="w-full border p-2" value="{{ old('kapasitas', $kandang->kapasitas) }}"/></div>
      <div><label>Tipe</label><input name="tipe" class="w-full border p-2" value="{{ old('tipe', $kandang->tipe) }}"/></div>
      <div><label>Notes</label><textarea name="notes" class="w-full border p-2">{{ old('notes', $kandang->notes) }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>