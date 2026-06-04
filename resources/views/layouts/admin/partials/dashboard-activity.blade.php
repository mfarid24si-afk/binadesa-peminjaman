{{-- ── Recent Activity Feed — fitur baru: 5 peminjaman terbaru ── --}}
<div class="mdc-card" style="margin-bottom:20px; padding:0; overflow:hidden;">
  <div class="table-header" style="padding:16px 20px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between;">
    <h6 style="font-size:15px;font-weight:700;color:var(--primary);margin:0;display:flex;align-items:center;gap:8px;">
      <i class="material-icons" style="font-size:18px;">history</i>
      Aktivitas Peminjaman Terbaru
    </h6>
    <a href="{{ route('peminjaman') }}" style="font-size:12px;color:var(--primary);font-weight:600;text-decoration:none;">
      Lihat Semua →
    </a>
  </div>

  @if(isset($recentPeminjaman) && $recentPeminjaman->count() > 0)
    <div class="table-responsive">
      <table class="table" style="margin:0;">
        <thead>
          <tr>
            <th>Peminjam</th>
            <th>Fasilitas</th>
            <th>Tgl Mulai</th>
            <th>Status</th>
            <th>Biaya</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentPeminjaman as $p)
            <tr>
              <td>
                <div style="font-weight:600;font-size:13px;">{{ $p->warga->nama ?? '—' }}</div>
              </td>
              <td style="color:var(--text-secondary);">{{ $p->fasilitas->nama ?? '—' }}</td>
              <td style="color:var(--text-secondary);white-space:nowrap;font-size:12px;">{{ $p->tanggal_mulai }}</td>
              <td>
                @php
                  $cls = match($p->status) {
                    'pending'  => 'badge-pending',
                    'distujui' => 'badge-distujui',
                    'ditolak'  => 'badge-ditolak',
                    'selesai'  => 'badge-selesai',
                    default    => '',
                  };
                @endphp
                <span class="badge-status {{ $cls }}">{{ ucfirst($p->status) }}</span>
              </td>
              <td style="font-weight:600;color:var(--primary);">
                Rp {{ number_format($p->total_biaya, 0, ',', '.') }}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    @include('layouts.admin.partials.empty-state', ['label' => 'peminjaman terbaru'])
  @endif
</div>
