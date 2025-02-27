<div class="menu-part header-style2">
    <div class="container">
        <div class="back-main-menu">
            <nav>
                <div class="menu-toggle">
                    <div class="logo"><a href="<?= base_url('') ?>" class="logo-text"> <img class="back-logo-dark"
                                src="<?= base_url('template/frontend/assets/') ?>assets/images/logo.png" alt="logo">
                            <img class="back-logo-light"
                                src="<?= base_url('template/frontend/assets/') ?>assets/images/light-logo.png"
                                alt="logo"> </a></div>

                    <div class="searchbar-part back-search-mobile">
                        <ul>
                            <li class="back-dark-light"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-moon back-go-dark1">
                                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                </svg>
                            </li>
                            <li class="back_search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </li>
                            <!-- <li class="back-sign"><a href="login.html">Sign In</a></li> -->
                            <li id="nav-expanders" class="nav-expander bar">
                                <span class="back-hum1"></span>
                                <span class="back-hum2"></span>
                                <span class="back-hum3"></span>
                            </li>
                        </ul>
                        <form class="search-form" method="GET" action="<?= base_url('berita/cari') ?>" id="search-form">
                            <input type="text" name="keyword" class="form-input" placeholder="Cari aja!" id="keyword">
                            <button type="submit" class="form-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
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