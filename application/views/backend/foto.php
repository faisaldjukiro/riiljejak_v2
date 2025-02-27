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
            <h1>Foto</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('rj/beranda') ?>">Beranda</a></li>
                    <li class="breadcrumb-item active">Foto</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-auto">
                        <div class="card-body">
                            <br>
                            <a href="<?= base_url('rj/berita/foto/tambah') ?>" type="button" title="Tambah Foto"
                                class="btn btn-primary mb-3 btn-sm"><i class="bi bi-plus-circle"></i> Foto
                            </a>
                            <table class="table datatable table-striped nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Upload</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tgl Foto</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($foto as $sm) : ?>
                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><img src="<?= base_url('img/berita/' . $sm['gambar']); ?>"
                                                    alt="Gambar Berita"
                                                    style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                                            </td>
                                            <td><?= $sm['nama']; ?></td>
                                            <td><?= $sm['judul_foto']; ?></td>
                                            <td><?= tanggal_indo($sm['tgl_foto']); ?></td>
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
                                            <td>
                                                <a type="button"
                                                    href="<?= base_url('rj/berita/foto/detail/') . $sm['id_foto']; ?>"
                                                    class="badge bg-success"><i class="bi bi-eye"></i></a>

                                                <a type="button"
                                                    href="<?= base_url('rj/berita/foto/edit/') . $sm['id_foto']; ?>"
                                                    class="badge bg-info"><i class="bi bi-pencil"></i></a>

                                                <a type="button" class="hapus badge bg-danger"
                                                    href="<?= base_url('rj/berita/foto/hapus/') . $sm['id_foto']; ?>"><i
                                                        class="bi bi-trash"></i></a>

                                                <!-- <a type="button"
                                                href="<?= base_url('transaksi/obat-masuk-edit/') . $sm['id_foto']; ?>"
                                                class="badge bg-warning"><i class="bi bi-pencil"></i></a> -->
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
                        text: "Anda tidak akan dapat mengembalikan foto ini!",
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
                                        text: "Terjadi kesalahan saat menghapus foto.",
                                        icon: "error"
                                    });
                                }
                            }).catch(error => {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Terjadi kesalahan saat menghapus foto.",
                                    icon: "error"
                                });
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Batal",
                                text: "Anda batal menghapus foto ini",
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