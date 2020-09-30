<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                            <a href="trang-chu.html"><img src="../backend/assets/images/logo/4.png"
                                                          alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="trang-chu.html">Trang chủ</a></li>
                                <?php foreach ($categories as $category) :
                                    $cat_name = Helper::getSlug($category['name']);
                                    $menu_link = 'danh-muc/' . $category['id'] . '/' . $cat_name . '.html';
                                    ?>
                                    <li class="drop"><a
                                                href="<?php echo $menu_link; ?>"><?php echo $category['name']; ?></a>
                                    </li>
                                <?php endforeach; ?>
                                <li class="drop"><a href="tin-tuc.html">blog</a></li>
                                <li><a href="lien-he.html">Liên hệ</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="index.php?controller=home&action=index">Trang chủ</a></li>
                                    <?php foreach ($categories as $category) : ?>
                                        <li>
                                            <a href="index.php?controller=product&action=showCategory&id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                    <li><a href="index.php?controller=blog&action=index">blog</a></li>
                                    <li><a href="index.php?controller=contact&action=index">Liện hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href="#"><i class="icon-magnifier icons"></i></a>
                            </div>
                            <div class="header__account">
                                <a href="#"><i class="icon-user icons"></i></a>
                            </div>
                            <div class="htc__shopping__cart">
                                <a class="cart__menu" href=""><i class="icon-handbag icons"></i></a>
                                <?php
                                $cart_total = 0;
                                if (isset($_SESSION['cart'])) {
                                    $cart_total = count($_SESSION['cart']);
                                }
                                ?>
                                <a href="gio-hang.html"><span
                                            class="htc__qua cart-amount"><?php echo $cart_total; ?></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <?php if (isset($_SESSION['cart'])) : ?>
                <div class="shp__cart__wrap">
                    <?php foreach ($_SESSION['cart'] as $product_id => $product) :
                        $product_link = "san-pham/" . $product_id . "/" . Helper::getSlug($product['name']) . ".html";
                        ?>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img width="99" height="100" src="../backend/assets/uploads/products/<?php echo $product['image']; ?>" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="<?php echo $product_link; ?>"><?php echo $product['name']; ?></a></h2>
                            <span class="quantity">Số lượng: <?php echo $product['quantity']; ?></span>
                            <span class="size">Kích thước: <?php echo $product['size']; ?></span>
                            <span class="shp__price">$<?php echo number_format($product['price'] * (100 - $product['discount']) / 100, 0, '.', '.') ?></span>
                        </div>
                        <div class="remove__btn">
                            <a data-id="<?php echo $product_id; ?>" class="delete-cart refresh-page" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <ul class="shoping__total">
                    <li class="subtotal">Tổng tiền:</li>
                    <li class="total__price">$130.00</li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="gio-hang.html">Xem giỏ hàng</a></li>
                    <li class="shp__checkout"><a href="thanh-toan.html">Thanh toán</a></li>
                </ul>
            <?php else: ?>
                <h3 style="font-size: 18px; padding-bottom: 25px;" class="text-center">Không có sản phẩm nào trong giỏ hàng</h3>
                <ul class="shopping__btn">
                    <li><a href="danh-sach-san-pham.html">Tiếp tục mua sắm</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->