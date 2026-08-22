@php $title = 'Dashboard Operator'; @endphp
<x-layouts.app :title="$title">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Shift</div>
      <div class="text-2xl font-bold mt-2">Pagi</div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Status Kandang</div>
      <div class="text-2xl font-bold mt-2">Normal</div>
    </div>
  </div>

  <section class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
    <h3 class="font-semibold mb-4">Produksi Hari Ini</h3>
    <div class="h-48 bg-gray-50 rounded flex items-center justify-center text-gray-400">Data produksi placeholder</div>
  </section>

  <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
    <section class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
      <h3 class="font-semibold mb-4">Form Laporan Harian</h3>
      <form>
        <div class="mb-3">
          <label class="text-sm text-gray-600">Catatan</label>
          <textarea class="w-full mt-2 p-2 border rounded-md" rows="3"></textarea>
        </div>
        <button class="px-3 py-2 rounded" style="background:var(--chick-yellow); color:#111827;">Kirim Laporan</button>
      </form>
    </section>

    <section class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
      <h3 class="font-semibold mb-4">Panen Terjadwal</h3>
      <ul class="text-sm text-gray-600 space-y-2">
        <li>Blok A - 2026-08-15</li>
        <li>Blok C - 2026-08-20</li>
      </ul>
    </section>
  </div>
</x-layouts.app>