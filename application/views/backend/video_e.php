<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/template/head') ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all"
        rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <style>
    .select2-container {
        margin-bottom: 0.5rem;
    }

    .select2-container.form-select {
        width: 100%;
        padding: .375rem .75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    /* Responsif untuk elemen select2 */
    @media (max-width: 768px) {
        .select2-container.form-select {
            width: 100%;
        }
    }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php $this->load->view('backend/template/header') ?>

    <?php $this->load->view('backend/template/sidebar') ?>

    <main id="main" class="main">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('message')) : ?>
        <script>
        Swal.fire({
            title: "<?= $this->session->flashdata('message_type') == 'success' ? 'Success' : 'Error' ?>",
            text: "<?= $this->session->flashdata('message'); ?>",
            icon: "<?= $this->session->flashdata('message_type'); ?>",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('rj/berita/video'); ?>";
            }
        });
        </script>
        <?php endif; ?>

        <div class="pagetitle">
            <h1>Edit Video</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/berita/video') ?>">Video</a></li>
                    <li class="breadcrumb-item active">Edit Video</li>
                </ol>
            </nav>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            <br>
                            <form id="editForm" action="<?= base_url('rj/berita/video/edit/'.$video['id_video']) ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="role_id" value="<?=$user['role_id']?>">
                                        <input type="text" class="form-control" name="judul_video"
                                            value="<?= $video['judul_video']?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">URL Video</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="role_id" value="<?=$user['role_id']?>">
                                        <input type="text" class="form-control" id="url_video" name="url_video"
                                            value="<?= htmlspecialchars($video['url_video']) ?>">
                                        <br>
                                        <div class="text-center"> <?= $video['url_video']?></div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tanggal Video</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_video"
                                            value="<?= $video['tgl_video']?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button type="button" id="submitBtn" class="btn btn-success shadow btn-sm"><i
                                                class="ri ri-send-plane-2-fill"></i> Ganti</button>
                                        <button type="reset" class="btn btn-danger shadow btn-sm"><i
                                                class="bi bi-trash2-fill"></i> Reset</button>
                                    </div>
                                </div>

                            </form>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/piexif.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/plugins/sortable.min.js"
        type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/themes/fas/theme.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script>


    <script>
    document.getElementById('submitBtn').addEventListener('click', function() {
        Swal.fire({
            title: "Apakah Anda ingin menyimpan perubahan ? ",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editForm').submit();
            } else if (result.isDenied) {
                Swal.fire("Perubahan tidak disimpan", "", "info");
            }
        });
    });
    </script>

    <script>
    document.getElementById('url_video').addEventListener('input', function() {
        document.getElementById('video_frame').src = this.value;
    });
    </script>
</body>

</html>