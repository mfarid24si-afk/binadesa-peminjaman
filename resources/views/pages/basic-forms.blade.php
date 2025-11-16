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
                      <a href="{{ route('forms.store.fasilitas') }}" class="mdc-button mdc-button--outlined ml-2">
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
                          
                          <!-- Warga -->
<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-text-field mdc-text-field--outlined">
    <select name="warga_id" class="mdc-text-field__input" required>
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

<!-- Fasilitas -->
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

                           <!-- Dropdown Peminjaman -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
          <div class="mdc-text-field mdc-text-field--outlined">
            <select name="peminjaman_id" class="mdc-text-field__input" required>
              @foreach($peminjaman as $pmj)
                <option value="{{ $pmj->peminjaman_id }}">
                  {{ $pmj->peminjaman_id }} - {{ $pmj->nama_peminjam ?? 'Warga' }}
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

                <!-- Dropdown Fasilitas (WAJIB) -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
  <div class="mdc-text-field mdc-text-field--outlined">
    <select name="warga_id" class="mdc-text-field__input" required>
      
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
                  @error('petugas_warga_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
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
            <a href="{{ route('forms.create.petugas') }}" class="btn btn-primary">Tambah Petugas</a>
{{-- 
            <a href="{{ route('tables') }}" class="mdc-button mdc-button--outlined ml-2">Batal</a> --}}
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