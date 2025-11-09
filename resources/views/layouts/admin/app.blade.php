<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fasilitas Desa</title>
  {{-- start css --}}
  @include('layouts.admin.css')
  {{-- end css --}}
</head>

<body>

  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
    <div class="mdc-card welcome-card h2">
      <h2>Welcome, {{ Auth::user()->name }}</h2>
      <p>Selamat datang di sistem Fasilitas Desa</p>
    </div>
  </div>

  <script src="{{asset('assets/js/preloader.js')}}"></script>
  <div class="body-wrapper">
    <!-- start sidebar -->
    @include('layouts.admin.sidebar')
    {{-- end sidebar --}}

    <!-- start header -->
    @include('layouts.admin.header')
    <!-- end header -->
    {{-- start main content --}}
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">




            <div
              class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card bg-success text-white">
                <div class="d-flex justify-content-between">
                  <h3 class="font-weight-normal">Impressions</h3>
                  <i class="material-icons options-icon text-white">more_vert</i>
                </div>
                <div class="mdc-layout-grid__inner align-items-center">
                  <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone">
                    <div>
                      <h5 class="font-weight-normal mt-2">Customers 58.39k</h5>
                      <h2 class="font-weight-normal mt-3 mb-0">636,757K</h2>
                    </div>
                  </div>
                  <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-2-phone">
                    <canvas id="impressions-chart" height="80"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop mdc-layout-grid__cell--span-4-tablet">
              <div class="mdc-card bg-info text-white">
                <div class="d-flex justify-content-between">
                  <h3 class="font-weight-normal">Traffic</h3>
                  <i class="material-icons options-icon text-white">more_vert</i>
                </div>
                <div class="mdc-layout-grid__inner align-items-center">
                  <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-3-tablet mdc-layout-grid__cell--span-2-phone">
                    <div>
                      <h5 class="font-weight-normal mt-2">Customers 58.39k</h5>
                      <h2 class="font-weight-normal mt-3 mb-0">636,757K</h2>
                    </div>
                  </div>
                  <div
                    class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8-desktop mdc-layout-grid__cell--span-5-tablet mdc-layout-grid__cell--span-2-phone">
                    <canvas id="traffic-chart" height="80"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
              <div class="mdc-card">
                <div class="d-flex justify-content-between align-items-center">
                  <h4 class="card-title mb-2 mb-sm-0">Revenue by location</h4>
                  <div class="d-flex justtify-content-between align-items-center">
                    <p class="d-none d-sm-block text-muted tx-12 mb-0 mr-2">Goal reached</p>
                    <i class="material-icons options-icon">more_vert</i>
                  </div>
                </div>
                <div class="d-block d-sm-flex justify-content-between align-items-center">
                  <h6 class="card-sub-title mb-0">Sales performance revenue based by country</h6>
                  <div class="mdc-tab-wrapper revenue-tab mdc-tab--secondary">
                    <div class="mdc-tab-bar" role="tablist">
                      <div class="mdc-tab-scroller">
                        <div class="mdc-tab-scroller__scroll-area">
                          <div class="mdc-tab-scroller__scroll-content">
                            <button class="mdc-tab mdc-tab--active" role="tab" aria-selected="true" tabindex="0">
                              <span class="mdc-tab__content">
                                <span class="mdc-tab__text-label">1W</span>
                              </span>
                              <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                              </span>
                              <span class="mdc-tab__ripple"></span>
                            </button>
                            <button class="mdc-tab mdc-tab" role="tab" aria-selected="true" tabindex="0">
                              <span class="mdc-tab__content">
                                <span class="mdc-tab__text-label">1M</span>
                              </span>
                              <span class="mdc-tab-indicator mdc-tab-indicator">
                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                              </span>
                              <span class="mdc-tab__ripple"></span>
                            </button>
                            <button class="mdc-tab mdc-tab" role="tab" aria-selected="true" tabindex="0">
                              <span class="mdc-tab__content">
                                <span class="mdc-tab__text-label">3M</span>
                              </span>
                              <span class="mdc-tab-indicator mdc-tab-indicator">
                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                              </span>
                              <span class="mdc-tab__ripple"></span>
                            </button>
                            <button class="mdc-tab mdc-tab" role="tab" aria-selected="true" tabindex="0">
                              <span class="mdc-tab__content">
                                <span class="mdc-tab__text-label">1Y</span>
                              </span>
                              <span class="mdc-tab-indicator mdc-tab-indicator">
                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                              </span>
                              <span class="mdc-tab__ripple"></span>
                            </button>
                            <button class="mdc-tab mdc-tab" role="tab" aria-selected="true" tabindex="0">
                              <span class="mdc-tab__content">
                                <span class="mdc-tab__text-label">ALL</span>
                              </span>
                              <span class="mdc-tab-indicator mdc-tab-indicator">
                                <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                              </span>
                              <span class="mdc-tab__ripple"></span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="content content--active">
                    </div>
                    <div class="content">
                    </div>
                    <div class="content">
                    </div>
                    <div class="content">
                    </div>
                    <div class="content">
                    </div>
                  </div>
                </div>
                <div class="chart-container mt-4">
                  <canvas id="revenue-chart" height="260"></canvas>
                </div>
              </div>
            </div>
            <div
              class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-8-tablet">
              <div class="mdc-card">
                <div class="d-flex d-lg-block d-xl-flex justify-content-between">
                  <div>
                    <h4 class="card-title">Order Statistics</h4>
                    <h6 class="card-sub-title">Customers 58.39k</h6>
                  </div>
                  <div id="sales-legend" class="d-flex flex-wrap"></div>
                </div>
                <div class="chart-container mt-4">
                  <canvas id="chart-sales" height="260"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <!-- end main content -->
      <!-- footer -->
      @include('layouts.admin.footer')
      <!-- end footer -->
    </div>
  </div>
  </div>
  
  <!-- start js -->
  @include('layouts.admin.js')
  <!-- End js-->
</body>

</html>