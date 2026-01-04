<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Peminjaman Fasilitas</title>
  <!-- plugins:css -->
  @include('layouts.admin.css')

</head>
<body>
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
  <div class="mdc-card">
    <h6 class="card-title">Registrasi Pengguna</h6>
    <form action="{{ route('regis.store') }}" method="POST">
      @csrf
      <div class="template-demo">
        <div class="mdc-layout-grid__inner">

          <!-- Nama -->
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
            <div class="mdc-text-field mdc-text-field--outlined">
              <input type="text" name="name" class="mdc-text-field__input" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label class="mdc-floating-label">Nama</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>

          <!-- Email -->
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
            <div class="mdc-text-field mdc-text-field--outlined">
              <input type="email" name="email" class="mdc-text-field__input" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label class="mdc-floating-label">Email</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>

          <!-- Kata Sandi -->
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
            <div class="mdc-text-field mdc-text-field--outlined">
              <input type="password" name="password" class="mdc-text-field__input" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label class="mdc-floating-label">Kata Sandi</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>

          <!-- Konfirmasi Kata Sandi -->
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
            <div class="mdc-text-field mdc-text-field--outlined">
              <input type="password" name="password_confirmation" class="mdc-text-field__input" required>
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label class="mdc-floating-label">Konfirmasi Kata Sandi</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                            <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                              <input type="hidden" name="role">
                              <i class="mdc-select__dropdown-icon"></i>
                              <div class="mdc-select__selected-text"></div>
                              <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                                <ul class="mdc-list">
                                  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                  </li>
                                  <li class="mdc-list-item" data-value="super admin">Super Admin</li>
                                  <li class="mdc-list-item" data-value="admin">Admin</li>
                                  <li class="mdc-list-item" data-value="user">User</li>
                                </ul>
                              </div>
                              <span class="mdc-floating-label">Role</span>
                              <div class="mdc-line-ripple"></div>
                            </div>
                          </div>


        </div>
      </div>

      <!-- Tombol Daftar & Batal -->
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="d-flex justify-content-end mt-4">
          <button type="submit" class="mdc-button mdc-button--raised">
            Konfirmasi
          </button>
          <a href="{{ route('login') }}" class="mdc-button mdc-button--outlined ml-2">
            Kembali
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
@include('layouts.admin.footer')
 <!-- JS -->
  @include('layouts.admin.js-r')

</body>

</html>