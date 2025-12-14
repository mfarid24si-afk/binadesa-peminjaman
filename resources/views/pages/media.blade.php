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
      @include('layouts.admin.header')
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
<div id="media" class="tab-content {{ request()->routeIs('media') ? 'active' : '' }}">
            {{-- ==================== TABLE MEDIA ==================== --}}
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0">Data Media</h6>
                <div class="table-responsive">
                  <form method="GET" action="{{ route('media') }}" class="mb-3">
    <div class="row">
        <div class="col-md-2">
            <select name="mime_type" class="form-select" onchange="this.form.submit()">
                <option value="">All Types</option>
                <option value="image" {{ request('mime_type')=='image' ? 'selected' : '' }}>Image</option>
                <option value="video" {{ request('mime_type')=='video' ? 'selected' : '' }}>Video</option>
                <option value="jpeg"  {{ request('mime_type')=='jpeg'  ? 'selected' : '' }}>JPEG</option>
                <option value="png" {{ request('mime_type')=='png' ? 'selected' : '' }}>PNG</option>
                <option value="aplication" {{ request('mime_type')=='aplication' ? 'selected' : '' }}>Aplication</option>
                <option value="mp4" {{ request('mime_type')=='mp4' ? 'selected' : '' }}>Mp4</option>
                <option value="pdf" {{ request('mime_type')=='pdf' ? 'selected' : '' }}>PDF</option>
            </select>
        </div>

        <div class="col-md-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    value="{{ request('search') }}" placeholder="Search">

                <button type="submit" class="input-group-text">
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
                          <td>
    @if(str_contains($m->mime_type, 'image'))
        <img src="{{ asset('storage/media/'.$m->file_url) }}" 
             alt="media" 
             style="width: 70px; height: auto; border-radius: 4px;">
    @else
        <a href="{{ asset('storage/media/'.$m->file_url) }}" target="_blank">
            {{ $m->file_url }}
        </a>
    @endif
</td>

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