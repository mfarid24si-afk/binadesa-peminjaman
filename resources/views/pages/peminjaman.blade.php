<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Peminjaman' }}</title>
  @include('layouts.admin.css')
</head>

<body>
  <script src="{{ asset('assets/js/preloader.js') }}"></script>

  <div class="body-wrapper">
    @include('layouts.admin.sidebar')

      @include('layouts.admin.header')

      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">

          {{-- Page Header --}}
          @include('layouts.admin.partials.page-heading', [
            'icon'       => 'assignment',
            'title'      => 'Data Peminjaman',
            'breadcrumb' => 'Kelola Data › Peminjaman',
          ])

          {{-- Alert --}}
          @if(session('success'))
            <div class="alert alert-success" style="margin-bottom:16px;">
              <i class="material-icons" style="font-size:16px; vertical-align:middle; margin-right:6px;">check_circle</i>
              {{ session('success') }}
            </div>
          @endif

          {{-- Table Card --}}
          <div class="mdc-card table-card">

            {{-- Table Header --}}
            <div class="table-header">
              <h6>
                <i class="material-icons" style="font-size:17px; vertical-align:middle; margin-right:6px; color:var(--primary);">list_alt</i>
                Daftar Peminjaman
              </h6>
              <a href="{{ url('/forms') }}" class="btn-action btn-action-edit" style="font-size:13px; padding:7px 14px;">
                <i class="material-icons" style="font-size:15px;">add</i> Tambah
              </a>
            </div>

            {{-- Filter Bar --}}
            <form method="GET" action="{{ route('peminjaman') }}">
              <div class="filter-bar">
                <select name="status" class="form-select" style="max-width:160px;" onchange="this.form.submit()">
                  <option value="">Semua Status</option>
                  <option value="pending"   {{ request('status') == 'pending'   ? 'selected' : '' }}>Pending</option>
                  <option value="distujui"  {{ request('status') == 'distujui'  ? 'selected' : '' }}>Disetujui</option>
                  <option value="ditolak"   {{ request('status') == 'ditolak'   ? 'selected' : '' }}>Ditolak</option>
                  <option value="selesai"   {{ request('status') == 'selesai'   ? 'selected' : '' }}>Selesai</option>
                </select>

                <div class="d-flex" style="gap:6px; flex:1; max-width:320px;">
                  <input type="text" name="search" class="form-control"
                         value="{{ request('search') }}" placeholder="Cari peminjam / fasilitas…">
                  <button type="submit" class="btn-search">
                    <i class="material-icons" style="font-size:16px;">search</i>
                    <span class="d-none d-md-inline">Cari</span>
                  </button>
                </div>
              </div>
            </form>

            {{-- Table --}}
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Fasilitas</th>
                    <th>Peminjam</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>Tujuan</th>
                    <th>Status</th>
                    <th>Total Biaya</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($peminjaman as $item)
                    <tr>
                      <td style="color:var(--text-secondary); font-size:12px;">{{ $item->pinjam_id }}</td>
                      <td><strong>{{ $item->fasilitas->nama ?? '—' }}</strong></td>
                      <td>{{ $item->warga->nama ?? '—' }}</td>
                      <td style="white-space:nowrap;">{{ $item->tanggal_mulai }}</td>
                      <td style="white-space:nowrap;">{{ $item->tanggal_selesai }}</td>
                      <td style="max-width:160px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;"
                          title="{{ $item->tujuan }}">{{ $item->tujuan }}</td>
                      <td>
                        @php
                          $statusClass = match($item->status) {
                            'pending'  => 'badge-pending',
                            'distujui' => 'badge-distujui',
                            'ditolak'  => 'badge-ditolak',
                            'selesai'  => 'badge-selesai',
                            default    => '',
                          };
                        @endphp
                        <span class="badge-status {{ $statusClass }}">{{ ucfirst($item->status) }}</span>
                      </td>
                      <td>Rp {{ number_format($item->total_biaya, 0, ',', '.') }}</td>
                      <td style="white-space:nowrap;">
                        <a href="{{ route('peminjaman.edit', $item->pinjam_id) }}"
                           class="btn-action btn-action-edit">
                          <i class="material-icons" style="font-size:14px;">edit</i> Edit
                        </a>
                        <form action="{{ route('peminjaman.destroy', $item->pinjam_id) }}" method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Hapus data peminjaman ini?')">
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
                      <td colspan="9">
                        @include('layouts.admin.partials.empty-state', ['label' => 'peminjaman'])
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            {{-- Pagination --}}
            <div style="padding:16px 20px; display:flex; justify-content:flex-end;">
              {{ $peminjaman->withQueryString()->links('pagination::bootstrap-5') }}
            </div>

          </div>{{-- end table-card --}}

        </main>

        @include('layouts.admin.footer')
      </div>

    </div>
  </div>

  @include('layouts.admin.js')
</body>
</html>
