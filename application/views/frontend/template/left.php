<div class="col-lg-4">
    <div class="back-sidebar pl-30 md-pl-0 back-hero-area back-latest-posts back-whats-posts">




        <div class="back-title back-small-title pt-30">
            <h2>Terpopuler</h2>
        </div>
        <ul class="back-hero-bottom">

            </li>
            <?php
                            $no = 1 ;
                            foreach($populer as $pop):?>

            <li>
                <div class="button-isal">
                    <button class="btn btn-primary"><?=$no++?></button>
                </div>
                <div class="back-btm-content">
                    <h3><a
                            href="
                                            <?= base_url('detail/' . url_title($pop['tgl_berita'], 'dash', TRUE) . '/' . url_title($pop['sub_judul'], 'dash', TRUE)) ?>"><?= $pop['judul'] ?></a>
                    </h3>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>