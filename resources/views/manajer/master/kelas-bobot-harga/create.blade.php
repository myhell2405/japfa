<x-layouts.app title="Tambah Kelas Bobot & Harga">
  <a href="{{ route('manajer.master.kelas-bobot-harga.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.kelas-bobot-harga.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>Nama</label><input name="nama" class="w-full border p-2" required value="{{ old('nama') }}"/></div>
      <div class="flex gap-3"><div class="flex-1"><label>Bobot Min</label><input name="bobot_min" class="w-full border p-2" value="{{ old('bobot_min') }}"/></div><div class="flex-1"><label>Bobot Max</label><input name="bobot_max" class="w-full border p-2" value="{{ old('bobot_max') }}"/></div></div>
      <div><label>Harga/kg</label><input name="harga_per_kg" class="w-full border p-2" value="{{ old('harga_per_kg') }}"/></div>
      <div><label>Currency</label><input name="currency" class="w-full border p-2" value="{{ old('currency','IDR') }}"/></div>
      <div><label>Notes</label><textarea name="notes" class="w-full border p-2">{{ old('notes') }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>