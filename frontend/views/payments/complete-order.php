<?php if ($_SESSION['success']) : ?>
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
                                <span class="breadcrumb-item active">Hoá đơn</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="container">
        <div class="row" style="padding: 30px 0px;">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <h2 style="color: #244ec9; padding-bottom: 20px;">Quý khách đã đặt hàng thành
                        công!</h2>
                    <div class="explain-email" style="font-size: 16px;">
                        <ul>
                            <li>
                                Hóa đơn mua hàng của Quý khách đã được chuyển
                                đến địa chỉ email đặt hàng của Quý
                                khách.
                            </li>
                            <li>
                                Sản phẩm sẽ được chuyển đến địa chỉ đặt hàng sau
                                2 - 5 ngày tính từ thời điểm Quý
                                khách nhận được thông báo này.
                            </li>
                            <li>
                                Địa chỉ: 147 - Phố Mai Dịch - Quận Cầu Giấy
                                - TP Hà Nội
                            </li>
                            <li>
                                Hot line: 0364081626
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="order-details">
                    <h5 class="order-details__title">Đơn hàng của bạn</h5>
                    <?php
                    $total_price = 0;
                    if (isset($_SESSION['cart'])):
                        ?>
                        <div class="order-details__item">
                            <?php foreach ($_SESSION['cart'] as $product_id => $product) :
                                $total_item = $product['quantity'] * $product['price'] * (100 - $product['discount']) / 100;
                                $total_price += $total_item;
                                ?>
                                <div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="../backend/assets/uploads/products/<?php echo $product['image'] ?>" alt="ordered item">
                                    </div>
                                    <div class="single-item__content">
                                        <a href="san-pham/<?php echo $product_id; ?>/<?php echo Helper::getSlug($product['name']); ?>.html"><?php echo $product['name'] ?></a>
                                        <span class="price">$<?php echo number_format($product['price'] * (100 - $product['discount']) / 100, 0, '.', '.') ?></span>
                                        <p class="quantity">Số lượng: <?php echo $product['quantity']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="order-details__count">
                            <div class="order-details__count__single">
                                <h5>Thành tiền</h5>
                                <span class="price">$<?php echo number_format($total_price, 0,'.','.'); ?></span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Phí vận chuyển</h5>
                                <span class="price">Miễn phí</span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Tổng thanh toán</h5>
                            <span class="price">$<?php echo number_format($total_price, 0,'.','.'); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
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
<?php
    unset($_SESSION['cart']);
    unset($_SESSION['success']);
    else:
    header('Location: trang-chu.html');
    exit();
    ?>
<?php endif; ?>
