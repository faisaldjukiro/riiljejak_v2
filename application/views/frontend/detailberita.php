<!DOCTYPE html>
<html lang="zxx">

<head>
    <?php $this->load->view('frontend/template/head') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <meta property="og:title" content="<?= htmlspecialchars($berita_detail['judul'], ENT_QUOTES, 'UTF-8') ?>" />
    <meta property="og:image" content="<?= base_url('img/berita/' . $berita_detail['gambar']) ?>" />
    <meta property="og:url" content="<?= current_url() ?>" />
    <meta property="og:type" content="article" />

    <style>
    .footer-divider {
        border-top: 4px solid #037cd4;
    }

    .blog-image img {
        width: 1200px;
        height: auto;
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

    .custom-img {
        max-width: 100% !important;
        height: auto !important;
        display: block;
        margin: 0 auto;
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
        <!-- <div class="back-breadcrumbs">
            <div class="breadcrumbs-wrap">
                <div class="breadcrumbs-inner">
                    <div class="container text-center">
                        <img src="<?= base_url('img/berita/') ?>benner_bolmut.png" alt="" class="img-responsive">
                    </div>

                </div>
            </div>
        </div> -->

        <div class="back__blog__area back-blog-page back-blog-page-single pb-60">
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-inner">
                            <div class="blog-content">
                                <div class="blog-image">
                                    <div class="text-center pb-1">
                                        <h1 style="font-size: 25px;"> <strong><?= $berita_detail['judul'] ?></strong>
                                        </h1>
                                        <p style="font-size: 12px; margin-bottom: 5px;">
                                            <?= $berita_detail['nama'] . ' - ' . tanggal_indo($berita_detail['tgl_berita'], $berita_detail['jam']) . ' Dibaca '.$berita_detail['dibaca'].'X'; ?>
                                        </p>

                                        <div class="share-buttons pb-10">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()) ?>"
                                                target="_blank" title="Share on Facebook" class="facebook">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>

                                            <a href="https://api.whatsapp.com/send?text=<?= urlencode(current_url()) ?>"
                                                target="_blank" title="Share on WhatsApp" class="whatsapp">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()) ?>&text=<?= urlencode($berita_detail['judul']) ?>"
                                                target="_blank" title="Share on Twitter" class="twitter">
                                                <i class="fab fa-twitter"></i>
                                            </a>


                                        </div>

                                    </div>

                                    <img src="<?= base_url('img/berita/' . $berita_detail['gambar']); ?>"
                                        alt="Blog Image">

                                    <div class="text-center pt-1 ">
                                        <p style="font-size: 10px;"> <?= $berita_detail['keterangan_gambar'] ?></p>
                                    </div>
                                </div>


                                <?= $berita_detail['isi_berita'] ?>




                                <!-- <blockquote>Before Natalia’s village had a clean water tap, she often did have time for
                                    school. Now, she goes to school every day she presient of her local Water Committee.
                                    <em>Max Conversion</em>
                                </blockquote> -->

                                <div class="blog-tags">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="back-title back-small-title">
                                                <h2>Tags</h2>
                                            </div>
                                            <ul class="mata-tags">
                                                <?php
                                                $tags = explode(',', $berita_detail['tag']);
                                                foreach ($tags as $tag): ?>
                                                <li><a href="<?= base_url(trim($tag)) ?>"><?= trim($tag) ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>

                                    </div>
                                </div>

                                <div class="single-nav">
                                    <?php if (!empty($previous_news)): ?>
                                    <div class="back-prev">
                                        <a
                                            href="<?php echo site_url('detail/' . $previous_news['tgl_berita'] . '/' . urlencode($previous_news['sub_judul'])); ?>">
                                            <i class="fa-solid fa-arrow-right"></i> Sebelumnya
                                            <em><?php echo $previous_news['judul']; ?></em>
                                        </a>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($next_news)): ?>
                                    <div class="back-next">
                                        <a
                                            href="<?php echo site_url('detail/' . $next_news['tgl_berita'] . '/' . urlencode($next_news['sub_judul'])); ?>">
                                            Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                                            <em><?php echo $next_news['judul']; ?></em>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>


                                <div class="back-blog-related">
                                    <div class="container">
                                        <div class="back-title back-small-title">
                                            <h2>Berita Terkait</h2>
                                        </div>
                                        <ul id="back-blog-slider" class="owl-carousel owl-theme">
                                            <?php foreach ($related_news as $related): ?>
                                            <li class="item">
                                                <div class="back-inner">
                                                    <div class="back-blog-image">
                                                        <a
                                                            href="<?php echo site_url('detail/' . $related['tgl_berita'] . '/' . urlencode($related['sub_judul'])); ?>">
                                                            <img src="<?php echo base_url('img/berita/' . $related['gambar']); ?>"
                                                                style="height: 200px; object-fit: cover; border-radius: 8px;"
                                                                alt=" image">
                                                        </a>
                                                    </div>
                                                    <div class="back-blog-content">
                                                        <em
                                                            class="back-blog-date"><?= (tanggal_indo($related['tgl_berita'])); ?></em>
                                                        <a
                                                            href="<?php echo site_url('detail/' . $related['tgl_berita'] . '/' . urlencode($related['sub_judul'])); ?>">
                                                            <h3><?php echo $related['judul']; ?></h3>
                                                        </a>

                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>

                                    </div>
                                </div>
                                <!-- <div class="author-comment">
                                    <div class="back-title back-small-title">
                                        <h2>3 Comments</h2>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="image-comments"><img
                                                            src="<?= base_url('template/frontend/assets/') ?>assets/images/user/user2.jpg"
                                                            alt=""> </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <div class="dsc-comments">
                                                        <h6>Neal Adams</h6>
                                                        <span class="reply"> <span class="date">July 21, 2022 at 8:24
                                                                pm</span></span>
                                                        <p>Geeza show off show off pick your nose and blow off the BBC
                                                            lavatory a blinding shot cack spend a penny bugger all mate
                                                            brolly.</p>
                                                        <a href="#">Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="image-comments"><img
                                                            src="<?= base_url('template/frontend/assets/') ?>assets/images/user/user.jpg"
                                                            alt=""> </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <div class="dsc-comments">
                                                        <h6>Jim Séchen</h6>
                                                        <span class="reply"> <span class="date">July 21, 2022 at 10:44
                                                                pm</span></span>
                                                        <p>The little rotter my good sir faff about Charles bamboozled I
                                                            such a fibber tomfoolery at public school.</p>
                                                        <a href="#"> Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="image-comments"><img
                                                            src="<?= base_url('template/frontend/assets/') ?>assets/images/user/user3.jpg"
                                                            alt=""> </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <div class="dsc-comments">
                                                        <h6>Justin Case</h6>
                                                        <span class="reply"> <span class="date">July 21, 2022 at 17:44
                                                                pm</span></span>
                                                        <p>The little rotter my good sir faff about Charles bamboozled I
                                                            such a fibber tomfoolery at public school.</p>
                                                        <a href="#"> Reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="back-blog-form">
                                    <div id="blog-form" class="blog-form">
                                        <div class="back-title back-small-title">
                                            <h2>Leave a Reply</h2>
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="back-textarea">
                                                        <textarea placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="back-input">
                                                        <input type="text" name="name" placeholder="Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="back-input">
                                                        <input type="email" name="email" placeholder="Email">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="back-input">
                                                        <input type="text" name="website" placeholder="Website">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="back-check-box">
                                                        <input type="checkbox" id="box-1"> Save my name, email, and
                                                        website in this browser for the next time I comment.
                                                    </div>
                                                    <button type="submit" class="back-btn">Submit Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
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