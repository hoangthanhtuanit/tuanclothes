<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(../backend/assets/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php?controller=home&action=index">Trang chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Thanh toán</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <div class="accordion__title">
                                    Phương thức kiểm tra
                                </div>
                                <div class="accordion__body">
                                    <div class="accordion__body__form">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="checkout-method__login">
                                                    <form action="#">
                                                        <h5 class="checkout-method__title">Đăng nhập</h5>
                                                        <h5 class="checkout-method__title">Đã đăng ký?</h5>
                                                        <p class="checkout-method__subtitle">Vui lòng đăng nhập phía dưới:</p>
                                                        <div class="single-input">
                                                            <label for="user-email">Email</label>
                                                            <input type="email" id="user-email">
                                                        </div>
                                                        <div class="single-input">
                                                            <label for="user-pass">Mật khẩu</label>
                                                            <input type="password" id="user-pass">
                                                        </div>
                                                        <p class="require">* Bắt buộc</p>
                                                        <div class="contact-btn" style="margin-top: 15px;">
                                                            <input type="submit" class="fv-btn" name="submit" value="ĐĂNG NHẬP">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="accordion__title">
                                Thông tin thanh toán
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    <form action="" method="post">
                                        <?php require_once 'views/layouts/error.php'; ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="full_name" value="<?php isset($_POST['full_name']) ? $_POST['full_name'] : '' ?>" placeholder="Họ tên">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="email" value="<?php isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" value="<?php isset($_POST['address']) ? $_POST['address'] : '' ?>" placeholder="Địa chỉ">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="phone_number" value="<?php isset($_POST['phone_number']) ? $_POST['phone_number'] : '' ?>" placeholder="Số điện thoại">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="note" value="<?php isset($_POST['note']) ? $_POST['note'] : '' ?>" placeholder="Ghi chú">
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="padding-top: 15px;">
                                                <label>Chọn phương thức thanh toán</label> <br />
                                                <input type="radio" name="payment_method" value="0" /> Thanh toán trực tuyến <br />
                                                <input type="radio" name="payment_method" checked value="1" /> COD (dựa vào địa chỉ của bạn) <br />
                                            </div>
                                            <div class="col-md-12">
                                                <div class="contact-btn text-center">
                                                    <input type="submit" class="fv-btn" name="submit" value="ĐẶT HÀNG">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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
                            <div class="single-item__remove">
                                <a><i data-id="<?php echo $product_id; ?>" class="zmdi zmdi-delete delete-cart refresh-page"></i></a>
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
</div>
<!-- cart-main-area end -->
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