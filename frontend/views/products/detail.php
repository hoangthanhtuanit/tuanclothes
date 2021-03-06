<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
     style="background: rgba(0, 0, 0, 0) url(../backend/assets/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="trang-chu.html">Trang chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <?php
                            $cat_name = Helper::getSlug($product['category_name']);
                            $cat_link = 'danh-muc/' . $product['category_id'] . '/' . $cat_name . '.html';
                            ?>
                            <a class="breadcrumb-item"
                               href="<?php echo $cat_link; ?>"><?php echo $product['category_name']; ?></a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active"><?php echo $product['name']; ?></span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img id="anh" width="450" height="600"
                                         src="../backend/assets/uploads/products/<?php echo $product['image']; ?>"
                                         alt="full-image">
                                </div>
                            </div>
                        </div>
                        <!-- End Product Big Images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2 id="ten"><?php echo $product['name']; ?></h2>
                        <h6></h6>
                        <ul class="rating">
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                        </ul>
                        <ul class="pro__prize">
                            <li id="gia" class="old__prize">$<?php echo number_format($product['price'], 0, '.', '.') ?></li>
                            <li>
                                $<?php echo number_format($product['price'] * (100 - $product['discount']) / 100, 0, '.', '.') ?></li>
                        </ul>
                        <p class="pro__info"><?php echo $product['summary']; ?></p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Tình trạng:</span> In Stock</p>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Màu: </span><?php echo $product['color']; ?></p>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Kích thước: </span></p>
                                <select class="select__size" name="size" id="size">
                                    <?php foreach ($sizes as $size) : ?>
                                        <option value="<?php echo $size['size']; ?>"><?php echo $size['size']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="sin__desc align--left quantity-area">
                                <p><span style="float: left;  margin: 7px 10px 0 0;">Số lượng: </span></p>
                                <div class="cart-quantity">
                                    <div class="product-qty">
                                        <div class="cart-quantity">
                                            <div class="cart-plus-minus">
                                                <div class="dec qtybutton">-</div>
                                                <input type="text" value="1" name="quantity"
                                                       class="cart-plus-minus-box" id="quantity">
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Danh mục:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a><?php echo $product['category_name']; ?></a></li>
                                </ul>
                            </div>
                            <div class="sin__desc align--left">
                                <p><span>Nhà phân phối:</span></p>
                                <ul class="pro__cat__list">
                                    <li><a><?php echo $product['supplier_name']; ?></a></li>
                                </ul>
                            </div>

                            <div class="sin__desc product__share__link">
                                <p><span>Chia sẻ:</span></p>
                                <ul class="pro__share">
                                    <li><a title="Twitter"><i class="icon-social-twitter icons"></i></a></li>

                                    <li><a title="Instagram"><i class="icon-social-instagram icons"></i></a></li>

                                    <li><a title="Facebook"><i class="icon-social-facebook icons"></i></a></li>

                                    <li><a title="Google"><i class="icon-social-google icons"></i></a></li>

                                    <li><a title="Linkedin"><i class="icon-social-linkedin icons"></i></a></li>

                                    <li><a title="Printerest"><i class="icon-social-pinterest icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="contact-btn">
                                <button data-id="<?php echo $product['id']; ?>" class="fv-btn add-to-cart refresh-page">Mua hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab"
                                                                          data-toggle="tab">description</a></li>
                    <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">review</a>
                    </li>
                    <li role="presentation" class="shipping"><a href="#shipping" role="tab"
                                                                data-toggle="tab">shipping</a>
                    </li>
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is
                                tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra
                                Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and
                                neutral-hued bodysuits.</p>
                            <h4 class="ht__pro__title">Description</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                                vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                                eorum claritatem</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum
                                iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                                dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim
                                qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla
                                facilisi.</p>
                            <h4 class="ht__pro__title">Standard Featured</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                                vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum. Typi non habent claritatem insitam; est usus legentis in</p>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is
                                tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra
                                Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and
                                neutral-hued bodysuits.</p>
                            <h4 class="ht__pro__title">Description</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                                vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                                eorum claritatem</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum
                                iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                                dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim
                                qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla
                                facilisi.</p>
                            <h4 class="ht__pro__title">Standard Featured</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                                vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                                eorum claritatem</p>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="shipping" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is
                                tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra
                                Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and
                                neutral-hued bodysuits.</p>
                            <h4 class="ht__pro__title">Description</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                                vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                                eorum claritatem</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum
                                iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum
                                dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim
                                qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla
                                facilisi.</p>
                            <h4 class="ht__pro__title">Standard Featured</h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                                minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut
                                aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in
                                vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
                                at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril
                                delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta
                                nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer
                                possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit
                                eorum claritatem</p>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Description -->
<!-- Start Product Area -->
<section class="htc__product__area--2 pb--100 product-details-res">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">
                <?php foreach ($newProducts as $newProduct) :
                    $new_pro_name = Helper::getSlug($newProduct['name']);
                    $new_pro_link = 'san-pham/' . $newProduct['id'] . '/' . $new_pro_name . '.html';
                    ?>
                    <!-- Start Single Product -->
                    <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="<?php echo $new_pro_link; ?>">
                                    <img width="290" height="385"
                                         src="../backend/assets/uploads/products/<?php echo $newProduct['image']; ?>"
                                         alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="index.php?controller=product&action=liked&id=<?php echo $newProduct['id']; ?>&status=liked"><i class="icon-heart icons"></i></a></li>
                                    <li data-id="<?php echo $newProduct['id']; ?>" class="add-to-cart"><a><i class="icon-handbag icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                <h4><a href="<?php echo $new_pro_link; ?>"><?php echo $newProduct['name']; ?> </a></h4>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize">
                                        $<?php echo number_format($newProduct['price'], 0, '.', '.') ?></li>
                                    <li>
                                        $<?php echo number_format($newProduct['price'] * (100 - $newProduct['discount']) / 100, 0, '.', '.') ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product -->
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<!-- Start Banner Area -->
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
<!-- End Banner Area -->
<!-- Modal -->
<div class="modal fade" id="showCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin mua hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="" class="thumbnail">
                            <img id="showCartImg" alt="">
                        </a>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <p>Tên sản phẩm: <span id="showCartName"></span></p><br>
                        <p>Giá sản phẩm: <span id="showCartPrice"></span></p><br>
                        <p>Số lượng: <span id="showCartQty"></span></p><br>
                        <p>Kích thước: <span id="showCartSize"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
