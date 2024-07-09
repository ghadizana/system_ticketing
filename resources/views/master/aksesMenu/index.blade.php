@extends('layouts.app')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            @include('layouts.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- Layout Demo -->
                        <div class="layout-demo-info">
                            <div class="layout-demo-placeholder">
                                {{-- Navbar Tambah Menu --}}
                                <div class="container d-flex justify-content-between align-items-center">
                                    @include('master.aksesMenu.create')
                                    <h4 class="py-3 mb-0">Detail Akses Menu</h4>
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#addAksesMenu" href="#">Tambah Akses Menu</a>
                                </div>
                                {{-- End Navbar Tambah Menu --}}

                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Id Akses Menu</th>
                                                    <th>Deskripsi</th>
                                                    <th>Label</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($aksesMenu as $akses)
                                                    <tr>
                                                        <td>{{ $akses->idAksesMenu }}</td>
                                                        <td class="text-start">
                                                            @foreach ($akses->Menu as $item)
                                                                {{ $item->namaMenu }} <br>
                                                            @endforeach
                                                        </td>
                                                        <td class="text-start">{{ $akses->label }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('editAksesMenu', $akses->idAksesMenu) }}"><i
                                                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                    <form
                                                                        action="{{ route('deleteAksesMenu', $akses->idAksesMenu) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                                            <i class="bx bx-trash me-2"></i>Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Layout Demo -->
                    </div>
                    <!-- / Content -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
@endsection
