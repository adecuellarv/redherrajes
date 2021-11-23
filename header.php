<!doctype html>
<html class="no-js" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" />
    <meta name="keywords" content="Puertas de aluminio, Piso vidrio" />
    <meta name="author" content="Monorama" />

    <link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/nice-select.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jarallax.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/default.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/responsive.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style-custom.css">
</head>

<body>

    <!-- preloader  -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
            </div>
            <div class="loader">
                <div class="row">
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-left">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                    <div class="col-3 loader-section section-right">
                        <div class="bg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-five header-style-eight">
        <div class="header-top-wrap">
            <div class="container custom-container-two">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-6">
                        <div class="header-top-link">
                            <ul>
                                <li><a href="<?php echo home_url(); ?>/somos">Somos</a></li>
                                <li><a href="<?php echo home_url(); ?>/ayuda">FAQS</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="header-top-right">
                            <ul>
                                <li><a href="tel:5579461813">5579461813 </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header menu-area">
            <div class="container custom-container-two">
                <div class="row">
                    <div class="col-12" style="padding: 0px;">
                        <div class="menu-mobile">
                            <div class="menumb-3">
                                <div class="menumb-2">
                                    <div class="menumb-1">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="<?php bloginfo('template_url'); ?>/img/logo/logo-rh-mb.png" alt="logo-mb" title="logo-mb" />
                                            </div>
                                            <div class="col-6">
                                                <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-wrap menu-desktop">
                            <nav class="menu-nav show">
                                <div class="col-12 container-menudivs">
                                    <div class="main-menu-desk">
                                        <div class="logo d-block d-lg-none">
                                            <a href="<?php echo home_url(); ?>"><img class="logo-header-sm" src="<?php bloginfo('template_url'); ?>/img/logo/logo-rh.png" alt="Logo"></a>
                                        </div>
                                        <div class="navbar-wrap main-menu d-none d-lg-flex">
                                            <ul class="navigation left">
                                                <li class="<?php if (is_page('home')) {
                                                                echo 'active';
                                                            } ?> menu-item-has-children has--mega--menu"><a href="<?php echo home_url(); ?>">Inicio</a></li>
                                                <li class="<?php if (is_page('lista-productos')) {
                                                                echo 'active';
                                                            } ?>"><a href="<?php echo home_url(); ?>/lista-productos">Productos</a>
                                                </li>
                                                <li class="<?php if (is_page('somos')) {
                                                                echo 'active';
                                                            } ?>"><a href="<?php echo home_url(); ?>/somos">Somos</a></li>
                                            </ul>
                                            <div class="logo">
                                                <a href="<?php echo home_url(); ?>"><img class="logo-header" src="<?php bloginfo('template_url'); ?>/img/logo/logo-rh.png" alt="Logo"></a>
                                            </div>
                                            <ul class="navigation right">
                                                <li class="menu-item-has-children <?php if (is_page('contacto')) {
                                                                                        echo 'active';
                                                                                    } ?>"><a href="<?php echo home_url(); ?>/contacto">Contacto y Ubicación</a>
                                                </li>
                                                <li class="<?php if (is_page('ayuda')) {
                                                                echo 'active';
                                                            } ?>"><a href="<?php echo home_url(); ?>/ayuda">Ayuda</a></li>
                                                <li class="header-search"><a href="#" data-toggle="modal" data-target="#search-modal"><i class="flaticon-search"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="menu-p1"></div>
                                    <div class="menu-p2"></div>
                                    <div class="menu-p3"> </div>

                                </div>


                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="flaticon-targeting-cross"></i></div>
                            <nav class="menu-box">
                                <div class="nav-logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo/logo-rh-mb.png" alt="logo" title="logo"></a>
                                </div>
                                <div class="menu-outer">
                                    <ul class="navigation">
                                        <li class="active"><a href="<?php echo home_url(); ?>">Inicio</a>
                                        </li>
                                        <li class=""><a href="<?php echo home_url(); ?>/lista-productos">Productos</a>
                                        </li>
                                        <li><a href="<?php echo home_url(); ?>/somos">Somos</a></li>
                                        <li class=""><a href="<?php echo home_url(); ?>/contacto">Contacto</a>
                                        </li>
                                        <li><a href="<?php echo home_url(); ?>/ayuda">Ayuda</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="<?php echo home_url(); ?>/lista-productos">
                        <input type="text" placeholder="Buscar..." name="search">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Search-end -->



    </header>
    <!-- header-area-end -->