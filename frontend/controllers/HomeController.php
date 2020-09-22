<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Banner.php';
require_once 'models/Blog.php';

class HomeController extends Controller
{
    public function index()
    {
        $productModel = new Product();
        $newProducts = $productModel->getNewProduct();
        $hotProducts = $productModel->getHotProduct();
        $topProducts = $productModel->getTopRateProduct();
        $saleProducts = $productModel->getSaleProduct();

        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        $bannerModel =  new Banner();
        $banners = $bannerModel->getAllBanner();

        $blogModel = new Blog();
        $blogs = $blogModel->getBlog();

        $this->title_page = 'Trang chủ';
        $this->content = $this->render('views/homes/index.php', [
            'newProducts' => $newProducts,
            'hotProducts' => $hotProducts,
            'topProducts' => $topProducts,
            'saleProducts' => $saleProducts,
            'categories' => $categories,
            'banners' => $banners,
            'blogs' => $blogs
        ]);
        require_once 'views/layouts/main.php';
    }
}