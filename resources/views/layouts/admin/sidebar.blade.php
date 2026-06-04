<script>
function toggleMenu() {
    var menu  = document.getElementById('submenu-tables');
    var arrow = document.getElementById('tables-arrow');
    if (!menu) return;
    
    var isHidden = menu.style.display === 'none' || menu.style.display === '';
    menu.style.display = isHidden ? 'block' : 'none';
    
    if (arrow) {
        arrow.textContent = isHidden ? 'keyboard_arrow_down' : 'keyboard_arrow_right';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    // Auto-open submenu jika tautan anak aktif
    var subLinks = document.querySelectorAll('#submenu-tables a');
    var anyActive = false;
    subLinks.forEach(function (link) {
        if (window.location.href.indexOf(link.getAttribute('href')) !== -1) {
            link.classList.add('active');
            anyActive = true;
        }
    });
    if (anyActive) {
        document.getElementById('submenu-tables').style.display = 'block';
        var arrow = document.getElementById('tables-arrow');
        if (arrow) arrow.textContent = 'keyboard_arrow_down';
    }
});
</script>

<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open" style="height: 100vh; display: flex; flex-direction: column;">

  {{-- Brand header --}}
  <div class="mdc-drawer__header" style="flex-shrink: 0;">
    <a href="{{ route('dashboard') }}" class="brand-logo" style="text-decoration: none;">
      <img src="{{ asset('assets/images/voc.jpg') }}" alt="logo">
      <div class="brand-name">
        Binadesa
        <span>Sistem Peminjaman</span>
      </div>
    </a>
  </div>

  {{-- Kontainer Utama Konten Sidebar --}}
  <div class="mdc-drawer__content" style="flex-grow: 1; overflow-y: auto; display: flex; flex-direction: column; justify-content: space-between; padding-bottom: 10px;">
    
    <div class="mdc-list-group" style="padding: 0 16px;">
      {{-- Info Pengguna --}}
      <div class="user-info" style="padding: 10px 0 15px; margin-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.1);">
        <p style="margin: 0; font-weight: 700; color: #ffffff; font-size: 14px;">{{ Auth::user()->name }}</p>
        <p style="margin: 2px 0 0; font-size: 11px; color: rgba(255,255,255,0.5);">{{ Auth::user()->email }}</p>
      </div>

      {{-- ─ Menu Utama ─ --}}
      <div class="sidebar-section-label" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: rgba(255,255,255,0.35); margin: 12px 0 6px;">Menu Utama</div>
      <nav class="mdc-list mdc-drawer-menu" style="padding: 0;">

        <div class="mdc-list-item mdc-drawer-item" style="padding: 0; margin-bottom: 4px;">
          <a class="mdc-drawer-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="material-icons mdc-drawer-item-icon">dashboard</i>
            Dashboard
          </a>
        </div>

        <div class="mdc-list-item mdc-drawer-item" style="padding: 0; margin-bottom: 4px;">
          <a class="mdc-drawer-link {{ request()->routeIs('forms') ? 'active' : '' }}" href="{{ route('forms') }}">
            <i class="material-icons mdc-drawer-item-icon">edit</i>
            Input Data
          </a>
        </div>

      </nav>

      {{-- ─ Data Master ─ --}}
      <div class="sidebar-section-label" style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: rgba(255,255,255,0.35); margin: 16px 0 6px;">Data Master</div>
      <nav class="mdc-list mdc-drawer-menu" style="padding: 0;">

               {{-- Menggunakan ikon 'apps' yang dijamin universal muncul di semua versi template --}}
        <div class="mdc-list-item mdc-drawer-item" onclick="toggleMenu()" style="cursor:pointer; padding: 0; margin-bottom: 4px;">
          <a class="mdc-drawer-link" href="javascript:void(0)" style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
            <span style="display: flex; align-items: center;">
              <i class="material-icons mdc-drawer-item-icon">apps</i>
              Kelola Data
            </span>
            <i class="material-icons" id="tables-arrow" style="font-size: 18px; margin-left: auto; color: rgba(255,255,255,0.5);">keyboard_arrow_right</i>
          </a>
        </div>


        {{-- Submenu — 8 Item Tabel Anak (Nama ikon disinkronkan ke versi universal) --}}
        <div id="submenu-tables" style="display:none; margin:4px 0 6px 12px; background:rgba(0,0,0,0.2); border-radius:6px; padding:4px 0;">
          @php
            $tableLinks = [
              ['route' => 'user',       'label' => 'User',       'icon' => 'account_box'],
              ['route' => 'warga',      'label' => 'Warga',      'icon' => 'people'],
              ['route' => 'media',      'label' => 'Media',      'icon' => 'collections'],
              ['route' => 'fasilitas',  'label' => 'Fasilitas',  'icon' => 'store'],
              ['route' => 'peminjaman', 'label' => 'Peminjaman', 'icon' => 'assignment'],
              ['route' => 'pembayaran', 'label' => 'Pembayaran', 'icon' => 'credit_card'],
              ['route' => 'syarat',     'label' => 'Syarat',     'icon' => 'description'],
              ['route' => 'petugas',    'label' => 'Petugas',    'icon' => 'assignment_ind'],
            ];
          @endphp

          @foreach($tableLinks as $link)
            <div class="mdc-list-item mdc-drawer-item" style="height: 38px; padding: 0;">
              <a class="mdc-drawer-link {{ request()->routeIs($link['route']) ? 'active' : '' }}" href="{{ route($link['route']) }}" style="padding-left: 16px; font-size: 13px; display: flex; align-items: center; width: 100%;">
                <i class="material-icons" style="font-size: 18px; margin-right: 12px; opacity: 0.85; width: 18px; text-align: center;">{{ $link['icon'] }}</i>
                <span style="color: rgba(255,255,255,0.85);">{{ $link['label'] }}</span>
              </a>
            </div>
          @endforeach
        </div>

        {{-- Profil --}}
        <div class="mdc-list-item mdc-drawer-item" style="padding: 0; margin-bottom: 4px;">
          <a class="mdc-drawer-link {{ request()->routeIs('developer.profile') ? 'active' : '' }}" href="{{ route('developer.profile') }}">
            <i class="material-icons mdc-drawer-item-icon">person</i>
            Profil
          </a>
        </div>

      </nav>
    </div>

    {{-- Footer Tombol Keluar — Menggunakan file kustom log-out.svg --}}
    <div class="sidebar-footer" style="padding: 10px 16px; flex-shrink: 0; margin-top: auto;">
      <form action="{{ route('logout') }}" method="POST" style="width:100%; margin: 0;">
        @csrf
        <button type="submit" class="mdc-button mdc-button--raised" style="width:100%; display:flex; align-items:center; justify-content:center; padding:18px 10px; background: rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.15); border-radius:6px; cursor:pointer; box-sizing: border-box;">
          
          <!-- Fitur Tambahan: Memanggil file SVG log-out kustom Anda dengan penataan dimensi yang presisi -->
          <img src="{{ asset('assets/images/log-out.svg') }}" alt="Logout" style="width: 18px; height: 18px; margin-right: 10px; filter: invert(1); display: inline-block; vertical-align: middle;">
          
          <span style="color:#ffffff; font-weight:700; font-size:13px; letter-spacing: 0.3px; display: inline-block; vertical-align: middle;">Keluar</span>
        </button>
      </form>
    </div>

  </div>
</aside>

<div class="main-wrapper mdc-drawer-app-content">
