{{-- ── Dashboard Stat Cards — data dari binacontroller@index ── --}}
<div class="mdc-layout-grid" style="padding:0 0 20px;">
  <div class="mdc-layout-grid__inner">

    <!-- Card 1: Total Peminjaman (Sudah Rapi) -->
    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
      <a href="{{ route('peminjaman') }}" style="text-decoration:none;">
        <div class="mdc-card stat-card stat-card-primary stat-card-clickable">
          <div class="mdc-card__primary-action stat-card-body">
            <div class="stat-icon-wrapper">
              <div class="stat-icon"><i class="material-icons">assignment</i></div>
            </div>
            <div class="stat-content">
              <div class="stat-value">{{ number_format($totalPeminjaman ?? 0) }}</div>
              <div class="stat-label">Total Peminjaman</div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Card 2: Total Warga (Sudah Rapi) -->
    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
      <a href="{{ route('warga') }}" style="text-decoration:none;">
        <div class="mdc-card stat-card stat-card-green stat-card-clickable">
          <div class="mdc-card__primary-action stat-card-body">
            <div class="stat-icon-wrapper">
              <div class="stat-icon"><i class="material-icons">people</i></div>
            </div>
            <div class="stat-content">
              <div class="stat-value">{{ number_format($totalWarga ?? 0) }}</div>
              <div class="stat-label">Total Warga</div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Card 3: Fasilitas Desa (PERBAIKAN IKON) -->
    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
      <a href="{{ route('fasilitas') }}" style="text-decoration:none;">
        <div class="mdc-card stat-card stat-card-earth stat-card-clickable">
          <div class="mdc-card__primary-action stat-card-body">
            <div class="stat-icon-wrapper">
              <div class="stat-icon"><i class="material-icons">store</i></div>
            </div>
            <div class="stat-content">
              <div class="stat-value">{{ number_format($totalFasilitas ?? 0) }}</div>
              <div class="stat-label">Fasilitas Desa</div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <!-- Card 4: Total Pembayaran (PERBAIKAN IKON) -->
    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet mdc-layout-grid__cell--span-4-phone">
      <a href="{{ route('pembayaran') }}" style="text-decoration:none;">
        <div class="mdc-card stat-card stat-card-sky stat-card-clickable">
          <div class="mdc-card__primary-action stat-card-body">
            <div class="stat-icon-wrapper">
              <div class="stat-icon"><i class="material-icons">credit_card</i></div>
            </div>
            <div class="stat-content">
              <div class="stat-value">{{ number_format($totalPembayaran ?? 0) }}</div>
              <div class="stat-label">Total Pembayaran</div>
            </div>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>
