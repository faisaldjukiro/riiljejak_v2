<div class="footer-top">
    <div class="container">
        <div class="stats-section">
            <?php
            date_default_timezone_set('Asia/Makassar');
            $waktu_sekarang = date('Y-m-d H:i:s');

            $hari_ini_query = $this->db->query("SELECT COUNT(*) AS visits_today
            FROM visits
            WHERE DATE(visit_time) = DATE('$waktu_sekarang');");
            $hari_ini = ($hari_ini_query->num_rows() > 0) ? $hari_ini_query->row()->visits_today : 0;
            $minggu_ini_query = $this->db->query("SELECT COUNT(*) AS visits_this_week
            FROM visits
            WHERE YEARWEEK(visit_time, 1) = YEARWEEK('$waktu_sekarang', 1);");
            $minggu_ini = ($minggu_ini_query->num_rows() > 0) ? $minggu_ini_query->row()->visits_this_week : 0;
            $total_kunjungan_query = $this->db->query("SELECT COUNT(*) AS total_visits
            FROM visits;");
            $total_kunjungan = ($total_kunjungan_query->num_rows() > 0) ? $total_kunjungan_query->row()->total_visits : 0;
            ?>

            <div class="stat-box">
                <span class="stat-value"><?= $hari_ini ?></span>
                <p>Hari ini</p>
            </div>
            <div class="stat-box">
                <span class="stat-value"><?= $minggu_ini ?></span>
                <p>Minggu ini</p>
            </div>
            <div class="stat-box">
                <span class="stat-value"><?= $total_kunjungan ?></span>
                <p>Total Pengunjung</p>
            </div>

        </div>

        <br>
        <div class="row">
            <div class="col-lg-6 md-mb-30">
                <div class="footer-widget footer-widget-1">
                    <div class="footer-logo white">
                        <a href="<?php echo base_url('') ?>" class="logo-text"> <img
                                src="<?= base_url('template/frontend/assets/') ?>assets/images/light-logo.png"
                                alt="logo"></a>
                    </div>

                    <div class="footer-subtitle">
                        <p>
                            Jalan Trans Sulawesi <br />
                            Kabupaten Bolaang Mongondow Utara - Boroko : 95765 <br>
                            <br>
                            <i class="fas fa-phone "></i> &nbsp;&nbsp;+62 853-1132-6323<br />
                            <i class="fas fa-envelope "></i> &nbsp;&nbsp;rifdhalriilmedia@gmail.com
                        </p>
                    </div>
                    <div class="container">
                        <div class="verified-container">
                            <img src="https://static.promediateknologi.id/promedia/news/desktop/images/icon-verify.svg?v=1"
                                alt="Verified" class="checkmark">
                            <div class="text-contentt">
                                <p class="titlee">Riiljejak</p>
                                <p class="verified-by">Telah Diverifikasi Oleh Dewan Pers</p>
                                <p class="certificate">Id Media <span class="number">31147</span>
                                <p class="certificate">Nomor <span class="number">AHU-0025205.AH.01.01.TAHUN 2024</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 text-center">
                <div class="footer-widget footer-widget-2">
                    <div class="footer-menu">
                        <ul>
                            <?php
                            $data = $this->db->query("SELECT  url, nm_kategori_master FROM tb_kategori_master ORDER BY id_kat_master ASC LIMIT 11")->result_array();
                            ?>
                            <?php foreach ($data as $row): ?>
                            <li><a href="<?= base_url($row['url']) ?>"><?= $row['nm_kategori_master'] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center">
                <div class="footer-widget footer-widget-2">
                    <div class="footer-menu">
                        <ul>
                            <?php
                            $data = $this->db->query("SELECT  url, nm_kategori_master FROM tb_kategori_master ORDER BY id_kat_master DESC LIMIT 10")->result_array();
                            ?>
                            <?php foreach ($data as $row): ?>
                            <li><a href="<?= base_url($row['url']) ?>"><?= $row['nm_kategori_master'] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="back-copy-left">@2024 RIFDHAL RIIL MEDIA
        </div>
        <div class="back-copy-right">
            <ul>
                <li><a href="<?php echo base_url('tentang-kami') ?>">Tentang Kami</a></li>
                <li><a href="<?php echo base_url('redaksi') ?>">Redaksi</a></li>
                <!-- <li><a href="<?php echo base_url('tentang-kami') ?>">Info Iklan</a></li> -->
                <!-- <li><a href="<?php echo base_url('tentang-kami') ?>">Karir</a></li> -->
                <li><a href="<?php echo base_url('kontak') ?>">Kontak</a></li>
                <li><a href="<?php echo base_url('pedoman-pemberitaan') ?>">Pedoman Media Siber</a></li>
                <li><a href="<?php echo base_url('privacy') ?>">Privacy</a></li>
            </ul>
        </div>
    </div>
</div>