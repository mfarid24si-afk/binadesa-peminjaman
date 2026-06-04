<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard — Binadesa Peminjaman</title>
  @include('layouts.admin.css')
</head>

<body>
  <script src="{{ asset('assets/js/preloader.js') }}"></script>

  {{-- Pass real chart data to JS via a hidden script block --}}
     <script>
    window.DASHBOARD_DATA = {
      perBulan: {!! json_encode($chartPerBulan ?? array_fill(0, 12, 0)) !!},
      status: {!! json_encode($chartStatus ?? ['pending'=>0, 'distujui'=>0, 'ditolak'=>0, 'selesai'=>0]) !!}
    };
  </script>

  <div class="body-wrapper">
    @include('layouts.admin.sidebar')

    @include('layouts.admin.header')

    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">

        {{-- ── Welcome Banner ── --}}
        <div class="welcome-banner mdc-card" style="margin-bottom:24px;">
          <h2>Selamat Datang, {{ Auth::user()->name }} 👋</h2>
          <p>Sistem Informasi Peminjaman Fasilitas Desa &mdash; pantau aktivitas dan kelola data dengan mudah.</p>
        </div>

        {{-- ── Stats Row ── --}}
        @include('layouts.admin.partials.dashboard-stats')

        {{-- ── Charts + Activity Row ── --}}
        @include('layouts.admin.partials.dashboard-charts')

        {{-- ── Recent Activity ── --}}
        @include('layouts.admin.partials.dashboard-activity')

      </main>

      @include('layouts.admin.footer')
    </div>

  </div>

  @include('layouts.admin.js')
</body>
</html>
