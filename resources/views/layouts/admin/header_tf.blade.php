{{-- Simplified header for forms page (no notification dropdown) --}}
<header class="mdc-top-app-bar">
  <div class="mdc-top-app-bar__row">
    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
      <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
      <span class="mdc-top-app-bar__title d-none d-md-inline">Input Data</span>
    </div>
    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end" style="padding-right:16px;">
      <div class="menu-profile d-flex align-items-center" style="gap:10px;">
        <a href="{{ route('developer.profile') }}">
          <img src="{{ asset('assets/images/faces/face11.jpg') }}"
               alt="{{ Auth::user()->name }}" class="avatar-circle">
        </a>
        <div class="d-none d-md-block">
          <div style="font-size:13px; font-weight:600; color:var(--text-primary);">{{ Auth::user()->name }}</div>
          <div style="font-size:11px; color:var(--text-secondary);">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</div>
        </div>
      </div>
    </div>
  </div>
</header>
