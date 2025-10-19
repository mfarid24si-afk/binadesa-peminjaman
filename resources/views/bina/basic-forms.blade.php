<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>$judul</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('assets/css/demo/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>
<body>
<script src="{{asset('assets/js/preloader.js')}}"></script>
  <div class="body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="../../index.html" class="brand-logo">
          <img src="{{asset('assets/images/logo.svg')}}" alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="nama">Spyvy</p>
          <p class="email">spyvy@desa.com</p>
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
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                Forms
              </a>
            </div>

            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('/tables') }}">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
                Tables
              </a>
            </div>
            
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="sample-page-submenu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">pages</i>
                Sample Pages
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="sample-page-submenu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/blank-page.html">
                      Blank Page
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/403.html">
                      403
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/404.html">
                      404
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/500.html">
                      500
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/505.html">
                      505
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/login.html">
                      Login
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/samples/register.html">
                      Register
                    </a>
                  </div>
                </nav>
              </div>
            </div>
        
          </nav>
        </div>
        <div class="profile-actions">
          <a href="javascript:;">Settings</a>
          <span class="divider"></span>
          <a href="javascript:;">Logout</a>
        </div>
        
      </div>
    </aside>
    <!-- partial -->

    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:../../partials/_navbar.html -->
      <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title">Selamata Datang</span>
            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
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
            <div class="menu-button-container menu-profile d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src="{{asset('assets/images/faces/face11.jpg')}}" alt="user" class="user">
                  </span>
                  <span class="user-nama">Spyvy</span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-account-edit-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Edit profile</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-settings-outline text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Logout</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="divider d-none d-md-block"></div>
            <div class="menu-button-container d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-settings"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-alert-circle-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Settings</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-progress-download text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Update</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-bell"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-email-outline"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">You received a new message</h6>
                      <small class="text-muted"> 6 min ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-account-outline"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">New user registered</h6>
                      <small class="text-muted"> 15 min ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-alert-circle-outline"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">System Alert</h6>
                      <small class="text-muted"> 2 days ago </small>
                    </div>
                  </li> 
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-update"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">You have a new update</h6>
                      <small class="text-muted"> 3 days ago </small>
                    </div>
                  </li> 
                </ul>
              </div>
            </div>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-email"></i>
                <span class="count-indicator">
                  <span class="count">3</span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail">
                      <img src="{{asset('assets/images/faces/face4.jpg')}}" alt="user">
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                      <small class="text-muted"> 1 Minutes ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail">
                      <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="user">
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                      <small class="text-muted"> 15 Minutes ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail">
                      <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="user">
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                      <small class="text-muted"> 18 Minutes ago </small>
                    </div>
                  </li>                
                </ul>
              </div>
            </div>
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
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-logout-variant text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Logout</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
  
  <!-- Alert success -->
  @if(session('success'))
  <div class="mdc-layout-grid">
    <div class="mdc-layout-grid__inner">
      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
      </div>
    </div>
  </div>
  @endif

  <!-- Form -->
  <form action="{{ route('forms.store') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Identitas</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- Nama Depan -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="first_name" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nama Depan</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- Nama Belakang -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="last_name" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nama Belakang</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- Nomor HP -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="phone" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nomor Handphone</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal Lahir -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="date" name="birthday" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Tanggal Lahir</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                    <input type="hidden" name="gender">
                    <i class="mdc-select__dropdown-icon"></i>
                    <div class="mdc-select__selected-text"></div>
                    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                      <ul class="mdc-list">
                        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>
                        <li class="mdc-list-item" data-value="Laki-Laki">Laki-Laki</li>
                        <li class="mdc-list-item" data-value="Perempuan">Perempuan</li>
                      </ul>
                    </div>
                    <span class="mdc-floating-label">Jenis Kelamin</span>
                    <div class="mdc-line-ripple"></div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card Peminjaman -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Peminjaman</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- Barang/Fasilitas -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="barang" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Barang/Fasilitas</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Tombol Simpan & Batal -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
          <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="mdc-button mdc-button--raised">
              Simpan
            </button>
            <a href="{{ route('tables') }}" class="mdc-button mdc-button--outlined ml-2">
              Batal
            </a>
          </div>
        </div>

      </div>
    </div>
  </form>

</main>
        <!-- partial:../../partials/_footer.html -->
        <footer>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2020. Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></span>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center tx-14">Free <a href="https://www.bootstrapdash.com/material-design-dashboard/" target="_blank"> material admin </a> dashboards from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets/js/material.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>