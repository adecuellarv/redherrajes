<?php
get_header();
wp_reset_query();
global $post;
$thumbID = get_post_thumbnail_id($post->ID);
$imgDestacada = wp_get_attachment_url($thumbID);
$titulo = get_the_title();
$slug = basename(get_permalink($post->ID));
$post_content = get_post($post->ID);
$content = $post_content->post_content;

$faqs = get_field('faqs', $post->ID);
$contFaqs = 0;
?>
<main>
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

    <section class="contact-area pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-wrap">
                        <div class="section-title title-style-three mb-30">
                            <span class="sub-title">FAQS</span>
                            <h2 class="title">Preguntas frecuentes</h2>
                        </div>
                        <div class="div-faqs">
                            <div class="tabs">
                                <?php foreach ($faqs as &$item) { 
                                    $contFaqs++; ?>
                                    <div class="tab">
                                        <input type="checkbox" id="chck<?php echo $contFaqs; ?>">
                                        <label class="tab-label" for="chck<?php echo $contFaqs; ?>"><?php echo $item['item']['pregunta']; ?></label>
                                        <div class="tab-content">
                                            <?php echo $item['item']['respuesta']; ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>