<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';

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
}