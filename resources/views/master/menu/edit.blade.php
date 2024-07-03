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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Informasi Menu /</span>
                            {{ $menu->namaMenu }}</h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form action="{{ route('updateMenu', $menu->idMenu) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="idMenu" class="form-label">Id Menu</label>
                                                    <input class="form-control" id="idMenu" name="idMenu"
                                                        value="{{ $menu->idMenu }}" readonly />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="namaMenu" class="form-label">Nama Menu</label>
                                                    <input class="form-control" id="namaMenu" name="namaMenu"
                                                        value="{{ $menu->namaMenu }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="linkTautan" class="form-label">Link Tautan</label>
                                                    <input class="form-control" id="linkTautan" name="linkTautan"
                                                        value="{{ $menu->linkTautan }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="status" class="form-label">Status</label>
                                                    <input class="form-control" id="status" name="status"
                                                        value="{{ $menu->status }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="label" class="form-label">Label</label>
                                                    <input class="form-control" id="label" name="label"
                                                        value="{{ $menu->label }}" />
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
