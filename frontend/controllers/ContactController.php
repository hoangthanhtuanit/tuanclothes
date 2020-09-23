<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';
require_once 'models/Category.php';

class ContactController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        $this->title_page = 'Liên hệ';
        $this->content = $this->render('views/contacts/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
}