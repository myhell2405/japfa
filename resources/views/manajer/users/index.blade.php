<x-layouts.app title="Kelola Pengguna">
  <div class="mb-4"><a href="{{ route('manajer.users.create') }}" class="px-3 py-2 bg-green-500 text-white rounded">Tambah Pengguna</a></div>
  @if(session('success'))<div class="mb-4 p-3 bg-green-100 text-green-800">{{ session('success') }}</div>@endif
  <table class="w-full bg-white"><thead class="bg-gray-50"><tr><th class="p-2">Nama</th><th class="p-2">Email</th><th class="p-2">Role</th><th class="p-2">Aksi</th></tr></thead><tbody>
    @foreach($users as $u)
      <tr class="border-t"><td class="p-2">{{ $u->name }}</td><td class="p-2">{{ $u->email }}</td><td class="p-2">{{ $u->role }}</td><td class="p-2"><a href="{{ route('manajer.users.edit',$u) }}" class="px-2 py-1 bg-yellow-200 rounded">Edit</a>
      <form action="{{ route('manajer.users.destroy',$u) }}" method="POST" class="inline-block">@csrf @method('DELETE')<button class="px-2 py-1 bg-red-500 text-white rounded">Hapus</button></form></td></tr>
    @endforeach
  </tbody></table>
  <div class="mt-4">{{ $users->links() }}</div>
</x-layouts.app>