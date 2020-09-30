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
                            <span class="breadcrumb-item active">Liên hệ</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="map-contacts--2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7447.595052011125!2d105.774732!3d21.040786!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x70d71b071349fa94!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gRGV2cHJvIFZp4buHdCBOYW0!5e0!3m2!1svi!2sus!4v1600856607338!5m2!1svi!2sus" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <h2 class="title__line--6">LIÊN HỆ VỚI CHÚNG TÔI</h2>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Địa chỉ</h2>
                        <p>Số 147, Phố Mai Dịch, Cầu Giấy, Hà Nội </p>
                    </div>
                </div>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-envelope icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Giờ mở cửa</h2>
                        <p>07:00 am - 21:00 pm </p>
                    </div>
                </div>

                <div class="address">
                    <div class="address__icon">
                        <i class="icon-phone icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Số điện thoại</h2>
                        <p>036.408.1626</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">GỬI LIÊN HỆ</h2>
                    </div>
                </div>
                <div class="col-xs-12">
                    <form id="contact-form" action="#" method="post">
                        <?php require_once 'views/layouts/error.php'; ?>
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" name="full_name" value="<?php isset($_POST['full_name']) ? $_POST['full_name'] : '' ?>" placeholder="Họ tên (*)">
                                <input type="text" name="email" value="<?php isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Email (*)">
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box subject">
                                <input type="text" name="subject" value="<?php isset($_POST['subject']) ? $_POST['subject'] : '' ?>" placeholder="Tiêu đề (*)">
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="message" placeholder="Tin nhắn (*)"><?php isset($_POST['message']) ? $_POST['message'] : '' ?></textarea>
                            </div>
                        </div>
                        <div class="contact-btn">
                            <input type="submit" class="fv-btn" name="submit" value="GỬI">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Area -->