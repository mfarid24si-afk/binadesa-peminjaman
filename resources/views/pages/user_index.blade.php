<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <div id="user" class="tab-content active">
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
                        <th>Role</th>
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
                          <td>{{ $u->role }}</td>
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