<script>
function toggleMenu() {
    const menu = document.getElementById('submenu-tables');
    menu.style.display = (menu.style.display === 'none') ? 'block' : 'none';
}
</script>

<aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
  <div class="mdc-drawer__header">
    <a href="index.html" class="brand-logo">
      <img src="{{asset('assets/images/voc.jpg')}}" height="80px" width="80px" alt="logo">
    </a>
  </div>
  <div class="mdc-drawer__content">
    <div class="user-info">
      <p>{{ Auth::user()->name }} </p>
      <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="mdc-list-group">
      <nav class="mdc-list mdc-drawer-menu">
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="{{ url('/bina') }}">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
            Dashboard
          </a>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          <a class="mdc-drawer-link" href="{{ url('/forms') }}">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
              aria-hidden="true">track_changes</i>
            Forms
          </a>
        </div>

<div class="mdc-list-item mdc-drawer-item" onclick="toggleMenu()">
  <a class="mdc-drawer-link" href="javascript:void(0)">
    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon">grid_on</i>
    Tables
  </a>
</div>

<div id="submenu-tables" class="submenu" style="display:none; margin-left:50px;">

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('user') }}"> User</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('warga') }}">👽 Warga</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('media') }}">🛸 Media</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('fasilitas') }}">🏠 Fasilitas</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('peminjaman') }}">📋 Peminjaman</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('pembayaran') }}">💰 Pembayaran</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('syarat') }}">📄 Syarat</a>
  </div>

  <div class="mdc-list-item mdc-drawer-item">
    <a class="mdc-drawer-link" href="{{ route('petugas') }}">👥 Petugas</a>
  </div>

</div>




        <div class="mdc-list-item mdc-drawer-item">

        </div>
        <div class="mdc-list-item mdc-drawer-item">

          <div class="mdc-expansion-panel" id="sample-page-submenu">
            <nav class="mdc-list mdc-drawer-submenu">
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/blank-page.html">
                  Blank Page
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/403.html">
                  403
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/404.html">
                  404
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/500.html">
                  500
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/505.html">
                  505
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/login.html">
                  Login
                </a>
              </div>
              <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/samples/register.html">
                  Register
                </a>
              </div>
            </nav>
          </div>
        </div>
        <div class="mdc-list-item mdc-drawer-item">
          
          {{-- <a class="mdc-drawer-link"
            href="https://www.bootstrapdash.com/demo/material-admin-free/jquery/documentation/documentation.html"
            target="_blank">
            <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
              aria-hidden="true">description</i>
            Documentation
          </a> --}}
        </div>
      </nav>
    </div>
    
    <div class="profile-actions">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="nav-tab" type="submit">
          <img src="{{ asset('assets/images/logout.png') }}" height="10px" width="10px" alt="logout"
            class="icon-logout">
          Logout</button>
      </form>
    </div>
  </div>
</aside>
<!-- partial -->

<div class="main-wrapper mdc-drawer-app-content">