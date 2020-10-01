<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../backend/assets/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="trang-chu.html">Trang chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Sản phẩm</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select">
                                <option>Mặc định</option>
                                <option>Theo tên A - Z</option>
                                <option>Theo tên Z - A</option>
                                <option>Giá (Thấp > Cao)</option>
                                <option>Giá (Cao > Thấp)</option>
                            </select>
                        </div>

                        <!-- Start List And Grid View -->
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                <?php foreach ($products as $product) :
                                    $pro_name = Helper::getSlug($product['name']);
                                    $pro_link = 'san-pham/' . $product['id'] . '/' . $pro_name . '.html';
                                    $add_link = 'them-gio-hang.html';
                                    ?>
                                <!-- Start Single Product -->
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="<?php echo $pro_link; ?>">
                                                <img width="290" height="360" src="../backend/assets/uploads/products/<?php echo $product['image']; ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__hover__info">
                                            <ul class="product__action">
                                                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>
                                                <li data-id="<?php echo $product['id']; ?>" class="add-to-cart refresh-page"><a><i class="icon-handbag icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="<?php echo $pro_link; ?>"><?php echo $product['name']; ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <li class="old__prize">$<?php echo number_format($product['price'], 0, '.', '.') ?></li>
                                                <li>$<?php echo number_format($product['price']*(100-$product['discount'])/100, 0, '.', '.') ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>
                <!-- Start Pagenation -->
                <div class="row">
                    <div class="col-xs-12">
                        <?php echo $pages; ?>
                    </div>
                </div>
                <!-- End Pagenation -->
            </div>
            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                <div class="htc__product__leftsidebar">
                    <!-- Start Prize Range -->
                    <div class="htc-grid-range">
                        <h4 class="title__line--4">Giá</h4>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Giá :</span><input type="text" id="amount" readonly>
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Lọc</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Prize Range -->
                    <!-- Start Category Area -->
                    <div class="htc__category">
                        <h4 class="title__line--4">Danh mục sản phẩm</h4>
                        <ul class="ht__cat__list">
                            <?php foreach ($categories as $category) :
                                $cat_name = Helper::getSlug($category['name']);
                                $cat_link = 'danh-muc/' . $category['id'] . '/' . $cat_name . '.html';
                                ?>
                            <li><a href="<?php echo $cat_link; ?>"><?php echo $category['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- End Category Area -->
                    <!-- Start Best Sell Area -->
                    <div class="htc__recent__product">
                        <h2 class="title__line--4">best seller</h2>
                        <div class="htc__recent__product__inner">
                            <?php foreach ($topProducts as $topProduct) :
                                $hot_pro_name = Helper::getSlug($topProduct['name']);
                                $hot_pro_link = 'san-pham/' . $topProduct['id'] . '/' . $hot_pro_name . '.html';
                                ?>
                            <!-- Start Single Product -->
                            <div class="htc__best__product">
                                <div class="htc__best__pro__thumb">
                                    <a href="<?php echo $hot_pro_link; ?>">
                                        <img width="99" height="119" src="../backend/assets/uploads/products/<?php echo $topProduct['image']; ?>" alt="small image">
                                    </a>
                                </div>
                                <div class="htc__best__product__details">
                                    <h2><a href="<?php echo $hot_pro_link; ?>"><?php echo $topProduct['name']; ?></a></h2>
                                    <ul class="rating">
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li class="old"><i class="icon-star icons"></i></li>
                                    </ul>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">$<?php echo number_format($topProduct['price'], 0, '.', '.') ?></li>
                                        <li>$<?php echo number_format($topProduct['price']*(100-$topProduct['discount'])/100, 0, '.', '.') ?></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Product -->
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- End Best Sell Area -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grid -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="../backend/assets/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/2.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/3.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/4.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/5.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/1.png" alt="brand images"></a></li>
                        <li><a href="#"><img src="../backend/assets/images/brand/2.png" alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
        <li><a><img src="../backend/assets/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/3.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/4.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/5.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/6.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
        <li><a><img src="../backend/assets/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->