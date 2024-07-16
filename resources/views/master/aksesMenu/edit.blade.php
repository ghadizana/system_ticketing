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
                        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Informasi Akses Menu</span></h4>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form action="{{ route('updateAksesMenu', $aksesMenu->idAksesMenu) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label for="idMenu" class="form-label">Nama Menu</label>
                                                    <div class="border p-2" id="menuDropdown"
                                                        style="background: white; border-radius: .25rem;">
                                                        <ul class="list-unstyled">
                                                            @foreach ($menu as $item)
                                                                @php
                                                                    $menuPivot = $aksesMenu->Menu->find($item->idMenu);
                                                                @endphp
                                                                <li>
                                                                    <label class="d-flex align-items-center">
                                                                        <input type="checkbox" name="idMenu[]"
                                                                            value="{{ $item->idMenu }}"
                                                                            class="menu-checkbox me-2"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse{{ $item->idMenu }}"
                                                                            {{ in_array($item->idMenu, $aksesMenu->Menu->pluck('idMenu')->toArray()) ? 'checked' : '' }}>
                                                                        {{ $item->namaMenu }}
                                                                        <i class="bx bx-chevron-down ms-auto chevron-icon"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse{{ $item->idMenu }}"></i>
                                                                    </label>
                                                                    <div class="collapse" id="collapse{{ $item->idMenu }}">
                                                                        <ul class="list-unstyled ms-4">
                                                                            @foreach (['create', 'update', 'delete'] as $permission)
                                                                                <li>
                                                                                    <label>
                                                                                        <input type="checkbox"
                                                                                            class="form-check-input required"
                                                                                            name="subMenu[{{ $item->idMenu }}][]"
                                                                                            value="{{ $permission }}"
                                                                                            {{ $menuPivot && $menuPivot->pivot->$permission ? 'checked' : '' }}>
                                                                                        {{ ucfirst($permission) }}
                                                                                    </label>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <input required class="form-control" id="deskripsi" name="deskripsi"
                                                        value="{{ $aksesMenu->deskripsi }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="label" class="form-label">Label</label>
                                                    <input required class="form-control" id="label" name="label"
                                                        value="{{ $aksesMenu->label }}" />
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary me-2">Simpan
                                                        perubahan</button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        onclick="window.history.back()">Batal</button>
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
