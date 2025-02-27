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
                window.location.href = "<?= site_url('rj/berita'); ?>";
            }
        });
        </script>
        <?php endif; ?>

        <div class="pagetitle">
            <h1>Edit Berita</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/berita') ?>">Berita</a></li>
                    <li class="breadcrumb-item active">Edit Berita</li>
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
                            <form id="editForm" action="<?= base_url('rj/berita/edit/'.$berita['id_berita']) ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="row mb-3">

                                    <label class="col-sm-2 col-form-label">Judul Berita</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="role_id" value="<?=$user['role_id']?>">
                                        <input type="text" class="form-control" name="judul"
                                            value="<?= $berita['judul']?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="kat" name="id_kategori" required>
                                            <option value="" disabled selected>Pilih</option>
                                            <?php foreach ($kategori as $row): ?>
                                            <option value="<?= $row['id_kat_master'] ?>"
                                                <?= $row['id_kat_master'] == $berita['id_kategori'] ? 'selected' : '' ?>>
                                                <?= $row['nm_kategori_master'] ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Menu Kategori</label>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <?php foreach ($kategori as $kat): ?>
                                            <div class="col-md-3 col-sm-4 col-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="id_kategori_master[]"
                                                        id="kategori_<?php echo $kat['id_kat_master']; ?>"
                                                        value="<?php echo $kat['id_kat_master']; ?>"
                                                        <?php echo in_array($kat['id_kat_master'], $selected_categories) ? 'checked' : ''; ?>>
                                                    <label class="form-check-label"
                                                        for="kategori_<?php echo $kat['id_kat_master']; ?>"><?php echo $kat['nm_kategori_master']; ?></label>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Sampul Berita</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="gambar_lama" value="<?= $berita['gambar'] ?>">
                                        <input type="file" class="form-control-file" id="gambar" name="gambar"
                                            accept="image/*">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Redaksi Foto</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="keterangan_gambar"
                                            value="<?= htmlspecialchars($berita['keterangan_gambar']) ?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Isi Berita</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="my-editor"
                                            name="isi_berita"><?= $berita['isi_berita']?></textarea>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tag Berita</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" id="tag" name="tag[]" multiple="multiple" required>
                                            <?php 
                                                    $selected_tags = explode(',', $berita['tag']);
                                                    foreach ($selected_tags as $tag): 
                                                    ?>
                                            <option value="<?=$tag?>" selected>
                                                <?= htmlspecialchars($tag) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">Headline</label>
                                        <div class="col-sm-10">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="headline"
                                                    id="headlineTidak" value="N"
                                                    <?= ($berita['headline'] == 'N') ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="headlineTidak">N</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="headline"
                                                    id="headlineYa" value="Y"
                                                    <?= ($berita['headline'] == 'Y') ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="headlineYa">Y</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Youtube</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="youtube"
                                            value="<?= $berita['youtube']?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tanggal Berita</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_berita"
                                            value="<?= $berita['tgl_berita']?>" required>
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
    $(document).ready(function() {
        $('#tag').select2({
            tags: true,
            tokenSeparators: [',']
        });
    });
    $(document).ready(function() {
        $('#kat').select2();
    });
    </script>

    <script>
    CKEDITOR.replace('my-editor', {
        height: 300,
        filebrowserUploadUrl: '<?= base_url('rj/berita/tambah/gambar') ?>'
    });
    </script>

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
                <?php if (!empty($berita['gambar'])): ?> "<?= base_url('img/berita/' . $berita['gambar']) ?>"
                <?php endif; ?>
            ],
            initialPreviewConfig: [
                <?php if (!empty($berita['gambar'])): ?> {
                    caption: "<?= $berita['gambar'] ?>",
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


</body>

</html>