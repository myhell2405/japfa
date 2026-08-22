<x-layouts.app title="Tambah Pengguna">
  <a href="{{ route('manajer.users.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.users.store') }}" method="POST">@csrf
    <div class="space-y-3">
      <div><label>Nama</label><input name="name" class="w-full border p-2" required value="{{ old('name') }}"/></div>
      <div><label>Email</label><input name="email" type="email" class="w-full border p-2" required value="{{ old('email') }}"/></div>
      <div><label>Password</label><input name="password" type="password" class="w-full border p-2" required/></div>
      <div><label>Confirm Password</label><input name="password_confirmation" type="password" class="w-full border p-2" required/></div>
      <div><label>Role</label><input name="role" class="w-full border p-2" value="{{ old('role','manajer') }}"/></div>
      <div><label>Phone</label><input name="phone" class="w-full border p-2" value="{{ old('phone') }}"/></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>