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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Informasi Grup User /</span>
                            {{ $grupUser->grupUser }}</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form action="{{ route('updateGrupUser', $grupUser->idGrupUser) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="idGrupUser" class="form-label">Id Grup User</label>
                                                    <input class="form-control" id="idGrupUser" name="idGrupUser"
                                                        value="{{ $grupUser->idGrupUser }}" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="grupUser" class="form-label">Nama Grup User</label>
                                                    <input class="form-control" id="grupUser" name="grupUser"
                                                        value="{{ $grupUser->grupUser }}" />
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
@endsection
