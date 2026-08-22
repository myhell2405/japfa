@php $title = 'Dashboard Manajer'; @endphp
<x-layouts.app :title="$title">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Total Kandang</div>
      <div class="text-2xl font-bold mt-2">12</div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Total Ayam</div>
      <div class="text-2xl font-bold mt-2">3,420</div>
    </div>
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <div class="text-sm text-gray-500">Laporan Hari Ini</div>
      <div class="text-2xl font-bold mt-2">8</div>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <section class="lg:col-span-2 bg-white rounded-lg p-6 shadow-sm border border-gray-100">
      <h3 class="font-semibold mb-4">Monitoring Harian (Ringkasan)</h3>
      <div class="h-64 bg-gray-50 rounded flex items-center justify-center text-gray-400">Grafik placeholder</div>
    </section>

    <aside class="bg-white rounded-lg p-6 shadow-sm border border-gray-100">
      <h3 class="font-semibold mb-4">Aktivitas Terbaru</h3>
      <ul class="space-y-3 text-sm text-gray-600">
        <li>Operator1 - Laporan 10:24</li>
        <li>Operator3 - Laporan 09:10</li>
        <li>Manajer - Perubahan data master</li>
      </ul>
    </aside>
  </div>

  <div class="mt-6">
    <h3 class="font-semibold mb-3">Ringkasan Panen & Keuntungan</h3>
    <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-100">
      <table class="w-full text-sm">
        <thead>
          <tr class="text-left text-gray-500">
            <th class="py-2">Periode</th>
            <th class="py-2">Panen (kg)</th>
            <th class="py-2">Pendapatan</th>
            <th class="py-2">Laba</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="py-2">2026-08</td>
            <td class="py-2">3,200</td>
            <td class="py-2">Rp 120.000.000</td>
            <td class="py-2">Rp 30.000.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</x-layouts.app>