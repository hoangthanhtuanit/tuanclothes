<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'helpers/Helper.php';

class ProductController extends Controller
{
    public function detail(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=home&action=index');
            exit();
        }
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        $newProducts = $productModel->getNewProduct();

        $this->title_page = 'Chi tiết sản phẩm';
        $this->content = $this->render('views/products/detail.php',[
            'categories' => $categories,
            'product' => $product,
            'newProducts' => $newProducts
        ]);
        require_once 'views/layouts/main.php';
    }
}