<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('frontend/template/head') ?>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .footer-divider {
            border-top: 0.5px solid #fff;
            margin-top: 1px;
        }

        .main-image img {
            width: 100%;
            height: auto;
        }

        @media (max-width: 767px) {
            .main-image img {
                height: auto;
                max-height: 200px;
            }
        }

        .thumbnail {
            display: flex;
            gap: 10px;
            cursor: pointer;
            justify-content: center;
            margin-top: 10px;
        }

        .thumbnail img {
            width: 150px;
            height: 100px;
            object-fit: cover;
        }

        .thumbnail img.active {
            border: 2px solid var(--bs-primary);
        }

        .thumbnail .col-lg-3 {
            flex: 1;
            max-width: 25%;
        }

        .thumbnail .image-areas img {
            width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            .thumbnail {
                display: none;
            }
        }

        .button-isal {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #3b5998;
            color: white;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }

        .button-isal .btn {
            background-color: transparent;
            border: none;
            color: inherit;
            font-size: inherit;
            width: 100%;
            height: 100%;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php $this->load->view('frontend/template/canvas') ?>
    <header id="back-header" class="back-header">
        <?php $this->load->view('frontend/template/toolbar') ?>
        <?php $this->load->view('frontend/template/mobile') ?>

    </header>
    <div class="back-wrapper">
        <div class="back-home2-slider-area back-home3-slider-area">
            <div class="container">
                <br>
                <ul class="back-hero-bottom-two back-hero-slider3 owl-carousel">

                    <?php foreach ($headline as $head): ?>
                        <li>
                            <div class="image-areas">
                                <a
                                    href="<?= base_url('detail/' . url_title($head['tgl_berita'], 'dash', TRUE) . '/' . url_title($head['sub_judul'], 'dash', TRUE)) ?>"><img
                                        src="<?= base_url('img/berita/' . $head['gambar']); ?>" alt="image"
                                        style="width: 100px !important; height: 70px !important; object-fit: cover !important;"></a>
                            </div>
                            <div class="back-btm-content">
                                <h3><a
                                        href="<?= base_url('detail/' . url_title($head['tgl_berita'], 'dash', TRUE) . '/' . url_title($head['sub_judul'], 'dash', TRUE)) ?>"><?= $head['judul'] ?></a>
                                </h3>
                            </div>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="back-hero-area back-latest-posts back-whats-posts back-hero-area2 back-hero-area3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="back-hero-area back-latest-posts pt-0 pb-0">
                            <ul>
                                <li>
                                    <div class="main-image">
                                        <div class="image-area">
                                            <img src="<?= base_url('img/berita/' . $empat[0]['gambar']); ?>"
                                                style="width: 100% !important; height: 500px !important;  object-fit: cover !important;"
                                                alt="Main Image" id="mainImage">
                                            <div class="back-btm-content">

                                                <a href="<?= $empat[0]['url'] ?>" class="back-cate back-sp"
                                                    id="mainCategory"><?= $empat[0]['nm_kategori_master'] ?></a>
                                                <h3><a href="<?= base_url('detail/' . url_title($empat[0]['tgl_berita'], 'dash', TRUE) . '/' . url_title($empat[0]['sub_judul'], 'dash', TRUE)) ?>"
                                                        id="mainTitle"><?= $empat[0]['judul'] ?></a></h3>
                                                <ul>
                                                    <li class="back-author"><a href="#" id="mainAuthor">By
                                                            <?= $empat[0]['nama'] ?></a></li>
                                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-clock">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polyline points="12 6 12 12 16 14"></polyline>
                                                            </svg></span><span
                                                            id="mainDate1"><?= tanggal_indo($empat[0]['tgl_berita']) ?></span>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="back-trending-stories back-trending-stories-home2 back-trending-stories-home3">
                            <ul class="row">
                                <div class="thumbnail">
                                    <?php foreach ($empat as $index => $thumbnail): ?>
                                        <li class="col-lg-3">
                                            <div class="image-areas">
                                                <a><img src="<?= base_url('img/berita/' . $thumbnail['gambar']); ?>"
                                                        style="width: 200px !important; height: 110px !important;  object-fit: cover !important;"
                                                        alt="Thumbnail <?= $index; ?>"
                                                        data-large="<?= base_url('img/berita/' . $thumbnail['gambar']); ?>"
                                                        data-judul="<?= $thumbnail['judul']; ?>"
                                                        data-tgl_berita="<?= tanggal_indo($thumbnail['tgl_berita']); ?>"
                                                        data-kategori="<?= $thumbnail['nm_kategori_master']; ?>"
                                                        data-kategori_url="<?= $thumbnail['url']; ?>"
                                                        data-author="<?= $thumbnail['nama']; ?>"
                                                        data-url="<?= base_url('detail/' . url_title($thumbnail['tgl_berita'], 'dash', TRUE) . '/' . url_title($thumbnail['sub_judul'], 'dash', TRUE)) ?>">
                                                </a>
                                            </div>
                                            <div class="back-btm-content">
                                                <h3><a
                                                        href="<?= base_url('detail/' . url_title($thumbnail['tgl_berita'], 'dash', TRUE) . '/' . url_title($thumbnail['sub_judul'], 'dash', TRUE)) ?>"><?= $thumbnail['judul']; ?></a>
                                                </h3>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </div>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 pl-40">
                        <ul class="back-hero-bottom back-hero-bottom2 back-hero-rights back-hero-bottom-home3">
                            <li>
                                <div class="image-areas">
                                    <a
                                        href="<?= base_url('detail/' . url_title($nasional['tgl_berita'], 'dash', TRUE) . '/' . url_title($nasional['sub_judul'], 'dash', TRUE)) ?>"><img
                                            src="<?= base_url('img/berita/' . $nasional['gambar']); ?>"
                                            style="width: 200px !important; height: 100px !important; object-fit: cover !important;"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="<?= $nasional['url'] ?>" class="back-cates"
                                        style="color: #ff1100 !important"><strong><?= $nasional['nm_kategori_master'] ?></strong></a>
                                    <h3><a
                                            href="<?= base_url('detail/' . url_title($nasional['tgl_berita'], 'dash', TRUE) . '/' . url_title($nasional['sub_judul'], 'dash', TRUE)) ?>"><?= $nasional['judul'] ?></a>
                                    </h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><a href="#">By <?= $nasional['nama'] ?></a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a
                                        href="<?= base_url('detail/' . url_title($politik['tgl_berita'], 'dash', TRUE) . '/' . url_title($politik['sub_judul'], 'dash', TRUE)) ?>"><img
                                            src="<?= base_url('img/berita/' . $politik['gambar']); ?>"
                                            style="width: 200px !important; height: 100px !important; object-fit: cover !important;"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="<?= $politik['url'] ?>" class="back-cates"
                                        style="color: #ff1100 !important"><strong><?= $politik['nm_kategori_master'] ?></strong></a>
                                    <h3><a
                                            href="<?= base_url('detail/' . url_title($politik['tgl_berita'], 'dash', TRUE) . '/' . url_title($politik['sub_judul'], 'dash', TRUE)) ?>"><?= $politik['judul'] ?></a>
                                    </h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><a href="#">By <?= $politik['nama'] ?></a></li>
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a
                                        href="<?= base_url('detail/' . url_title($pemerintahan['tgl_berita'], 'dash', TRUE) . '/' . url_title($pemerintahan['sub_judul'], 'dash', TRUE)) ?>"><img
                                            src="<?= base_url('img/berita/' . $pemerintahan['gambar']); ?>"
                                            style="width: 200px !important; height: 100px !important; object-fit: cover !important;"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="<?= $pemerintahan['url'] ?>" class="back-cates"
                                        style="color: #ff1100 !important"><strong><?= $pemerintahan['nm_kategori_master'] ?></strong></a>
                                    <h3><a
                                            href="<?= base_url('detail/' . url_title($pemerintahan['tgl_berita'], 'dash', TRUE) . '/' . url_title($pemerintahan['sub_judul'], 'dash', TRUE)) ?>"><?= $pemerintahan['judul'] ?></a>
                                    </h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><a href="#">By <?= $pemerintahan['nama'] ?></a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a
                                        href="<?= base_url('detail/' . url_title($hukum['tgl_berita'], 'dash', TRUE) . '/' . url_title($hukum['sub_judul'], 'dash', TRUE)) ?>"><img
                                            src="<?= base_url('img/berita/' . $hukum['gambar']); ?>"
                                            style="width: 200px !important; height: 100px !important; object-fit: cover !important;"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="<?= $hukum['url'] ?>" class="back-cates"
                                        style="color: #ff1100 !important"><strong><?= $hukum['nm_kategori_master'] ?></strong></a>
                                    <h3><a
                                            href="<?= base_url('detail/' . url_title($hukum['tgl_berita'], 'dash', TRUE) . '/' . url_title($hukum['sub_judul'], 'dash', TRUE)) ?>"><?= $hukum['judul'] ?></a>
                                    </h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><a href="#">By <?= $hukum['nama'] ?></a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a
                                        href="<?= base_url('detail/' . url_title($religi['tgl_berita'], 'dash', TRUE) . '/' . url_title($religi['sub_judul'], 'dash', TRUE)) ?>"><img
                                            src="<?= base_url('img/berita/' . $religi['gambar']); ?>"
                                            style="width: 200px !important; height: 100px !important; object-fit: cover !important;"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="<?= $religi['url'] ?>" class="back-cates"
                                        style="color: #ff1100 !important"><strong><?= $religi['nm_kategori_master'] ?></strong></a>
                                    <h3><a
                                            href="<?= base_url('detail/' . url_title($religi['tgl_berita'], 'dash', TRUE) . '/' . url_title($religi['sub_judul'], 'dash', TRUE)) ?>"><?= $religi['judul'] ?></a>
                                    </h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><a href="#">By <?= $religi['nama'] ?></a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                            <li>
                                <div class="image-areas">
                                    <a
                                        href="<?= base_url('detail/' . url_title($olahraga['tgl_berita'], 'dash', TRUE) . '/' . url_title($olahraga['sub_judul'], 'dash', TRUE)) ?>"><img
                                            src="<?= base_url('img/berita/' . $olahraga['gambar']); ?>"
                                            style="width: 200px !important; height: 100px !important; object-fit: cover !important;"
                                            alt="image"></a>
                                </div>
                                <div class="back-btm-content">
                                    <a href="<?= $olahraga['url'] ?>" class="back-cates"
                                        style="color: #ff1100 !important"><strong><?= $olahraga['nm_kategori_master'] ?></strong></a>
                                    <h3><a
                                            href="<?= base_url('detail/' . url_title($olahraga['tgl_berita'], 'dash', TRUE) . '/' . url_title($olahraga['sub_judul'], 'dash', TRUE)) ?>"><?= $olahraga['judul'] ?></a>
                                    </h3>
                                    <ul class="back-meta">
                                        <li class="back-author"><a href="#">By <?= $olahraga['nama'] ?></a>
                                        </li>
                                    </ul>

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="back-hero-area back-latest-posts back-whats-posts back-feature-posts back-feature-posts-latest back-live-news">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-lg-8 pl-30">
                        <div class="back-title back-small-title pt-30">
                            <h2>Berita Terkini</h2>
                        </div>
                        <ul class="back-hero-bottom back-hero-bottom3">
                            <?php foreach ($terbaru as $baru): ?>
                                <li>
                                    <div class="image-areas">
                                        <a
                                            href="<?= base_url('detail/' . url_title($baru['tgl_berita'], 'dash', TRUE) . '/' . url_title($baru['sub_judul'], 'dash', TRUE)) ?>">
                                            <img style="object-fit: cover; border-radius: 8px; max-width: 100%; height: auto;"
                                                src="<?= base_url('img/berita/' . $baru['gambar']); ?>" alt="image">
                                        </a>
                                    </div>
                                    <div class="back-btm-content">
                                        <a href="<?= base_url($baru['url']) ?>" class="back-cates"
                                            style="color: #f2db0a !important"><?= $baru['nm_kategori_master'] ?></a>
                                        <h3><a
                                                href="
                                            <?= base_url('detail/' . url_title($baru['tgl_berita'], 'dash', TRUE) . '/' . url_title($baru['sub_judul'], 'dash', TRUE)) ?>"><?= $baru['judul'] ?></a>
                                        </h3>

                                        <ul class="back-meta">
                                            <li class="back-author" style="color: #dae2eb !important">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-user-fill">
                                                        <path
                                                            d="M20.24 24s-1.5-2.42-4.24-3.66C14 19.34 12 20 12 20s-2-.66-3.99-1.66C5.26 21.58 3.76 24 3.76 24z" />
                                                        <circle cx="12" cy="10" r="3" />
                                                    </svg>
                                                </span>
                                                <span>
                                                    <a href="#" style="color: #dae2eb !important">By
                                                        <?= $baru['nama'] ?></a>
                                                </span>
                                            </li>
                                            <li class="back-date" style="color: #dae2eb !important">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg>
                                                </span>
                                                <span><?= tanggal_indo($baru['tgl_berita']) ?></span>
                                            </li>

                                        </ul>

                                    </div>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="text-center mt-4">
                            <a href="<?= base_url('berita/index-berita') ?>"
                                style="background-color: #3b5998; color: #fff; border-radius: 8px; padding: 10px 20px; font-size: 16px;">Lihat
                                Semua</a>
                        </div>
                    </div>
                    <div class=" col-lg-4 pl-30">
                        <div class="back-title back-small-title pt-30">
                            <h2>Terpopuler</h2>
                        </div>
                        <ul class="back-hero-bottom back-hero-bottom3">
                            <?php
                            $no = 1;
                            foreach ($populer as $pop): ?>

                                <li>
                                    <div class="button-isal">
                                        <button class="btn btn-primary"><?= $no++ ?></button>
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
            </div>
        </div>

        <!-- <div class="back-trading-video back-trading-video2">
            <div class="container">
                <div class="back-title">
                    <h2>Trading Video</h2>
                </div>
                <ul class="row">
                    <li class="col-lg-4">
                        <div class="image-area">
                            <a href="#"><img src="<?= base_url('template/frontend/assets/') ?>assets/images/video/9.jpg"
                                    alt="image"></a>
                            <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="popup-videos back-video"><i
                                    class="fa-solid fa-play"></i></a>
                            <div class="back-btm-content">
                                <h3><a href="#">Mobile new carrier identity less orbit fbombs more 5G network</a></h3>
                                <ul>
                                    <li class="back-author"><span><img
                                                src="<?= base_url('template/frontend/assets/') ?>assets/images/author/1.jpg"
                                                alt="image"></span><a href="#">by Jon Deo</a></li>
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></span>March 26, 2022</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4">
                        <div class="image-area">
                            <a href="#"><img src="<?= base_url('template/frontend/assets/') ?>assets/images/video/7.jpg"
                                    alt="image"></a>
                            <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="popup-videos back-video"><i
                                    class="fa-solid fa-play"></i></a>
                            <div class="back-btm-content">
                                <h3><a href="#">Voluptates penatibus aspernatur lectus less orbit fbombs grav</a></h3>
                                <ul>
                                    <li class="back-author"><span><img
                                                src="<?= base_url('template/frontend/assets/') ?>assets/images/author/1.jpg"
                                                alt="image"></span><a href="#">by Jon Deo</a></li>
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></span>March 26, 2022</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4">
                        <div class="image-area">
                            <a href="#"><img src="<?= base_url('template/frontend/assets/') ?>assets/images/video/8.jpg"
                                    alt="image"></a>
                            <a href="https://www.youtube.com/watch?v=e5Hc2B50Z7c" class="popup-videos back-video"><i
                                    class="fa-solid fa-play"></i></a>
                            <div class="back-btm-content">
                                <h3><a href="#">Bernie nonummy incididunt duisto perspic iatis eum litora</a></h3>
                                <ul>
                                    <li class="back-author"><span><img
                                                src="<?= base_url('template/frontend/assets/') ?>assets/images/author/1.jpg"
                                                alt="image"></span><a href="#">by Jon Deo</a></li>
                                    <li class="back-date"><span><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-clock">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <polyline points="12 6 12 12 16 14"></polyline>
                                            </svg></span>March 26, 2022</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> -->

        <div class="footer-divider"></div>
    </div>
    <footer id="back-footer" class="back-footer">
        <?php $this->load->view('frontend/template/footer') ?>
    </footer>

    <div id="backscrollUp">
        <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
    </div>
    <?php $this->load->view('frontend/template/js') ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.getElementsByClassName('thumbnail')[0].getElementsByTagName('img');
            const mainImage = document.getElementById('mainImage');
            const mainTitle = document.getElementById('mainTitle');
            const mainCategory = document.getElementById('mainCategory');
            const mainDatee = document.getElementById('mainDate1');
            const mainAuthor = document.getElementById('mainAuthor');
            let currentThumbnailIndex = 0;
            let timer;

            function selectThumbnail(index) {
                Array.from(thumbnails).forEach(img => img.classList.remove('active'));
                thumbnails[index].classList.add('active');
                mainImage.src = thumbnails[index].dataset.large;
                mainTitle.href = thumbnails[index].dataset.url;
                mainTitle.textContent = thumbnails[index].dataset.judul;
                mainCategory.href = thumbnails[index].dataset.kategori_url;
                mainCategory.textContent = thumbnails[index].dataset.kategori;
                mainDatee.textContent = thumbnails[index].dataset.tgl_berita;
                mainAuthor.textContent = `By ${thumbnails[index].dataset.author}`;
            }

            function autoSelectThumbnail() {
                currentThumbnailIndex = (currentThumbnailIndex + 1) % thumbnails.length;
                selectThumbnail(currentThumbnailIndex);
                resetTimer();
            }

            function resetTimer() {
                clearTimeout(timer);
                timer = setTimeout(autoSelectThumbnail, 5000);
            }
            selectThumbnail(currentThumbnailIndex);
            resetTimer();
            Array.from(thumbnails).forEach((thumbnail, index) => {
                thumbnail.addEventListener('click', function() {
                    currentThumbnailIndex = index;
                    selectThumbnail(currentThumbnailIndex);
                    resetTimer();
                });
            });
        });
    </script>
    <script>
        function adjustTitleWidth() {
            document.querySelectorAll('.back-hero-bottom3 .back-btm-content h3').forEach(function(title) {
                if (window.innerWidth <= 490) {
                    title.style.maxWidth = 'auto';
                    title.style.overflow = 'hidden';
                    title.style.textOverflow = 'ellipsis';
                    title.style.whiteSpace = 'nowrap';
                } else {
                    title.style.maxWidth = '';
                    title.style.overflow = '';
                    title.style.textOverflow = '';
                    title.style.whiteSpace = '';
                }
            });

            document.querySelectorAll('.back-hero-bottom3 .back-btm-content  .back-cates').forEach(function(url) {
                if (window.innerWidth <= 490) {
                    url.style.fontSize = '8px';
                } else {
                    url.style.fontSize = '11px';
                }
            });
            document.querySelectorAll('.back-hero-bottom3 .back-btm-content  .back-meta .back-author').forEach(function(
                isal) {
                if (window.innerWidth <= 490) {
                    isal.style.fontSize = '7px';
                } else {
                    isal.style.fontSize = '10px';
                }
            });
            document.querySelectorAll('.back-hero-bottom3 .back-btm-content  .back-meta .back-date').forEach(function(
                isal2) {
                if (window.innerWidth <= 490) {
                    isal2.style.fontSize = '7px';
                } else {
                    isal2.style.fontSize = '10px';
                }
            });
        }

        window.addEventListener('resize', adjustTitleWidth);
        window.addEventListener('DOMContentLoaded', adjustTitleWidth);
    </script>
</body>

</html>