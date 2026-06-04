<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Warga' }}</title>
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
            'icon'       => 'people',
            'title'      => 'Data Warga',
            'breadcrumb' => 'Kelola Data › Warga',
          ])

          @if(session('success'))
            <div class="alert alert-success" style="margin-bottom:16px;">
              <i class="material-icons" style="font-size:16px; vertical-align:middle; margin-right:6px;">check_circle</i>
              {{ session('success') }}
            </div>
          @endif

          <div class="mdc-card table-card">

            <div class="table-header">
              <h6>
                <i class="material-icons" style="font-size:17px; vertical-align:middle; margin-right:6px; color:var(--primary);">group</i>
                Daftar Warga
              </h6>
              <a href="{{ url('/forms') }}" class="btn-action btn-action-edit" style="font-size:13px; padding:7px 14px;">
                <i class="material-icons" style="font-size:15px;">add</i> Tambah
              </a>
            </div>

            {{-- Filter --}}
            <form method="GET" action="{{ route('warga') }}">
              <div class="filter-bar">
                <select name="jenis_kelamin" class="form-select" style="max-width:160px;" onchange="this.form.submit()">
                  <option value="">Semua Gender</option>
                  <option value="L" {{ request('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="P" {{ request('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <div class="d-flex" style="gap:6px; flex:1; max-width:320px;">
                  <input type="text" name="search" class="form-control"
                         value="{{ request('search') }}" placeholder="Cari nama / email…">
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
                  <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Agama</th>
                    <th>Gender</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($warga as $w)
                    <tr>
                      <td style="color:var(--text-secondary); font-size:12px;">{{ $w->warga_id }}</td>
                      <td>
                        <img src="{{ $w->foto && Storage::disk('public')->exists($w->foto)
                              ? Storage::url($w->foto)
                              : Storage::url('user/placeholder.jpg') }}"
                             class="avatar-circle" alt="{{ $w->nama }}">
                      </td>
                      <td><strong>{{ $w->nama }}</strong></td>
                      <td>{{ $w->agama }}</td>
                      <td>
                        <span style="font-size:12px; padding:3px 10px; border-radius:20px; font-weight:600;
                          background:{{ $w->jenis_kelamin == 'L' ? '#e3f2fd' : '#fce4ec' }};
                          color:{{ $w->jenis_kelamin == 'L' ? '#1565c0' : '#c62828' }};">
                          {{ $w->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </span>
                      </td>
                      <td>{{ $w->telp }}</td>
                      <td style="color:var(--text-secondary);">{{ $w->email }}</td>
                      <td style="white-space:nowrap;">
                        <a href="{{ route('warga.edit', $w->warga_id) }}"
                           class="btn-action btn-action-edit">
                          <i class="material-icons" style="font-size:14px;">edit</i> Edit
                        </a>
                        <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Hapus data warga ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn-action btn-action-delete">
                            <i class="material-icons" style="font-size:14px;">delete</i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="8">
                        @include('layouts.admin.partials.empty-state', ['label' => 'warga'])
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <div style="padding:16px 20px; display:flex; justify-content:flex-end;">
              {{ $warga->withQueryString()->links('pagination::bootstrap-5') }}
            </div>

          </div>

        </main>
        @include('layouts.admin.footer')
      </div>

    </div>
  </div>

  @include('layouts.admin.js')
</body>
</html>
