<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/Product.php';

class CartController extends Controller
{
    public function index(){
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

    public function addCart(){
        $product_id = $_POST['product_id'];
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        $product_model = new Product();
        $product = $product_model->getProductById($product_id);
        $cart = [
            'name' => $product['name'],
            'price' => $product['price'],
            'discount' => $product['discount'],
            'image' => $product['image'],
            'size' => $size,
            'quantity' => $quantity
        ];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart;
        } else {
            if (!array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id] = $cart;
            } else {
                $_SESSION['cart'][$product_id]['quantity'] = (int)$_SESSION['cart'][$product_id]['quantity'] + $quantity;
            }
        }
        Helper::flash('success', 'Thêm vào giỏ hàng thành công');
    }

    public function updateCart(){
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];
        $_SESSION['cart'][$product_id]['quantity'] =  $quantity;
        if ($quantity == 0) {
            unset($_SESSION['cart'][$product_id]);
            if (empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
            }
        }
        Helper::flash('success', 'Cập nhật giỏ hàng thành công');
    }

    public function delete(){
        $product_id = $_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        Helper::flash('success', 'Xoá sản phẩm thành công');
    }
}