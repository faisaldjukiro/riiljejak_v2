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
                window.location.href = "<?= site_url('rj/berita/foto'); ?>";
            }
        });
        </script>
        <?php endif; ?>

        <div class="pagetitle">
            <h1>Edit Foto</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/berita/foto') ?>">Foto</a></li>
                    <li class="breadcrumb-item active">Edit Foto</li>
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
                            <form id="editForm" action="<?= base_url('rj/berita/foto/edit/'.$foto['id_foto']) ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="row mb-3">

                                    <label class="col-sm-2 col-form-label">Judul Foto</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="role_id" value="<?=$user['role_id']?>">
                                        <input type="text" class="form-control" name="judul_foto"
                                            value="<?= $foto['judul_foto']?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control-file" id="gambar" name="gambar"
                                            accept="image/*" onchange="previewImage()">
                                        <input type="hidden" name="gambar" value="<?= $foto['gambar'] ?>">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Redaksi Foto</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="summernote"
                                            name="redaksi_foto"><?= $foto['redaksi_foto']?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tanggal Foto</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_foto"
                                            value="<?= $foto['tgl_foto']?>" required>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <script>
    function previewImg() {
        const img = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        if (img.files && img.files[0]) {
            const oFReader = new FileReader();
            oFReader.readAsDataURL(img.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    }

    $(document).ready(function() {
        $('#gambar').fileinput({
            theme: 'bi',
            browseClass: "btn btn-primary btn-sm",
            removeClass: "btn btn-danger btn-sm",
            showUpload: false,
            showRemove: true,
            showCaption: false,
            fileType: "any",
            previewFileIcon: "<i class='fas fa-file'></i>",
            overwriteInitial: true,
            initialPreviewAsData: true,
            initialPreview: [
                <?php if (!empty($foto['gambar'])): ?> "<?= base_url('img/berita/' . $foto['gambar']) ?>"
                <?php endif; ?>
            ],
            initialPreviewConfig: [
                <?php if (!empty($foto['gambar'])): ?> {
                    caption: "<?= $foto['gambar'] ?>",
                    key: 1
                }
                <?php endif; ?>
            ],
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg", "webp"],
            maxFileSize: 2048,
            maxFileCount: 1,
            browseLabel: "Pilih Gambar",
            removeLabel: "Hapus",
            removeTitle: "Hapus gambar",
            layoutTemplates: {
                actionZoom: '<button type="button" class="kv-file-zoom {zoomClass}" title="{zoomTitle}" {dataUrl}{dataKey}>{zoomIcon}</button>',
            },
            zoomIcon: '<i class="fas fa-search"></i>',
            msgInvalidFileExtension: "Hanya file dengan ekstensi {extensions} yang diperbolehkan.",
            msgSizeTooLarge: "Ukuran file {name} ({size} KB) melebihi batas maksimum yang diizinkan {maxSize} KB. Silakan coba lagi!",
            msgFilesTooMany: "Jumlah file yang dipilih ({n}) melebihi batas maksimum yang diizinkan {m}. Silakan coba lagi!",
            msgFileNotFound: "File \"{name}\" tidak ditemukan!",
            msgFilePreviewAborted: "Pratinjau file untuk \"{name}\" dibatalkan.",
            msgFilePreviewError: "Terjadi kesalahan saat membaca file \"{name}\".",
            msgValidationError: "Kesalahan validasi",
            msgLoading: "Memuat file {index} dari {files} &hellip;",
            msgProgress: "Memuat file {index} dari {files} - {name} - {percent}% selesai.",
            msgSelected: "{n} file dipilih",
            msgZoomModalHeading: "Pratinjau Detail",
            msgFileRequired: "Anda harus memilih setidaknya satu file untuk diunggah.",
            browseOnZoneClick: true,
            dropZoneTitle: "Seret dan lepaskan file di sini &hellip;",
            dropZoneClickTitle: "<br>(atau klik untuk memilih file)",
            removeTitle: "Hapus file",
            layoutTemplates: {
                actionUpload: '',
            }
        }).on('filecleared', function(event) {
            $('.img-preview').attr('src', '');
        }).on('filebatchselected', function(event) {
            previewImg();
        });
    });
    </script>
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
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 100
        });
    });
    </script>

</body>

</html>