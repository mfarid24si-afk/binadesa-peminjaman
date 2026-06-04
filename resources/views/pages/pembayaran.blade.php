<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Pembayaran' }}</title>
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
          'icon'       => 'payments',
          'title'      => 'Data Pembayaran',
          'breadcrumb' => 'Kelola Data › Pembayaran',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        <div class="mdc-card table-card">
          <div class="table-header">
            <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">receipt_long</i>Daftar Pembayaran</h6>
          </div>

          <form method="GET" action="{{ route('pembayaran') }}">
            <div class="filter-bar">
              <select name="metode" class="form-select" style="max-width:160px;" onchange="this.form.submit()">
                <option value="">Semua Metode</option>
                <option value="cash"     {{ request('metode')=='cash'     ? 'selected':'' }}>Cash</option>
                <option value="qris"     {{ request('metode')=='qris'     ? 'selected':'' }}>QRIS</option>
                <option value="transfer" {{ request('metode')=='transfer' ? 'selected':'' }}>Transfer</option>
              </select>
              <div class="d-flex" style="gap:6px;flex:1;max-width:320px;">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari keterangan…">
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
                  <th>#</th><th>Peminjam</th><th>Tanggal</th><th>Jumlah</th><th>Metode</th><th>Keterangan</th><th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @forelse($pembayaran as $item)
                  <tr>
                    <td style="color:var(--text-secondary);font-size:12px;">{{ $item->bayar_id }}</td>
                    <td><strong>{{ $item->peminjaman->warga->nama ?? '—' }}</strong></td>
                    <td style="white-space:nowrap;">{{ $item->tanggal }}</td>
                    <td style="font-weight:600;color:var(--primary);">Rp {{ number_format($item->jumlah,0,',','.') }}</td>
                    <td>
                      <span class="badge-status" style="background:var(--primary-50);color:var(--primary);">{{ strtoupper($item->metode) }}</span>
                    </td>
                    <td style="color:var(--text-secondary);">{{ $item->keterangan ?? '—' }}</td>
                    <td style="white-space:nowrap;">
                      <a href="{{ route('pembayaran.edit', $item->bayar_id) }}" class="btn-action btn-action-edit">
                        <i class="material-icons" style="font-size:14px;">edit</i> Edit
                      </a>
                      <form action="{{ route('pembayaran.destroy', $item->bayar_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus data pembayaran ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-action-delete"><i class="material-icons" style="font-size:14px;">delete</i> Hapus</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="7">@include('layouts.admin.partials.empty-state', ['label'=>'pembayaran'])</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
            {{ $pembayaran->withQueryString()->links('pagination::bootstrap-5') }}
          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
