<x-layouts.app title="PT / Mitra">
  <div class="mb-4">
    <a href="{{ route('manajer.master.mitra.create') }}" class="px-3 py-2 bg-green-500 text-white rounded">Tambah Mitra</a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-800">{{ session('success') }}</div>
  @endif

  <table class="w-full bg-white rounded shadow-sm">
    <thead class="bg-gray-50">
      <tr>
        <th class="p-2 text-left">Kode</th>
        <th class="p-2 text-left">Nama</th>
        <th class="p-2 text-left">Kontak</th>
        <th class="p-2 text-left">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($mitras as $mitra)
        <tr class="border-t">
          <td class="p-2">{{ $mitra->code }}</td>
          <td class="p-2">{{ $mitra->name }}</td>
          <td class="p-2">{{ $mitra->contact_person }} / {{ $mitra->phone }}</td>
          <td class="p-2">
            <a href="{{ route('manajer.master.mitra.edit', $mitra) }}" class="px-2 py-1 bg-yellow-200 rounded">Edit</a>
            <form action="{{ route('manajer.master.mitra.destroy', $mitra) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus mitra?')">
              @csrf
              @method('DELETE')
              <button class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {{ $mitras->links() }}
  </div>
</x-layouts.app>