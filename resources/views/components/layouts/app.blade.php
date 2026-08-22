<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $title ?? 'Dashboard' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root{ --chick-yellow: #F5C518; }
  </style>
</head>
<body class="bg-gray-100 min-h-screen text-gray-800">
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-72 bg-white shadow-lg border-r border-gray-100 hidden md:block">
      <div class="p-6 border-b border-gray-100">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-md flex items-center justify-center" style="background:var(--chick-yellow);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-6 h-6 text-white" fill="none">
              <g fill="currentColor">
                <path d="M24 20c-3 0-6 2-7 5-3 0-6 3-6 6 0 4 3 6 6 6h19c5 0 9-4 9-9 0-2-1-4-2-6 0-3-3-6-6-6-1-3-4-5-7-5-3 0-6 2-7 5-1-1-2-1-3-1z"/>
              </g>
            </svg>
          </div>
          <div>
            <div class="text-lg font-semibold">PRATAMA BROILER</div>
            <div class="text-xs text-gray-500">{{ Auth::user()->role ?? 'user' }}</div>
          </div>
        </div>
      </div>

      <nav class="p-4">
        <ul class="space-y-1">
          @php
            $role = Auth::user()->role ?? 'operator';
            $menus = [];
            if($role === 'manajer'){
              $menus = [
                ['label'=>'Kelola Data Master','icon'=>'🏷️','href'=>'#master'],
                ['label'=>'Kelola Pengguna','icon'=>'👥','href'=>'/manajer/users'],
                ['label'=>'Produksi','icon'=>'⚙️','href'=>'#produksi'],
                ['label'=>'Monitoring Harian','icon'=>'📈','href'=>'#monitoring'],
                ['label'=>'Panen','icon'=>'🥚','href'=>'#panen'],
                ['label'=>'Keuntungan','icon'=>'💰','href'=>'#keuntungan'],
                ['label'=>'Laporan','icon'=>'📄','href'=>'#laporan'],
              ];
            } elseif($role === 'owner'){
              $menus = [
                ['label'=>'Monitoring Harian','icon'=>'📈','href'=>'#monitoring'],
                ['label'=>'Laporan','icon'=>'📄','href'=>'#laporan'],
              ];
            } else { // operator
              $menus = [
                ['label'=>'Produksi','icon'=>'⚙️','href'=>'#produksi'],
                ['label'=>'Laporan Harian','icon'=>'📝','href'=>'#laporan-harian'],
                ['label'=>'Panen','icon'=>'🥚','href'=>'#panen'],
              ];
            }
          @endphp

          @foreach($menus as $m)
            @if(isset($m['label']) && $m['label'] === 'Kelola Data Master')
              <li class="relative">
                <button type="button" class="submenu-toggle w-full flex items-center justify-between gap-3 px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-yellow-50 hover:text-gray-900">
                  <span class="flex items-center gap-3"><span class="w-6 text-center">{!! $m['icon'] !!}</span>{{ $m['label'] }}</span>
                  <span class="text-xs">▾</span>
                </button>

                <ul class="submenu hidden mt-2 space-y-1 pl-8">
                  <li><a href="/manajer/master/pt" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">PT / Mitra</a></li>
                  <li><a href="/manajer/master/kandang" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">Kandang</a></li>
                  <li><a href="/manajer/master/kontrak" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">Kontrak</a></li>
                  <li><a href="/manajer/master/kelas-bobot-harga" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">Kelas Bobot & Harga</a></li>
                  <li><a href="/manajer/master/doc-bibit" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">DOC / Bibit</a></li>
                  <li><a href="/manajer/master/pakan" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">Pakan</a></li>
                  <li><a href="/manajer/master/obat-vitamin-vaksin" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">Obat / Vitamin / Vaksin</a></li>
                  <li><a href="/manajer/master/kategori-mortalitas" class="block px-3 py-2 rounded-md text-sm text-gray-700 hover:bg-yellow-50">Kategori Mortalitas</a></li>
                </ul>
              </li>
            @elseif(isset($m['label']) && $m['label'] === 'Kelola Pengguna')
              <li>
                <a href="/manajer/users" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-yellow-50 hover:text-gray-900">
                  <span class="w-6 text-center">👥</span>
                  {{ $m['label'] }}
                </a>
              </li>
            @else
              <li>
                <a href="{{ $m['href'] }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-sm font-medium text-gray-800 hover:bg-yellow-50 hover:text-gray-900">
                  <span class="w-6 text-center">{!! $m['icon'] !!}</span>
                  {{ $m['label'] }}
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </nav>

      <div class="mt-auto p-4 border-t border-gray-100">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="w-full px-3 py-2 rounded-md text-sm font-medium bg-red-500 text-white">Logout</button>
        </form>
      </div>
    </aside>

    <!-- Mobile topbar -->
    <header class="md:hidden w-full bg-white shadow-sm border-b border-gray-100">
      <div class="flex items-center justify-between p-4">
        <div class="flex items-center gap-3">
          <button id="mobileMenuBtn" class="p-2 rounded-md" aria-label="Open menu">☰</button>
          <div class="text-lg font-semibold">PRATAMA BROILER</div>
        </div>
        <div>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="px-3 py-1 rounded bg-red-500 text-white text-sm">Logout</button>
          </form>
        </div>
      </div>
    </header>

    <!-- Main content -->
    <div class="flex-1 p-8">
      <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-semibold">{{ $title ?? 'Dashboard' }}</h2>
        <div class="text-sm text-gray-500">{{ Auth::user()->username ?? '' }}</div>
      </div>

      {{ $slot }}

    </div>
  </div>

  <script>
    // Mobile menu toggle
    document.getElementById('mobileMenuBtn')?.addEventListener('click', function(){
      const aside = document.getElementById('sidebar');
      if(!aside) return;
      aside.classList.toggle('hidden');
    });

    // Submenu toggle for Kelola Data Master (vanilla JS)
    document.querySelectorAll('.submenu-toggle').forEach(btn => {
      btn.addEventListener('click', function(){
        const submenu = btn.nextElementSibling;
        if(!submenu) return;
        submenu.classList.toggle('hidden');
      });
    });
  </script>
</body>
</html>