<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Profil Karyawan</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
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


    <script src="../assets/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="" class="app-brand-link">
                        <span class=" fw-bolder ms-2" style="font-size: 25px">E-Kinerja</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="/" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>
                    <li class="menu-item active open">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Menu User</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item active">
                                <a href="/profile" class="menu-link">
                                    <div data-i18n="Account">Profil</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/kuisioner" class="menu-link">
                                    <div data-i18n="Notifications">Kuisioner</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/hasil" class="menu-link">
                                    <div data-i18n="Connections">Cetak Hasil</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/info" class="menu-link">
                                    <div data-i18n="Account">Info Akun</div>
                                </a>
                            </li>
                        </ul>
                        <hr>
                    </li>
                    <ul class="mt-2 mx-4">
                        <li class="menu-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard User /</span> Profile</h4>

                        @if (session()->has('warning'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('warning') }}

                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Detail Profil {{ auth()->user()->nama }}</h5>
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <form id="formAccountSettings" method="POST" action="/profile/tambah">
                                            @csrf

                                            @if(isset($profil))
                                            <div class="row">
                                                <div class="mb-6 col-md-12">
                                                    <label for="nama" class="form-label ">Nama</label>
                                                    <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name="nama" placeholder="Nama" autofocus value="{{ $profil->nama }}" />
                                                    @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}

                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6 mt-3">
                                                    <label for="tanggal_masuk" class="form-label ">Tanggal Masuk</label>
                                                    <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ $profil->tanggal_masuk}}">
                                                    @error('tanggal_masuk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6 mt-3">
                                                    <label for="jenis_kelamin" class="form-label ">Jenis Kelamin</label>
                                                    <select id="jenis_kelamin" class="select2 form-select @error('gender') is-invalid @enderror" name="gender" value="{{ $profil->gender }}">
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                    @error('gender')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="tempat_Lahir" class="form-label">Tempat Lahir</label>
                                                    <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_Lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{ $profil->tempat_lahir }}" />
                                                    @error('tempat_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="tanggal_lahir" class="form-label ">Tanggal Lahir</label>
                                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $profil->tanggal_lahir }}">
                                                    @error('tanggal_lahir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="alamat" class="form-label ">Alamat</label>
                                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" value="{{ $profil->alamat }}" />
                                                    @error('alamat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="divisi_id" class="form-label ">Divisi</label>
                                                    <select class="form-select @error('divisi_id') is-invalid @enderror" name="divisi_id" value="{{ $profil->divisi_id}}">
                                                        @foreach ($divisis as $divisi)
                                                        @if (old('divisi_id', $profil->divisi_id) == $divisi->id)
                                                        <option value="{{ $divisi->id }}" selected>{{ $divisi->nama_divisi }}</option>
                                                        @else
                                                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    @error('divisi_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="no_telepon">Nomor Telepon</label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" id="no_telepon" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Nomor Telepon" value="{{ $profil->no_telp }}" />
                                                        @error('no_telp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <label class="form-label" for="user_id"></label>
                                                    <div class="input-group input-group-merge">
                                                        <input type="text" id="user_id" name="user_id" class="form-control" hidden value="{{ auth()->user()->id }}" />
                                                    </div>
                                                    <div class="mt-2">
                                                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                                    </div>
                                        </form>
                                    </div>
                                    <!-- /Account -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(empty($profil))
                    <div class="row">
                        <div class="mb-6 col-md-12">
                            <label for="nama" class="form-label ">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" id="nama" name="nama" placeholder="Nama" autofocus />
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}

                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 mt-3">
                            <label for="tanggal_masuk" class="form-label ">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror">
                            @error('tanggal_masuk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6 mt-3">
                            <label for="jenis_kelamin" class="form-label ">Jenis Kelamin</label>
                            <select id="jenis_kelamin" class="select2 form-select @error('gender') is-invalid @enderror" name="gender">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tempat_Lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_Lahir" name="tempat_lahir" placeholder="Tempat Lahir" />
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="tanggal_lahir" class="form-label ">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="alamat" class="form-label ">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat" />
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="divisi_id" class="form-label ">Divisi</label>
                            <select class="form-select @error('divisi_id') is-invalid @enderror" name="divisi_id">
                                @foreach ($divisis as $divisi)
                                <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                                @endforeach
                            </select>
                            @error('divisi_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="no_telepon">Nomor Telepon</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="no_telepon" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" placeholder="Nomor Telepon" />
                                @error('no_telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="">
                            <label class="form-label" for="user_id"></label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="user_id" name="user_id" class="form-control" hidden value="{{ auth()->user()->id }}" />
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    Copyright
                    <a href="" target="_blank" class="footer-link fw-bolder">Harjuno Setyawan</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

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
    <script src="../assets/js/pages-account-settings-account.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
