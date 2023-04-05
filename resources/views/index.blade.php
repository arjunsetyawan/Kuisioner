@extends('layouts.main')
@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Kuisioner Penilaian Kinerja Karyawan</h1>
                    <h2>We are helping you to evaluate the performance of your employees</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{!! asset('img/hero-img.png') !!}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <!-- ======= Why Us Section ======= -->
    <section id="about" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                    <div class="content">
                        <h3>Keuntungan E-Kinerja untuk melakukan penilaian kinerja karyawan</h3>
                    </div>
                    <div class="accordion-list mt-4">
                        <ul>
                            <li>
                                <a data-bs-toggle="collapse" class="collapse"
                                    data-bs-target="#accordion-list-1"><span>01</span> Efisiensi Waktu <i
                                        class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                    <p>
                                        Mengurangi waktu yang digunakan untuk mengumpulkan data dan analisis jawaban
                                        yang lebih cepat
                                    </p>
                                </div>
                            </li>

                            <li>
                                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                    class="collapsed"><span>02</span> Penilaian yang lebih objektif
                                    <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                    <p>
                                        Penilaian dilakukan oleh rekan satu tim yang otomatis mengetahui kinerja dari
                                        masing-masing rekan tim nya, sehingga mengurangi adanya penilaian yang tidak
                                        sesuai
                                    </p>
                                </div>
                            </li>

                            <li>
                                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                    class="collapsed"><span>03</span> Mengetahui produktivitas kinerja
                                    <i class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                    <p>
                                        Membantu hrd untuk mengetahui produktivitas dari setiap karyawan melalui hasil
                                        dari kuisioner kinerja yang telah diisi oleh rekan satu timnya
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                    style='background-image: url("{!! asset('img/why-us.png') !!}");' data-aos="zoom-in"
                    data-aos-delay="150">&nbsp;</div>
            </div>
        </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="kriteria" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Kriteria</h2>
                <p>Kriteria merupakan ukuran yang menjadi dasar penilaian kinerja karyawan</p>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mb-4" data-aos="zoom-in"
                    data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4><a href="">Attitude</a></h4>
                        <p>Kriteria ini menilai bagaimana sikap karyawan terhadap rekan kerja, apakah dia bisa untuk
                            diajak bekerja sama. Karyawan yang memiliki attitude yang baik akan membentuk lingkungan
                            kerja yang positif</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 mb-4" data-aos="zoom-in"
                    data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4><a href="">Kedisiplinan kerja</a></h4>
                        <p>Kriteria ini menilai apakah karyawan menyelesaikan pekerjaan dan mengikuti peraturan yang
                            telah dibuat manajemen perusahaan. Disiplin ketika membuat perencanaan
                            pekerjaannya akan berpengaruh pada ketepatan waktu menyelesaikan
                            tanggung jawab</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0 mb-4" data-aos="zoom-in"
                    data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="">Inisiatif dalam bekerja</a></h4>
                        <p>Kriteria ini menilai apakah karyawan inisiatif untuk melakukan hal-hal baru yang memberikan
                            hasil nyata. Karyawan yang punya
                            inisiatif biasanya merupakan pekerja mandiri yang dapat menjalankan perannya tanpa perlu
                            banyak supervisi dari atasan.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0 mb-4" data-aos="zoom-in"
                    data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Leadership</a></h4>
                        <p>Kriteria ini menilai apakah karyawan yang memiliki bakat menjadi pemimpin dan menggerakan
                            serta memotivasi rekan kerjanya
                            bisa menjadi poin penting dalam penilaian karyawan.</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                    data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Kerjasama tim</a></h4>
                        <p>Kriteria ini menilai apakah karyawan menjalankan tugasnya dalam tim, bagaimana mereka
                            berkomunikasi dengan atasan, menerima
                            perintah dan menjalankannya, serta berkolaborasi dengan rekan kerja</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                    data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Kehadiran</a></h4>
                        <p>Kriteria ini menunjukkan kepatuhan karyawan pada peraturan perusahaan mengenai waktu kerja
                            dan kesadaran terhadap kewajibannya sebagai pekerja</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                    data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Tanggung jawab</a></h4>
                        <p>Kriteria ini mengukur pemenuhan tanggung jawab dari peran yang dijalankan karyawan, mana yang
                            sudah memenuhi harapan dan mana yang belum</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in"
                    data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="">Komunikasi</a></h4>
                        <p>Kriteria ini menilai apakah karyawan tersebut memiliki kemampuan untuk berkomunikasi
                            secara memadai dengan rekan
                            kerja, manajer, dan pelanggan</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="kuisioner" class="cta">
        <div class="container" data-aos="zoom-in">

            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h2 class="text-light">Pengisian Kuisioner</h2>
                    <p class="fs-6"> Silahkan klik tombol disamping untuk mulai pengisian kuisioner rekan kerja tim
                        anda
                    </p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Click Here !</a>
                </div>
            </div>

        </div>
    </section><!-- End Cta Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p class="fs-7">Berikut merupakan pertanyaan yang sering ditanyakan oleh user.</p>
            </div>

            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                            data-bs-target="#faq-list-1">Apakah jawaban kuisioner dapat dilihat orang yang dinilai? <i
                                class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p>
                                Tidak, jawaban dari hasil kuisioner kinerja hanya dapat dilihat oleh HRD.
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                            data-bs-target="#faq-list-2" class="collapsed">Apakah kuisioner ini perlu diisi setiap
                            bulan nya? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Benar, setiap karyawan harus mengisi kuisioner kinerja setiap bulan sesuai dengan
                                periode yang telah ditentukan
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="300">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                            data-bs-target="#faq-list-3" class="collapsed">Apakah kuisioner ini boleh diisi secara
                            asal-asalan? <i class="bx bx-chevron-down icon-show"></i><i
                                class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                Tidak boleh, pengisian kuisioner harus dilakukan secara benar berdasarkan kinerja
                                karyawan tersebut
                            </p>
                        </div>
                    </li> 
                </ul>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

</body>

</html>
@endsection
