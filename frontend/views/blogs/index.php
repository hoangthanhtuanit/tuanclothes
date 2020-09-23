<div class="ht__bradcaump__area"
     style="background: rgba(0, 0, 0, 0) url(assets/images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.php?controller=home&action=index">Trang chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Tin tức</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Blog Area -->
<section class="htc__blog__area bg__white ptb--100" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="ht__blog__wrap clearfix">
                <?php foreach ($blogs as $blog) : ?>
                    <!-- Start Single Blog -->
                    <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12" style="padding: 15px;">
                        <div class="blog">
                            <div class="blog__thumb">
                                <a href="index.php?controller=blog&action=detail&id=<?php echo $blog['id']; ?>">
                                    <img width="400" height="287" src="assets/uploads/blogs/<?php echo $blog['image']; ?>" alt="blog images">
                                </a>
                            </div>
                            <div class="blog__details text-justify">
                                <div class="bl__date">
                                    <span><?php echo date('d/m/Y', strtotime($blog['created_at'])) ?></span>
                                </div>
                                <h2><a href="index.php?controller=blog&action=detail&id=<?php echo $blog['id']; ?>"><?php echo $blog['title'] ?></a></h2>
                                <p><?php echo $blog['summary']; ?></p>
                                <div class="blog__btn">
                                    <a href="index.php?controller=blog&action=detail&id=<?php echo $blog['id']; ?>">Xem thêm</a>
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