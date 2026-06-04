<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Syarat' }}</title>
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
          'icon'       => 'description',
          'title'      => 'Data Syarat Fasilitas',
          'breadcrumb' => 'Kelola Data › Syarat',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        <div class="mdc-card table-card">
          <div class="table-header">
            <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">rule</i>Daftar Syarat Peminjaman</h6>
          </div>

          <form method="GET" action="{{ route('syarat') }}">
            <div class="filter-bar">
              <div class="d-flex" style="gap:6px;flex:1;max-width:320px;">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari nama syarat…">
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
                <tr><th>#</th><th>Fasilitas</th><th>Nama Syarat</th><th>Deskripsi</th><th>Aksi</th></tr>
              </thead>
              <tbody>
                @forelse($syarat as $item)
                  <tr>
                    <td style="color:var(--text-secondary);font-size:12px;">{{ $item->syarat_id }}</td>
                    <td><strong>{{ $item->fasilitas->nama ?? '—' }}</strong></td>
                    <td>{{ $item->nama_syarat }}</td>
                    <td style="color:var(--text-secondary);max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</td>
                    <td style="white-space:nowrap;">
                      <a href="{{ route('syarat.edit', $item->syarat_id) }}" class="btn-action btn-action-edit">
                        <i class="material-icons" style="font-size:14px;">edit</i> Edit
                      </a>
                      <form action="{{ route('syarat.destroy', $item->syarat_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus syarat ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-action-delete"><i class="material-icons" style="font-size:14px;">delete</i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="5">@include('layouts.admin.partials.empty-state', ['label'=>'syarat'])</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
            {{ $syarat->withQueryString()->links('pagination::bootstrap-5') }}
          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
