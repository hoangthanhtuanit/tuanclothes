<?php
require_once 'configs/PHPMailer/src/PHPMailer.php';
require_once 'configs/PHPMailer/src/SMTP.php';
require_once 'configs/PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'models/Category.php';
require_once 'helpers/Helper.php';

class PaymentController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $price_total = 0;
        if (isset($_POST['submit'])) {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $note = $_POST['note'];
            $payment_method = $_POST['payment_method'];

            if (empty($full_name)) {
                $this->error = 'Họ tên không được để trống';
            } elseif (empty($email)) {
                $this->error = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email sai định dạng';
            } elseif (empty($address)) {
                $this->error = 'Địa chỉ không được để trống';
            }elseif (empty($phone_number)) {
                $this->error = 'Số điện thoại không được để trống';
            } else {
                $orderModel = new Order();
                $orderModel->full_name = $full_name;
                $orderModel->address = $address;
                $orderModel->phone_number = $phone_number;
                $orderModel->email = $email;
                $orderModel->note = $note;
                foreach ($_SESSION['cart'] as $product) {
                    $price_total += $product['quantity'] * $product['price'] * (100 - $product['discount']) / 100;
                }
                $orderModel->price_total = $price_total;
                $orderModel->payment_method = $payment_method;
                $orderModel->status = 0;
                $order_id = $orderModel->insert();
                $orderDetailModel = new OrderDetail();
                foreach ($_SESSION['cart'] AS $product_id => $product) {
                    $orderDetailModel->order_id = $order_id;
                    $orderDetailModel->product_id = $product_id;
                    $orderDetailModel->quantity = $product['quantity'];
                    $orderDetailModel->size = $product['size'];
                    $isInsert = $orderDetailModel->insert();
                }
                if ($isInsert) {
                    Helper::flash('success', 'Đặt hàng thành công');
                }
                if ($_SESSION['success']) {
                    if ($payment_method == 0) {
                        $_SESSION['payment_info'] = [
                            'price_total' => $price_total,
                            'full_name' => $full_name,
                            'email' => $email,
                            'phone_number' => $phone_number
                        ];
                        header("Location: thanh-toan-online.html");
                        exit();
                    } else {
                        header('Location: dat-hang-thanh-cong.html');
                        exit();
                    }
                }
            }
        }

        $this->title_page = 'Thanh toán';
        $this->content = $this->render('views/payments/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function thank(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $this->title_page = 'Thanh toán';
        $this->content = $this->render('views/payments/complete-order.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function online(){
        $this->content =
            $this->render('configs/nganluong/index.php');
        echo $this->content;
    }

    public function sendMail(){
        
    }
}