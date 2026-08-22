<x-layouts.app title="Edit Pengguna">
  <a href="{{ route('manajer.users.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  @if($errors->any())<div class="mb-4 p-3 bg-red-100 text-red-800"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('manajer.users.update',$user) }}" method="POST">@csrf @method('PUT')
    <div class="space-y-3">
      <div><label>Nama</label><input name="name" class="w-full border p-2" required value="{{ old('name',$user->name) }}"/></div>
      <div><label>Email</label><input name="email" type="email" class="w-full border p-2" required value="{{ old('email',$user->email) }}"/></div>
      <div><label>Password (kosongkan jika tidak diubah)</label><input name="password" type="password" class="w-full border p-2"/></div>
      <div><label>Confirm Password</label><input name="password_confirmation" type="password" class="w-full border p-2"/></div>
      <div><label>Role</label><input name="role" class="w-full border p-2" value="{{ old('role',$user->role) }}"/></div>
      <div><label>Phone</label><input name="phone" class="w-full border p-2" value="{{ old('phone',$user->phone) }}"/></div>
      <div><button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button></div>
    </div>
  </form>
</x-layouts.app>