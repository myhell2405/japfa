<x-layouts.app title="Kandang">
  <div class="mb-4">
    <a href="{{ route('manajer.master.kandang.create') }}" class="px-3 py-2 bg-green-500 text-white rounded">Tambah Kandang</a>
  </div>

  @if(session('success'))<div class="mb-4 p-3 bg-green-100 text-green-800">{{ session('success') }}</div>@endif

  <table class="w-full bg-white rounded shadow-sm">
    <thead class="bg-gray-50"><tr><th class="p-2">Kode</th><th class="p-2">Nama</th><th class="p-2">Kapasitas</th><th class="p-2">Aksi</th></tr></thead>
    <tbody>
      @foreach($kandangs as $k)
        <tr class="border-t"><td class="p-2">{{ $k->code }}</td><td class="p-2">{{ $k->name }}</td><td class="p-2">{{ $k->kapasitas }}</td><td class="p-2"><a href="{{ route('manajer.master.kandang.edit', $k) }}" class="px-2 py-1 bg-yellow-200 rounded">Edit</a>
        <form action="{{ route('manajer.master.kandang.destroy',$k) }}" method="POST" class="inline-block">@csrf @method('DELETE')<button class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button></form></td></tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">{{ $kandangs->links() }}</div>
</x-layouts.app>