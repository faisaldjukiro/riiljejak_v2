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

    @media (max-width: 768px) {
        .select2-container.form-select {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <?php $this->load->view('backend/template/header') ?>
    <?php $this->load->view('backend/template/sidebar') ?>

    <main id="main" class="main">
        <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
        <?php endif; ?>

        <!-- Display Flash Message -->
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
            <h1>Tambah Foto</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/berita/foto') ?>">Foto</a></li>
                    <li class="breadcrumb-item active">Tambah Foto</li>
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
                            <form id="editForm" action="<?= base_url('rj/berita/foto/tambah') ?>" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" class="form-control" name="id_user" value="<?= $user['id_user']?>">
                                <input type="hidden" class="form-control" name="role_id"
                                    value="<?= $user['role_id'] ?>">
                                <input type="hidden" class="form-control" name="jam_foto" id="jam">
                                <div class=" row mb-3">
                                    <label class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="judul_foto" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control file-input" id="gambar" name="gambar"
                                            accept="image/*" data-required="true">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Redaksi Foto</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="summernote" name="redaksi_foto"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Tanggal Foto</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="tgl_foto" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <button id="submitBtn" type="submit" class="btn btn-success shadow btn-sm"><i
                                                class="ri ri-send-plane-2-fill"></i> Kirim</button>
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

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>

    <script>
    $(document).ready(function() {
        $('#gambar').fileinput({

            theme: 'bi', // Menggunakan FontAwesome sebagai tema
            browseClass: "btn btn-primary btn-sm ", // Gaya tombol "Browse"
            removeClass: "btn btn-danger btn-sm", // Gaya tombol "Browse"
            showUpload: false, // Tombol unggah tidak ditampilkan
            showRemove: true, // Tombol hapus ditampilkan
            showCaption: false, // Caption tidak ditampilkan
            fileType: "any", // Jenis file yang diizinkan (semua jenis file)
            previewFileIcon: "<i class='fas fa-file'></i>", // Ikon yang digunakan untuk preview file
            overwriteInitial: false, // Untuk menampilkan gambar preview
            initialPreviewAsData: true, // Untuk menampilkan gambar preview
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg",
                "webp"
            ], // Ekstensi file yang diizinkan
            maxFileSize: 2048, // Ukuran file maksimum dalam KB
            maxFileCount: 1, // Jumlah file maksimum yang diizinkan
            browseLabel: "Pilih Gambar", // Label untuk tombol "Browse" dengan ikon
            removeLabel: "Hapus", // Label untuk tombol "Remove" dengan ikon
            removeTitle: "Hapus gambar", // Title untuk tombol "Remove"
            layoutTemplates: {
                actionZoom: '<button type="button" class="kv-file-zoom {zoomClass}" title="{zoomTitle}" {dataUrl}{dataKey}>{zoomIcon}</button>',
            },
            zoomIcon: '<i class="fas fa-search"></i>', // Ikon untuk tombol "View Detail"
            msgInvalidFileExtension: "Hanya file dengan ekstensi {extensions} yang diperbolehkan.", // Pesan untuk ekstensi file tidak valid
            msgSizeTooLarge: "Ukuran file {name} ({size} KB) melebihi batas maksimum yang diizinkan {maxSize} KB. Silakan coba lagi!", // Pesan untuk ukuran file terlalu besar
            msgFilesTooMany: "Jumlah file yang dipilih ({n}) melebihi batas maksimum yang diizinkan {m}. Silakan coba lagi!", // Pesan untuk jumlah file terlalu banyak
            msgFileNotFound: "File \"{name}\" tidak ditemukan!", // Pesan untuk file tidak ditemukan
            msgFilePreviewAborted: "Pratinjau file untuk \"{name}\" dibatalkan.", // Pesan untuk pratinjau file dibatalkan
            msgFilePreviewError: "Terjadi kesalahan saat membaca file \"{name}\".", // Pesan untuk kesalahan pratinjau file
            msgValidationError: "Kesalahan validasi", // Pesan untuk kesalahan validasi umum
            msgLoading: "Memuat file {index} dari {files} &hellip;", // Pesan saat memuat file
            msgProgress: "Memuat file {index} dari {files} - {name} - {percent}% selesai.", // Pesan saat proses memuat file
            msgSelected: "{n} file dipilih", // Pesan untuk file yang dipilih
            msgZoomModalHeading: "Pratinjau Detail", // Judul modal pratinjau zoom
            msgFileRequired: "Anda harus memilih setidaknya satu file untuk diunggah.", // Pesan untuk file yang dibutuhkan
            browseOnZoneClick: true, // Browse ketika klik pada zona
            dropZoneTitle: "Seret dan lepaskan file di sini &hellip;", // Judul zona drop
            dropZoneClickTitle: "<br>(atau klik untuk memilih file)", // Klik judul zona drop
            removeTitle: "Hapus file", // Hapus judul tombol
            layoutTemplates: {
                actionUpload: '', // Hapus tombol unggah
            }

        });
    });
    </script>

    <script>
    document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            title: "Apakah Anda ingin menyimpan foto?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: "Don't save"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('editForm').submit();
            } else if (result.isDenied) {
                Swal.fire("Foto tidak disimpan", "", "info");
            }
        });
    });
    </script>
    <script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');
        var currentTime = hours + ':' + minutes + ':' + seconds;
        document.getElementById('jam').value = currentTime;
    }

    updateTime();

    setInterval(updateTime, 1000);
    </script>
    <script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 100 // Set editor height
        });
    });
    </script>
</body>

</html>