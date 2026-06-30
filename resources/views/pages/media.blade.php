<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $judul ?? 'Data Media' }}</title>
  @include('layouts.admin.css')
</head>
<body>
  <script src="{{ asset('assets/js/preloader.js') }}"></script>
  <div class="body-wrapper">
    @include('layouts.admin.sidebar')
    @include('layouts.admin.header')
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">

        @include('layouts.admin.partials.page-heading', [
          'icon'       => 'perm_media',
          'title'      => 'Data Media',
          'breadcrumb' => 'Kelola Data › Media',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        <div class="mdc-card table-card">
          <div class="table-header">
            <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">photo_library</i>Daftar Media</h6>
          </div>

          <form method="GET" action="{{ route('media') }}">
            <div class="filter-bar">
              <select name="mime_type" class="form-select" style="max-width:160px;" onchange="this.form.submit()">
                <option value="">Semua Tipe</option>
                @foreach(['image','video','jpeg','png','pdf','mp4'] as $t)
                  <option value="{{ $t }}" {{ request('mime_type')==$t ? 'selected':'' }}>{{ strtoupper($t) }}</option>
                @endforeach
              </select>
              <div class="d-flex" style="gap:6px;flex:1;max-width:320px;">
                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Cari ref_table…">
                <button type="submit" class="btn-search">
                  <i class="material-icons" style="font-size:16px;">search</i>
                  <span class="d-none d-md-inline">Cari</span>
                </button>
              </div>
            </div>
          </form>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr><th>#</th><th>Preview</th><th>Ref Table</th><th>Ref ID</th><th>Caption</th><th>Tipe</th><th>Urutan</th><th>Aksi</th></tr>
              </thead>
              <tbody>
                @forelse($media as $m)
                  <tr>
                    <td style="color:var(--text-secondary);font-size:12px;">{{ $m->media_id }}</td>
                    <td>
                      @if($m->mime_type && str_contains($m->mime_type, 'image'))
                        <img src="{{ asset('storage/media/' . $m->file_name) }}"
                             alt="media" style="width:56px;height:40px;object-fit:cover;border-radius:6px;border:1px solid var(--border);">
                      @else
                        <div style="width:56px;height:40px;background:var(--primary-50);border-radius:6px;display:flex;align-items:center;justify-content:center;">
                          <i class="material-icons" style="font-size:20px;color:var(--primary);">insert_drive_file</i>
                        </div>
                      @endif
                    </td>
                    <td><strong>{{ $m->ref_table }}</strong></td>
                    <td style="color:var(--text-secondary);">{{ $m->ref_id }}</td>
                    <td style="color:var(--text-secondary);">{{ $m->caption ?? '—' }}</td>
                    <td><span class="badge-status badge-selesai" style="font-size:10px;">{{ strtoupper($m->mime_type ?? '—') }}</span></td>
                    <td>{{ $m->sort_order ?? '—' }}</td>
                    <td style="white-space:nowrap;">
                      @if(in_array(Auth::user()->role ?? '', ['super admin', 'admin']))
                      <a href="{{ route('media.edit', $m->media_id) }}" class="btn-action btn-action-edit">
                        <i class="material-icons" style="font-size:14px;">edit</i> Edit
                      </a>
                      @endif
                      @if(Auth::user()->role === 'super admin')
                      <form action="{{ route('media.destroy', $m->media_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus media ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-action-delete"><i class="material-icons" style="font-size:14px;">delete</i> Hapus</button>
                      </form>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="8">@include('layouts.admin.partials.empty-state', ['label'=>'media'])</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
            {{ $media->withQueryString()->links('pagination::bootstrap-5') }}
          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
