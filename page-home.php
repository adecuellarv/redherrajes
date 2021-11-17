<?php
get_header();
wp_reset_query();
$slider = get_field('slider_home', $post->ID);
$somos = get_field('somos', $post->ID);
?>
<!-- main-area -->
<main>

    <!-- slider-area -->
    <section class="h9-slider-area">
        <div class="h9-slider-active">
            <?php foreach ($slider as &$item) { ?>
                <div class="h9-slider-item" style="background: linear-gradient(to right, rgba(191, 191, 191, 0.6), rgba(149, 149, 149, 0.6)) 100% 100% / cover no-repeat, url(<?php bloginfo('template_url'); ?>/img/slider/white-bg.jpeg); background-position: 100% 100%; background-repeat: no-repeat; background-size:cover;">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6">
                                <div class="h9-slider-img" data-animation-in="fadeInLeft" data-delay-in=".2" data-duration-in="1.5">
                                    <img src="<?php echo $item['elementos']['imagen']; ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="h7-slider-content">
                                    <span class="sub-title" data-animation-in="fadeInUp" data-delay-in=".4" data-duration-in="1.5"><?php echo $item['elementos']['tag']; ?></span>
                                    <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".6" data-duration-in="1.5"><?php echo $item['elementos']['titulo']; ?></h2>
                                    <p data-animation-in="fadeInUp" data-delay-in=".8" data-duration-in="1.5"><?php echo $item['elementos']['descripcion']; ?></p>
                                    <a href="<?php echo $item['elementos']['link']; ?>" class="btn" data-animation-in="fadeInUp" data-delay-in="1.2" data-duration-in="1.5">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <!-- slider-area-end -->

    <!-- choose-area -->
    <section class="h9-choose-area">
        <div class="h9-choose-img" data-background="<?php echo $somos['imagen']; ?>"></div>
        <div class="h9-choose-bg" data-background="<?php bloginfo('template_url'); ?>/img/bg/h9_choose_bg.jpg"></div>
        <div class="container">
            <div class="row justify-content-center justify-content-lg-end">
                <div class="col-lg-6 col-md-9">
                    <div class="h9-choose-content">
                        <div class="cat-section-title mb-40">
                            <span class="sub-title"><?php echo $somos['tag']; ?></span>
                            <h2 class="title"><?php echo $somos['titulo']; ?></h2>
                        </div>
                        <div class="h9-choose-list">
                            <p><?php echo $somos['descripcion']; ?></p>
                            <a 
                                data-animation-in="fadeInUp" 
                                data-delay-in="1.2" 
                                data-duration-in="1.5" 
                                class="btn"
                                href="<?php echo home_url(); ?>/somos"
                            >Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choose-area-end -->

    <!-- new-arrival-area -->
    <section class="new-arrival-area h9-arrival-product pt-95 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-45">
                        <h3 class="title">New Arrival Collection</h3>
                    </div>
                </div>
            </div>
            <div class="row new-arrival-active">
                <?php
                $serv_slid = new WP_Query('post_type=productos&meta_key=aparece_en_home&meta_value=1');
                if (have_posts()) : while ($serv_slid->have_posts()) : $serv_slid->the_post();
                        //$img_slider = get_field('img_slider',get_the_ID());
                        global $post;
                        $thumbID = get_post_thumbnail_id($post->ID);
                        $imgDestacada = wp_get_attachment_url($thumbID);
                        $titulo = get_the_title();
                        $slug = basename(get_permalink($postId));
                ?>
                        <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                            <div class="new-arrival-item text-center mb-50">
                                <div class="thumb mb-25">
                                    <a href="productos/<?php echo $slug; ?>" ><img src="<?php echo $imgDestacada; ?>" alt="<?php echo $titulo; ?>"></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                            <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="productos/<?php echo $slug; ?>" ><?php echo $titulo; ?></a></h5>
                                    <span class="price"></span>
                                    <a href="productos/<?php echo $slug; ?>" class="btn">
                                        Ver
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </section>
    <!-- new-arrival-area-end -->

    <!-- reservation-area -->
    <section class="reservation-area reservation-bg" data-background="<?php bloginfo('template_url'); ?>/img/bg/res_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="reservation-wrap text-center">
                        <div class="reservation-title">
                            <div class="icon"><img src="<?php bloginfo('template_url'); ?>/img/icon/res_icon.png" alt=""></div>
                            <h2 class="title">Reservation<span>!</span></h2>
                        </div>
                        <div class="reservation-contact">
                            <p>Reservation Form Powered by Adara Tables <span>+9 845 854 7458</span> – contact@info.com</p>
                        </div>
                        <div class="reservation-action">
                            <form action="#">
                                <div class="reservation-form-top">
                                    <div class="form-grp">
                                        <i class="far fa-calendar-alt"></i>
                                        <input type="text" class="date" placeholder="Select Date">
                                    </div>
                                    <div class="form-grp">
                                        <i class="far fa-clock"></i>
                                        <input type="text" value="6 : 30 PM" placeholder="Select Time">
                                    </div>
                                    <div class="form-grp">
                                        <i class="far fa-user"></i>
                                        <input type="text" value="1 Person" placeholder="Select Person">
                                    </div>
                                </div>
                                <button class="btn">shop now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- reservation-area-end -->

    <!-- blog-area -->
    <section class="blog-area pt-95 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-50">
                        <h3 class="title">latest news update</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div class="blog-post-item blog-post-style3 mb-30">
                        <div class="blog-post-thumb">
                            <a href="blog-details.html"><img src="<?php bloginfo('template_url'); ?>/img/blog/b_blog_thumb01.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="blog-details.html">Skills as Technician Solving</a></h3>
                            <div class="blog-post-meta">
                                <ul>
                                    <li><i class="far fa-user"></i>By <a href="#">Tomas Alexa</a></li>
                                    <li><i class="far fa-calendar-alt"></i> Mar 10, 2021</li>
                                </ul>
                            </div>
                            <p>Fresh bread means it has been baked recently usually within a day) and says nothing about
                                ingredients went making.</p>
                            <a href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div class="blog-post-item blog-post-style3 mb-30">
                        <div class="blog-post-thumb">
                            <a href="blog-details.html"><img src="<?php bloginfo('template_url'); ?>/img/blog/b_blog_thumb02.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="blog-details.html">Food Particularly Delicious</a></h3>
                            <div class="blog-post-meta">
                                <ul>
                                    <li><i class="far fa-user"></i>By <a href="#">Tomas Alexa</a></li>
                                    <li><i class="far fa-calendar-alt"></i> Mar 10, 2021</li>
                                </ul>
                            </div>
                            <p>Fresh bread means it has been baked recently usually within a day) and says nothing about
                                ingredients went making.</p>
                            <a href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                    <div class="blog-post-item blog-post-style3 mb-30">
                        <div class="blog-post-thumb">
                            <a href="blog-details.html"><img src="<?php bloginfo('template_url'); ?>/img/blog/b_blog_thumb03.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <h3><a href="blog-details.html">Make A Boring Wardrobe</a></h3>
                            <div class="blog-post-meta">
                                <ul>
                                    <li><i class="far fa-user"></i>By <a href="#">Tomas Alexa</a></li>
                                    <li><i class="far fa-calendar-alt"></i> Mar 10, 2021</li>
                                </ul>
                            </div>
                            <p>Fresh bread means it has been baked recently usually within a day) and says nothing about
                                ingredients went making.</p>
                            <a href="blog-details.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

</main>
<!-- main-area-end -->


<?php get_footer(); ?>