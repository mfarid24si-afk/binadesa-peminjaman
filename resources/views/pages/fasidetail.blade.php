<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @include('layouts.admin.css')
</head>

<body>
<script src="{{ asset('assets/js/preloader.js') }}"></script>

<div class="body-wrapper">

    @include('layouts.admin.sidebar')

    <div class="main-wrapper mdc-drawer-app-content">
        @include('layouts.admin.header')

        <div class="page-wrapper mdc-toolbar-fixed-adjust">
            <main class="content-wrapper">
                <div class="mdc-layout-grid">
                    <div class="mdc-layout-grid__inner">

                        <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12">
                            <div class="mdc-card p-4">

                                <h4 class="mb-3">Detail Fasilitas</h4>
                                <hr>

                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Nama Fasilitas</th>
                                        <td>{{ $fasilitas->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Fasilitas</th>
                                        <td>{{ $fasilitas->jenis }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $fasilitas->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>RT / RW</th>
                                        <td>{{ $fasilitas->rt }} / {{ $fasilitas->rw }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kapasitas</th>
                                        <td>{{ $fasilitas->kapasitas }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $fasilitas->deskripsi ?? '-' }}</td>
                                    </tr>
                                </table>

                                <div class="mt-4">
                                    <a href="{{ route('fasilitas') }}"
                                       class="btn btn-secondary">
                                        Kembali
                                    </a>

                                    <a href="{{ route('fasilitas.edit', $fasilitas->fasilitas_id) }}"
                                       class="btn btn-primary">
                                        Edit
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </main>

            @include('layouts.admin.footer')
        </div>
    </div>
</div>

@include('layouts.admin.js')
</body>
</html>
