@php $title = 'Dashboard Owner'; @endphp
<x-layouts.app :title="$title">
  <div class="grid grid-cols-1 gap-6 mb-6">
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Kandang Aktif</div>
      <div class="text-2xl font-bold mt-2">8</div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Status Rata-rata</div>
      <div class="text-2xl font-bold mt-2 text-green-600">Stabil</div>
    </div>
  </div>

  <section class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
    <h3 class="font-semibold mb-4">Monitoring Harian</h3>
    <div class="h-64 bg-gray-50 rounded flex items-center justify-center text-gray-400">Grafik monitoring</div>
  </section>

  <div class="mt-6">
    <section class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
      <h3 class="font-semibold mb-4">Laporan Terbaru</h3>
      <ul class="space-y-3 text-sm text-gray-600">
        <li>Operator1 - Status normal</li>
        <li>Operator2 - Pemberian pakan 08:00</li>
      </ul>
    </section>
  </div>
</x-layouts.app>