<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function index() {
        if (isset($_POST['submit'])) {
            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                if ($_POST[$product_id] < 0) {
                    Helper::flash('error', 'Số lượng phải > 0');
                    header("Location: gio-hang.html");
                    exit();
                }
            }

            foreach ($_SESSION['cart'] AS $product_id => $cart) {
                $_SESSION['cart'][$product_id]['quantity']
                    = $_POST[$product_id];
            }
            Helper::flash('success', 'Cập nhật giỏ hàng thành công');
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $this->title_page = 'Giỏ hàng';
        $this->content = $this->render('views/carts/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function addCart() {
        if (isset($_POST['id']) && isset($_POST['quantity']) && $_POST['size']) {
            $id =  $_POST['id'];
            $size = isset($_POST['size']) ? $_POST['size'] : 'M';
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
            $productModel = new Product();
            $product = $productModel->getProductById($id);
            $cart[$id] = [
                'name' => $product['name'],
                'size' => $size,
                'quantity' => $quantity,
                'price' => $product['price'],
                'discount' => $product['discount'],
                'image' => $product['image']
            ];
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'][$id] = $cart;
            } else {
                if (!array_key_exists($id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$id] = $cart;
                } else {
                    $_SESSION['cart'][$id] = [
                        'name' => $product['name'],
                        'size' => $size,
                        'quantity' => (int)$_SESSION['cart'][$id]['quantity'] + $quantity,
                        'price' => $product['price'],
                        'discount' => $product['discount'],
                        'image' => $product['image']
                    ];
                }
            }
        }
    }
}