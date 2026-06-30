<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Saya</title>
  @include('layouts.admin.css')
  <style>
    .profile-avatar {
      width: 120px; height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid var(--primary);
      box-shadow: 0 4px 20px rgba(98,0,234,.15);
      transition: transform .2s;
    }
    .profile-avatar:hover { transform: scale(1.03); }
    .section-divider {
      border: none; border-top: 1px solid var(--border); margin: 24px 0;
    }
    .password-hint { font-size: 12px; color: var(--text-secondary); margin-top: 4px; }
  </style>
</head>
<body>
  <script src="{{ asset('assets/js/preloader.js') }}"></script>
  <div class="body-wrapper">
    @include('layouts.admin.sidebar')
    @include('layouts.admin.header')

    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">

        @include('layouts.admin.partials.page-heading', [
          'icon'       => 'account_circle',
          'title'      => 'Profil Saya',
          'breadcrumb' => 'Pengaturan › Profil Saya',
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

            {{-- ── Card: Preview Profil ── --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
              <div class="mdc-card" style="padding:32px 24px; text-align:center;">
                <div style="margin-bottom:16px;">
                  <img src="{{ $user->foto && Storage::disk('public')->exists($user->foto)
                        ? Storage::url($user->foto)
                        : asset('assets/images/faces/face11.jpg') }}"
                       alt="{{ $user->name }}" class="profile-avatar">
                </div>
                <h4 style="font-size:18px;font-weight:700;color:var(--text-primary);margin-bottom:4px;">
                  {{ $user->name }}
                </h4>
                <p style="font-size:13px;color:var(--text-secondary);margin-bottom:4px;">{{ $user->email }}</p>
                <span class="badge-status" style="
                  background: {{ match($user->role) { 'super admin' => '#fce4ec', 'admin' => 'var(--primary-50)', default => '#e8f5e9' } }};
                  color: {{ match($user->role) { 'super admin' => '#c62828', 'admin' => 'var(--primary)', default => '#2e7d32' } }};">
                  {{ ucfirst($user->role ?? 'user') }}
                </span>
                <hr class="section-divider">
                <p style="font-size:12px;color:var(--text-secondary);">
                  Terakhir login: {{ session('last_login') ?? '—' }}
                </p>

                {{-- Upload Foto --}}
                <form action="{{ route('profile.upload-photo') }}" method="POST" enctype="multipart/form-data" style="margin-top:16px;">
                  @csrf
                  <label for="upload-foto" class="mdc-button mdc-button--outlined" style="cursor:pointer;font-size:12px;padding:6px 16px;display:inline-flex;align-items:center;gap:6px;">
                    <i class="material-icons" style="font-size:16px;">camera_alt</i> Ganti Foto
                  </label>
                  <input type="file" id="upload-foto" name="foto" accept="image/jpg,image/jpeg,image/png" style="display:none;" onchange="this.form.submit()">
                </form>
              </div>
            </div>

            {{-- ── Card: Edit Profil + Ganti Password ── --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
              {{-- Form Update Profil --}}
              <div class="mdc-card" style="padding:24px; margin-bottom:20px;">
                <h6 class="card-title" style="margin-top:0;display:flex;align-items:center;gap:8px;">
                  <i class="material-icons" style="font-size:18px;color:var(--primary);">edit</i>
                  Edit Profil
                </h6>
                <form action="{{ route('profile.update') }}" method="POST">
                  @csrf
                  <div class="mdc-layout-grid__inner" style="margin-top:8px;">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="text" name="name" class="mdc-text-field__input" value="{{ old('name', $user->name) }}" required>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Nama Lengkap</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="email" name="email" class="mdc-text-field__input" value="{{ old('email', $user->email) }}" required>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Email</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12" style="margin-top:12px;">
                      <button type="submit" class="mdc-button mdc-button--raised">
                        <i class="material-icons" style="font-size:16px;margin-right:6px;">save</i> Simpan Profil
                      </button>
                    </div>
                  </div>
                </form>
              </div>

              {{-- Form Ganti Password --}}
              <div class="mdc-card" style="padding:24px;">
                <h6 class="card-title" style="margin-top:0;display:flex;align-items:center;gap:8px;">
                  <i class="material-icons" style="font-size:18px;color:var(--primary);">lock</i>
                  Ganti Password
                </h6>
                <form action="{{ route('profile.update-password') }}" method="POST">
                  @csrf
                  <div class="mdc-layout-grid__inner" style="margin-top:8px;">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="password" name="current_password" class="mdc-text-field__input" required>
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Password Saat Ini</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="password" name="new_password" class="mdc-text-field__input" required minlength="6">
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Password Baru</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                      <div class="password-hint">Minimal 6 karakter</div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-12-tablet mdc-layout-grid__cell--span-4-phone">
                      <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                        <input type="password" name="new_password_confirmation" class="mdc-text-field__input" required minlength="6">
                        <div class="mdc-notched-outline">
                          <div class="mdc-notched-outline__leading"></div>
                          <div class="mdc-notched-outline__notch"><label class="mdc-floating-label">Konfirmasi Password Baru</label></div>
                          <div class="mdc-notched-outline__trailing"></div>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12" style="margin-top:12px;">
                      <button type="submit" class="mdc-button mdc-button--raised" style="background:#ff5252;">
                        <i class="material-icons" style="font-size:16px;margin-right:6px;">lock_reset</i> Update Password
                      </button>
                    </div>
                  </div>
                </form>
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
