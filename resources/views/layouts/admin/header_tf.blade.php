<header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button
              class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title">Selamata Datang</span>
            <div
              class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
              <i class="material-icons mdc-text-field__icon">search</i>
              <input class="mdc-text-field__input" id="text-field-hero-input">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
           
  <div class="menu-profile d-flex align-items-center">
  <a href="{{ route('developer.profile') }}" class="d-flex align-items-center">
    <img src="{{ asset('assets/images/faces/face11.jpg') }}"
         alt="user"
         style="width:40px;height:40px;border-radius:50%;object-fit:cover;">
  </a>

  <div class="ml-2 text-left">
    <div>{{ Auth::user()->name }}</div>
    <small class="text-muted" style="font-size:11px">
      Last login: {{ session('last_login') }}
    </small>
  </div>
</div>


            <div class="divider d-none d-md-block"></div>
            <div class="menu-button-container d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-arrow-down-bold-box"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-lock-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Lock screen</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="profile-actions">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="nav-tab" type="submit">
          <img src="{{ asset('assets/images/logout.png') }}" height="10px" width="10px" alt="logout"
            class="icon-logout">
          Logout</button>
      </form>
    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-container">
          <button class="nav-tab active" onclick="showTab(event, 'user')">User</button>
          <button class="nav-tab" onclick="showTab(event, 'warga')">👽 Warga</button>
          <button class="nav-tab" onclick="showTab(event, 'media')">🛸 Media</button>
          <button class="nav-tab" onclick="showTab(event, 'fasilitas')">🏠 Fasilitas Umum</button>
          <button class="nav-tab" onclick="showTab(event, 'peminjaman')">📋 Peminjaman</button>
          <button class="nav-tab" onclick="showTab(event, 'pembayaran')">💰 Pembayaran</button>
          <button class="nav-tab" onclick="showTab(event, 'syarat')">📄 Syarat Fasilitas</button>
          <button class="nav-tab" onclick="showTab(event, 'petugas')">👥 Petugas</button>
        </div>
        
      </header>