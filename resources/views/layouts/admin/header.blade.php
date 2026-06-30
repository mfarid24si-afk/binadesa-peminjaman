<header class="mdc-top-app-bar">
  <div class="mdc-top-app-bar__row">

    {{-- Left: Hamburger + Page Title --}}
    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
      <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler"
              aria-label="Toggle menu">menu</button>

      <span class="mdc-top-app-bar__title d-none d-md-inline">
        Sistem Informasi Fasilitas Desa
      </span>
    </div>

    {{-- Right: Search + Profile --}}
    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end"
         style="gap:12px; padding-right:16px;">

      {{-- Search (desktop only) --}}
      <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex"
           style="margin:0; height:38px; min-width:200px;">
        <i class="material-icons mdc-text-field__icon" style="font-size:18px; color:var(--text-secondary);">search</i>
        <input class="mdc-text-field__input" id="header-search-input" placeholder="Cari...">
        <div class="mdc-notched-outline">
          <div class="mdc-notched-outline__leading"></div>
          <div class="mdc-notched-outline__notch"></div>
          <div class="mdc-notched-outline__trailing"></div>
        </div>
      </div>

      {{-- Profile --}}
      <div class="menu-profile d-flex align-items-center" style="gap:10px;">
        <a href="{{ route('profile.index') }}" class="d-flex align-items-center" style="text-decoration:none;">
          <img src="{{ Auth::user()->foto && Storage::disk('public')->exists(Auth::user()->foto)
                ? Storage::url(Auth::user()->foto)
                : asset('assets/images/faces/face11.jpg') }}"
               alt="{{ Auth::user()->name }}"
               class="avatar-circle">
        </a>
        <div class="d-none d-md-block">
          <div style="font-size:13px; font-weight:600; color:var(--text-primary); line-height:1.2;">
            {{ Auth::user()->name }}
          </div>
          <div style="font-size:11px; color:var(--text-secondary);">
            {{ ucfirst(Auth::user()->role ?? 'Admin') }}
          </div>
        </div>
      </div>

    </div>
  </div>
</header>
