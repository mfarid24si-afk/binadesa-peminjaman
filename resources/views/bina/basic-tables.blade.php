<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $judul }}</title>
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
        <a href="{{ url('/bina') }}" class="brand-logo">
          <img src="{{asset('assets/images/logo.svg')}}" alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name">{{ $name }}</p>
          <p class="email">{{ $email }}</p>
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
            <span class="mdc-top-app-bar__title">Selamat Datang</span>
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
                  <span class="user-name">{{ $name }}</span>
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

<div id="warga" class="tab-content active">
{{-- ==================== TABLE WARGA ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Warga</h6>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Agama</th>
            <th>Jenis Kelamin</th>
            <th>No. Telepon</th>
            <th>Email</th>
            <th>Aksi</th>   
          </tr>
        </thead>
        <tbody>
          @forelse($warga as $w)
          <tr>
            <td>{{ $w->warga_id }}</td>
            <td>{{ $w->nama }}</td>
            <td>{{ $w->agama }}</td>
            <td>{{ $w->jenis_kelamin }}</td>
            <td>{{ $w->telp }}</td>
            <td>{{ $w->email }}</td>
            <td>
  <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center">Belum ada data warga</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div id="media" class="tab-content">
{{-- ==================== TABLE MEDIA ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Media</h6>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Ref_table</th>
            <th>Ref_id</th>
            <th>File_url</th>
            <th>Caption</th>
            <th>Mimme Type</th>
            <th>Sort order</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($media as $m)
          <tr>
          <td>{{ $m->media_id }}</td>
          <td>{{ $m->ref_table }}</td>
          <td>{{ $m->ref_id }}</td>
          <td>{{ $m->file_url }}</td>
          <td>{{ $m->caption }}</td>
          <td>{{ $m->mime_type }}</td>
          <td>{{ $m->sort_order }}</td>
          <td>
  <a href="{{ route('media.edit', $m->media_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('media.destroy', $m->media_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center">Belum ada data media</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div id="fasilitas" class="tab-content">
{{-- ==================== TABLE Fasilitas umum ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Fasilitas</h6>
    <div class="table-responsive">
      <table class="table">
         <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Fasilitas</th>
                          <th>Jenis Fasilitas</th>
                            <th>Alamat</th>
                            <th>Rt/Rw</th>
                            <th>Kapasitas</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
@forelse ($fasilitas as $item)
<tr>
  <td>{{ $item->fasilitas_id }}</td>
    <td>{{ $item->nama }}</td>
    <td>{{ $item->jenis }}</td>
    <td>{{ $item->alamat }}</td>
    <td>{{ $item->rt }} / {{ $item->rw }}</td>
    <td>{{ $item->kapasitas }}</td>
    <td>{{ $item->deskripsi }}</td>
    <td>
  <a href="{{ route('fasilitas.edit', $item->fasilitas_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('fasilitas.destroy', $item->fasilitas_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

</tr>
@empty
          <tr>
            <td colspan="3" class="text-center">Belum ada data media</td>
          </tr>
@endforelse
</tbody>
      </table>
    </div>
  </div>
</div>
</div> 

<div id="peminjaman" class="tab-content">
{{-- ==================== TABLE Peminjaman ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Peminjaman</h6>
    <div class="table-responsive">
      <table class="table">
        <thead>
                        <tr>
                          <th>No</th>
                            <th>ID Fasilitas</th>
                            <th>ID Warga</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Tujuan</th>
                            <th>Status</th>
                            <th>Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjaman as $item)
<tr>  
    <td>{{ $item->pinjam_id }}</td>
    <td>{{ $item->fasilitas_id }}</td>
    <td>{{ $item->warga_id }}</td>
    <td>{{ $item->tanggal_mulai }}</td>
    <td>{{ $item->tanggal_selesai }}</td>
    <td>{{ $item->tujuan }}</td>
    <td>{{ $item->status }}</td>
    <td>{{ $item->total_biaya }}</td>
    <td>
  <a href="{{ route('peminjaman.edit', $item->pinjam_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('peminjaman.destroy', $item->pinjam_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

</tr>
@empty
          <tr>
            <td colspan="3" class="text-center">Belum ada data peminjaman</td>
          </tr>
@endforelse
                    </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div id="pembayaran" class="tab-content">
{{-- ==================== TABLE Pembayaran ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Pembayaran</h6>
    <div class="table-responsive">
      <table class="table">
         <thead>
                        <tr>
                          <td>No</td>
                          <td>ID Peminjaman</td>
                            <th>Tanggal</th>
                            <th>Jumlah Nominal</th>
                            <th>Metode</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                          @forelse ($pembayaran as $item)
<tr>
  <td>{{ $item->bayar_id }}</td>
  <td>{{ $item->pinjam_id }}</td>  
    <td>{{ $item->tanggal }}</td>
    <td>{{ $item->jumlah }}</td>
    <td>{{ $item->metode }}</td>
    <td>{{ $item->keterangan }}</td>
    <td>
  <a href="{{ route('pembayaran.edit', $item->bayar_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('pembayaran.destroy', $item->bayar_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

</tr>
@empty
          <tr>
            <td colspan="3" class="text-center">Belum ada data pembayaran</td>
          </tr>
@endforelse
                    </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div id="syarat" class="tab-content">
{{-- ==================== TABLE Syarat ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Syarat</h6>
    <div class="table-responsive">
      <table class="table">
        <thead>
                        <tr>
                          <th>No</th>
                          <th>ID Fasilitas</th>
                            <th>Syarat</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                          @forelse ($syarat as $item)
<tr>
  <td>{{ $item->syarat_id }}</td>
    <td>{{ $item->fasilitas_id }}</td>
    <td>{{ $item->nama_syarat }}</td>
    <td>{{ $item->deskripsi }}</td>
    <td>
  <a href="{{ route('syarat.edit', $item->syarat_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('syarat.destroy', $item->syarat_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

</tr>
@empty
          <tr>
            <td colspan="3" class="text-center">Belum ada data Syarat</td>
          </tr>
@endforelse
                    </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div id="petugas" class="tab-content">
{{-- ==================== TABLE Petugas ==================== --}}
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-card p-0">
    <h6 class="card-title card-padding pb-0">Data Petugas</h6>
    <div class="table-responsive">
      <table class="table">
         <thead>
                        <tr>
                          <th>No</th>
                          <th>ID Fasilitas</th>
                            <th>ID Petugas</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                          @forelse ($petugas as $item)
<tr>
  <td>{{ $item->petugas_id }}</td>
    <td>{{ $item->fasilitas_id }}</td>
    <td>{{ $item->petugas_warga_id }}</td>
    <td>{{ $item->peran }}</td>
    <td>
  <a href="{{ route('petugas.edit', $item->petugas_id) }}" class="btn btn-primary">Edit</a>

  <form action="{{ route('petugas.destroy', $item->petugas_id) }}" method="POST" style="display:inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Hapus</button>
  </form>
</td>

</tr>
@empty
          <tr>
            <td colspan="3" class="text-center">Belum ada data petugas</td>
          </tr>
@endforelse
                    </tbody>
      </table>
    </div>
  </div>
</div>
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
</body>
</html>