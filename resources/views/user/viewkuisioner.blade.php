<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Kuisioner Kinerja</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

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

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
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
                    <li class="menu-item">
                    <a href="/profile" class="menu-link">
                        <div data-i18n="Account">Profil</div>
                    </a>
                    </li>
                    <li class="menu-item active">
                    <a href="/kuisioner" class="menu-link">
                        <div data-i18n="Notifications">Kuisioner</div>
                    </a>
                    </li>
                    <li class="menu-item">
                    <a href="/hasil" class="menu-link">
                        <div data-i18n="Connections">Cetak Hasil</div>
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard User /</span> Kuisioner</h4>

              @if (session()->has('warning'))
                <div class="alert alert-danger" role="alert">
                    {{ session('warning') }}

                </div>
            @endif

              <div class="row">
                <div class="col-md-12">
                  <div class="card ms-4" style="width:97%">
                    <h5 class="card-header">Penilaian untuk user :</h5>
                    <form id="formAccountSettings" method="POST" action="/kuisioner/tambah">
                    <div class="col-6 ms-4 mb-4">
                            <select class="form-select" name="karyawan_id">
                                @foreach ($users as $data )
                                <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Account -->
                    <div class="card-body">

                        @csrf

                        @foreach ($pertanyaan as $data )

                        <div class="card mt-4" style="padding: 0px 20px">

                            <div class="card-header text-dark">
                            {{ $data->kriteria }}

                            </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->nama_pertanyaan }}</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $data->id }}"
                                    id="flexRadioDefault1" value="4" />
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sangat Baik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $data->id }}"
                                    id="flexRadioDefault2" value="3" />
                                <label class="form-check-label" for="flexRadioDefault2">
                                Baik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $data->id }}"
                                    id="flexRadioDefault3" value="2" />
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Cukup
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{ $data->id }}"
                                    id="flexRadioDefault4" value="1" />
                                <label class="form-check-label" for="flexRadioDefault4">
                                    Kurang
                                </label>
                            </div>

                            <input type="hidden" class="form-control" id="periode" value="{{ $data->periode_id }}" name="periode">
                    </div>
                </div>
            @endforeach

            <div class="mt-3">
                <label for="exampleFormControlTextarea1" class="form-label">Kritik dan Saran</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="value_essay"></textarea>
            </div>





            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary mt-4 mb-5 me-3 " data-bs-toggle="modal"
                    data-bs-target="#submit">Selesai</button>
            </div>

            {{-- MODAL SUBMIT --}}
            <div class="modal
                    fade" id="submit" tabindex="-1" aria-labelledby="ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin submit pengerjaan ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            <button type="submit" class="btn btn-primary"> <span class="tf-icons bx"></span>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


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