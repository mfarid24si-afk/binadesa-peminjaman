<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bina Desa</title>

  {{-- start css --}}
  @include('layouts.admin.css')
  {{-- end css --}}
</head>

<script src="{{asset('assets/js/form.js')}}"></script>

<body>
  <script src="{{asset('assets/js/preloader.js')}}"></script>
  <div class="body-wrapper">

    <!-- partial:../../partials/_sidebar.html -->
    @include('layouts.admin.sidebar')
    <!-- partial -->

    <div class="main-wrapper mdc-drawer-app-content">

      <!-- start heade -->

      @include('layouts.admin.header_tf')
      <!--- end header --->

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

          {{-- Tab Navigation --}}
          @php
            $tabs = [
              ['id' => 'user',      'label' => 'User',      'icon' => 'person',       'roles' => ['super admin','admin']],
              ['id' => 'warga',     'label' => 'Warga',     'icon' => 'people',       'roles' => ['super admin','admin','user']],
              ['id' => 'fasilitas', 'label' => 'Fasilitas', 'icon' => 'store',        'roles' => ['super admin','admin','user']],
              ['id' => 'media',     'label' => 'Media',     'icon' => 'collections',  'roles' => ['super admin','admin']],
              ['id' => 'peminjaman','label' => 'Peminjaman','icon' => 'assignment',   'roles' => ['super admin','admin','user']],
              ['id' => 'syarat',    'label' => 'Syarat',    'icon' => 'description',  'roles' => ['super admin','admin']],
              ['id' => 'pembayaran','label' => 'Pembayaran','icon' => 'credit_card',  'roles' => ['super admin','admin']],
              ['id' => 'petugas',   'label' => 'Petugas',   'icon' => 'assignment_ind','roles' => ['super admin','admin']],
            ];
          @endphp

          <div class="mdc-card" style="padding:16px; margin-bottom:24px;">
            <div style="display:flex; flex-wrap:wrap; gap:8px;">
              @foreach($tabs as $tab)
                @if(in_array(Auth::user()->role ?? 'user', $tab['roles']))
                <button class="nav-tab {{ $tab['id'] === 'warga' ? 'active' : '' }}" onclick="showTab(event, '{{ $tab['id'] }}')">
                  <i class="material-icons" style="font-size:16px;">{{ $tab['icon'] }}</i>
                  {{ $tab['label'] }}
                </button>
                @endif
              @endforeach
            </div>
          </div>

          <div id="user" class="tab-content">
            <!-- Form -->
            <form action="{{ route('forms.store.user') }}" method="POST">
              @csrf

              <div class="mdc-layout-grid">
                <div class="mdc-layout-grid__inner">

                  <!-- Card Identitas -->
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-card">
                      <h6 class="card-title">User</h6>
                      <div class="template-demo">
                        <div class="mdc-layout-grid__inner">

                          <!-- Nama Depan -->
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined">
                              <input type="text" name="name" class="mdc-text-field__input" required>
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                  <label class="mdc-floating-label">Name</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>

                          <!-- Nama Belakang -->
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
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

                          <!-- Nomor HP -->
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined">
                              <input type="text" name="password" class="mdc-text-field__input" required>
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                  <label class="mdc-floating-label">Password</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>

      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                            <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                              <input type="hidden" name="role">
                              <i class="mdc-select__dropdown-icon"></i>
                              <div class="mdc-select__selected-text"></div>
                              <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                                <ul class="mdc-list">
                                  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                  </li>
                                  <li class="mdc-list-item" data-value="super admin">Super Admin</li>
                                  <li class="mdc-list-item" data-value="admin">Admin</li>
                                  <li class="mdc-list-item" data-value="user">User</li>
                                </ul>
                              </div>
                              <span class="mdc-floating-label">Role</span>
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
                                  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                  </li>
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
                                  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                  </li>
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

                          
                          <!-- Upload File Baru -->
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <label for="fileUpload" class="btn btn-primary">
    Pilih File
</label>
<input 
    type="file" 
    id="fileUpload" 
    name="file"
    style="display: none;"
>

</div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Card sebelahnya -->
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-card">
                      <h6 class="card-title"><i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">contact_mail</i>Kontak
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
            <form action="{{ route('forms.store.media') }}" method="POST" >


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

                          <!-- Upload File Baru -->
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <label for="fileUpload" class="btn btn-primary">
    Pilih File
</label>
<input 
    type="file" 
    id="fileUpload" 
    name="file"
    style="display: none;"
>

</div>


                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Card sebelahnya -->
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-card">
                      <h6 class="card-title"><i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">perm_media</i>Detail Media
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
                                  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                  </li>
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
                                  <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                                  </li>
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
                      <h6 class="card-title"><i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">contact_mail</i>Kontak
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

                  {{-- Card 1: Data Peminjaman --}}
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8-desktop">
                    <div class="mdc-card">
                      <h6 class="card-title">
                        <i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">assignment</i>
                        Data Peminjaman
                      </h6>
                      <div class="template-demo">
                        <div class="mdc-layout-grid__inner">

                          {{-- Warga --}}
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                              <select name="warga_id" class="mdc-text-field__input" required>
                                <option value="">-- Pilih Warga --</option>
                                @foreach($warga as $w)
                                  <option value="{{ $w->warga_id }}">{{ $w->nama }}</option>
                                @endforeach
                              </select>
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                  <label class="mdc-floating-label">Warga</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>

                          {{-- Fasilitas --}}
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                              <select name="fasilitas_id" class="mdc-text-field__input" required>
                                <option value="">-- Pilih Fasilitas --</option>
                                @foreach($fasilitas as $fas)
                                  <option value="{{ $fas->fasilitas_id }}">{{ $fas->nama }}</option>
                                @endforeach
                              </select>
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                  <label class="mdc-floating-label">Fasilitas</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>

                          {{-- Tanggal Mulai --}}
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
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

                          {{-- Tanggal Selesai --}}
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
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

                          {{-- Tujuan --}}
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                              <input type="text" name="tujuan" class="mdc-text-field__input" placeholder="Contoh: Acara HUT RI" required>
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                  <label class="mdc-floating-label">Tujuan Peminjaman</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>

                          {{-- Total Biaya --}}
                          <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%;">
                              <input type="number" name="total_biaya" class="mdc-text-field__input" step="0.01" min="0">
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                  <label class="mdc-floating-label">Total Biaya (Rp)</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- Card 2: Detail Barang (Multi-Item) --}}
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                    <div class="mdc-card" style="height:100%;">
                      <h6 class="card-title" style="display:flex; align-items:center; justify-content:space-between;">
                        <span>
                          <i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">inventory_2</i>
                          Barang Dipinjam
                        </span>
                        <button type="button" onclick="addItemRow()" class="btn-action btn-action-edit"
                                style="padding:4px 10px; font-size:12px;">
                          <i class="material-icons" style="font-size:14px;">add</i> Tambah
                        </button>
                      </h6>
                      <div id="items-container">
                        {{-- Item row template --}}
                        <div class="item-row" style="background:var(--surface); border-radius:8px; padding:12px; margin-bottom:10px; border:1px solid var(--border);">
                          <div style="display:flex; gap:8px; margin-bottom:8px;">
                            <div style="flex:1;">
                              <div class="mdc-text-field mdc-text-field--outlined" style="width:100%; margin:0; height:40px;">
                                <input type="text" name="items[0][nama]" class="mdc-text-field__input" placeholder="Nama barang" required style="padding:8px;">
                                <div class="mdc-notched-outline">
                                  <div class="mdc-notched-outline__leading"></div>
                                  <div class="mdc-notched-outline__trailing"></div>
                                </div>
                              </div>
                            </div>
                            <div style="width:80px; flex-shrink:0;">
                              <div class="mdc-text-field mdc-text-field--outlined" style="width:100%; margin:0; height:40px;">
                                <input type="number" name="items[0][jumlah]" class="mdc-text-field__input" placeholder="Jml" required min="1" value="1" style="padding:8px; text-align:center;">
                                <div class="mdc-notched-outline">
                                  <div class="mdc-notched-outline__leading"></div>
                                  <div class="mdc-notched-outline__trailing"></div>
                                </div>
                              </div>
                            </div>
                            <button type="button" onclick="this.closest('.item-row').remove(); updateItemIndex()"
                                    style="background:none; border:none; color:#ef5350; cursor:pointer; padding:4px; flex-shrink:0;">
                              <i class="material-icons" style="font-size:18px;">close</i>
                            </button>
                          </div>
                          <div>
                            <div class="mdc-text-field mdc-text-field--outlined" style="width:100%; margin:0; height:36px;">
                              <input type="text" name="items[0][keterangan]" class="mdc-text-field__input" placeholder="Keterangan (opsional)" style="padding:6px 8px; font-size:12px;">
                              <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__trailing"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p id="items-empty-msg" style="display:none; color:var(--text-secondary); font-size:12px; text-align:center; padding:16px 0;">
                        <i class="material-icons" style="font-size:16px; vertical-align:middle;">info</i>
                        Minimal 1 barang harus ditambahkan
                      </p>
                      <small style="color:var(--text-secondary); display:block; margin-top:8px; font-size:11px;">
                        <i class="material-icons" style="font-size:12px; vertical-align:middle;">info</i>
                        Status otomatis diisi "pending" dan log aktivitas tercatat.
                      </small>
                    </div>
                  </div>

                  {{-- Tombol Aksi --}}
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                    <div class="d-flex justify-content-end mt-4" style="gap:12px;">
                      <a href="{{ route('peminjaman') }}" class="mdc-button mdc-button--outlined">
                        Batal
                      </a>
                      <button type="submit" class="mdc-button mdc-button--raised" style="background:var(--primary);">
                        <i class="material-icons" style="font-size:16px; margin-right:6px;">save</i>
                        Ajukan Peminjaman
                      </button>
                    </div>
                  </div>

                </div>
              </div>
            </form>
          </div>

          {{-- JavaScript for dynamic items --}}
          <script>
          let itemIndex = 1;
          function addItemRow() {
            const container = document.getElementById('items-container');
            const msg = document.getElementById('items-empty-msg');
            if (msg) msg.style.display = 'none';
            const div = document.createElement('div');
            div.className = 'item-row';
            div.style.cssText = 'background:var(--surface); border-radius:8px; padding:12px; margin-bottom:10px; border:1px solid var(--border);';
            div.innerHTML = `
              <div style="display:flex; gap:8px; margin-bottom:8px;">
                <div style="flex:1;">
                  <div class="mdc-text-field mdc-text-field--outlined" style="width:100%; margin:0; height:40px;">
                    <input type="text" name="items[${itemIndex}][nama]" class="mdc-text-field__input" placeholder="Nama barang" required style="padding:8px;">
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>
                <div style="width:80px; flex-shrink:0;">
                  <div class="mdc-text-field mdc-text-field--outlined" style="width:100%; margin:0; height:40px;">
                    <input type="number" name="items[${itemIndex}][jumlah]" class="mdc-text-field__input" placeholder="Jml" required min="1" value="1" style="padding:8px; text-align:center;">
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                </div>
                <button type="button" onclick="this.closest('.item-row').remove(); updateItemIndex()"
                        style="background:none; border:none; color:#ef5350; cursor:pointer; padding:4px; flex-shrink:0;">
                  <i class="material-icons" style="font-size:18px;">close</i>
                </button>
              </div>
              <div>
                <div class="mdc-text-field mdc-text-field--outlined" style="width:100%; margin:0; height:36px;">
                  <input type="text" name="items[${itemIndex}][keterangan]" class="mdc-text-field__input" placeholder="Keterangan (opsional)" style="padding:6px 8px; font-size:12px;">
                  <div class="mdc-notched-outline">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__trailing"></div>
                  </div>
                </div>
              </div>
            `;
            container.appendChild(div);
            // Init MDC for new row fields
            if (typeof mdc !== 'undefined' && mdc.textField) {
              div.querySelectorAll('.mdc-text-field').forEach(function(el) {
                try { mdc.textField.MDCTextField.attachTo(el); } catch(e) {}
              });
            }
            itemIndex++;
          }
          function updateItemIndex() {
            const rows = document.querySelectorAll('#items-container .item-row');
            rows.forEach(function(row, idx) {
              row.querySelectorAll('[name]').forEach(function(input) {
                var name = input.getAttribute('name');
                input.setAttribute('name', name.replace(/\[\d+\]/, '[' + idx + ']'));
              });
            });
            const msg = document.getElementById('items-empty-msg');
            if (msg) {
              msg.style.display = rows.length === 0 ? 'block' : 'none';
            }
          }
          document.addEventListener('DOMContentLoaded', function() {
            // Re-init MDC for dynamic fields
            if (typeof mdc !== 'undefined' && mdc.textField) {
              document.querySelectorAll('.item-row .mdc-text-field').forEach(function(el) {
                try { mdc.textField.MDCTextField.attachTo(el); } catch(e) {}
              });
            }
          });
          </script>

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

                            <!-- Dropdown Fasilitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
          <div class="mdc-text-field mdc-text-field--outlined">
            <select name="fasilitas_id" class="mdc-text-field__input" required>
              @foreach($fasilitas as $fas)
                <option value="{{ $fas->fasilitas_id }}">{{ $fas->nama }}</option>
              @endforeach
            </select>

            <div class="mdc-notched-outline">
              <div class="mdc-notched-outline__leading"></div>
              <div class="mdc-notched-outline__notch">
                <label class="mdc-floating-label">Fasilitas</label>
              </div>
              <div class="mdc-notched-outline__trailing"></div>
            </div>
          </div>
        </div>
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
                      <h6 class="card-title"><i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">contact_mail</i>Kontak
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

                           <!-- Dropdown Peminjaman -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
          <div class="mdc-text-field mdc-text-field--outlined">
            <select name="pinjam_id" class="mdc-text-field__input" required>
              @foreach($peminjaman as $pmj)
                <option value="{{ $pmj->pinjam_id }}">
                  {{ $pmj->peminjaman_id }}{{ $pmj->nama_peminjam ?? 'Warga' }}
                </option>
              @endforeach
            </select>

            <div class="mdc-notched-outline">
              <div class="mdc-notched-outline__leading"></div>
              <div class="mdc-notched-outline__notch">
                <label class="mdc-floating-label">Peminjaman</label>
              </div>
              <div class="mdc-notched-outline__trailing"></div>
            </div>
          </div>
        </div>

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
                      <h6 class="card-title"><i class="material-icons" style="font-size:18px; vertical-align:middle; margin-right:6px;">contact_mail</i>Kontak
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

                <!-- Dropdown Fasilitas (WAJIB) -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-text-field mdc-text-field--outlined">
    <select name="petugas_warga_id" class="mdc-text-field__input" required>
      
      <option value="">-- Warga --</option>
      @foreach($warga as $w)
        <option value="{{ $w->warga_id }}">
          {{ $w->nama }}
        </option>
      @endforeach
    </select>

    <div class="mdc-notched-outline">
      <div class="mdc-notched-outline__leading"></div>
      <div class="mdc-notched-outline__notch">
      </div>  
      <div class="mdc-notched-outline__trailing"></div>
    </div>
  </div>
  @error('warga_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
</div>

                <!-- Dropdown Warga (ganti input manual) -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <select name="fasilitas_id" class="mdc-text-field__input" required>
    <option value="">-- Fasilitas --</option>
    @foreach($fasilitas as $fas)
        <option value="{{ $fas->fasilitas_id }}">{{ $fas->nama }}</option>
    @endforeach
</select>

                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                  @error('fasilitas_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
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

                <!-- peran -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="peran" class="mdc-text-field__input" 
                           value="{{ old('peran') }}" required>
                    <div class="mdc-notched-outline">
                      <div class="mdc-notched-outline__leading"></div>
                      <div class="mdc-notched-outline__notch">
                        <label class="mdc-floating-label">Peran</label>
                      </div>
                      <div class="mdc-notched-outline__trailing"></div>
                    </div>
                  </div>
                  @error('peran') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Tombol Simpan & Batal -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
          <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="mdc-button mdc-button--raised">Simpan</button>
            {{-- <a href="{{ route('forms.create.petugas') }}" class="btn btn-primary">Tambah Petugas</a> --}}

            <a href="{{ route('tables') }}" class="mdc-button mdc-button--outlined ml-2">Batal</a>
          </div>
        </div>

      </div>
    </div>
  </form>
</div>

        </main>
        <!-- partial:../../partials/_footer.html -->

        @include('layouts.admin.footer')
        <!-- partial -->
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  
  @include('layouts.admin.js')
  <!-- End js-->
</body>

</html>