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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Informasi Pengguna /</span>
                            {{ $users->nama }}</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- Account -->
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <img src="../assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                                height="100" width="100" id="uploadedAvatar" />
                                            <div class="button-wrapper">
                                                <a href="{{ route('editUser', $users->userId) }}" class="btn btn-warning">
                                                    Edit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Id Karyawan</label>
                                                <input class="form-control" value="{{ $users->idKaryawan }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama</label>
                                                <input class="form-control" value="{{ $users->nama }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Username</label>
                                                <input class="form-control" value="{{ $users->username }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Email</label>
                                                <input class="form-control" value="{{ $users->email }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama Proyek</label>
                                                <input class="form-control" value="{{ $users->idProyek }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama Grup user</label>
                                                <input class="form-control" value="{{ $users->grupUser->grupUser }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Nama Department</label>
                                                <input class="form-control" value="{{ $users->idDepartment }}" disabled />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">Status Pengguna</label>
                                                <input class="form-control" value="{{ $users->status }}" disabled />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /Account -->
                            </div>
                        </div>
                    </div>
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
