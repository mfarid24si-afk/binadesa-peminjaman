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

        {{-- ── Status Widgets ── --}}
        <div class="mdc-layout-grid" style="padding:0 0 20px;">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
              <a href="{{ route('peminjaman', ['status' => 'pending']) }}" style="text-decoration:none;display:block;">
                <div class="mdc-card stat-card-clickable" style="display:flex;align-items:center;gap:14px;padding:16px 20px;border-left:4px solid #f39c12;">
                  <div style="width:40px;height:40px;border-radius:50%;background:#fff8e1;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="material-icons" style="color:#f39c12;font-size:20px;">hourglass_empty</i>
                  </div>
                  <div>
                    <div style="font-size:22px;font-weight:700;color:var(--text-primary);">{{ $peminjamanPending ?? 0 }}</div>
                    <div style="font-size:12px;color:var(--text-secondary);">Menunggu Persetujuan</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
              <a href="{{ route('peminjaman') }}" style="text-decoration:none;display:block;">
                <div class="mdc-card stat-card-clickable" style="display:flex;align-items:center;gap:14px;padding:16px 20px;border-left:4px solid #4caf50;">
                  <div style="width:40px;height:40px;border-radius:50%;background:#e8f5e9;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="material-icons" style="color:#4caf50;font-size:20px;">check_circle</i>
                  </div>
                  <div>
                    <div style="font-size:22px;font-weight:700;color:var(--text-primary);">{{ $peminjamanAktif ?? 0 }}</div>
                    <div style="font-size:12px;color:var(--text-secondary);">Peminjaman Aktif</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
              <a href="{{ route('peminjaman') }}" style="text-decoration:none;display:block;">
                <div class="mdc-card stat-card-clickable" style="display:flex;align-items:center;gap:14px;padding:16px 20px;border-left:4px solid #e74c3c;">
                  <div style="width:40px;height:40px;border-radius:50%;background:#ffebee;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <i class="material-icons" style="color:#e74c3c;font-size:20px;">event_busy</i>
                  </div>
                  <div>
                    <div style="font-size:22px;font-weight:700;color:var(--text-primary);">{{ $jatuhTempoHariIni ?? 0 }}</div>
                    <div style="font-size:12px;color:var(--text-secondary);">Jatuh Tempo Hari Ini</div>
                  </div>
                </div>
              </a>
            </div>
          </div>
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
