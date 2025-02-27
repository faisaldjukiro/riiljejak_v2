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
            <h1>Detail Foto</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/berita/foto') ?>">Foto</a></li>
                    <li class="breadcrumb-item active">Detail Foto</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title text-center"><?= $foto['judul_foto']?></h4>
                            <p class="card-text"><small
                                    class="text-muted"><?= tanggal_indo($foto['tgl_foto'], $foto['jam_foto']); ?></small>
                            </p>
                            <img src="<?= base_url('img/berita/' . $foto['gambar']); ?>" alt="Gambar Berita"
                                width="100%" height="100%">
                            <!-- <small
                                class="mb-3 d-block text-center text-secondary px-5 mt-2"><?= $foto['redaksi_foto']?></small> -->
                            <div class="card-text text-justify mt-5">
                                <?= $foto['redaksi_foto']?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= base_url('rj/berita/foto')?>" class="btn btn-info"><i
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