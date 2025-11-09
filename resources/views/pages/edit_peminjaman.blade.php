<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Data Peminjaman</title>
  <!-- plugins:css -->

  @Include('layouts.admin.css')
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
          
          

<div id="peminjaman" class="tab-content active">
<form action="{{ route('peminjaman.update', $peminjaman->pinjam_id) }}" method="POST">
    @csrf
    @method('PUT')
    
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
                    <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai', $peminjaman->tanggal_mulai) }}" class="mdc-text-field__input" required>
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
                    <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai', $peminjaman->tanggal_selesai) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="tujuan" value="{{ old('tujuan', $peminjaman->tujuan) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="status" value="{{ old('status', $peminjaman->status) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="total_biaya" value="{{ old('total_biaya', $peminjaman->total_biaya) }}" class="mdc-text-field__input" required>
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