<?php
require_once 'controllers/Controller.php';
require_once 'models/Blog.php';
require_once 'models/Category.php';

class BlogController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();
        $blogModel = new Blog();
        $blogs = $blogModel->getAllBlog();
        $this->title_page = 'Chi tiết tin';
        $this->content = $this->render('views/blogs/index.php', [
            'categories' => $categories,
            'blogs' =>$blogs
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
        $bannerModel =  new Blog();
        $blog = $bannerModel->getBlogById($id);

        $this->title_page = 'Chi tiết tin';
        $this->content = $this->render('views/blogs/detail.php', [
            'categories' => $categories,
            'blog' =>$blog
        ]);
        require_once 'views/layouts/main.php';
    }
}