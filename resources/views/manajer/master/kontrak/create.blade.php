<x-layouts.app title="Tambah Kontrak">
  <a href="{{ route('manajer.master.kontrak.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.master.kontrak.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>No Kontrak</label><input name="kontrak_number" class="w-full border p-2" required value="{{ old('kontrak_number') }}"/></div>
      <div><label>Mitra</label><select name="mitra_id" class="w-full border p-2">@foreach($mitras as $m)<option value="{{ $m->id }}">{{ $m->name }}</option>@endforeach</select></div>
      <div class="flex gap-3"><div class="flex-1"><label>Start Date</label><input type="date" name="start_date" value="{{ old('start_date') }}" class="w-full border p-2"/></div><div class="flex-1"><label>End Date</label><input type="date" name="end_date" value="{{ old('end_date') }}" class="w-full border p-2"/></div></div>
      <div><label>Nilai</label><input name="nilai_kontrak" class="w-full border p-2" value="{{ old('nilai_kontrak') }}"/></div>
      <div><label>Terms</label><textarea name="terms" class="w-full border p-2">{{ old('terms') }}</textarea></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>