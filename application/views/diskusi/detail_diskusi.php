<!--
@Project: Learnify
@Programmer: Syauqi Zaidan Khairan Khalaf
@Website: https://linktr.ee/syauqi
@Email : syaokay@gmail.com

@About-Learnify :
Web Edukasi Open Source yang dibuat oleh Syauqi Zaidan Khairan Khalaf.
Learnify adalah Web edukasi yang dilengkapi video, materi dan sistem ujian
yang tersedia secara gratis. Learnify dibuat ditujukan agar para siswa dan
guru dapat terus belajar dan mengajar dimana saja dan kapan saja.
-->

<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?= base_url('assets/') ?>img/favicon.png" type="image/png">
    <!-- Title -->
    <title>Selamat datang - <?php
                            $data['user'] = $this->db->get_where('siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                            echo $data['user']['nama'];
                            ?> - Learnify Student Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/linericon/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/popup/magnific-popup.css">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/user_style.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/responsive.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.4/dist/sweetalert2.all.min.js"></script>

</head>

<body style="overflow-x:hidden;background-color:#fbf9fa">


    <!-- Start Navigation Bar -->
    <header class="header_area" style="background-color: white !important;">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="<?= base_url('welcome') ?>"><img src="<?= base_url('assets/') ?>img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item "><a class="nav-link" href="javascript:void(0)">Hai, <?php
                                                                                                        $data['user'] = $this->db->get_where('siswa', ['email' =>
                                                                                                        $this->session->userdata('email')])->row_array();
                                                                                                        echo $data['user']['nama'];
                                                                                                        ?></a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('user') ?>">Beranda</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('pengumuman') ?>">Pengumuman</a>
                            </li>
                            <li class="nav-item active"><a class="nav-link" href="<?= base_url('diskusi') ?>">Diskusi</a>
                            </li>
                            <li class=" nav-item "><a class=" nav-link text-danger" href="<?= base_url('welcome/logout') ?>">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Navigation Bar -->


    <!-- Start Greetings Card -->
    <div class="container">
        <section class="section">
            <div class="card pt-2 pb-2">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;"><?= $diskusi[0]->judul ?></h2>
                    <hr>
                    <h4 class=""><?= $diskusi[0]->deskripsi ?></h4>
                </div>
            </div>
        </section>
    </div>
    <br>
    <div class="container">
        <section class="section">
            <div class="card pt-2 pb-2">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Komentar</h2>
                    <form method="POST" action="<?= base_url('diskusi/tambah_komentar/'.$diskusi[0]->id) ?>">
                        <div class="form-group">
                            <input id="id" type="text" class="form-control" name="nama" value="<?= $data['user']['nama']?>" hidden>
                            <?= form_error('id', '<small class="text-danger">', '</small>'); ?>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea id="komentar" type="text" class="form-control" name="komentar"></textarea>
                            <?= form_error('komentar', '<small class="text-danger">', '</small>'); ?>
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                Posting Komentar ⭢
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    
    <br>
    
    <?php
    if($komentar != null){
        foreach ($komentar as $k) {
    ?>
    <div class="container">
        <section class="section">
            <div class="card pt-2 pb-2">
                <div class="card-body">
                    <h4 class="card-title" style="color: black;">Jawaban dari : <?php echo $k["posted_by"]?></h4>
                    <hr>
                    <p class="">Jawaban :  <?php echo $k["komentar"]?></p>
                    <p class=""><?php echo $k["date_created"]?></p>
                </div>
            </div>
        </section>
    </div>
    <br>
    <?php
        }
        }
    ?>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <!-- End Animate On Scroll -->