<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="pelajaran bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center">
                <h2 data-aos="fade-up" data-aos-duration="1600">Artikel</h2>
                <div data-aos="fade-up" data-aos-duration="1800" class="page_link">
                    <a href="<?= base_url('welcome') ?>">Beranda</a>
                    <a href="<?= base_url('artikel') ?>">Artikel</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Courses Area =================-->
<section class="courses_area p_40">
    <div class="container">
        <div class="row">
        <?php
            foreach ($artikel as $u) {
        ?>
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title" style="color: black;"><?= $u->judul ?></h5>
                        <p class="card-subtitle mb-2">penulis : <?= $u->penulis ?></p>
                        <p class="card-text"> <?= mb_strimwidth($u->deskripsi,0,156)."..." ?></p>
                        <a href="#" class="card-link">Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        </div>
    </div>
</section>
<!--================End Courses Area =================-->