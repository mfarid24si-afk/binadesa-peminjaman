<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk — Binadesa Peminjaman</title>
  <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demo/custom.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body style="background:var(--surface); margin:0;">
  <script src="{{ asset('assets/js/preloader.js') }}"></script>

  <div class="auth-page" style="display:flex; min-height:100vh;">

    {{-- ── Left Panel (Village Branding) ── --}}
    <div class="auth-side-panel d-none d-md-flex"
         style="flex:1; display:flex; flex-direction:column; justify-content:center; padding:48px 40px; position:relative;">

      {{-- Decorative circles --}}
      <div style="position:absolute; top:40px; left:40px; width:60px; height:60px;
                  border-radius:50%; border:2px solid rgba(255,255,255,.15);"></div>
      <div style="position:absolute; bottom:60px; right:60px; width:100px; height:100px;
                  border-radius:50%; border:2px solid rgba(255,255,255,.1);"></div>

      <div style="position:relative; z-index:1; max-width:360px;">
        <div style="display:flex; align-items:center; gap:14px; margin-bottom:48px;">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
               style="height:52px; width:52px; border-radius:12px; object-fit:cover; border:2px solid rgba(255,255,255,.3);">
          <div>
            <div style="color:#fff; font-size:18px; font-weight:700; letter-spacing:.3px;">Binadesa</div>
            <div style="color:rgba(255,255,255,.55); font-size:12px; letter-spacing:.5px; text-transform:uppercase;">Sistem Peminjaman</div>
          </div>
        </div>

        <div class="auth-tagline">Kelola Fasilitas Desa dengan Mudah & Transparan</div>
        <div class="auth-tagline-sub">
          Platform digital untuk peminjaman fasilitas umum desa — efisien, akuntabel, dan mudah diakses oleh seluruh warga.
        </div>

        <div style="display:flex; gap:16px; margin-top:40px;">
          @foreach([['🏠','Fasilitas'],['👥','Warga'],['📋','Peminjaman'],['💰','Pembayaran']] as $feat)
          <div style="background:rgba(255,255,255,.1); border-radius:10px; padding:12px; text-align:center; min-width:70px;">
            <div style="font-size:20px; margin-bottom:4px;">{{ $feat[0] }}</div>
            <div style="color:rgba(255,255,255,.7); font-size:11px; font-weight:600;">{{ $feat[1] }}</div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    {{-- ── Right Panel (Login Form) ── --}}
    <div style="flex:1; display:flex; align-items:center; justify-content:center; padding:40px 24px; background:#fff;">
      <div style="width:100%; max-width:380px;">

        {{-- Mobile logo --}}
        <div class="d-block d-md-none text-center" style="margin-bottom:32px;">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
               style="height:56px; border-radius:12px; margin-bottom:10px;">
          <div style="font-size:18px; font-weight:700; color:var(--primary);">Binadesa Peminjaman</div>
        </div>

        <h3 style="font-size:22px; font-weight:700; color:var(--primary); margin-bottom:6px;">Selamat Datang</h3>
        <p style="color:var(--text-secondary); font-size:13px; margin-bottom:28px;">
          Masuk untuk mengelola data fasilitas dan peminjaman desa.
        </p>

        {{-- Error --}}
        @if($errors->any())
          <div class="alert alert-danger" style="margin-bottom:20px; display:flex; align-items:center; gap:8px;">
            <i class="material-icons" style="font-size:18px;">error_outline</i>
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
          @csrf

          {{-- Email --}}
          <div style="margin-bottom:16px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary);
                          text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Email</label>
            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
              <input class="mdc-text-field__input" type="email" name="email"
                     id="email-input" value="{{ old('email') }}" autocomplete="email" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="email-input" class="mdc-floating-label">Alamat Email</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>

          {{-- Password --}}
          <div style="margin-bottom:20px;">
            <label style="display:block; font-size:12px; font-weight:600; color:var(--text-secondary);
                          text-transform:uppercase; letter-spacing:.5px; margin-bottom:6px;">Password</label>
            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
              <input class="mdc-text-field__input" type="password" name="password"
                     id="password-input" autocomplete="current-password" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="password-input" class="mdc-floating-label">Password</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>

          {{-- Remember + Forgot --}}
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div class="mdc-form-field">
              <div class="mdc-checkbox">
                <input type="checkbox" name="remember" class="mdc-checkbox__native-control" id="remember-me">
                <div class="mdc-checkbox__background">
                  <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                  </svg>
                  <div class="mdc-checkbox__mixedmark"></div>
                </div>
              </div>
              <label for="remember-me" style="font-size:13px; color:var(--text-secondary);">Ingat saya</label>
            </div>
            <a href="#" style="font-size:12px; color:var(--primary); text-decoration:none; font-weight:600;">
              Lupa Password?
            </a>
          </div>

          {{-- Submit --}}
          <button type="submit" class="btn-submit-primary" style="width:100%; font-size:15px; padding:13px;">
            Masuk ke Sistem
          </button>

          {{-- Register link --}}
          <div style="text-align:center; margin-top:20px;">
            <span style="font-size:13px; color:var(--text-secondary);">Belum punya akun? </span>
            <a href="{{ route('regis') }}" style="font-size:13px; color:var(--primary); font-weight:600; text-decoration:none;">
              Daftar Sekarang
            </a>
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
