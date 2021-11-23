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

$categoria = get_terms(array(
    'taxonomy' => 'categoria',
    'hide_empty' => false,
));

$components = get_terms(array(
    'taxonomy' => 'components',
    'hide_empty' => false,
));

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$cat_get = '';
$com_get = '';
$search_get = '';
$order = 'ASC';
$page = -1;
$totalItems = 0;

if (isset($_GET['category'])) {
    $cat_get = $_GET['category'];
}
if (isset($_GET['component'])) {
    $com_get = $_GET['component'];
}
if (isset($_GET['search'])) {
    $search_get = $_GET['search'];
}
if (isset($_GET['order'])) {
    $order = $_GET['order'];
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$args =  array(
    'post_type' => 'productos',
    'posts_per_page' => 20,
    'paged' => $page,
    'orderby' => 'title',
    'order' => $order
);

if ($search_get !="" ) {
    array_push($args, "s", $search_get);
} else if ($cat_get!=="") {
    array_push($args, 'tax_query', array(
        array(
            'taxonomy' => 'categoria',
            'field' => 'slug',
            'terms' => $cat_get
        )
    ));
} else if ($com_get!=="") {
    array_push($args, 'tax_query', array(
        array(
            'taxonomy' => 'components',
            'field' => 'slug',
            'terms' => $com_get
        )
    ));
}

$QueryT = new WP_Query($args);

if (have_posts()) : while ($QueryT->have_posts()) : $QueryT->the_post();
        $totalItems++;
    endwhile;
endif;
?>

<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg" style="background: linear-gradient(to right, rgb(49 48 49), rgb(44 44 44 / 59%)) 100% 100% / cover no-repeat, url(<?php echo $imgDestacada; ?>); background-position: 100% 100%; background-repeat: no-repeat; background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-content">
                    <h2>Lista productos</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- shop-area -->
<section class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="shop-top-meta mb-35">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="shop-top-left">
                                <ul>
                                    <li> <b><?php echo $totalItems; ?></b> Resultados</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="shop-top-right">
                                <form action="#">
                                    <select name="select">
                                        <option value="">Ordernar <?php echo $order; ?></option>
                                        <option><a href="<?php echo addGetParamToUrl($url, 'order', 'ASC'); ?>">A-Z</a></option>
                                        <option><a href="<?php echo addGetParamToUrl($url, 'order', 'DESC'); ?>">Z-A</a></option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $QueryP = new WP_Query($args);
                    if ($QueryP->have_posts()) :

                        while ($QueryP->have_posts()) :
                            $QueryP->the_post();
                            $totalItems++;
                            $thumbID = get_post_thumbnail_id($post->ID);
                            $imgDestacada = wp_get_attachment_url($thumbID);
                            $titulo = get_the_title();
                            $slug = basename(get_permalink($post->ID));
                            $caracteristicas = get_field('caracteristicas', $post->ID);

                    ?>
                            <div class="col-xl-4 col-sm-6">
                                <div class="new-arrival-item text-center mb-50">
                                    <div class="thumb mb-25">
                                        <a href="<?php echo home_url(); ?>/productos/<?php echo $slug; ?>"><img src="<?php echo $imgDestacada; ?>" alt="<?php echo $slug; ?>"></a>
                                        <div class="product-overlay-action">
                                            <ul>
                                                <li><a href="<?php echo home_url(); ?>/productos/<?php echo $slug; ?>"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5><a href="<?php echo home_url(); ?>/productos/<?php echo $slug; ?>"><?php the_title(); ?></a></h5>
                                        <span class="price">SKU: <?php echo $caracteristicas['sku']; ?></span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;

                    else :
                        "No Administrative Offices Found. Try again later";
                    endif;
                    wp_reset_postdata();
                    ?>



                </div>
                <div class="pagination-wrap">
                    <?php
                    //$args = array( 'post_type' => 'productos','posts_per_page' =>8, 'order' => 'DESC', 'paged' => $page ); 
                    //print_r($args);
                    //if (function_exists('custom_pagination')) { echo "hey";
                    //print_r(custom_pagination($et_testimonials_query_pag->max_num_pages,"",$page));
                    //}
                    ?>
                    <ul>
                        <li class="prev"><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">10</a></li>
                        <li class="next"><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <aside class="shop-sidebar">
                    <div class="widget side-search-bar">
                        <form action="#">
                            <input type="text">
                            <button><i class="flaticon-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Categorías de productos</h4>
                        <div class="shop-cat-list">
                            <ul>
                                <?php foreach ($categoria as $term) {
                                    $edit_post_ = addGetParamToUrl($url, 'category', $term->slug); ?>
                                    <li><a href="<?php echo $edit_post_; ?>"><?php echo $term->name; ?></a><span>(<?php echo $term->count; ?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="widget has-border">
                        <div class="sidebar-product-size mb-30">
                            <h4 class="widget-title">Componentes</h4>
                            <div class="shop-size-list">
                                <ul>
                                    <?php foreach ($components as $term) {
                                        $edit_post = addGetParamToUrl($url, 'component', $term->slug); ?>
                                        <li><a href="<?php echo $edit_post; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- shop-area-end -->

<?php get_footer(); ?>