<x-layouts.app title="Kontrak">
  <div class="mb-4"><a href="{{ route('manajer.master.kontrak.create') }}" class="px-3 py-2 bg-green-500 text-white rounded">Tambah Kontrak</a></div>
  @if(session('success'))<div class="mb-4 p-3 bg-green-100 text-green-800">{{ session('success') }}</div>@endif
  <table class="w-full bg-white rounded shadow-sm"><thead class="bg-gray-50"><tr><th class="p-2">No</th><th class="p-2">Mitra</th><th class="p-2">Periode</th><th class="p-2">Aksi</th></tr></thead><tbody>
    @foreach($kontraks as $k)
      <tr class="border-t"><td class="p-2">{{ $k->kontrak_number }}</td><td class="p-2">{{ $k->mitra->name ?? '' }}</td><td class="p-2">{{ $k->start_date }} - {{ $k->end_date }}</td><td class="p-2"><a href="{{ route('manajer.master.kontrak.edit',$k) }}" class="px-2 py-1 bg-yellow-200 rounded">Edit</a>
      <form action="{{ route('manajer.master.kontrak.destroy',$k) }}" method="POST" class="inline-block">@csrf @method('DELETE')<button class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button></form></td></tr>
    @endforeach
  </tbody></table>
  <div class="mt-4">{{ $kontraks->links() }}</div>
</x-layouts.app>