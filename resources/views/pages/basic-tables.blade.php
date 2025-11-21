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

          <div id="user" class="tab-content">
            <!-- ==================== TABLE USER==================== --->
             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0">Data User</h6>
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($user as $u)
                        <tr>
                          <td>{{ $u->id }}</td>
                          <td>{{ $u->name }}</td>
                          <td>{{ $u->email }}</td>
                          <td>{{ $u->password }}</td>
                          <td>
                            <a href="{{ route('user.edit', $u->id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;">
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

          <div id="warga" class="tab-content active">
            {{-- ==================== TABLE WARGA ==================== --}}
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0">Data Warga</h6>
                  <div class="table-responsive">
     <form method="POST" action="{{ route('forms.store.warga') }}" class="mb-3">
    @csrf
    <div class="row">
        <div class="col-md-2">
            <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
                <option value="">All Genders</option>
                <option value="L" {{ request('jenis_kelamin')=='L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ request('jenis_kelamin')=='P' ? 'selected' : '' }}>Perempuan</option>
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

                            <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST"
                              style="display:inline;">
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
                  <div class="mt-4 d-flex justify-content-center">
                {{ $warga->links('pagination::bootstrap-5') }}
                  </div>
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

                            <form action="{{ route('media.destroy', $m->media_id) }}" method="POST"
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
                {{ $media->links('pagination::bootstrap-5') }}
                  </div>
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
                        <th>Fasilitas</th>
                        <th>Peminjam</th>
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
                          <td>{{ $item->fasilitas->nama ?? '-' }}</td>
                          <td>{{ $item->warga->nama ?? '-' }}</td>
                          <td>{{ $item->tanggal_mulai }}</td>
                          <td>{{ $item->tanggal_selesai }}</td>
                          <td>{{ $item->tujuan }}</td>
                          <td>{{ $item->status }}</td>
                          <td>{{ $item->total_biaya }}</td>
                          <td>
                            <a href="{{ route('peminjaman.edit', $item->pinjam_id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('peminjaman.destroy', $item->pinjam_id) }}" method="POST"
                              style="display:inline;">
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
                  <div class="mt-4 d-flex justify-content-center">
                {{ $peminjaman->links('pagination::bootstrap-5') }}
                  </div>
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
                        <td>Peminjam</td>
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
                          <td>{{ $item->peminjaman->warga->nama ?? '-' }}</td>
                          <td>{{ $item->tanggal }}</td>
                          <td>{{ $item->jumlah }}</td>
                          <td>{{ $item->metode }}</td>
                          <td>{{ $item->keterangan }}</td>
                          <td>
                            <a href="{{ route('pembayaran.edit', $item->bayar_id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('pembayaran.destroy', $item->bayar_id) }}" method="POST"
                              style="display:inline;">
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
                  <div class="mt-4 d-flex justify-content-center">
                {{ $pembayaran->links('pagination::bootstrap-5') }}
                  </div>
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
                        <th>Fasilitas</th>
                        <th>Syarat</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($syarat as $item)
                        <tr>
                          <td>{{ $item->syarat_id }}</td>
                          <td>{{ $item->fasilitas->nama ?? '-' }}</td>
                          <td>{{ $item->nama_syarat }}</td>
                          <td>{{ $item->deskripsi }}</td>
                          <td>
                            <a href="{{ route('syarat.edit', $item->syarat_id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('syarat.destroy', $item->syarat_id) }}" method="POST"
                              style="display:inline;">
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
                  <div class="mt-4 d-flex justify-content-center">
                {{ $syarat->links('pagination::bootstrap-5') }}
                  </div>
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
                        <th>Fasilitas</th>
                        <th>Petugas</th>
                        <th>Peran</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($petugas as $item)
                        <tr>
                          <td>{{ $item->petugas_id }}</td>
                          <td>{{ $item->fasilitas->nama ?? '-' }}</td>
                          <td>{{ $item->warga->nama ?? '-' }}</td>
                          <td>{{ $item->peran }}</td>
                          <td>
                            <a href="{{ route('petugas.edit', $item->petugas_id) }}" class="btn btn-primary">Edit</a>

                            <form action="{{ route('petugas.destroy', $item->petugas_id) }}" method="POST"
                              style="display:inline;">
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
                  <div class="mt-4 d-flex justify-content-center">
                {{ $petugas->links('pagination::bootstrap-5') }}
                  </div>
                </div>
              </div>
            </div>
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
  <!-- End js-->
</body>

</html>