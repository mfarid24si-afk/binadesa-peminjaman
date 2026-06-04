{{-- ── Dashboard Charts — data injected via window.DASHBOARD_DATA ── --}}
<div class="mdc-layout-grid" style="padding:0 0 20px;">
  <div class="mdc-layout-grid__inner">

    {{-- Bar Chart: Peminjaman per Bulan (real data) --}}
    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone">
      <div class="mdc-card" style="height:100%;">
        <div class="d-flex justify-content-between align-items-start" style="margin-bottom:4px;">
          <div>
            <div class="chart-card-title">Peminjaman per Bulan</div>
            <div class="chart-card-sub">Akumulasi seluruh data transaksi dari database</div>
          </div>
          <span style="font-size:11px;background:var(--primary-50);color:var(--primary);padding:3px 10px;border-radius:20px;font-weight:600;">
            Semua Periode
          </span>
        </div>
        <div class="chart-container" style="position:relative;height:240px;">
          <canvas id="revenue-chart"></canvas>
        </div>
      </div>
    </div>

    {{-- Doughnut: Status Peminjaman (real data) --}}
    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone">
      <div class="mdc-card" style="height:100%;">
        <div class="chart-card-title">Status Peminjaman</div>
        <div class="chart-card-sub">Distribusi status saat ini</div>

        {{-- Loading skeleton shown until chart renders --}}
        <div id="chart-sales-skeleton" style="height:200px;display:flex;align-items:center;justify-content:center;">
          <div style="width:140px;height:140px;border-radius:50%;background:var(--primary-50);animation:pulse 1.4s ease-in-out infinite;"></div>
        </div>

        <div class="chart-container" style="position:relative;height:200px;display:none;align-items:center;justify-content:center;" id="chart-sales-wrap">
          <canvas id="chart-sales"></canvas>
        </div>
        <div id="sales-legend" style="display:flex;flex-wrap:wrap;gap:8px;margin-top:12px;justify-content:center;"></div>
      </div>
    </div>

  </div>
</div>

<style>
@keyframes pulse {
  0%,100% { opacity:.4; }
  50% { opacity:.9; }
}
</style>
