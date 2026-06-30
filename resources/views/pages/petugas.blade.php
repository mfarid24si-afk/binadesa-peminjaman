<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Petugas' }}</title>
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
          'icon'       => 'badge',
          'title'      => 'Data Petugas',
          'breadcrumb' => 'Kelola Data › Petugas',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        <div class="mdc-card table-card">
          <div class="table-header">
            <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">supervisor_account</i>Daftar Petugas Fasilitas</h6>
          </div>

          <form method="GET" action="{{ route('petugas') }}">
            <div class="filter-bar">
              <select name="peran" class="form-select" style="max-width:200px;" onchange="this.form.submit()">
                <option value="">Semua Peran</option>
                @foreach(['Penanggung Jawab','Operator','Petugas Kebersihan','Pengelola','Koordinator'] as $p)
                  <option value="{{ $p }}" {{ request('peran')==$p ? 'selected':'' }}>{{ $p }}</option>
                @endforeach
              </select>
              <div class="d-flex" style="gap:6px;flex:1;max-width:320px;">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari peran…">
                <button type="submit" class="btn-search">
                  <i class="material-icons" style="font-size:16px;">search</i>
                  <span class="d-none d-md-inline">Cari</span>
                </button>
              </div>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr><th>#</th><th>Fasilitas</th><th>Petugas (Warga)</th><th>Peran</th><th>Aksi</th></tr>
              </thead>
              <tbody>
                @forelse($petugas as $item)
                  <tr>
                    <td style="color:var(--text-secondary);font-size:12px;">{{ $item->petugas_id }}</td>
                    <td><strong>{{ $item->fasilitas->nama ?? '—' }}</strong></td>
                    <td>{{ $item->warga->nama ?? '—' }}</td>
                    <td><span class="badge-status badge-distujui">{{ $item->peran }}</span></td>
                    <td style="white-space:nowrap;">
                      @if(in_array(Auth::user()->role ?? '', ['super admin', 'admin']))
                      <a href="{{ route('petugas.edit', $item->petugas_id) }}" class="btn-action btn-action-edit">
                        <i class="material-icons" style="font-size:14px;">edit</i> Edit
                      </a>
                      @endif
                      @if(Auth::user()->role === 'super admin')
                      <form action="{{ route('petugas.destroy', $item->petugas_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data petugas ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-action-delete"><i class="material-icons" style="font-size:14px;">delete</i> Hapus</button>
                      </form>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="5">@include('layouts.admin.partials.empty-state', ['label'=>'petugas'])</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
            {{ $petugas->withQueryString()->links('pagination::bootstrap-5') }}
          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
