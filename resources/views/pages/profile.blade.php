<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('layouts.admin.css')
</head>

<body>
<script src="{{ asset('assets/js/preloader.js') }}"></script>

<div class="body-wrapper">

    @include('layouts.admin.sidebar')

    <div class="main-wrapper mdc-drawer-app-content">
        @include('layouts.admin.header')


@include('layouts.admin.partials.page-heading', [
  'icon'       => 'code',
  'title'      => 'Profil Pengembang',
  'breadcrumb' => 'Lainnya › Developer',
])

<div class="mdc-layout-grid">
  <div class="mdc-layout-grid__inner">

    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
      <div class="mdc-card" style="padding:32px;text-align:center;">

        <img src="{{ asset($developer['foto']) }}"
             style="width:140px;height:140px;object-fit:cover;border-radius:50%;border:4px solid var(--primary);box-shadow:0 4px 20px rgba(98,0,234,.15);">

        <h3 style="margin:20px 0 4px;font-size:22px;font-weight:700;color:var(--text-primary);">
          {{ $developer['nama'] }}
        </h3>
        <p style="margin:0 0 2px;font-size:14px;color:var(--primary);font-weight:600;">
          {{ $developer['nim'] }}
        </p>
        <p style="margin:0 0 4px;font-size:13px;color:var(--text-secondary);">
          {{ $developer['prodi'] }}
        </p>
        <p style="margin:0 0 4px;font-size:13px;color:var(--text-secondary);">
          <i class="material-icons" style="font-size:14px;vertical-align:middle;">email</i>
          {{ $developer['email'] }}
        </p>

        <hr style="border:none;border-top:1px solid var(--border);margin:24px auto;max-width:200px;">

        <div style="display:flex;justify-content:center;gap:12px;flex-wrap:wrap;">
          <a href="{{ $developer['github'] }}" target="_blank"
             style="display:inline-flex;align-items:center;gap:6px;padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;background:#1b1b18;color:#fff;transition:opacity .2s;"
             onmouseover="this.style.opacity=.8" onmouseout="this.style.opacity=1">
            <i class="material-icons" style="font-size:16px;">code</i> GitHub
          </a>
          <a href="{{ $developer['linkedin'] }}" target="_blank"
             style="display:inline-flex;align-items:center;gap:6px;padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;background:#0a66c2;color:#fff;transition:opacity .2s;"
             onmouseover="this.style.opacity=.8" onmouseout="this.style.opacity=1">
            <i class="material-icons" style="font-size:16px;">work</i> LinkedIn
          </a>
          <a href="{{ $developer['instagram'] }}" target="_blank"
             style="display:inline-flex;align-items:center;gap:6px;padding:8px 18px;border-radius:8px;font-size:13px;font-weight:600;text-decoration:none;background:linear-gradient(135deg,#f58529,#dd2a7b,#8134af);color:#fff;transition:opacity .2s;"
             onmouseover="this.style.opacity=.8" onmouseout="this.style.opacity=1">
            <i class="material-icons" style="font-size:16px;">camera_alt</i> Instagram
          </a>
        </div>

      </div>
    </div>

  </div>
</div>

 @include('layouts.admin.footer')
        </div>
    </div>
</div>

@include('layouts.admin.js')
</body>
</html>

