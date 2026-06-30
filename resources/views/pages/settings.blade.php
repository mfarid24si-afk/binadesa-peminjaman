<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaturan Sistem</title>
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
          'icon'       => 'settings',
          'title'      => 'Pengaturan Sistem',
          'breadcrumb' => 'Pengaturan › Sistem',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">error_outline</i>
            {{ $errors->first() }}
          </div>
        @endif

        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">

            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone">
              <div class="mdc-card" style="padding:24px;">
                <h6 class="card-title" style="margin-top:0;display:flex;align-items:center;gap:8px;">
                  <i class="material-icons" style="font-size:18px;color:var(--primary);">tune</i>
                  Konfigurasi Aplikasi
                </h6>

                <form action="{{ route('settings.update') }}" method="POST">
                  @csrf

                  <div class="mdc-layout-grid__inner" style="margin-top:12px;">

                    {{-- Nama Desa --}}
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="text" name="nama_desa" class="mdc-text-field__input" value="{{ old('nama_desa', $settings['nama_desa'] ?? '') }}" required>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Nama Desa</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>

                    {{-- Nomor Kontak --}}
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="text" name="nomor_kontak" class="mdc-text-field__input" value="{{ old('nomor_kontak', $settings['nomor_kontak'] ?? '') }}">
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Nomor Kontak Admin</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>

                    {{-- Alamat Balai --}}
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                      <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--textarea" style="width:100%;">
                        <textarea name="alamat_balai" class="mdc-text-field__input" rows="2">{{ old('alamat_balai', $settings['alamat_balai'] ?? '') }}</textarea>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Alamat Balai / Kantor Desa</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>

                    {{-- Batas Maksimal Hari --}}
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="number" name="batas_maksimal_hari" class="mdc-text-field__input" value="{{ old('batas_maksimal_hari', $settings['batas_maksimal_hari'] ?? '7') }}" min="1" max="365" required>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Batas Maksimal Hari Pinjam</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>

                    {{-- Biaya Sewa Per Hari --}}
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="number" name="biaya_sewa_per_hari" class="mdc-text-field__input" value="{{ old('biaya_sewa_per_hari', $settings['biaya_sewa_per_hari'] ?? '0') }}" min="0" required>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Biaya Sewa per Hari (Rp)</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12" style="margin-top:16px;">
                      <button type="submit" class="mdc-button mdc-button--raised">
                        <i class="material-icons" style="font-size:16px;margin-right:6px;">save</i> Simpan Pengaturan
                      </button>
                    </div>

                  </div>
                </form>
              </div>
            </div>

            {{-- Info Panel --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-8-tablet mdc-layout-grid__cell--span-4-phone">
              <div class="mdc-card" style="padding:24px;">
                <h6 class="card-title" style="margin-top:0;display:flex;align-items:center;gap:8px;">
                  <i class="material-icons" style="font-size:18px;color:var(--primary);">info</i>
                  Informasi
                </h6>
                <div style="font-size:13px;color:var(--text-secondary);line-height:1.7;">
                  <p>Pengaturan ini akan digunakan sebagai konfigurasi dasar aplikasi:</p>
                  <ul style="padding-left:18px;margin:8px 0;">
                    <li><strong>Nama Desa</strong> — ditampilkan di judul sistem</li>
                    <li><strong>Kontak</strong> — untuk informasi peminjaman</li>
                    <li><strong>Batas Hari</strong> — maksimal durasi peminjaman</li>
                    <li><strong>Biaya Sewa</strong> — tarif default per hari</li>
                  </ul>
                  <hr style="border:none;border-top:1px solid var(--border);margin:16px 0;">
                  <p style="margin-bottom:4px;"><strong>Tips:</strong></p>
                  <p>Setting disimpan di tabel <code>settings</code> database. Semua perubahan langsung aktif.</p>
                </div>
              </div>
            </div>

          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
