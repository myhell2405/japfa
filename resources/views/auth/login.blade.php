<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login - Monitoring Kandang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root{ --chick-yellow: #F5C518; --bg-overlay: rgba(0,0,0,0.28); }
    html,body,#app{height:100%;}
    body{margin:0;font-family:Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;background-color:#f8fafc}

    .bg-frame{position:fixed;inset:0;background-image: url('/assets/login-bg.png');background-size:cover;background-position:center;z-index:0}
    .bg-frame::before{content: '';position:absolute;inset:0;background: var(--bg-overlay);backdrop-filter: blur(6px);-webkit-backdrop-filter: blur(6px);}    

    /* Minimalis tapi megah: putih bersih + aksen kuning */
    .glass{
      position: relative;
      background: #ffffff;
      border-radius: 12px;
      border: 2px solid rgba(245,197,24,0.96); /* chick yellow border */
      box-shadow: 0 18px 50px rgba(2,6,23,0.18), 0 2px 6px rgba(0,0,0,0.04);
      padding: 1.5rem;
    }

    /* subtle inner divider line to give depth */
    .glass::after{
      content: '';
      position: absolute;
      left: calc(50% - 210px);
      right: calc(50% - 210px);
      top: 0;
      height: 1px;
      background: rgba(0,0,0,0.03);
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      pointer-events: none;
    }

    /* card width handling (keep same responsive breakpoints) */
    @media (min-width: 768px){.card-w{width:420px}}@media (max-width: 767px){.card-w{width:92%}}

    /* Ensure inputs and text contrast on white background */
    input, label, .info-small{font-family:inherit}
  </style>
</head>
<body>
  <div id="app">
    <div class="bg-frame" aria-hidden="true"></div>

    <main class="min-h-screen flex items-center justify-center relative z-10 px-4">
      <div class="glass rounded-xl p-6 md:p-10 card-w">
        <div class="flex items-center gap-4 mb-6">
          <div class="w-12 h-12 flex items-center justify-center rounded-full" style="background:var(--chick-yellow);">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" class="w-8 h-8 text-white" fill="none">
              <g fill="currentColor">
                <path d="M24 20c-3 0-6 2-7 5-3 0-6 3-6 6 0 4 3 6 6 6h19c5 0 9-4 9-9 0-2-1-4-2-6 0-3-3-6-6-6-1-3-4-5-7-5-3 0-6 2-7 5-1-1-2-1-3-1z" opacity="0.95"/>
                <path d="M46 36c0 6-5 11-11 11H17c-1 0-3 1-3 2s2 3 3 3h18c10 0 19-9 19-19 0-1-1-2-2-2z" opacity="0.9"/>
              </g>
            </svg>
          </div>
          <div>
            <h1 class="text-gray-900 text-xl font-semibold">PRATAMA BROILER</h1>
            <p class="text-gray-600 text-sm">Login untuk mengelola atau melaporkan operasional kandang</p>
          </div>
        </div>

        @if($errors->any())
          <div class="mb-4 text-red-600">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.attempt') }}" class="space-y-4">
          @csrf
          <div>
            <label class="block text-gray-700 text-sm mb-2" for="username">Username</label>
            <input id="username" name="username" required value="{{ old('username') }}" class="w-full px-4 py-2 rounded-md bg-gray-50 text-gray-900 placeholder-gray-500 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-300" placeholder="masukkan username" />
          </div>

          <div>
            <label class="block text-gray-700 text-sm mb-2" for="password">Password</label>
            <div class="relative">
              <!-- Make input height consistent and reserve space for the icon -->
              <input id="password" name="password" type="password" required class="w-full pr-14 px-4 h-12 rounded-md bg-gray-50 text-gray-900 placeholder-gray-500 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-yellow-300" placeholder="masukkan password" />

              <!-- Centered square button matching input height; positioned relative to input container -->
              <button type="button" id="togglePassword" aria-label="Tampilkan password" class="absolute inset-y-0 right-3 flex items-center justify-center h-10 w-10 text-gray-600 bg-transparent border-0 rounded focus:outline-none">
                <!-- eye open (balanced geometry) -->
                <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z" />
                  <circle cx="12" cy="12" r="3" />
                </svg>

                <!-- eye closed (balanced geometry) - hidden by default -->
                <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M17.94 17.94A10.07 10.07 0 0112 19c-4.97 0-9.11-3.3-10.36-7.5a10.06 10.06 0 012.12-3.29" />
                  <path d="M1 1l22 22" />
                </svg>
              </button>
            </div>
          </div>

          <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">&nbsp;</div>
            <button type="submit" class="px-4 py-2 rounded-md font-semibold shadow-md" style="background:var(--chick-yellow); color:#111827;">Masuk</button>
          </div>
        </form>

      </div>
    </main>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const pwd = document.getElementById('password');
      const toggle = document.getElementById('togglePassword');
      const eyeOpen = document.getElementById('eyeOpen');
      const eyeClosed = document.getElementById('eyeClosed');

      if (!pwd || !toggle) return;

      toggle.addEventListener('click', function () {
        const isPassword = pwd.type === 'password';
        pwd.type = isPassword ? 'text' : 'password';
        // swap icons
        if (isPassword) {
          eyeOpen.classList.add('hidden');
          eyeClosed.classList.remove('hidden');
          toggle.setAttribute('aria-label', 'Sembunyikan password');
        } else {
          eyeOpen.classList.remove('hidden');
          eyeClosed.classList.add('hidden');
          toggle.setAttribute('aria-label', 'Tampilkan password');
        }
      });

      // optional: toggle on Enter when toggle has focus
      toggle.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          toggle.click();
        }
      });
    });
  </script>
</body>
</html>