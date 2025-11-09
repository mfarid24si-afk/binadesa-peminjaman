<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Edit Data Peminjaman</title>
  <!-- plugins:css -->

  @include('layouts.admin.css')
 {{-- ende css --}}
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
      </header>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          
  <div id="media" class="tab-content active">  
  {{-- form media --}}
  <!-- Form -->
  <form action="{{ route('media.update', $media->media_id) }}" method="POST">
    @csrf
    @method('PUT')
    
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
                    <input type="text" name="ref_table" value="{{ old('ref_table', $media->ref_table) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="ref_id" value="{{ old('ref_id', $media->ref_id) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="file_url" value="{{ old('file_url', $media->file_url) }}" class="mdc-text-field__input" required>
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
                    <input type="text" name="caption" value="{{ old('caption', $media->caption) }}" class="mdc-text-field__input" required>
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
                    <input type="hidden" name="mime_type" value="{{ old('mime_type', $media->mime_type) }}">
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
                    <input type="hidden" name="sort_order" value="{{ old('sort_order', $media->sort_order) }}">
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