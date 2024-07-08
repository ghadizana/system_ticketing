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
                    <div class="container-fluid w-100 flex-grow-1 container-p-y">
                        <!-- Layout Demo -->
                        <div class="layout-demo-info">
                            <div class="layout-demo-placeholder">

                                {{-- Navbar Tambah Pengguna --}}
                                <div class="container d-flex justify-content-between align-items-center">
                                    <h4 class="py-3 mb-0">Detail Pengguna</h4>
                                    @include('master.masterUser.register')
                                    <a class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#addUser" href="#">Tambah Akun Pengguna</a>
                                </div>
                                {{-- End Navbar Tambah Pengguna --}}

                                <div class="card mb-3">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Nama User</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Nama Proyek</th>
                                                    <th>Grup User</th>
                                                    <th>Status Pengguna</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataUsers as $user)
                                                    <tr>
                                                        <td class="text-start">{{ $user->nama }}</td>
                                                        <td class="text-start">{{ $user->username }}</td>
                                                        <td class="text-start">{{ $user->email }}</td>
                                                        <td class="text-start">{{ $user->idProyek }}</td>
                                                        <td class="text-start">{{ $user->grupUser->grupUser }}</td>
                                                        <td>
                                                            @if ($user->status === 1)
                                                                <span class="badge bg-label-primary me-1">Aktif</span>
                                                            @else
                                                                <span class="badge bg-label-warning me-1">Tidak
                                                                    Aktif</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown"><i
                                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('detailUser', $user->userId) }}"><i
                                                                            class="bx bx-user me-2"></i>Detail Akun</a>
                                                                    {{-- @include('master.masterUser.edit') --}}
                                                                    <a class="dropdown-item" type="button" href="{{ route('editUser', $user->userId) }}"><i
                                                                            class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                    <form action="{{ route('deleteUser', $user->userId) }}"
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

                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item {{ $dataUsers->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $dataUsers->previousPageUrl() }}"><i
                                                    class="bx bx-chevron-left"></i></a>
                                        </li>
                                        @foreach ($dataUsers->links()->elements[0] as $page => $url)
                                            <li class="page-item {{ $dataUsers->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach
                                        <li class="page-item {{ $dataUsers->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="{{ $dataUsers->nextPageUrl() }}"><i
                                                    class="bx bx-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
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
