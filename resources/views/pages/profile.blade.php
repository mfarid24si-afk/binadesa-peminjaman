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


<div class="mdc-layout-grid">
  <div class="mdc-layout-grid__inner">

    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
      <div class="mdc-card p-4 text-center">

        <img src="{{ asset($developer['foto']) }}"
             style="width:160px;height:160px;object-fit:cover;border-radius:50%;">

        <h3 class="mt-3">{{ $developer['nama'] }}</h3>
        <p class="text-muted mb-1">{{ $developer['nim'] }}</p>
        <p>{{ $developer['prodi'] }}</p>

        <hr>

        <div class="d-flex justify-content-center gap-3 mt-3">
          <a href="{{ $developer['github'] }}" target="_blank" class="btn btn-dark btn-sm">
            GitHub
          </a>
          <a href="{{ $developer['linkedin'] }}" target="_blank" class="btn btn-primary btn-sm">
            LinkedIn
          </a>
          <a href="{{ $developer['instagram'] }}" target="_blank" class="btn btn-danger btn-sm">
            Instagram
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

