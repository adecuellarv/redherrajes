<?php
get_header();
wp_reset_query();
global $post;
$thumbID = get_post_thumbnail_id($post->ID);
$imgDestacada = wp_get_attachment_url($thumbID);
$titulo = get_the_title();
$slug = basename(get_permalink($postId));
$post_content = get_post($postId);
$content = $post_content->post_content;
?>
<!-- main-area -->
<main>

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" style="background: linear-gradient(to right, rgb(49 48 49), rgb(44 44 44 / 59%)) 100% 100% / cover no-repeat, url(<?php echo $imgDestacada; ?>); background-position: 100% 100%; background-repeat: no-repeat; background-size:cover;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2><?php echo $titulo; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- blog-area -->
    <section class="blog-area pt-100 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="section-title text-center text-md-left title-style-three mb-40">
                        <h2 class="title">Acerca de nosotros</h2>
                    </div>
                    <div class="blog-post-item blog-post-style2 mb-50">
                        <?php echo $content; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

    <!-- exclusive-services -->
    <section class="exclusive-services pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title text-center title-style-three mb-60">
                        <span class="sub-title">our services</span>
                        <h2 class="title">Exclusive Services</h2>
                    </div>
                </div>
            </div>
            <div class="row no-gutters justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-customer-support"></i>
                            <h5>24/7 Support</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item yellow text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-debit-card"></i>
                            <h5>Money Guarantee</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-recycle-sign"></i>
                            <h5>Product Comparison</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item orange text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-warehouse"></i>
                            <h5>Store Warehouse</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item yellow text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-truck"></i>
                            <h5>On Time Delivery</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-box"></i>
                            <h5>User Friendly Services</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item orange text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-data"></i>
                            <h5>Clean And Modern</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                    <div class="ex-services-item text-center">
                        <div class="overlay-bg" data-background="img/images/ex_services_img.jpg"></div>
                        <div class="content">
                            <i class="flaticon-balance"></i>
                            <h5>100 Quality Products</h5>
                            <p>Lorem ipsum is placeholder commonly used in the graphic, print, and publishing industries for previewing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- exclusive-services-end -->

</main>
<!-- main-area-end -->
<?php get_footer(); ?>