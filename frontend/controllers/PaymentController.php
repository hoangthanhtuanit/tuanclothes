<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';

class PaymentController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        $this->title_page = 'Thanh toán';
        $this->content = $this->render('views/payments/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
}