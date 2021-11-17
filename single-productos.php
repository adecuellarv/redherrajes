<?php
get_header();
wp_reset_query();
global $post;
$thumbID = get_post_thumbnail_id($post->ID);
$imgDestacada = wp_get_attachment_url($thumbID);
$titulo = get_the_title();
$slug = basename(get_permalink($postId));

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
                        <a href="#" class="product-cat">Tracker Jacket</a>
                        <h3 class="title"><?php echo $titulo; ?></h3>
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p class="style-name">Style Name : TN-WI56-OMTJ-CqTKJ-09#</p>
                        
                        <div class="perched-info">
                            
                            <a href="#" class="btn">Cotizar</a>
                            <div class="wishlist-compare">
                                <ul>
                                    <li><a href="#"><i class="far fa-heart"></i> Add to Wishlist</a></li>
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
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                <div class="product-desc-title mb-30">
                                    <h4 class="title">Additional information :</h4>
                                </div>
                                <p>
                                    <?php echo the_content(); ?>
                                </p>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-desc-title mb-30">
                                    <h4 class="title">Reviews (0) :</h4>
                                </div>
                                <p>Your email address will not be published. Required fields are marked</p>
                                <p class="adara-review-title">Be the first to review “Adara”</p>
                                <div class="review-rating">
                                    <span>Your rating *</span>
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <form action="#" class="comment-form review-form">
                                    <span>Your review *</span>
                                    <textarea name="message" id="comment-message" placeholder="Your Comment"></textarea>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" placeholder="Your Name*">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" placeholder="Your Email*">
                                        </div>
                                    </div>
                                    <div class="comment-check-box">
                                        <input type="checkbox" id="comment-check">
                                        <label for="comment-check">Save my name and email in this browser for the next time I comment.</label>
                                    </div>
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="related-product-title">
                            <h4 class="title">You May Also Like...</h4>
                        </div>
                    </div>
                </div>
                <div class="row related-product-active">
                    <div class="col-xl-3">
                        <div class="new-arrival-item text-center">
                            <div class="thumb mb-25">
                                <a href="shop-details.html"><img src="img/product/n_arrival_product01.jpg" alt=""></a>
                                <div class="product-overlay-action">
                                    <ul>
                                        <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                        <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h5><a href="shop-details.html">Bomber in Cotton</a></h5>
                                <span class="price">$37.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="new-arrival-item text-center">
                            <div class="thumb mb-25">
                                <div class="discount-tag">- 20%</div>
                                <a href="shop-details.html"><img src="img/product/n_arrival_product02.jpg" alt=""></a>
                                <div class="product-overlay-action">
                                    <ul>
                                        <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                        <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                <span class="price">$25.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="new-arrival-item text-center">
                            <div class="thumb mb-25">
                                <a href="shop-details.html"><img src="img/product/n_arrival_product03.jpg" alt=""></a>
                                <div class="product-overlay-action">
                                    <ul>
                                        <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                        <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                <span class="price">$19.50</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="new-arrival-item text-center">
                            <div class="thumb mb-25">
                                <div class="discount-tag new">New</div>
                                <a href="shop-details.html"><img src="img/product/n_arrival_product04.jpg" alt=""></a>
                                <div class="product-overlay-action">
                                    <ul>
                                        <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                        <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h5><a href="shop-details.html">Women Shoes</a></h5>
                                <span class="price">$12.90</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

</main>
<!-- main-area-end -->

<?php get_footer(); ?>