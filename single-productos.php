<?php
get_header();
wp_reset_query();
global $post;
$thumbID = get_post_thumbnail_id($post->ID);
$imgDestacada = wp_get_attachment_url($thumbID);
$titulo = get_the_title();
$slug = basename(get_permalink($postId));

$caracteristicas = get_field('caracteristicas', $postId);

$post_categories = get_the_terms($postId, 'categoria');
if (!empty($post_categories) && !is_wp_error($post_categories)) {
    $categories = wp_list_pluck($post_categories, 'name');
}

$post_components = get_the_terms($postId, 'components');
if (!empty($post_components) && !is_wp_error($post_components)) {
    $components = wp_list_pluck($post_components, 'name');
}

//print_r($caracteristicas);

?>

<!-- main-area -->
<main>


    <!-- shop-details-area -->
    <section class="shop-details-area pt-100 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="shop-details-flex-wrap">
                        <div class="shop-details-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one" role="tab" aria-controls="item-one" aria-selected="true"><img src="img/product/sd_nav_img01.jpg" alt=""></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="item-two-tab" data-toggle="tab" href="#item-two" role="tab" aria-controls="item-two" aria-selected="false"><img src="img/product/sd_nav_img02.jpg" alt=""></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="item-three-tab" data-toggle="tab" href="#item-three" role="tab" aria-controls="item-three" aria-selected="false"><img src="img/product/sd_nav_img03.jpg" alt=""></a>
                                </li>
                            </ul>
                        </div>
                        <div class="shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="item-one" role="tabpanel" aria-labelledby="item-one-tab">
                                    <div class="shop-details-img">
                                        <img src="<?php echo $imgDestacada; ?>" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="item-two" role="tabpanel" aria-labelledby="item-two-tab">
                                    <div class="shop-details-img">
                                        <img src="<?php echo $imgDestacada; ?>" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="item-three" role="tabpanel" aria-labelledby="item-three-tab">
                                    <div class="shop-details-img">
                                        <img src="<?php echo $imgDestacada; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="shop-details-content">
                        <?php if (count($categories) > 0) {
                            foreach ($categories as &$item) {
                        ?>
                                <a href="#" class="product-cat"><?php echo $item; ?></a>
                        <?php }
                        } ?>
                        <h3 class="title"><?php echo $titulo; ?></h3>
                        <p class="style-name">SKU : <?php echo $caracteristicas['sku']; ?></p>
                        <div class="product-details-info">
                            <span>Embalaje <a href="#"><?php echo $caracteristicas['embalaje']; ?></a></span>
                            <div class="sidebar-product-size mb-30">
                                <h4 class="widget-title">Componentes</h4>
                                <div class="shop-size-list">
                                    <ul>
                                        <?php if (count($components) > 0) {
                                            foreach ($components as &$item) {
                                        ?>
                                                <li><a href="#"><?php echo $item; ?></a></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-product-color">
                                <h4 class="widget-title">Color</h4>
                                <div class="">
                                    <ul>
                                        <?php foreach ($caracteristicas['colores'] as &$item) { ?>
                                            <li>
                                                <div><span><?php echo $item['color']; ?></span></div>
                                                <img src="<?php echo $item['imagen']; ?>" alt="img-color" style="width: 45px;" />
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-product-color" style="margin-top: 35px;">
                                <h4 class="widget-title">Aperturas</h4>
                                <div class="">
                                    <img src="<?php echo $caracteristicas['aperturas']; ?>" alt="caracteristicas" style="width: 50%;"/>
                                </div>
                            </div>
                        </div>
                        <div class="perched-info">

                            <div class="wishlist-compare">
                                <ul>
                                    <li><a href="#"><i class="far fa-heart"></i> Add to Wishlist</a></li>
                                    <li><a href="#"><i class="fas fa-retweet"></i> Add to Compare List</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-details-share">
                            <ul>
                                <li>Share :</li>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description Guide</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="product-desc-title mb-30">
                                    <h4 class="title">Compatible :</h4>
                                </div>
                                <p>
                                    <?php echo $caracteristicas['compatible']; ?>
                                </p>

                                <div class="product-desc-title mb-30">
                                    <h4 class="title">Aplicaciones :</h4>
                                </div>
                                <p>
                                    <?php echo $caracteristicas['aplicaciones']; ?>
                                </p>

                                <div class="product-desc-title mb-30">
                                    <h4 class="title">Características :</h4>
                                </div>
                                <p>
                                    <?php echo $caracteristicas['caracteristicas']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="related-product-title">
                            <h4 class="title">Productos relacionados</h4>
                        </div>
                    </div>
                </div>
                <div class="row related-product-active">
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
                            
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

</main>
<!-- main-area-end -->

<?php get_footer(); ?>