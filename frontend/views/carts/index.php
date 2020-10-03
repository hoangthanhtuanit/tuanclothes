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
                            <span class="breadcrumb-item active">Giỏ hàng</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <?php if (isset($_SESSION['cart'])) : ?>
                    <form action="#" method="post">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh sản phẩm</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Thành tiền</th>
                                    <th class="product-remove">Xoá</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $total_cart = 0;
                                foreach ($_SESSION['cart'] as $product_id => $product) :
                                $slug = Helper::getSlug($product['name']);
                                $product_link = "san-pham/$product_id/$slug.html";
                                ?>
                                <tr>
                                    <td class="product-thumbnail"><a href="<?php echo $product_link; ?>"><img width="150" height="200" src="../backend/assets/uploads/products/<?php echo $product['image']; ?>"
                                                                                   alt="product img"/></a></td>
                                    <td class="product-name"><a href="<?php echo $product_link; ?>"><?php echo $product['name']; ?></a>
                                        <ul class="pro__prize">
                                            <li class="old__prize">$<?php echo number_format($product['price'], 0, '.', '.') ?></li>
                                            <li>$<?php echo number_format($product['price'] * (100 - $product['discount']) / 100, 0, '.', '.') ?></li>
                                        </ul>
                                    </td>
                                    <td class="product-price"><span class="amount">$<?php echo number_format($product['price'] * (100 - $product['discount']) / 100, 0, '.', '.') ?></span></td>
                                    <td class="product-quantity"><input onchange="return updateCart(this.value, <?php echo $product_id; ?>);" type="number" value="<?php echo $product['quantity']; ?>"/></td>
                                    <td class="product-subtotal">
                                        <?php
                                        $total_item = $product['quantity'] * $product['price'] * (100 - $product['discount']) / 100;
                                        $total_cart += $total_item;
                                        ?>
                                        $<?php echo number_format($total_item, 0, '.', '.') ?>
                                    </td>
                                    <td class="product-remove"><a data-id="<?php echo $product_id; ?>" class="delete-cart refresh-page"><i class="icon-trash icons"></i></a></td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="danh-sach-san-pham.html">Tiếp tục mua hàng</a>
                                    </div>
                                    <div class="buttons-cart checkout--btn">
                                        <button type="submit"><a href="thanh-toan.html">Tiến hành thanh toán</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="ht__coupon__code">
                                    <span>Nhập mã giảm giá</span>
                                    <div class="coupon__box">
                                        <input type="text" placeholder="Mã giảm giá">
                                        <div class="ht__cp__btn">
                                            <a href="#">Nhập</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                <div class="htc__cart__total">
                                    <h6>Đơn hàng</h6>
                                    <div class="cart__desk__list">
                                        <ul class="cart__desc">
                                            <li>Tổng tiền</li>
                                            <li>Phí giao hàng</li>
                                        </ul>
                                        <ul class="cart__price text-right">
                                            <li>$<?php echo number_format($total_cart, 0, '.', '.') ?></li>
                                            <li>Miễn phí</li>
                                        </ul>
                                    </div>
                                    <div class="cart__total">
                                        <span>Tổng thanh toán</span>
                                        <span>$<?php echo number_format($total_cart, 0, '.', '.') ?></span>
                                    </div>
                                    <ul class="payment__btn">
                                        <li class="active"><a href="thanh-toan.html">Thanh Toán</a></li>
                                        <li><a href="danh-sach-san-pham.html">Tiếp tục mua hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php else: ?>
                    <h3 style="font-size: 25px;" class="text-center">Không có sản phẩm nào trong giỏ hàng</h3>
                    <div style="padding-top: 25px;" class="buttons-cart text-center">
                        <a href="danh-sach-san-pham.html">Tiếp tục mua hàng</a>
                    </div>
                <?php endif; ?>
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
<script type="text/javascript">
    function updateCart(quantity, product_id) {
        $.get(
            'index.php?controller=cart&action=updateCart',
            {
                quantity: quantity,
                product_id: product_id
            },
            function () {
                location.reload();
            }
        );
    }
</script>