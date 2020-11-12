<?php
require_once 'controllers/Controller.php';

class DashboardController extends Controller
{
    public function __construct(){
        if (!isset($_SESSION['user_admin'])) {
            Helper::flash('error', 'Đăng nhập để tiếp tục');
            header('Location: dang-nhap.html');
            exit();
        }
    }

    public function index()
    {
        $this->title_page = 'Trang thống kê';
        $this->content = $this->render('views/dashboard/index.php');
        require_once 'views/layouts/main.php';
    }
}