<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>PPL UPI SMKN 1 Cimahi 2023</title>
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap" />
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>fonts/simple-line-icons.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/baguetteBox.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/vanilla-zoom.min.css" />
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container">
            <a class="navbar-brand logo" href="#">PPL UPI SMKN 1 CIMAHI 2023</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Auth'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page landing-page">
        <section class="clean-block clean-hero" style="
          background-image: url('<?= base_url('assets/frontend/'); ?>img/tech/upi.jpg');
          color: rgba(9, 162, 255, 0.85);
        ">
            <div class="text">
                <h2>Selamat Datang di Website PPLSP-P3K UPI SMKN 1 CIMAHI 2023</h2>
                <p></p>
            </div>
        </section>
        <section class="clean-block clean-info dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Info</h2>
                    <p>
                        Website ini merupakan landing-page untuk PPLSP-P3K UPI di SMKN 1
                        Cimahi
                    </p>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img class="img-thumbnail" src="<?= base_url('assets/frontend/'); ?>img/tech/smkn1.jpg" />
                    </div>
                    <div class="col-md-6">
                        <h3>SMKN 1 Cimahi</h3>
                        <div class="getting-started-info">
                            <p>
                                SMK Negeri 1 Cimahi (STM Pembangunan Bandung) merupakan salah
                                satu Lembaga Pendidikan Menengah Kejuruan di Kota Cimahi, Jawa
                                Barat yang menyelenggarakan Program Pendidikan Kejuruan 4
                                Tahun, dan merupakan salah satu SMK dari 8 (delapan) SMK
                                Negeri di Indonesia yang memiliki program 4 (empat) Tahun
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="clean-block slider dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Info-Info Piket dan Jadwal Mengajar</h2>
                    <p>Berikut Informasi Piket dan Jadwal Mengajar</p>
                </div>

                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">

                        <?php
                        //mendapat gambar pertama

                        if ($banyakPosting == 0) {
                        } else {
                            echo '<div class="carousel-item active">';
                            $gambarPertama = $posting[0]['gambar'];
                            echo '<img class="w-100 d-block" src="' . base_url('assets/gambar/') . $gambarPertama . '" alt="Slide Image" />';
                            echo '</div>';
                            //mendapatkan judul lainnya
                            for ($i = 1; $i < $banyakPosting; $i++) {
                                echo '<div class="carousel-item">';
                                $gambarLain = $posting[$i]['gambar'];
                                echo '<img class="w-100 d-block" src="' . base_url('assets/gambar/') . $gambarLain . '" alt="Slide Image" />';
                                echo '</div>';
                            }
                        }

                        ?>

                    </div>
                    <div>
                        <a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a>
                    </div>
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                        <?php
                        for ($i = 1; $i < $banyakPosting; $i++) {
                            echo '<li data-bs-target="#carousel-1" data-bs-slide-to="' . $i . '" ></li>';
                        }
                        ?>
                    </ol>
                </div>
            </div>
        </section>
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">About Us</h2>
                    <p>
                        Berikut ini adalah pengajar PPLSP-P3K UPI di SMKN 1 Cimahi 2023
                    </p>
                </div>

                <div class="row justify-content-center">

                    <?php
                    foreach ($ppl as $ppl) {
                        echo '<div class="col-sm-6 col-lg-4">';
                        echo ' <div class="card text-center clean-card">';
                        echo '<img class="card-img-top w-100 d-block" src="' . base_url('assets/gambar/') . $ppl['foto'] . '">';
                        echo '<div class="card-body info">';
                        echo '<h4 class="card-title">' . $ppl['nama'] . '</h4>';
                        echo '<p class="card-text">' . $ppl['keterangan'] . '</p>';
                        echo '<div class="icons">';
                        echo '<a href="instagram.com/' . $ppl['instagram'] . '"><i class="icon-social-instagram"></i></a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>



            </div>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Sistem Informasi Absensi</h5>
                    <ul>
                        <li><a href="#">Sistem Informasi Absensi Guru PPL</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Sistem Informasi Pencatat Keterlambatan Siswa</h5>
                    <ul>
                        <li><a href="#">Pencatat Keterlambatan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2023 PPLSP-P3K UPI di SMKN 1 Cimahi</p>
        </div>
    </footer>
    <script src="<?= base_url('assets/frontend/'); ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/baguetteBox.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/vanilla-zoom.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/theme.js"></script>
</body>

</html>