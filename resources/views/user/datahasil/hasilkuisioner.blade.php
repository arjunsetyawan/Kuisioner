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

    <title>Hasil Kuisioner</title>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

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
                    <li class="menu-item">
                    <a href="/kuisioner" class="menu-link">
                        <div data-i18n="Notifications">Kuisioner</div>
                    </a>
                    </li>
                    <li class="menu-item active">
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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard User /</span> Hasil Penilaian</h4>

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Hasil Penilaian {{ auth()->user()->nama }}</h5>
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                    <a href="/cetak" target="_blank" class="print-hidden mb-4 btn btn-primary me-0"><i class="bi bi-printer-fill mr-2"></i>Cetak Data Hasil</a>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                    <th rowspan="2" style="width: 5%;" class="text-center">No</th>
                                    <!-- <th rowspan="2" style="width: 15%" class="text-center">Kriteria</th> -->
                                    <th rowspan="2" style="width: 25%" class="text-center">Kriteria</th>
                                    <th colspan="2" class="text-center" class="text-center">Penilaian</th>
                                    <th rowspan="2" class="text-center" style="width:40%">Saran</th>
                                    </tr>
                                    <tr>
                                    <th class="text-center">Hasil</th>
                                    <th class="text-center" style="width: 35%">Konversi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Atitude</td>
                                        <td>{{ $hasil->attitude }}</td>
                                        <td>
                                            @if ($hasil->attitude <= 3)
                                            Anda memiliki attitude yang kurang aik
                                            @elseif($hasil->attitude <= 6)
                                            Anda memiliki attitude yang cukup baik
                                            @elseif($hasil->attitude <= 9)
                                            Anda memiliki attitude yang baik
                                            @elseif($hasil->attitude <= 12)
                                            Anda memiliki attitude yang sangat baik
                                            @endif
                                            </td>
                                        <td rowspan="8" >{{ $hasil->value_essay }}</td>
                                        </tr>
                                        <tr>
                                        <td>2.</td>
                                        <td>Kedisiplinan</td>
                                        <td>{{ $hasil->kedisiplinan }}</td>
                                        <td>
                                            @if ($hasil->kedisiplinan <= 3)
                                            Anda memiliki kedisiplinan yang kurang baik
                                            @elseif($hasil->kedisiplinan <= 6)
                                            Anda memiliki kedisiplinan yang cukup baik
                                            @elseif($hasil->kedisiplinan <= 9)
                                            Anda memiliki kedisiplinan yang baik
                                            @elseif($hasil->kedisiplinan <= 12)
                                            Anda memiliki kedisiplinan yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>3.</td>
                                        <td>Inisiatif</td>
                                        <td>{{ $hasil->inisiatif }}</td>
                                        <td>
                                            @if ($hasil->inisiatif <= 3)
                                            Anda memiliki inisiatif yang kurang baik
                                            @elseif($hasil->inisiatif <= 6)
                                            Anda memiliki inisiatif yang cukup baik
                                            @elseif($hasil->inisiatif <= 9)
                                            Anda memiliki inisiatif yang baik
                                            @elseif($hasil->inisiatif <= 12)
                                            Anda memiliki inisiatif yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>4.</td>
                                        <td>Leadership</td>
                                        <td>{{ $hasil->leadership }}</td>
                                        <td>
                                            @if ($hasil->leadership <= 3)
                                            Anda memiliki leadership yang kurang baik
                                            @elseif($hasil->leadership <= 6)
                                            Anda memiliki leadership yang cukup baik
                                            @elseif($hasil->leadership <= 9)
                                            Anda memiliki leadership yang baik
                                            @elseif($hasil->leadership <= 12)
                                            Anda memiliki leadership yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>5.</td>
                                        <td>Kerjasama</td>
                                        <td>{{ $hasil->kerjasama }}</td>
                                        <td>
                                            @if ($hasil->kerjasama <= 3)
                                            Anda memiliki kerjasama yang kurang baik
                                            @elseif($hasil->kerjasama <= 6)
                                            Anda memiliki kerjasama yang cukup baik
                                            @elseif($hasil->kerjasama <= 9)
                                            Anda memiliki kerjasama yang baik
                                            @elseif($hasil->kerjasama <= 12)
                                            Anda memiliki kerjasama yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>6.</td>
                                        <td>Kehadiran</td>
                                        <td>{{ $hasil->kehadiran }}</td>
                                        <td>
                                            @if ($hasil->kehadiran <= 3)
                                            Anda memiliki kehadiran yang kurang baik
                                            @elseif($hasil->kehadiran <= 6)
                                            Anda memiliki kehadiran yang cukup baik
                                            @elseif($hasil->kehadiran <= 9)
                                            Anda memiliki kehadiran yang baik
                                            @elseif($hasil->kehadiran <= 12)
                                            Anda memiliki kehadiran yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>7.</td>
                                        <td>Tanggung Jawab</td>
                                        <td>{{ $hasil->tanggungjawab }}</td>
                                        <td>
                                            @if ($hasil->tanggungjawab <= 3)
                                            Anda memiliki tanggung jawab yang kurang baik
                                            @elseif($hasil->tanggungjawab <= 6)
                                            Anda memiliki tanggung jawab yang cukup baik
                                            @elseif($hasil->tanggungjawab <= 9)
                                            Anda memiliki tanggung jawab yang baik
                                            @elseif($hasil->tanggungjawab <= 12)
                                            Anda memiliki tanggung jawab yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                        <tr>
                                        <td>8.</td>
                                        <td>Komunikasi</td>
                                        <td>{{ $hasil->komunikasi }}</td>
                                        <td>
                                            @if ($hasil->komunikasi <= 3)
                                            Anda memiliki komunikasi yang kurang baik
                                            @elseif($hasil->komunikasi <= 6)
                                            Anda memiliki komunikasi yang cukup baik
                                            @elseif($hasil->komunikasi <= 9)
                                            Anda memiliki komunikasi yang baik
                                            @elseif($hasil->komunikasi <= 12)
                                            Anda memiliki komunikasi yang sangat baik
                                            @endif
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                    </div>
                    <!-- /Account -->
                  </div>
                </div>
              </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
  </body>
</html>
