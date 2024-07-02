<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">


<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


    <title>Without navbar - Layouts | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>


    <meta name="description" content="" />


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />


    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />


    <!-- Page CSS -->


    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>


<body>
    <!-- Layout wrapper -->
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

                                {{-- Navbar Tambah Pengguna --}}
                                <div class="container d-flex justify-content-between align-items-center">
                                    <h4 class="py-3 mb-0">Detail Pengguna</h4>
                                    <a class="btn btn-primary" type="button" href="{{ route('register') }}">Tambah
                                        Pengguna</a>
                                </div>
                                {{-- End Navbar Tambah Pengguna --}}

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
                                                <th>Lihat Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataUsers as $user)
                                                <tr>
                                                    <td>{{ $user->nama }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->idProyek }}</td>
                                                    <td>{{ $user->idGrupUser }}</td>
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
                                                                <a class="dropdown-item"
                                                                    href="{{ route('editUser', $user->userId) }}"><i
                                                                        class="bx bx-edit-alt me-2"></i>Edit</a>
                                                                <form
                                                                    action="{{ route('deleteUser', $user->userId) }}"
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

                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li class="page-item {{ $dataUsers->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="{{ $dataUsers->previousPageUrl() }}"><i
                                                    class="bx bx-chevron-left"></i></a>
                                        </li>
                                        @foreach ($dataUsers->links()->elements[0] as $page => $url)
                                            <li
                                                class="page-item {{ $dataUsers->currentPage() == $page ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $url }}">{{ $page }}</a>
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
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->


    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>


    <!-- endbuild -->


    <!-- Vendors JS -->


    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>


    <!-- Page JS -->


    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
