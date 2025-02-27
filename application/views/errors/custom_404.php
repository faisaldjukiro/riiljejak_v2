<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--================= Meta tag =================-->
    <meta charset="utf-8">
    <title>404</title>
    <meta name="description" content="">
    <!--================= Responsive Tag =================-->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--================= Favicon =================-->
    <link rel="apple-touch-icon" href="<?= base_url('template/frontend/assets/') ?>assets/images/fav.png">
    <link rel="shortcut icon" type="image/x-icon"
        href="<?= base_url('template/frontend/assets/') ?>assets/images/fav.png">
    <!--================= Bootstrap V5 css =================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('template/frontend/assets/') ?>assets/css/bootstrap.min.css">
    <!--================= Fontawesome  css =================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/frontend/assets/') ?>assets/css/all.min.css">
    <!--================= Rounded  css =================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/frontend/assets/') ?>assets/css/rounded.css">
    <!--================= Back Menus css =================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/frontend/assets/') ?>assets/css/back-menus.css">
    <!--================= Animate css =================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/frontend/assets/') ?>assets/css/animate.css">
    <!--================= Owl Carousel css =================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('template/frontend/assets/') ?>assets/css/owl.carousel.css">
    <!--================= Magnific Popup css =================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('template/frontend/assets/') ?>assets/css/magnific-popup.css">
    <!--================= Style css =================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/frontend/assets/') ?>style.css">
    <!--================= Spacing css =================-->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('template/frontend/assets/') ?>assets/css/back-spacing.css">
    <!--================= Responsive css =================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('template/frontend/assets/') ?>assets/css/responsive.css">

    <style>
    .footer-divider {
        border-top: 4px solid #037cd4;
    }

    .text-isal {
        color: #037cd4;
    }

    .verified-container {
        background-color: #19274e;
        padding: 15px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .checkmark {
        width: 30px;
        height: 30px;
        margin-right: 10px;
    }

    .text-contentt {
        display: flex;
        flex-direction: column;
    }

    .titlee {
        font-weight: bold;
        margin: 0;
    }

    .verified-by,
    .certificate {
        margin: 0;

    }

    .certificate .number {
        font-weight: bold;
    }

    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 10px;
        padding: 20px;
        border-radius: 8px;
        max-width: 800px;
        margin: 0 auto;
    }

    .stat-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border-radius: 8px;
        text-align: center;
        color: white;
    }

    .stat-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        font-size: 0.8em;
    }

    .stat-icon {
        font-size: 1.2em;
        margin-right: 10px;
    }

    .stat-box .stat-value {
        font-size: 1em;
        font-weight: bold;
        margin-right: 5px;
    }

    .stat-box p {
        margin: 0;
        font-size: 0.8em;
    }

    @media (max-width: 576px) {
        .verified-container {
            background-color: #19274e;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .checkmark {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .text-contentt {
            display: flex;
            flex-direction: column;
        }

        .titlee {
            font-weight: bold;
            margin: 0;
        }

        .verified-by,
        .certificate {
            margin: 0;

        }

        .certificate .number {
            font-weight: bold;
        }
    }
    </style>
</head>

<body>
    <!--================= Back offcanvas Start Here =================-->
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
        <div class="back-error-page pt-50 pb-70">
            <div class="container text-center">
                <h1 class="text-isal">404</h1>
                <img src="<?= base_url('img/berita/') ?>404.png" alt="error" width="500px">
                <br>
                <br>
                <h3>Halaman tidak ditemukan!</h3>
                <a href="javascript:history.back()" class="back-btn">Kembali</a>
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
</body>

</html>