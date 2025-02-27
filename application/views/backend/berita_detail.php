<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/template/head') ?>

</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('backend/template/header') ?>

    <?php $this->load->view('backend/template/sidebar') ?>

    <main id="main" class="main">


        <div class="pagetitle">
            <h1>Detail Berita</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/berita') ?>">Berita</a></li>
                    <li class="breadcrumb-item active">Detail Berita</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title text-center"><?= $berita['judul']?></h4>
                            <p class="card-text"><small
                                    class="text-muted"><?= tanggal_indo($berita['tgl_berita'], $berita['jam']); ?></small>
                            </p>
                            <img src="<?= base_url('img/berita/' . $berita['gambar']); ?>" alt="Gambar Berita"
                                width="100%" height="100%">
                            <small
                                class="mb-3 d-block text-center text-secondary px-5 mt-2"><?= $berita['keterangan_gambar']?></small>
                            <div class="card-text text-justify mt-5">
                                <?= $berita['isi_berita']?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('rj/berita')?>" class="btn btn-info"><i
                                    class="bi bi-arrow-left-circle text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>


    </main><!-- End #main -->
    <!-- ======= Footer ======= -->
    <?php $this->load->view('backend/template/footer') ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <?php $this->load->view('backend/template/js') ?>



</body>

</html>