<?php
require_once 'models/Size.php';
require_once 'controllers/Controller.php';
require_once 'helpers/Helper.php';

class SizeController extends Controller
{
    public function __construct(){
        if (!isset($_SESSION['user_admin'])) {
            Helper::flash('error', 'Đăng nhập để tiếp tục');
            header('Location: dang-nhap.html');
            exit();
        }
    }

    public function index(){
        $sizeModel = new Size();
        $sizes = $sizeModel->index();
        $this->content = $this->render('views/sizes/index.php', [
            'sizes' => $sizes
        ]);
        $this->title_page = 'Danh sách kích thước';
        require_once 'views/layouts/main.php';
    }

    public function create(){
        $size_name = [];
        if (isset($_POST['submit'])) {
            $size = $_POST['size'];
            $sizeModel = new Size();
            $sizes = $sizeModel->index();
            foreach ($sizes as $value) {
                $size_name[] = $value['size'];
            }
            $arrSize = ['S', 'M', 'L', 'XL', 'XXL'];
            if (empty($size)) {
                Helper::flash('error', 'Kích thước không được trống');
            } elseif (!in_array($size, $arrSize)) {
                Helper::flash('error', 'Kích thước không đúng định dạng');
            } elseif (in_array($size, $size_name)) {
                Helper::flash('error', 'Kích thước đã tồn tại');
            } else {
                $sizeModel->size = $size;
                $isInsert = $sizeModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=size&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/sizes/create.php');
        $this->title_page = 'Thêm mới kích thước';
        require_once 'views/layouts/main.php';
    }
}