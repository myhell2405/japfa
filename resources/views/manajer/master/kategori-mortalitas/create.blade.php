<x-layouts.app title="Tambah Kategori Mortalitas">
  <a href="{{ route('manajer.master.kategori-mortalitas.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.kategori-mortalitas.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>Kode</label><input name="kode" class="w-full border p-2" value="{{ old('kode') }}"/></div>
      <div><label>Nama</label><input name="nama" class="w-full border p-2" required value="{{ old('nama') }}"/></div>
      <div><label>Aktif</label><select name="aktif" class="w-full border p-2"><option value="1">Ya</option><option value="0">Tidak</option></select></div>
      <div><label>Notes</label><textarea name="notes" class="w-full border p-2">{{ old('notes') }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>