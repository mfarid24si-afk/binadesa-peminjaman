<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log Aktivitas</title>
  @include('layouts.admin.css')
</head>
<body>
<script src="{{ asset('assets/js/preloader.js') }}"></script>
<div class="body-wrapper">
  @include('layouts.admin.sidebar')
  @include('layouts.admin.header')
  <div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
      @include('layouts.admin.partials.page-heading', [
        'icon' => 'history',
        'title' => 'Log Aktivitas',
        'breadcrumb' => 'Lainnya › Log Aktivitas',
      ])

      @if(session('success'))
        <div class="alert alert-success" style="margin-bottom:16px;">
          <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
          {{ session('success') }}
        </div>
      @endif

      <div class="mdc-card table-card">
        <div class="table-header">
          <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">history</i> Riwayat Aktivitas</h6>
        </div>

        <form method="GET" action="{{ route('log.index') }}">
          <div class="filter-bar">
            <select name="status" class="form-select" style="max-width:160px;" onchange="this.form.submit()">
              <option value="">Semua Status</option>
              <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending</option>
              <option value="disetujui" {{ request('status')=='disetujui' ? 'selected' : '' }}>Disetujui</option>
              <option value="ditolak" {{ request('status')=='ditolak' ? 'selected' : '' }}>Ditolak</option>
              <option value="selesai" {{ request('status')=='selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <input type="date" name="dari" class="form-control" style="max-width:160px;" value="{{ request('dari') }}" placeholder="Dari tgl">
            <input type="date" name="sampai" class="form-control" style="max-width:160px;" value="{{ request('sampai') }}" placeholder="Sampai tgl">
            <button type="submit" class="btn-search"><i class="material-icons" style="font-size:16px;">search</i> Filter</button>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Waktu</th>
                <th>Peminjaman</th>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Oleh</th>
              </tr>
            </thead>
            <tbody>
              @forelse($logs as $log)
                <tr>
                  <td style="color:var(--text-secondary);font-size:12px;">{{ $log->log_id }}</td>
                  <td style="white-space:nowrap;font-size:12px;">{{ $log->created_at->format('d M H:i') }}</td>
                  <td>
                    <strong>#{{ $log->peminjaman->pinjam_id ?? '—' }}</strong>
                    <small style="display:block;color:var(--text-secondary);">
                      {{ $log->peminjaman->fasilitas->nama ?? '—' }}
                    </small>
                  </td>
                  <td>
                    @php
                      $sc = match($log->status) {
                        'pending' => 'badge-pending', 'disetujui' => 'badge-distujui',
                        'ditolak' => 'badge-ditolak', 'selesai' => 'badge-selesai',
                        default => '',
                      };
                    @endphp
                    <span class="badge-status {{ $sc }}">{{ ucfirst($log->status) }}</span>
                  </td>
                  <td style="max-width:200px;">{{ $log->keterangan }}</td>
                  <td>{{ $log->creator->name ?? 'Sistem' }}</td>
                </tr>
              @empty
                <tr><td colspan="6">@include('layouts.admin.partials.empty-state', ['label' => 'log aktivitas'])</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
          {{ $logs->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </main>
    @include('layouts.admin.footer')
  </div>
</div>
@include('layouts.admin.js')
</body>
</html>
