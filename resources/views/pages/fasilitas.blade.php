<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $judul }}</title>
  {{-- start css --}}

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
      @include('layouts.admin.header_tf')
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">

<div id="fasilitas" class="tab-content {{ request()->routeIs('fasilitas') ? 'active' : '' }}">
            {{-- ==================== TABLE Fasilitas umum ==================== --}}
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0">Data Fasilitas</h6>
                <div class="table-responsive">
                    <form method="GET" action="{{ route('fasilitas') }}" class="mb-3">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <select name="jenis" class="form-select" onchange="this.form.submit()">
                <option value="">Jenis Fasilitas</option>
                <option value="Bangunan" {{ request('jenis')=='Bangunan' ? 'selected' : '' }}>Bangunan</option>
                <option value="Lapangan" {{ request('jenis')=='Lapangan' ? 'selected' : '' }}>Lapangan</option>
                <option value="Ruangan" {{ request('jenis')=='Ruangan' ? 'selected' : '' }}>Ruangan</option>
                <option value="Pelayanan Umum" {{ request('jenis')=='Pelayanan Umum' ? 'selected' : '' }}>Pelayanan Umum</option>
            </select>
        </div>

        <div class="col-md-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    id="exampleInputIconRight" value="{{ request('search') }}"
                    placeholder="Search" aria-label="Search">
                <button type="submit" class="input-group-text" id="basic-addon2">
                    <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</form>
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

                            <form action="{{ route('fasilitas.destroy', $item->fasilitas_id) }}" method="POST"
                              style="display:inline;">
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
                  <div class="mt-4 d-flex justify-content-center">
                {{ $fasilitas->links('pagination::bootstrap-5') }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- partial:../../partials/_footer.html -->

        @include('layouts.admin.footer')
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  
  @include('layouts.admin.js')
  <!-- End js-->
</body>

</html>
