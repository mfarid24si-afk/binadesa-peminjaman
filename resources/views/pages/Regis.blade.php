<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar — Binadesa Peminjaman</title>
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo/custom.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
</head>
<body style="background:var(--surface); margin:0;">
  <script src="{{ asset('assets/js/preloader.js') }}"></script>
  <div class="auth-page" style="display:flex; min-height:100vh;">

    {{-- Left Panel Branding --}}
    <div class="auth-side-panel d-none d-md-flex"
         style="flex:1; display:flex; flex-direction:column; justify-content:center; padding:48px 40px; position:relative;">
      <div style="position:absolute; top:40px; left:40px; width:60px; height:60px; border-radius:50%; border:2px solid rgba(255,255,255,.15);"></div>
      <div style="position:absolute; bottom:60px; right:60px; width:100px; height:100px; border-radius:50%; border:2px solid rgba(255,255,255,.1);"></div>
      <div style="position:relative; z-index:1; max-width:360px;">
        <div style="display:flex; align-items:center; gap:14px; margin-bottom:48px;">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height:52px; width:52px; border-radius:12px; object-fit:cover; border:2px solid rgba(255,255,255,.3);">
          <div>
            <div style="color:#fff; font-size:18px; font-weight:700; letter-spacing:.3px;">Binadesa</div>
            <div style="color:rgba(255,255,255,.55); font-size:12px; letter-spacing:.5px; text-transform:uppercase;">Sistem Peminjaman</div>
          </div>
        </div>
        <div class="auth-tagline">Bergabung & Kelola Fasilitas Desa</div>
        <div class="auth-tagline-sub">Daftar akun baru untuk mulai menggunakan platform peminjaman fasilitas umum desa secara digital.</div>
        <div style="display:flex; gap:16px; margin-top:40px; flex-wrap:wrap;">
          @foreach([['🔒','Data Aman'],['⚡','Cepat'],['📱','Mobile'],['🆓','Gratis']] as $feat)
          <div style="background:rgba(255,255,255,.1); border-radius:10px; padding:12px; text-align:center; min-width:70px;">
            <div style="font-size:20px; margin-bottom:4px;">{{ $feat[0] }}</div>
            <div style="color:rgba(255,255,255,.7); font-size:11px; font-weight:600;">{{ $feat[1] }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- Right Panel Form --}}
    <div style="flex:1; display:flex; align-items:center; justify-content:center; padding:40px 24px; background:#fff;">
      <div style="width:100%; max-width:400px;">
        {{-- Mobile logo --}}
        <div class="d-block d-md-none text-center" style="margin-bottom:32px;">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height:56px; border-radius:12px; margin-bottom:10px;">
          <div style="font-size:18px; font-weight:700; color:var(--primary);">Binadesa Peminjaman</div>
        </div>
        <h3 style="font-size:22px; font-weight:700; color:var(--primary); margin-bottom:4px;">Buat Akun Baru</h3>
        <p style="color:var(--text-secondary); font-size:13px; margin-bottom:24px;">Isi data diri Anda untuk mendaftar sebagai pengguna sistem.</p>

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:20px; display:flex; align-items:center; gap:8px;">
            <i class="material-icons" style="font-size:18px;">check_circle</i> {{ session('success') }}
          </div>
        @endif
        @if($errors->any())
          <div class="alert alert-danger" style="margin-bottom:20px; display:flex; align-items:center; gap:8px;">
            <i class="material-icons" style="font-size:18px;">error_outline</i> {{ $errors->first() }}
          </div>
        @endif

        <form action="{{ route('regis.store') }}" method="POST">
          @csrf
          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Nama Lengkap</label>
            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
              <input class="mdc-text-field__input" type="text" name="name" id="name-input" value="{{ old('name') }}" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="name-input" class="mdc-floating-label">Nama Lengkap</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Email</label>
            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
              <input class="mdc-text-field__input" type="email" name="email" id="reg-email-input" value="{{ old('email') }}" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="reg-email-input" class="mdc-floating-label">Alamat Email</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Kata Sandi</label>
            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
              <input class="mdc-text-field__input" type="password" name="password" id="reg-pass-input" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="reg-pass-input" class="mdc-floating-label">Kata Sandi</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>
          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Konfirmasi Kata Sandi</label>
            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
              <input class="mdc-text-field__input" type="password" name="password_confirmation" id="reg-pass-confirm-input" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="reg-pass-confirm-input" class="mdc-floating-label">Konfirmasi Kata Sandi</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>

          {{-- Role --}}
          <div style="margin-bottom:24px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary); text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Role Pengguna</label>
            <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect" style="width:100%;">
              <input type="hidden" name="role">
              <i class="mdc-select__dropdown-icon"></i>
              <div class="mdc-select__selected-text">User</div>
              <div class="mdc-select__menu mdc-menu-surface demo-width-class" style="width:100%;">
                <ul class="mdc-list">
                  <li class="mdc-list-item mdc-list-item--selected" data-value="user" aria-selected="true">User</li>
                  <li class="mdc-list-item" data-value="super admin">Super Admin</li>
                  <li class="mdc-list-item" data-value="admin">Admin</li>
                </ul>
              </div>
              <span class="mdc-floating-label mdc-floating-label--float-above">Role</span>
              <div class="mdc-line-ripple"></div>
            </div>
            <small style="color:var(--text-secondary); font-size:11px; display:block; margin-top:4px;">
              <i class="material-icons" style="font-size:12px; vertical-align:middle;">info</i>
              Pilih role sesuai kebutuhan. Super Admin memiliki akses penuh.
            </small>
          </div>

          <button type="submit" class="btn-submit-primary" style="width:100%; font-size:15px; padding:13px;">Daftar Sekarang</button>
          <div style="text-align:center; margin-top:20px;">
            <span style="font-size:13px; color:var(--text-secondary);">Sudah punya akun? </span>
            <a href="{{ route('login') }}" style="font-size:13px; color:var(--primary); font-weight:600; text-decoration:none;">Masuk di sini</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/js/material.js') }}"></script>
  <script src="{{ asset('assets/js/misc.js') }}"></script>
</body>
</html>
