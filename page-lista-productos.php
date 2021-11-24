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
$per_page = 1000;
$staticHowItems = 20;
$showItems = 20;

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
if (isset($_GET['pagination'])) {
    $pagination = $_GET['pagination'];
}

if ($search_get != "") {
    $args =  array(
        'post_type' => 'productos',
        'posts_per_page' => $per_page,
        //'paged' => $page,
        'orderby' => 'title',
        'order' => $order,
        's' => $search_get
    );
} else if ($cat_get !== "") {
    $args =  array(
        'post_type' => 'productos',
        'posts_per_page' => $per_page,
        //'paged' => $page,
        'orderby' => 'title',
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'categoria',
                'field' => 'slug',
                'terms' => $cat_get
            )
        )
    );
} else if ($com_get !== "") {
    $args =  array(
        'post_type' => 'productos',
        'posts_per_page' => $per_page,
        //'paged' => $page,
        'orderby' => 'title',
        'order' => $order,
        'tax_query' => array(
            array(
                'taxonomy' => 'components',
                'field' => 'slug',
                'terms' => $com_get
            )
        )
    );
} else {
    $args =  array(
        'post_type' => 'productos',
        'posts_per_page' => $per_page,
        //'paged' => $page,
        'orderby' => 'title',
        'order' => $order
    );
}

$QueryT = new WP_Query($args);

if (have_posts()) : while ($QueryT->have_posts()) : $QueryT->the_post();
        $totalItems++;
    endwhile;
endif;

$totalPages = ceil($totalItems / $staticHowItems);

if ($pagination) {
    if ($pagination == -1 || $pagination == 1) {
        $showItems = $staticHowItems;
    } else {
        $showItems = $staticHowItems * $pagination;
    }
}
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
            <?php if (isMobile()) { ?>
                <div class="div-filters-mobile">
                    <h2>Filtros</h2>
                    <label class="close-mobile-flts" onclick="closeFilters()"><i class="fas fa-times"></i></label>
                    <aside class="shop-sidebar sliderbar-mb-flts" style="margin-top: 20px;">
                        <div class="widget side-search-bar">
                            <form action="<?php echo home_url(); ?>/lista-productos">
                                <input type="text" name="search" value="<?php echo $search_get; ?>">
                                <button><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <a href="<?php echo home_url(); ?>/lista-productos">Limpiar filtros</a>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categorías de productos</h4>
                            <div class="shop-cat-list">
                                <ul>
                                    <?php foreach ($categoria as $term) {
                                        addGetParamToUrl($url, 'category', $term->slug);
                                        $edit_post_ = addGetParamToUrl($url, 'category', $term->slug); ?>
                                        <li><a href="<?php echo home_url(); ?>/lista-productos?category=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a><span>(<?php echo $term->count; ?>)</span></li>
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
                                            <li><a href="<?php echo home_url(); ?>/lista-productos?component=<?php echo $term->slug; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            <?php } ?>
            <div class="col-xl-9 col-lg-8">
                <div class="shop-top-meta mb-35">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (isMobile()) { ?>
                                <div style="margin-bottom: 25px; text-align:center;">
                                    <a href="https://www.monorama.com.mx/redherrajes/wp-content/themes/redherrajes/descargas/cat_v2_RED_2021.pdf" target="_black">
                                        Descargar catálogo <i class="fas fa-download"></i>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <div class="shop-top-left">
                                <ul>
                                    <?php if (isMobile()) { ?>
                                        <li><span onclick="openFilters()"><i class="flaticon-menu"></i> Filtros</span></li>
                                    <?php } ?>
                                    <li> <b><?php echo $totalItems; ?></b> Resultados</li>
                                    <li>Página <?php echo $pagination != "" ? $pagination : 1; ?> de <?php echo $totalPages; ?> </li>
                                </ul>
                                <?php if (!isMobile()) { ?>
                                    <div style="margin-top: 15px;">
                                        <a href="https://www.monorama.com.mx/redherrajes/wp-content/themes/redherrajes/descargas/cat_v2_RED_2021.pdf" target="_black">
                                            Descargar catálogo <i class="fas fa-download"></i>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="shop-top-right">
                                <form action="">
                                    <select name="select" id="order">
                                        <option <?php if ($order == 'ASC') {
                                                                echo "selected";
                                                            } ?> value="<?php echo addGetParamToUrl($url, 'order', 'ASC'); ?>"> <a>Ordenar de A-Z </a></option>
                                        <option <?php if ($order == 'DESC') {
                                                                echo "selected";
                                                            } ?> value="<?php echo addGetParamToUrl($url, 'order', 'DESC'); ?>"><a>Ordenar de Z-A</a></option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $QueryP = new WP_Query($args);
                    $min = $showItems - $staticHowItems;
                    $max = $showItems;
                    $countQR = 0;
                    if ($QueryP->have_posts()) :

                        while ($QueryP->have_posts()) :
                            $QueryP->the_post();
                            $totalItems++;
                            $thumbID = get_post_thumbnail_id($post->ID);
                            $imgDestacada = wp_get_attachment_url($thumbID);
                            $titulo = get_the_title();
                            $slug = basename(get_permalink($post->ID));
                            $caracteristicas = get_field('caracteristicas', $post->ID);
                            if ($countQR >= $min && $countQR <= $max) {
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

                            }
                            $countQR++;
                        endwhile;

                    else :
                        "No Administrative Offices Found. Try again later";
                    endif;
                    wp_reset_postdata();
                    ?>



                </div>
                <div class="pagination-wrap">
                    <?php
                    $nextpage = '';
                    $prevpage = '';
                    if ($totalPages < $pagination) {
                        $nextpage = addGetParamToUrl($url, 'pagination', $pagination + 1);
                    }
                    if ($prevpage > 1 && $totalPages > 1 && $pagination > 1) {
                        $prevpage = addGetParamToUrl($url, 'pagination', $pagination - 1);
                    }
                    ?>
                    <ul>
                        <?php if ($prevpage) { ?>
                            <li class="prev"><a href="<?php echo $prevpage; ?>">Prev</a></li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) {
                            $go_page = addGetParamToUrl($url, 'pagination', $i);
                        ?>
                            <li class="<?php if ($pagination == $i || $pagination == '' && $i == 1) {
                                            echo "active";
                                        }  ?>">
                                <a href="<?php echo $go_page; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                        <?php if ($nextpage) { ?>
                            <li class="next"><a href="<?php echo $nextpage; ?>">Next</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <?php if (!isMobile()) { ?>
                <div class="col-xl-3 col-lg-4">
                    <aside class="shop-sidebar">
                        <div class="widget side-search-bar">
                            <form action="<?php echo home_url(); ?>/lista-productos">
                                <input type="text" name="search" value="<?php echo $search_get; ?>">
                                <button><i class="flaticon-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <a href="<?php echo home_url(); ?>/lista-productos">Limpiar filtros</a>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categorías de productos</h4>
                            <div class="shop-cat-list">
                                <ul>
                                    <?php foreach ($categoria as $term) {
                                        addGetParamToUrl($url, 'category', $term->slug);
                                        $edit_post_ = addGetParamToUrl($url, 'category', $term->slug); ?>
                                        <li><a href="<?php echo home_url(); ?>/lista-productos?category=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a><span>(<?php echo $term->count; ?>)</span></li>
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
                                            <li><a href="<?php echo home_url(); ?>/lista-productos?component=<?php echo $term->slug; ?>"><?php echo $term->name; ?> (<?php echo $term->count; ?>)</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- shop-area-end -->
<script>

</script>
<?php get_footer(); ?>
<script>
    const openFilters = () => {
        $(".div-filters-mobile").show();
    };

    const closeFilters = () => {
        $(".div-filters-mobile").hide();
    };


    //order
    $('#order').on('change', function() {
        //alert(this.value);
        window.location = this.value;
    });
    /*/
    const changeOrder = (url) => {
        window.location.href = url;
    };*/
</script>