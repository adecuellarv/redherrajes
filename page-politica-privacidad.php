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
                       
                    </div>
                    <div class="blog-post-item blog-post-style2 mb-50">
                        <?php echo $content; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

</main>
<!-- main-area-end -->
<?php get_footer(); ?>