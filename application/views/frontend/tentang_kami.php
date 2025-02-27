<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('frontend/template/head') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <style>
    .footer-divider {
        border-top: 4px solid #037cd4;
    }

    .blog-image img {
        width: 1200px;
        height: 428px;
        object-fit: constain;
    }

    @media (max-width: 1200px) {
        .blog-image img {
            width: 100%;
            height: auto;
        }
    }


    .share-buttons {
        margin-top: 5px;
        /* Mengurangi jarak atas */
    }

    .share-buttons a {
        font-size: 20px;
        margin-right: 10px;
        text-decoration: none;
        color: #fff;
        width: 36px;
        height: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
    }

    .share-buttons a.facebook {
        background-color: #3b5998;
    }

    .share-buttons a.twitter {
        background-color: #1da1f2;
    }

    .share-buttons a.whatsapp {
        background-color: #25d366;
    }

    .share-buttons a.linkedin {
        background-color: #0077b5;
    }

    .share-buttons a.telegram {
        background-color: #0088cc;
    }

    .share-buttons a:hover {
        opacity: 0.8;
    }

    .button-isal {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: #0d6fd1;
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
    <!--================= Back offcanvas Start Here =================-->
    <?php $this->load->view('frontend/template/canvas') ?>


    <!--================= Header Section Start Here =================-->
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
    <!--================= Header Section End Here =================-->

    <!--================= Back Wrapper Start Here =================-->
    <div class="back-wrapper">
        <!--================= Back Breadcrumbs Section Start Here =================-->
        <div class="back-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <div class="breadcrumbs-inner">
                    <div class="container text-center">
                        <img src="<?= base_url('img/berita/') ?>benner_bolmut.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="back__blog__area back-blog-page back-blog-page-single pb-60">
            <div class="container">
                <br>
                <!-- <div class="footer-divider pt-2 pb-70"></div> -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-inner">
                            <div class="blog-content">
                                <div class="blog-image">

                                </div>
                                <?= $tentang['about'] ?>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('frontend/template/left') ?>
                </div>
            </div>
        </div>
        <!--================= Blog Section End Here =================-->

    </div>
    <!--================= Back Wrapper End Here =================-->

    <!--================= Footer Section Start Here =================-->
    <footer id="back-footer" class="back-footer">
        <?php $this->load->view('frontend/template/footer') ?>
    </footer>

    <div id="backscrollUp">
        <span aria-hidden="true" class="fi-rr-arrow-small-up"></span>
    </div>
    <?php $this->load->view('frontend/template/js') ?>
    <script>
    function current_url() {
        return window.location.href;
    }
    </script>
</body>

</html>