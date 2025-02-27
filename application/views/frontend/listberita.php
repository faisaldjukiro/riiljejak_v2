<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('frontend/template/head') ?>
    <style>
    .footer-divider {
        border-top: 4px solid #037cd4;
    }

    .text-isal {
        color: #037cd4;
    }

    .isal-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .left-column {
        flex: 3;
        display: flex;
        flex-direction: column;
    }

    .right-column {
        flex: 1;
        margin-left: 20px;
    }

    .isal-item {
        display: flex;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
    }

    .image-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        object-fit: cover;
    }

    .image-wrapper img {
        max-width: 200px;
        height: auto;
        border-radius: 5px;
    }

    .back-btm-content {
        margin-left: 15px;
    }

    .viral-label .back-cates {
        color: red;
        font-weight: bold;
    }

    .date {
        display: block;
        font-size: 12px;
        color: #888;
        margin-bottom: 5px;
    }

    h3 a {
        font-size: 18px;
        margin: 10px 0;
        color: #000000;
    }

    .back-dark h3 a {
        font-size: 18px;
        margin: 10px 0;
        color: #ffffff;
    }

    .popular-card {
        background: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .back-dark .popular-card {
        background: #152b59;
        border: 1px solid #000;
        border-radius: 5px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .popular-card h4 {
        margin-top: 0;
        text-align: center;
        font-weight: bold;
    }

    .popular-list {
        counter-reset: list-counter;
        padding-left: 20px;
    }

    .popular-list li {
        counter-increment: list-counter;
        margin-bottom: 10px;
        list-style: none;
        position: relative;
        padding-left: 25px;
    }

    .popular-list li::before {
        content: counter(list-counter);
        position: absolute;
        left: 0;
        top: 0;
        font-size: 20px;
        color: #007bff;
    }

    .back-dark .popular-list li::before {
        content: counter(list-counter);
        position: absolute;
        left: 0;
        top: 0;
        font-size: 20px;
        color: #ff003c;
    }

    .popular-list li a {
        text-decoration: none;
        color: #000;
    }

    .back-dark .popular-list li a {
        text-decoration: none;
        color: #ffffff;
    }

    .popular-list li a:hover {
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .isal-container {
            flex-direction: column;
        }

        .right-column {
            margin-left: 0;
            margin-top: 20px;
        }

        .date {
            font-size: 10px;
            margin-bottom: 2px;
        }

        h3 a {
            font-size: 14px;
            margin: 5px 0;
        }

        .back-dark h3 a {
            font-size: 14px;
            margin: 5px 0;
        }

        .viral-label .back-cates {
            font-size: 12px;
        }

        .back-btm-content {
            margin-left: 10px;
        }

        .isal-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .image-wrapper img {
            max-width: 90%;
            height: auto;
            margin-bottom: 10px;
        }
    }
    </style>
</head>

<body>
    <?php $this->load->view('frontend/template/canvas') ?>
    <header id="back-header" class="back-header">
        <?php $this->load->view('frontend/template/toolbar') ?>
        <div class="menu-part header-style2">
            <div class="container">
                <div class="back-main-menu">
                    <nav>
                        <div class="menu-toggle">
                            <div class="logo"><a href="<?= base_url('') ?>" class="logo-text"> <img
                                        class="back-logo-dark"
                                        src="<?= base_url('template/frontend/assets/') ?>assets/images/logo.png"
                                        alt="logo"> <img class="back-logo-light"
                                        src="<?= base_url('template/frontend/assets/') ?>assets/images/light-logo.png"
                                        alt="logo"> </a></div>

                            <div class="searchbar-part back-search-mobile">
                                <ul>
                                    <li class="back-dark-light"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-sun back-go-light1">
                                            <circle cx="12" cy="12" r="5"></circle>
                                            <line x1="12" y1="1" x2="12" y2="3"></line>
                                            <line x1="12" y1="21" x2="12" y2="23"></line>
                                            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                            <line x1="1" y1="12" x2="3" y2="12"></line>
                                            <line x1="21" y1="12" x2="23" y2="12"></line>
                                            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-moon back-go-dark1">
                                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                        </svg>
                                    </li>
                                    <li class="back_search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </li>
                                    <li id="nav-expanders" class="nav-expander bar">
                                        <span class="back-hum1"></span>
                                        <span class="back-hum2"></span>
                                        <span class="back-hum3"></span>
                                    </li>
                                </ul>
                                <form class="search-form" method="GET" action="<?= base_url('berita/cari') ?>"
                                    id="search-form">
                                    <input type="text" name="keyword" class="form-input" placeholder="Cari aja!"
                                        id="keyword">
                                    <button type="submit" class="form-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-search">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </button>
                                </form>
                            </div>

                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <?php $this->load->view('frontend/template/menu') ?>
                    </nav>
                </div>

            </div>
        </div>
    </header>

    <div class="back-wrapper">
        <!-- <div class="back-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <div class="breadcrumbs-inner">
                    <div class="container text-center">
                        <img src="<?= base_url('img/berita/') ?>benner_bolmut.png" alt="">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="back-category-style-grid pb-70 ">
            <div class="container">
                <br>
                <div class="footer-divider pt-2"></div>
                <i class="fa-solid fa-ruler-vertical text-isal me-2"></i><span
                    class="text-isal"><strong><?= $title ?></strong></span>
                <br>
                <br>
                <div class="row">
                    <div class="isal-container">
                        <div class="left-column">
                            <?php foreach ($berita as $item): ?>
                            <div class="col-lg-12 isal-item">
                                <div class="image-wrapper">
                                    <a
                                        href="<?= base_url('detail/' . url_title($item['tgl_berita'], 'dash', TRUE) . '/' . url_title($item['sub_judul'], 'dash', TRUE)) ?>">
                                        <img style="width: 1024px !important; height: 200px !important; object-fit: cover !important;"
                                            src="
                                            <?= base_url('img/berita/' . $item['gambar']); ?>" alt="image">
                                    </a>
                                </div>
                                <div class="back-btm-content">
                                    <span class="viral-label"><a href="<?= base_url($item['url']) ?>"
                                            class="back-cates"><?= $item['nm_kategori_master'] ?></a></span>
                                    <span class="date"><?= tanggal_indo($item['tgl_berita'], $item['jam']); ?></span>
                                    <h3>
                                        <a
                                            href="<?= base_url('detail/' . url_title($item['tgl_berita'], 'dash', TRUE) . '/' . url_title($item['sub_judul'], 'dash', TRUE)) ?>"><?= $item['judul'] ?></a>
                                    </h3>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="right-column">
                            <div class="popular-card">
                                <h4><strong>Terpopuler</strong></h4>
                                <ol class="popular-list">
                                    <?php foreach ($populer as $pop): ?>
                                    <li><a
                                            href="<?= base_url('detail/' . url_title($pop['tgl_berita'], 'dash', TRUE) . '/' . url_title($pop['sub_judul'], 'dash', TRUE)) ?>"><?= $pop['judul'] ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- <ul class="back-pagination mt-30">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="back-next"><a href="#">Next<i class="arrow_carrot-right"></i></a></li>
                </ul> -->
            </div>
        </div>
    </div>
    <footer id="back-footer" class="back-footer">
        <?php $this->load->view('frontend/template/footer') ?>
    </footer>

    <div id="backscrollUp">
        <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
    </div>
    <?php $this->load->view('frontend/template/js') ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        if (window.innerWidth <= 768) {
            var items = document.querySelectorAll('.news-item');
            for (var i = 2; i < items.length; i++) {
                items[i].style.display = 'none';
            }
        }
    });
    </script>

</body>

</html>