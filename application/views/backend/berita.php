<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('backend/template/head') ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    .table.datatable {
        border-collapse: collapse;
        width: 100%;
    }

    .table.datatable th,
    .table.datatable td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    .table.datatable th {
        background-color: #f2f2f2;
        text-align: center;
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

        <?= $this->session->flashdata('message'); ?>

        <div class="pagetitle">
            <h1>Berita</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Berita</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <!-- <a href="<?= base_url('rj/berita/generatefoto') ?>" type="button" title="Buat Gambar"
                                class="btn btn-secondary mb-3 btn-sm "><i class="bi bi-plus-circle"></i>
                                Gambar
                            </a> -->
                            <a href="<?= base_url('rj/berita/tambah') ?>" type="button" title="Tambah Berita"
                                class="btn btn-primary mb-3 btn-sm"><i class="bi bi-plus-circle"></i>
                                Berita
                            </a>
                            <table class="table datatable table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Sampul Berita</th>
                                        <th scope="col">Nama Penulis</th>
                                        <th scope="col">Judul Berita</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tgl Berita</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($berita as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><img src="<?= base_url('img/berita/' . $sm['gambar']); ?>"
                                                alt="Gambar Berita"
                                                style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                        </td>
                                        <td><?= $sm['nama']; ?></td>
                                        <td><?= $sm['judul']; ?></td>
                                        <td>
                                            <?php
                                                if ($sm['status'] == 1) {
                                                    echo '<span class="badge bg-success">Tayang</span>';
                                                } else if ($sm['status'] == 2) {
                                                    echo '<span class="badge bg-primary">Edit 1x</span>';
                                                } else if ($sm['status'] == 3) {
                                                    echo '<span class="badge bg-warning">Editor</span>';
                                                }
                                                ?>
                                        </td>
                                        <td><?= tanggal_indo($sm['tgl_berita']); ?></td>
                                        <td>
                                            <a type="button"
                                                href="<?= base_url('rj/berita/detail/') . $sm['id_berita']; ?>"
                                                class="badge bg-success"><i class="bi bi-eye"></i></a>

                                            <a type="button"
                                                href="<?= base_url('rj/berita/edit/') . $sm['id_berita']; ?>"
                                                class="badge bg-info"><i class="bi bi-pencil"></i></a>

                                            <a type="button" class="hapus badge bg-danger"
                                                href="<?= base_url('rj/berita/hapus/') . $sm['id_berita']; ?>"><i
                                                    class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>

    <?php $this->load->view('backend/template/footer') ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php $this->load->view('backend/template/js') ?>
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Pilih semua elemen dengan kelas 'hapus'
        const deleteButtons = document.querySelectorAll('.hapus');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                const href = this.href;

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger",
                        popup: 'swal2-popup-custom'
                    },
                    buttonsStyling: true
                });
                swalWithBootstrapButtons.fire({
                    title: "Apa kamu yakin?",
                    text: "Anda tidak akan dapat mengembalikan berita ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Hapus",
                    cancelButtonText: "Batal",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(href, {
                            method: 'GET' // atau 'POST' tergantung dari konfigurasi controller
                        }).then(response => {
                            if (response.ok) {
                                swalWithBootstrapButtons.fire({
                                    title: "Hapus",
                                    text: "Berita Anda telah dihapus.",
                                    icon: "success"
                                }).then(() => {
                                    location
                                        .reload(); // Reload halaman setelah penghapusan berhasil
                                });
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Terjadi kesalahan saat menghapus berita.",
                                    icon: "error"
                                });
                            }
                        }).catch(error => {
                            swalWithBootstrapButtons.fire({
                                title: "Error",
                                text: "Terjadi kesalahan saat menghapus berita.",
                                icon: "error"
                            });
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Batal",
                            text: "Anda batal menghapus berita ini",
                            icon: "error"
                        });
                    }
                });
            });
        });
    });
    </script>

</body>

</html>