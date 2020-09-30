<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <?php foreach ($banners as $banner) : ?>
            <!-- Start Single Slide -->
            <div class="single__slide animation__style01 slider__fixed--height">
                <div class="container">
                    <div class="row align-items__center">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                            <div class="slide">
                                <div class="slider__inner">
                                    <h2>TUAN CLOTHES</h2>
                                    <h1 style="font-size: 60px;">collection 2020</h1>
                                    <div class="cr__btn">
                                        <a href="danh-sach-san-pham.html">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                            <div class="slide__thumb">
                                <img width="628" height="300" src="../backend/assets/uploads/banners/<?php echo $banner['image']; ?>" alt="slider images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
        <?php endforeach; ?>
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <?php foreach ($newProducts as $newProduct) :
                        $pro_name = Helper::getSlug($newProduct['name']);
                        $new_product_link = 'san-pham/' . $newProduct['id'] . '/' . $pro_name . '.html';
                    ?>
                    <!-- Start Single Category -->
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="<?php echo $new_product_link; ?>">
                                    <img width="290" height="385" src="../backend/assets/uploads/products/<?php echo $newProduct['image']; ?>" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                    <li data-id="<?php echo $newProduct['id']; ?>" class="add-to-cart refresh-page"><a><i class="icon-handbag icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="<?php echo $new_product_link; ?>"><?php echo $newProduct['name']; ?></a></h4>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize">$<?php echo number_format($newProduct['price'], 0, '.', '.') ?></li>
                                    <li>$<?php echo number_format($newProduct['price']*(100-$newProduct['discount'])/100, 0, '.', '.') ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Best Seller</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <?php foreach ($hotProducts as $hotProduct) :
                    $pro_name = Helper::getSlug($hotProduct['name']);
                    $hot_product_link = 'san-pham/' . $hotProduct['id'] . '/' . $pro_name . '.html';
                    ?>
                <!-- Start Single Category -->
                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="<?php echo $hot_product_link; ?>">
                                <img width="290" height="385" src="../backend/assets/uploads/products/<?php echo $hotProduct['image'] ?>" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                <li data-id="<?php echo $hotProduct['id']; ?>" class="add-to-cart"><a><i class="icon-handbag icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="<?php echo $hot_product_link; ?>"><?php echo $hotProduct['name']; ?></a></h4>
                            <ul class="fr__pro__prize">
                                <li class="old__prize">$<?php echo number_format($hotProduct['price'], 0, '.', '.') ?></li>
                                <li>$<?php echo number_format($hotProduct['price']*(100-$hotProduct['discount'])/100, 0, '.', '.') ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Category -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<!-- Start Testimonial Area -->
<section class="htc__testimonial__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="ht__testimonial__activation clearfix">
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="../backend/assets/images/test/client/1.png" alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">Mr.Mike Band</a></h4>
                            <p>I’m up to something. Stay focused. The weather is amazing, walk with me through the pathway of more success. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="../backend/assets/images/test/client/2.png" alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">Ms.Lucy Barton</a></h4>
                            <p>I’m up to something. Stay focused. The weather is amazing, walk with me through the pathway of more success. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="../backend/assets/images/test/client/1.png" alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">Ms.Lucy Barton</a></h4>
                            <p>I’m up to something. Stay focused. The weather is amazing, walk with me through the pathway of more success. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="../backend/assets/images/test/client/2.png" alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">Ms.Lucy Barton</a></h4>
                            <p>I’m up to something. Stay focused. The weather is amazing, walk with me through the pathway of more success. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Area -->
<!-- Start Top Rated Area -->
<section class="top__rated__area bg__white pt--100 pb--110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Top Rated</h2>
                </div>
            </div>
        </div>
        <div class="row mt--20">
            <?php foreach ($topProducts as $topProduct) :
                $pro_name = Helper::getSlug($topProduct['name']);
                $top_product_link = 'san-pham/' . $topProduct['id'] . '/' . $pro_name . '.html';
                ?>
            <!-- Start Single Product -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="htc__best__product">
                    <div class="htc__best__pro__thumb">
                        <a href="<?php echo $top_product_link; ?>">
                            <img width="180" height="239" src="../backend/assets/uploads/products/<?php echo $topProduct['image']; ?>" alt="small product">
                        </a>
                    </div>
                    <div class="htc__best__product__details">
                        <h2><a href="<?php echo $top_product_link; ?>"><?php echo $topProduct['name']; ?></a></h2>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul  class="top__pro__prize">
                            <li class="old__prize">$<?php echo number_format($topProduct['price'], 0, '.', '.') ?></li>
                            <li>$<?php echo number_format($topProduct['price']*(100-$topProduct['discount'])/100, 0, '.', '.') ?></li>
                        </ul>
                        <div class="best__product__action">
                            <ul class="product__action--dft">
                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                <li data-id="<?php echo $topProduct['id']; ?>" class="add-to-cart"><a><i class="icon-handbag icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Top Rated Area -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a><img src="../backend/assets/images/brand/1.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/2.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/3.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/4.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/5.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/5.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/1.png" alt="brand images"></a></li>
                        <li><a><img src="../backend/assets/images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Blog Area -->
<section class="htc__blog__area bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ht__blog__wrap clearfix">
                <?php foreach ($blogs as $blog) :
                    $blog_title = Helper::getSlug($blog['title']);
                    $blog_link = 'tin-tuc/' . $blog['id'] . '/' . $blog_title . '.html';
                    ?>
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="<?php echo $blog_link; ?>">
                                <img width="400" height="287" src="../backend/assets/uploads/blogs/<?php echo $blog['image']; ?>" alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details text-justify">
                            <div class="bl__date">
                                <span><?php echo date('d/m/Y', strtotime($blog['created_at'])) ?></span>
                            </div>
                            <h2><a href="<?php echo $blog_link; ?>"><?php echo $blog['title'] ?></a></h2>
                            <p><?php echo $blog['summary']; ?></p>
                            <div class="blog__btn">
                                <a href="<?php echo $blog_link; ?>">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->