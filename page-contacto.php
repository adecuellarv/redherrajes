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

$informacion = get_field('informacion', $post->ID);

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
                            <span class="sub-title">Contáctanos</span>
                            <h2 class="title">Escribe un mensaje</h2>
                        </div>
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Nombre *">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Email *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Teléfono">
                                </div>
                            </div>
                            <textarea name="message" placeholder="Mensaje"></textarea>
                            <button class="btn">Enviar</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-7">
                    <aside class="contact-sidebar">
                        <div class="widget">
                            <div class="contact-sidebar-img mb-20">
                                <img src="img/images/contact_img.jpg" alt="">
                            </div>
                        </div>
                        <div class="widget">
                            <div class="contact-info-wrap">
                                <ul>
                                    <li>
                                        <div class="icon"><i class="flaticon-phone-call"></i></div>
                                        <div class="content">
                                            <h5>Teléfono</h5>
                                            <p><a href="tel:<?php echo $informacion['telefono']; ?>"><?php echo $informacion['telefono']; ?></a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="flaticon-email"></i></div>
                                        <div class="content">
                                            <h5>Email</h5>
                                            <p><a href="mailto:<?php echo $informacion['telefono']; ?>"><?php echo $informacion['email']; ?></a></p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon"><i class="flaticon-place"></i></div>
                                        <div class="content">
                                            <h5>Dirección</h5>
                                            <p><?php echo $informacion['direccion']; ?></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

    <div class="div-mapa-iframe">
        <?php echo $informacion['mapa_iframe']; ?>
    </div>

</main>
<?php get_footer(); ?>