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
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                    <span class="d-none d-sm-block">Unggah foto pengguna</span>
                                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                                    <input type="file" id="upload" class="account-file-input" hidden
                                                        accept="image/png, image/jpeg" />
                                                </label>

                                                <p class="text-muted mb-0">Hanya diizikan dalam format JPG atau PNG.
                                                    Max
                                                    size adalah 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form action="{{ route('updateUser', $users->userId) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="idKaryawan" class="form-label">Id Karyawan</label>
                                                    <input class="form-control" id="idKaryawan" name="idKaryawan"
                                                        value="{{ $users->idKaryawan }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input class="form-control" id="nama" name="nama"
                                                        value="{{ $users->nama }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input class="form-control" id="username" name="username"
                                                        value="{{ $users->username }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input class="form-control" id="email" name="email"
                                                        value="{{ $users->email }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="idProyek" class="form-label">Nama Proyek</label>
                                                    <input class="form-control" id="idProyek" name="idProyek"
                                                        value="{{ $users->idProyek }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="idGrupUser" class="form-label">Nama Grup User</label>
                                                    <select name="idGrupUser" id="idGrupUser" class="form-control" required>
                                                        @foreach ($grupUsers as $grupUser)
                                                            <option value="{{ $grupUser->idGrupUser }}"
                                                                {{ old('idGrupUser') == $grupUser->grupUser ? 'selected' : '' }}>
                                                                {{ $grupUser->grupUser }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="idDepartment" class="form-label">Nama
                                                        Department</label>
                                                    <input class="form-control" id="idDepartment" name="idDepartment"
                                                        value="{{ $users->idDepartment }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="status" class="form-label">Status Pengguna</label>
                                                    <input class="form-control" id="status" name="status"
                                                        value="{{ $users->status }}" />
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2">Simpan
                                                        perubahan</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Batal</button>
                                                </div>
                                            </div>
                                        </form>

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
