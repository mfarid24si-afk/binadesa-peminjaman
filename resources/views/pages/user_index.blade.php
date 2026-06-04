<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data User</title>
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
          'icon'       => 'manage_accounts',
          'title'      => 'Data User',
          'breadcrumb' => 'Kelola Data › User',
        ])

        @if(session('success'))
          <div class="alert alert-success" style="margin-bottom:16px;">
            <i class="material-icons" style="font-size:16px;vertical-align:middle;margin-right:6px;">check_circle</i>
            {{ session('success') }}
          </div>
        @endif

        <div class="mdc-card table-card">
          <div class="table-header">
            <h6><i class="material-icons" style="font-size:17px;vertical-align:middle;margin-right:6px;color:var(--primary);">groups</i>Daftar Akun User</h6>
          </div>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr><th>#</th><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th></tr>
              </thead>
              <tbody>
                @forelse($user as $u)
                  <tr>
                    <td style="color:var(--text-secondary);font-size:12px;">{{ $u->id }}</td>
                    <td>
                      <div style="display:flex;align-items:center;gap:10px;">
                        <img src="{{ asset('assets/images/faces/face11.jpg') }}" class="avatar-circle" alt="{{ $u->name }}" style="width:32px;height:32px;">
                        <strong>{{ $u->name }}</strong>
                      </div>
                    </td>
                    <td style="color:var(--text-secondary);">{{ $u->email }}</td>
                    <td>
                      @php
                        $roleColor = match($u->role) {
                          'super admin' => 'background:#fce4ec;color:#c62828;',
                          'admin'       => 'background:var(--primary-50);color:var(--primary);',
                          default       => 'background:#e8f5e9;color:#2e7d32;',
                        };
                      @endphp
                      <span class="badge-status" style="{{ $roleColor }}">{{ ucfirst($u->role ?? 'user') }}</span>
                    </td>
                    <td style="white-space:nowrap;">
                      <a href="{{ route('user.edit', $u->id) }}" class="btn-action btn-action-edit">
                        <i class="material-icons" style="font-size:14px;">edit</i> Edit
                      </a>
                      @if(Auth::user()->role === 'super admin')
                        <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus user ini?')">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn-action btn-action-delete"><i class="material-icons" style="font-size:14px;">delete</i> Hapus</button>
                        </form>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr><td colspan="5">@include('layouts.admin.partials.empty-state', ['label'=>'user'])</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div style="padding:16px 20px;display:flex;justify-content:flex-end;">
            {{ $user->withQueryString()->links('pagination::bootstrap-5') }}
          </div>
        </div>

      </main>
      @include('layouts.admin.footer')
    </div>
  </div>
  @include('layouts.admin.js')
</body>
</html>
