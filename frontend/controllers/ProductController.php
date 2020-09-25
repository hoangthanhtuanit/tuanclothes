<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';
require_once 'helpers/Helper.php';
require_once 'models/Pagination.php';

class ProductController extends Controller
{
    public function showAll(){
        $params = [
            'total' => 5,
            'limit' => 12,
            'controller' => 'product',
            'action' => 'showAll',
            'full_mode' => FALSE,
        ];
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $productModel = new Product();
        $count_total = $productModel->countTotal();
        $params['total'] = $count_total;
        $params['page'] = $page;
        $pagination = new Pagination($params);
        $pages = $pagination->getPagination();
        $products = $productModel->getAllPagination($params);
        $topProducts = $productModel->getHotProduct();
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        $this->content = $this->render('views/products/show_all.php', [
            'products' => $products,
            'categories' => $categories,
            'topProducts' => $topProducts,
            'pages' => $pages
        ]);

        require_once 'views/layouts/main.php';
    }

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