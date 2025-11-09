<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Peminjaman Fasilitas</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets/css/demo/style.css')}}">
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />

  <style>
    .whatsapp-float {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 25px;
      right: 25px;
      background-color: #25d366;
      color: #fff;
      border-radius: 50%;
      text-align: center;
      font-size: 30px;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
      z-index: 100;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all 0.2s ease-in-out;
    }

    .whatsapp-float:hover {
      transform: scale(1.1);
      box-shadow: 3px 3px 12px rgba(0, 0, 0, 0.3);
    }

    .whatsapp-icon {
      width: 35px;
      height: 35px;
    }


    body,
    html {
      height: 100%;
      margin: 0;
    }

    .auth-page {
      display: flex;
      height: 100vh;
    }

    .auth-image {
      flex: 1;
      background: url('{{ asset('assets/images/hero.jpg') }}') no-repeat center center;
      background-size: cover;
    }

    .auth-form {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #fff;
      padding: 40px;
    }

    .auth-card {
      width: 100%;
      max-width: 400px;
      text-align: center;
    }

    .auth-card h2 {
      margin-bottom: 8px;
    }

    .auth-card p {
      color: #666;
      font-size: 14px;
      margin-bottom: 24px;
    }

    @media (max-width: 768px) {
      .auth-page {
        flex-direction: column;
      }

      .auth-image {
        height: 200px;
      }
    }
  </style>
</head>

<body>
  <script src="{{asset('assets/js/preloader.js')}}"></script>

  <div class="auth-page">

    <!-- Gambar kiri -->
    <div class="auth-image"></div>

    <!-- Form kanan -->
    <div class="auth-form">
      <div class="mdc-card auth-card">

        <div class="text-center mb-4">
          <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height:60px; margin-bottom:10px;">
        </div>

        <h2>Peminjaman Fasilitas</h2>
        <p>Masuk untuk mengelola data, memantau aktivitas, dan menjaga performa sistem Anda tetap optimal.</p>

        @if($errors->any())
          <div class="mdc-card"
            style="background-color: #ffebee; color: #c62828; padding: 12px; margin-bottom: 16px; border-radius: 8px;">
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}">
          @csrf
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">

              <!-- Email -->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-text-field w-100">
                  <input class="mdc-text-field__input" type="email" name="email" id="email-input"
                    value="{{ old('email') }}">
                  <div class="mdc-line-ripple"></div>
                  <label for="email-input" class="mdc-floating-label">Email</label>
                </div>
              </div>

              <!-- Password -->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-text-field w-100">
                  <input class="mdc-text-field__input" type="password" name="password" id="password-input">
                  <div class="mdc-line-ripple"></div>
                  <label for="password-input" class="mdc-floating-label">Password</label>
                </div>
              </div>

              <!-- Remember Me + Forgot -->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <div class="mdc-form-field">
                  <div class="mdc-checkbox">
                    <input type="checkbox" name="remember" class="mdc-checkbox__native-control" id="checkbox-1" />
                    <div class="mdc-checkbox__background">
                      <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59" />
                      </svg>
                      <div class="mdc-checkbox__mixedmark"></div>
                    </div>
                  </div>
                  <label for="checkbox-1">Remember me</label>
                </div>
              </div>

              <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex align-items-center justify-content-end">
                <a href="#">Forgot Password</a>
              </div>

              <!-- Submit -->
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <button type="submit" class="mdc-button mdc-button--raised w-100">Login</button>
              </div>

              
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
             <a href="{{ route('regis') }}" class="mdc-button mdc-button w-100">Register</a>
             </div>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/js/material.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>

  
  <a href="https://wa.me/6281234567890" class="whatsapp-float" target="_blank">
    <img src="{{ asset('assets/images/wa.jpg') }}" alt="WhatsApp" class="whatsapp-icon">
  </a>

</body>

</html>