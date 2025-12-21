<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Data Peminjaman</title>
  <!-- plugins:css -->

  @include('layouts.admin.css')
  <!-- End layout styles -->

  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
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
          
<div id="syarat" class="tab-content active">
<form action="{{ route('syarat.update', $nama_syarat->syarat_id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mdc-layout-grid">
      <div class="mdc-layout-grid__inner">
        
        <!-- Card Identitas -->
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
          <div class="mdc-card">
            <h6 class="card-title">Data Syarat Peminjaman</h6>
            <div class="template-demo">
              <div class="mdc-layout-grid__inner">

      <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mt-3">
  <div class="mdc-select mdc-select--outlined mdc-select--fullwidth">
    
    <!-- Native Select -->
    <select name="fasilitas_id" class="mdc-select__native-control" required>
      <option value="" disabled {{ $nama_syarat->fasilitas_id ? '' : 'selected' }}>-- Pilih Fasilitas --</option>
      @foreach($fasilitas as $f)
        <option value="{{ $f->fasilitas_id }}" 
                {{ $f->fasilitas_id == $nama_syarat->fasilitas_id ? 'selected' : '' }}>
          {{ $f->nama_fasilitas }}
        </option>
      @endforeach
    </select>

    <!-- Label harus berada di dalam notched-outline -->
    <label class="mdc-floating-label">Fasilitas</label>

    <div class="mdc-notched-outline">
      <div class="mdc-notched-outline__leading"></div>
      <div class="mdc-notched-outline__notch"></div>
      <div class="mdc-notched-outline__trailing"></div>
    </div>
  </div>
</div>


                
                <!-- jumlah -->
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                  <div class="mdc-text-field mdc-text-field--outlined">
                    <input type="text" name="nama_syarat" 
       value="{{ old('nama_syarat', $nama_syarat->nama_syarat) }}" 
       class="mdc-text-field__input" required>
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
                    <input type="text" name="deskripsi" value="{{ old('deskripsi', $nama_syarat->deskripsi) }}" class="mdc-text-field__input" required>
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


        </main>

        <!-- partial:../../partials/_footer.html -->
        @include('layouts.admin.footer')
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  
 @Include('layouts.admin.js')
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>