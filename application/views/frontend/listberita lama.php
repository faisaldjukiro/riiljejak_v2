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

    .image-wrapper {
        width: 100%;
        height: 300px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        background-color: #f0f0f0;
    }


    .isal-item {
        border: none;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: #fff;
        margin-bottom: 16px;
        min-height: 450px;
        flex: 1 1 calc(33.333% - 16px);
    }



    .back-dark .isal-item {
        background-color: #0c0d0d;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: #ccc;
    }



    @media (max-width: 768px) {
        .isal-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
            flex: 1 1 100%;
            min-height: auto;
        }
    }

    .isal-container {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
    }

    .col-lg-4 {
        flex: 1 1 calc(33.333% - 16px);
        box-sizing: border-box;
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
                            <div class="logo"><a href="index.html" class="logo-text"> <img class="back-logo-dark"
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
                                <form class="search-form">
                                    <input type="text" class="form-input" placeholder="Cari Di Sini">
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
        <div class="back-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <div class="breadcrumbs-inner">
                    <div class="container text-center">
                        <img src="<?= base_url('img/berita/') ?>benner_bolmut.png" alt="">
                    </div>
                </div>
            </div>
        </div>
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
                        <?php foreach ($berita as $item): ?>
                        <div class="col-lg-4 isal-item">
                            <div class="image-wrapper">
                                <a
                                    href="<?= base_url('detail/' . url_title($item['tgl_berita'], 'dash', TRUE) . '/' . url_title($item['sub_judul'], 'dash', TRUE)) ?>"><img
                                        src="<?= base_url('img/berita/' . $item['gambar']); ?>" alt="image"></a>
                            </div>
                            <div class="back-btm-content">
                                <a href="<?= base_url($title) ?>" class="back-cates"><?= $title ?></a>
                                <h3>
                                    <a
                                        href="<?= base_url('detail/' . url_title($item['tgl_berita'], 'dash', TRUE) . '/' . url_title($item['sub_judul'], 'dash', TRUE)) ?>"><?= $item['judul'] ?></a>
                                </h3>
                                <ul>
                                    <li class="back-author">BY&nbsp;<a href="#"><?= $item['nama'] ?></a></li>
                                    <li class="back-date">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-calendar">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                        </span>
                                        <?= tanggal_indo($item['tgl_berita']); ?>
                                    </li>
                                </ul>
                                <p><?= $item['isi_berita'] ?></p>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <ul class="back-pagination mt-30">
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="back-next"><a href="#">Next<i class="arrow_carrot-right"></i></a></li>
                </ul>
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