<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $this->title_page = 'Giỏ hàng';
        $this->content = $this->render('views/carts/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function addCart(){
        $product_id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getProductById($product_id);
        $cart = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart;
        } else {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            } else {
                $_SESSION['cart'][$product_id] = $cart;
            }
        }
        echo "<pre>";
        print_r($_SESSION['cart']);
        echo "</pre>";
    }
}