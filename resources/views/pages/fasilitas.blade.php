<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Fasilitas' }}</title>
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
          'icon'       => 'home_work',
          'title'      => 'Data Fasilitas',
          'breadcrumb' => 'Kelola Data › Fasilitas',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        <div class="mdc-card table-card">
          <div class="table-header">
            <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">apartment</i>Daftar Fasilitas Desa</h6>
          </div>

          <form method="GET" action="{{ route('fasilitas') }}">
            <div class="filter-bar">
              <select name="jenis" class="form-select" style="max-width:180px;" onchange="this.form.submit()">
                <option value="">Semua Jenis</option>
                @foreach(['Bangunan','Lapangan','Ruangan','Pelayanan Umum'] as $j)
                  <option value="{{ $j }}" {{ request('jenis')==$j ? 'selected':'' }}>{{ $j }}</option>
                @endforeach
              </select>
              <div class="d-flex" style="gap:6px;flex:1;max-width:320px;">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari nama fasilitas…">
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
                <tr><th>#</th><th>Nama Fasilitas</th><th>Jenis</th><th>Alamat</th><th>RT/RW</th><th>Kapasitas</th><th>Deskripsi</th><th>Aksi</th></tr>
              </thead>
              <tbody>
                @forelse($fasilitas as $item)
                  <tr>
                    <td style="color:var(--text-secondary);font-size:12px;">{{ $item->fasilitas_id }}</td>
                    <td><strong>{{ $item->nama }}</strong></td>
                    <td><span class="badge-status badge-selesai">{{ $item->jenis }}</span></td>
                    <td style="color:var(--text-secondary);">{{ $item->alamat }}</td>
                    <td style="white-space:nowrap;">{{ $item->rt }} / {{ $item->rw }}</td>
                    <td>{{ $item->kapasitas }}</td>
                    <td style="max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="{{ $item->deskripsi }}">{{ $item->deskripsi }}</td>
                    <td style="white-space:nowrap;">
                      <a href="{{ route('fasilitas.show', $item->fasilitas_id) }}" class="btn-action" style="background:#e8f5e9;color:#27ae60;">
                        <i class="material-icons" style="font-size:14px;">visibility</i> Detail
                      </a>
                      <a href="{{ route('fasilitas.edit', $item->fasilitas_id) }}" class="btn-action btn-action-edit">
                        <i class="material-icons" style="font-size:14px;">edit</i> Edit
                      </a>
                      <form action="{{ route('fasilitas.destroy', $item->fasilitas_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus fasilitas ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-action-delete"><i class="material-icons" style="font-size:14px;">delete</i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="8">@include('layouts.admin.partials.empty-state', ['label'=>'fasilitas'])</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
            {{ $fasilitas->withQueryString()->links('pagination::bootstrap-5') }}
          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
