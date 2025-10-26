<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bina Desa</title>
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

<script src="{{asset('assets/js/form.js')}}"></script>

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
        <div class="tab-container"> 
          <button class="nav-tab" onclick="showTab(event, 'form')">Form</button>
          <button class="nav-tab active" onclick="showTab(event, 'warga')">👽 Warga</button>
          <button class="nav-tab" onclick="showTab(event, 'media')">🛸 Media</button>
          <button class="nav-tab" onclick="showTab(event, 'fasilitas')">🏠 Fasilitas Umum</button>
          <button class="nav-tab" onclick="showTab(event, 'peminjaman')">📋 Peminjaman</button>
          <button class="nav-tab" onclick="showTab(event, 'pembayaran')">💰 Pembayaran</button>
          <button class="nav-tab" onclick="showTab(event, 'syarat')">📄 Syarat Fasilitas</button>
          <button class="nav-tab" onclick="showTab(event, 'petugas')">👥 Petugas</button>
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

  <div id="form" class="tab-content">
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
</div>

  <div id="warga" class="tab-content active">
    {{-- form warga --}}
  <form action="{{ route('forms.store.warga') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Warga</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- Nama -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="nama" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nama</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- pekerjaan -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="pekerjaan" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Pekerjaan</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

               <!-- Jenis Kelamin -->
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
  <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
    <input type="hidden" name="jenis_kelamin">
    <i class="mdc-select__dropdown-icon"></i>
    <div class="mdc-select__selected-text"></div>
    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
      <ul class="mdc-list">
        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>
        <li class="mdc-list-item" data-value="L">Laki-Laki</li>
        <li class="mdc-list-item" data-value="P">Perempuan</li>
      </ul>
    </div>
    <span class="mdc-floating-label">Jenis Kelamin</span>
    <div class="mdc-line-ripple"></div>
  </div>
</div>

<!-- Agama -->
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
  <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
    <input type="hidden" name="agama">
    <i class="mdc-select__dropdown-icon"></i>
    <div class="mdc-select__selected-text"></div>
    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
      <ul class="mdc-list">
        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>
        <li class="mdc-list-item" data-value="Islam">Islam</li>
        <li class="mdc-list-item" data-value="Kristen">Kristen</li>
        <li class="mdc-list-item" data-value="Budha">Budha</li>
        <li class="mdc-list-item" data-value="Hindu">Hindu</li>
        <li class="mdc-list-item" data-value="Konghucu">Konghucu</li>
      </ul>
    </div>
    <span class="mdc-floating-label">Agama</span>
    <div class="mdc-line-ripple"></div>
  </div>
</div>


              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">👽</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- no hp -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="telp" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nomor Handphone</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- email -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="email" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Email</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- ktp -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="no_ktp" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nomor KTP</label>
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
</div>

  <div id="media" class="tab-content">  
  {{-- form media --}}
  <!-- Form -->
  <form action="{{ route('forms.store.media') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Media</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- ref table -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="ref_table" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Ref Table</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- ref id -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="ref_id" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Ref ID</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- file url -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="file_url" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">File URL</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">🛸</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">

                <!-- Caption -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="caption" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Caption</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- mime type -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                    <input type="hidden" name="mime_type">
                    <i class="mdc-select__dropdown-icon"></i>
                    <div class="mdc-select__selected-text"></div>
                    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                      <ul class="mdc-list">
                        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>
                        <li class="mdc-list-item" data-value="image/jpg">image/jpg</li>
                        <li class="mdc-list-item" data-value="image/png">image/png</li>
                        <li class="mdc-list-item" data-value="image/jpeg">image/jpeg</li>
                      </ul>
                    </div>
                    <span class="mdc-floating-label">Mime type</span>
                    <div class="mdc-line-ripple"></div>
                  </div>
                </div>

                <!-- sort order -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                    <input type="hidden" name="sort_order">
                    <i class="mdc-select__dropdown-icon"></i>
                    <div class="mdc-select__selected-text"></div>
                    <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                      <ul class="mdc-list">
                        <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true"></li>
                        <li class="mdc-list-item" data-value="1">1</li>
                        <li class="mdc-list-item" data-value="2">2</li>
                        <li class="mdc-list-item" data-value="3">3</li>
                        <li class="mdc-list-item" data-value="4">4</li>
                        <li class="mdc-list-item" data-value="5">5</li>
                        <li class="mdc-list-item" data-value="6">6</li>
                        <li class="mdc-list-item" data-value="7">7</li>
                        <li class="mdc-list-item" data-value="8">8</li>
                        <li class="mdc-list-item" data-value="9">9</li>
                      </ul>
                    </div>
                    <span class="mdc-floating-label">Sort Order</span>
                    <div class="mdc-line-ripple"></div>
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
</div>

<div id="fasilitas" class="tab-content">
  {{-- form fasilitas --}}
  <form action="{{ route('forms.store.fasilitas') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Fasilitas</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- Nama Depan -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="nama" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Nama Fasilitas</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- alamat -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="alamat" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Alamat</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- rt -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="rt" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">RT</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- rw -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="rw" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">RW</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">👽</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
               <!-- jenis fasilitas -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="jenis" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Jenis Fasilitas</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- kapasitas -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="kapasitas" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Kapasitas</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- deskripsi -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="deskripsi" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Deskripsi </label>
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
</div>

<div id="peminjaman" class="tab-content">
<form action="{{ route('forms.store.peminjaman') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Peminjaman</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- Tanggal mulai -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="date" name="tanggal_mulai" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Tanggal Mulai</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- Tanggal selesai -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="date" name="tanggal_selesai" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Tanggal Selesai</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- tujuan -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="tujuan" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Tujuan</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">👽</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
               <!-- status -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="status" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Status</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- total biaya -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="total_biaya" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Total Biaya</label>
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
</div>

<div id="syarat" class="tab-content">
<form action="{{ route('forms.store.syarat') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Syarat Peminjaman</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- jumlah -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="nama_syarat" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Syarat</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">👽</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
               <!-- status -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="deskripsi" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Deskripsi</label>
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
</div>

<div id="pembayaran" class="tab-content">
<form action="{{ route('forms.store.pembayaran') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Pembayaran</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- Tanggal -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="date" name="tanggal" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Tanggal</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- jumlah -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="jumlah" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Jumlah</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">👽</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
               <!-- status -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="metode" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Metode</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

                <!-- total biaya -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="keterangan" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Keterangan</label>
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
</div>


<div id="petugas" class="tab-content">
<form action="{{ route('forms.store.petugas') }}" method="POST">
    @csrf
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Petugas</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
                <!-- jumlah -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="petugas_warga_id" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">ID Petugas</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Card sebelahnya -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">👽</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">
                
               <!-- status -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="peran" class="mdc-text-field__input" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Peran</label>
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
</div>

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