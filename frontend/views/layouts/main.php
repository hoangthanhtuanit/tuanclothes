<!doctype html>
<html class="no-js" lang="en">
<head>
    <base href="http://localhost/Tuan_MVC/frontend/"/>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $this->title_page; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="assets/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/toastr.css"/>

    <!-- Modernizr JS -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>

<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <?php require_once 'header.php'; ?>
    <!-- End Header Area -->
    <?php echo $this->content; ?>
    <!-- Start Footer Area -->
    <?php require_once 'footer.php'; ?>
    <!-- End Footer Style -->
</div>
<!-- Body main wrapper end -->

<!-- Placed js at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- All js plugins included in this file. -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<!-- Waypoints.min.js. -->
<script src="assets/js/waypoints.min.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="assets/js/main.js"></script>
<script type="text/javascript">
    <?php if (isset($_SESSION['success'])) : ?>
    toastr.success("<?php echo Helper::flash('success') ?>");
    <?php elseif (isset($_SESSION['error'])) : ?>
    toastr.error("<?php echo Helper::flash('error') ?>");
    <?php endif; ?>
</script>

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
</body>

</html>