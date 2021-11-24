<?php
get_header();
wp_reset_query();
global $post;
$thumbID = get_post_thumbnail_id($post->ID);
$imgDestacada = wp_get_attachment_url($thumbID);
$titulo = get_the_title();
$slug = basename(get_permalink($postId));
$catProduct = '';

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
    <section class="shop-details-area pt-170 pb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="shop-details-flex-wrap">
                        <div class="shop-details-nav-wrap">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="item-one-tab" data-toggle="tab" href="#item-one" role="tab" aria-controls="item-one" aria-selected="true"><img src="<?php echo $imgDestacada; ?>" alt=""></a>
                                </li>
                                <?php
                                $countGal = 0;
                                foreach ($caracteristicas['galeria'] as &$item) {
                                    $countGal++;
                                ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="item-<?php echo $countGal; ?>-tab" data-toggle="tab" href="#item-<?php echo $countGal; ?>" role="tab" aria-controls="item-<?php echo $countGal; ?>" aria-selected="false">
                                            <img src="<?php echo $item; ?>" alt="gal-<?php echo $countGal; ?>">
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="shop-details-img-wrap">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="item-one" role="tabpanel" aria-labelledby="item-one-tab">
                                    <div class="shop-details-img">
                                        <img src="<?php echo $imgDestacada; ?>" alt="">
                                    </div>
                                </div>
                                <?php
                                $countGalT = 0;
                                foreach ($caracteristicas['galeria'] as &$item) {
                                    $countGalT++;
                                ?>
                                    <div class="tab-pane fade" id="item-<?php echo $countGalT; ?>" role="tabpanel" aria-labelledby="item-<?php echo $countGalT; ?>-tab">
                                        <div class="shop-details-img">
                                            <img src="<?php echo $item; ?>" alt="">
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="shop-details-content">
                        <?php if (count($categories) > 0) {
                            foreach ($categories as &$item) {
                        ?>
                                <label class="product-cat"><?php echo $item; ?></label>
                        <?php }
                        } ?>
                        <h3 class="title"><?php echo $titulo; ?></h3>
                        <p class="style-name">SKU : <?php echo $caracteristicas['sku']; ?></p>
                        <div class="product-details-info">
                            <span>Embalaje <b><?php echo $caracteristicas['embalaje']; ?></b></span>
                            <div class="sidebar-product-size mb-30">
                                <h4 class="widget-title">Componentes</h4>
                                <div class="shop-size-list">
                                    <ul>
                                        <?php if (count($components) > 0) {
                                            foreach ($components as &$item) {
                                        ?>
                                                <li><span class="components-single"><?php echo $item; ?></span></li>
                                        <?php }
                                        } ?>
                                    </ul>
                                </div>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <?php //if ($caracteristicas['tipo'] . count() > 0) {
                                foreach ($caracteristicas['tipo'] as &$item) {
                                ?>
                                    <div>
                                        <?php if ($item == 'peri') { ?>
                                            <strong> Perimetral <i class="fas fa-check"></i></strong>
                                        <?php } else if ($item == 'est') { ?>
                                            <strong> Estandar <i class="fas fa-check"></i></strong>
                                        <?php } ?>
                                    </div>
                                <?php }
                                //}
                                ?>
                            </div>
                            <?php  if (sizeof($caracteristicas['colores']) > 1) { ?>
                                <div class="sidebar-product-color">

                                    <h4 class="widget-title">Color</h4>
                                    <div class="">
                                        <?php
                                        $hasStock = false;
                                        $hasShop = false;
                                        foreach ($caracteristicas['colores'] as &$item) {
                                            if (!$item['bajo_pedido']) {
                                                $hasStock = true;
                                            }
                                            if ($item['bajo_pedido']) {
                                                $hasShop = true;
                                            }
                                        }
                                        if ($hasStock) {
                                        ?>
                                            <strong>En stock:</strong>
                                            <ul style="margin-bottom: 15px;">
                                                <?php foreach ($caracteristicas['colores'] as &$item) {
                                                    if (!$item['bajo_pedido']) { ?>
                                                        <li style="display: inline-block; margin: 7px;">
                                                            <div><span><?php echo $item['color']; ?></span></div>
                                                            <img src="<?php echo $item['imagen']; ?>" alt="img-color" style="width: 45px;" />
                                                        </li>
                                                <?php }
                                                }
                                                ?>
                                            </ul>
                                        <?php }
                                        if ($hasShop) {
                                        ?>
                                            <strong>Bajo pedido:</strong>
                                            <ul>
                                                <?php foreach ($caracteristicas['colores'] as &$item) {
                                                    if ($item['bajo_pedido']) { ?>
                                                        <li style="display: inline-block; margin: 7px;">
                                                            <div><span><?php echo $item['color']; ?></span></div>
                                                            <img src="<?php echo $item['imagen']; ?>" alt="img-color" style="width: 45px;" />
                                                        </li>
                                                <?php }
                                                }
                                                ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($caracteristicas['aperturas']) {  ?>
                                <div class="sidebar-product-color" style="margin-top: 35px;">
                                    <h4 class="widget-title">Aperturas</h4>
                                    <div class="">
                                        <img src="<?php echo $caracteristicas['aperturas']; ?>" alt="caracteristicas" style="width: 50%;" />
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-desc-wrap">
                        <div style="background-color: #eee; padding: 20px;">
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
            <?php if (count($post_categories) > 0) {
                $catProduct = $post_categories[0]->slug;
            ?>
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
                        $args =  array(
                            'post_type' => 'productos',
                            'posts_per_page' => 4,
                            'orderby' => 'title',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categoria',
                                    'field' => 'slug',
                                    'terms' => $catProduct
                                )
                            )
                        );
                        $QueryT = new WP_Query($args);
                        if (have_posts()) : while ($QueryT->have_posts()) : $QueryT->the_post();
                                //$img_slider = get_field('img_slider',get_the_ID());
                                global $post_;
                                $thumbID_ = get_post_thumbnail_id($post_->ID);
                                $imgDestacada_ = wp_get_attachment_url($thumbID_);
                                $titulo_ = get_the_title();
                                $slug_ = basename(get_permalink($postId));
                        ?>
                                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                                    <div class="new-arrival-item text-center mb-50">
                                        <div class="thumb mb-25">
                                            <a href="<?php echo home_url(); ?>/productos/<?php echo $slug_; ?>"><img src="<?php echo $imgDestacada_; ?>" alt="<?php echo $titulo_; ?>"></a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="<?php echo home_url(); ?>/productos/<?php echo $slug_; ?>"><i class="far fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="<?php echo home_url(); ?>/productos/<?php echo $slug_; ?>"><?php echo $titulo_; ?></a></h5>
                                            <span class="price"></span>
                                            <a href="<?php echo home_url(); ?>/productos/<?php echo $slug_; ?>" class="btn">
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
            <?php } ?>
        </div>
    </section>
    <!-- shop-details-area-end -->

</main>
<!-- main-area-end -->

<?php get_footer(); ?>