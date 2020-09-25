<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                            <a href="index.php?controller=home&action=index"><img src="assets/images/logo/4.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="index.php?controller=home&action=index">Trang chủ</a></li>
                                <?php foreach ($categories as $category) : ?>
                                    <li class="drop"><a href="index.php?controller=product&action=showCategory&id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
                                <?php endforeach; ?>
                                <li class="drop"><a href="index.php?controller=blog&action=index">blog</a></li>
                                <li><a href="index.php?controller=contact&action=index">Liên hệ</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="index.php?controller=home&action=index">Trang chủ</a></li>
                                    <?php foreach ($categories as $category) : ?>
                                        <li><a href="index.php?controller=product&action=showCategory&id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
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
                                <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                <a href="#"><span class="htc__qua">2</span></a>
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