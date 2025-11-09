<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Data Peminjaman</title>
  <!-- plugins:css -->

  @include('layouts.admin.css')
  {{-- end css --}}
</head>
<body>
<script src="{{asset('assets/js/preloader.js')}}"></script>
  <div class="body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->

    @include('layouts.admin.sidebar')
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:../../partials/_navbar.html -->

      @include('layouts.admin.header')
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          
          

<div id="fasilitas" class="tab-content active">
  {{-- form fasilitas --}}
  <form action="{{ route('fasilitas.update', $fasilitas->fasilitas_id) }}" method="POST">
    @csrf
    @method('PUT')
    
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
                    <input type="text" name="nama" value="{{ old('nama', $fasilitas->nama) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="alamat" value="{{ old('alamat', $fasilitas->alamat) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="rt" value="{{ old('rt', $fasilitas->rt) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="rw" value="{{ old('rw', $fasilitas->rw) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="jenis" value="{{ old('jenis', $fasilitas->jenis) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="kapasitas" value="{{ old('kapasitas', $fasilitas->kapasitas) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="deskripsi" value="{{ old('deskripsi', $fasilitas->deskripsi) }}" class="mdc-text-field__input" required>
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

        </main>
        <!-- partial:../../partials/_footer.html -->

        @include('layouts.admin.footer')
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  
 @include('layouts.admin.js')
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>