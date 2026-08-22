<x-layouts.app title="Edit Mitra">
  <div class="mb-4">
    <a href="{{ route('manajer.master.mitra.index') }}" class="px-3 py-2 bg-gray-200 rounded">Kembali</a>
  </div>

  @if($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-800">
      <ul>
        @foreach($errors->all() as $e)
          <li>{{ $e }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('manajer.master.mitra.update', $mitra) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="space-y-3">
      <div>
        <label class="block text-sm">Nama</label>
        <input name="name" value="{{ old('name', $mitra->name) }}" class="w-full border p-2 rounded" required />
      </div>
      <div>
        <label class="block text-sm">Kode</label>
        <input name="code" value="{{ old('code', $mitra->code) }}" class="w-full border p-2 rounded" />
      </div>
      <div>
        <label class="block text-sm">Alamat</label>
        <textarea name="address" class="w-full border p-2 rounded">{{ old('address', $mitra->address) }}</textarea>
      </div>
      <div class="flex gap-3">
        <div class="flex-1">
          <label class="block text-sm">Contact Person</label>
          <input name="contact_person" value="{{ old('contact_person', $mitra->contact_person) }}" class="w-full border p-2 rounded" />
        </div>
        <div class="w-48">
          <label class="block text-sm">Phone</label>
          <input name="phone" value="{{ old('phone', $mitra->phone) }}" class="w-full border p-2 rounded" />
        </div>
      </div>

      <div>
        <label class="block text-sm">Email</label>
        <input name="email" value="{{ old('email', $mitra->email) }}" class="w-full border p-2 rounded" />
      </div>

      <div>
        <label class="block text-sm">Notes</label>
        <textarea name="notes" class="w-full border p-2 rounded">{{ old('notes', $mitra->notes) }}</textarea>
      </div>

      <div>
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
      </div>
    </div>
  </form>
</x-layouts.app>