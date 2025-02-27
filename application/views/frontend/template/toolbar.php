<div class="toolbar-area hidden-md">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="toolbar-text">
                    <?php
                    $this->db->select("IF(LENGTH(judul) > 30, CONCAT(LEFT(judul, 30), '..'), judul) AS judull, tgl_berita,sub_judul");
                    $this->db->from('tb_berita');
                    $this->db->where('status', 1);
                    $this->db->where('aktif', 'Y');
                    $this->db->order_by('id_berita', 'DESC');
                    $this->db->limit(3);
                    $baruatas = $this->db->get('')->result_array();
                    ?>
                    <div class="latest-news-title text-center"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TERBARU </div>
                    <div class="latest-news">
                        <div class="back-topbar-slider owl-carousel">
                            <?php foreach($baruatas as $atasbaru):?>
                            <div><a href="<?= base_url('detail/' . url_title($atasbaru['tgl_berita'], 'dash', TRUE) . '/' . url_title($atasbaru['sub_judul'], 'dash', TRUE)) ?>"
                                    style="color:#ffffff"><?= $atasbaru['judull']; ?></a></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-12">
                <div class="toolbar-text"><span id="tanggal"></span>&nbsp;<span id="jam"></span></div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="toolbar-content">
                    <div class="toolbar-sl-share">
                        <ul>
                            <li class="back-follow">Ikuti Kami</li>
                            <li><a href="https://facebook.com/profile.php?id=61559886661864" target="_blank"><i
                                        class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://www.instagram.com/riiljejak.id/" target="_blank"><i
                                        class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCveJ8X7NMou3EsBLQLDu7Vg" target="_blank"><i
                                        class="fa-brands fa-youtube"></i></a></li>
                            <li><a href="<?= base_url('rj/login')?>"><i class="fa fa-lock"></i></a></li>
                            <!-- <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>