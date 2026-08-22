<x-layouts.app title="Kategori Mortalitas">
  <div class="mb-4"><a href="{{ route('manajer.master.kategori-mortalitas.create') }}" class="px-3 py-2 bg-green-500 text-white rounded">Tambah Kategori</a></div>
  @if(session('success'))<div class="mb-4 p-3 bg-green-100 text-green-800">{{ session('success') }}</div>@endif
  <table class="w-full bg-white"><thead class="bg-gray-50"><tr><th class="p-2">Kode</th><th class="p-2">Nama</th><th class="p-2">Aktif</th><th class="p-2">Aksi</th></tr></thead><tbody>
    @foreach($items as $i)
      <tr class="border-t"><td class="p-2">{{ $i->kode }}</td><td class="p-2">{{ $i->nama }}</td><td class="p-2">{{ $i->aktif ? 'Ya' : 'Tidak' }}</td><td class="p-2"><a href="{{ route('manajer.master.kategori-mortalitas.edit',$i) }}" class="px-2 py-1 bg-yellow-200 rounded">Edit</a>
      <form action="{{ route('manajer.master.kategori-mortalitas.destroy',$i) }}" method="POST" class="inline-block">@csrf @method('DELETE')<button class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button></form></td></tr>
    @endforeach
  </tbody></table>
  <div class="mt-4">{{ $items->links() }}</div>
</x-layouts.app>