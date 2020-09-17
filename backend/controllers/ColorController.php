<?php
require_once 'models/Color.php';
require_once 'controllers/Controller.php';
require_once 'helpers/Helper.php';

class ColorController extends Controller
{
    public function index(){
        $colorModel = new Color();
        $colors = $colorModel->index();
        $this->content = $this->render('views/colors/index.php', [
            'colors' => $colors
        ]);
        $this->title_page = 'Danh sách màu';
        require_once 'views/layouts/main.php';
    }

    public function create(){
        $color_name = [];
        if (isset($_POST['submit'])) {
            $color = $_POST['color'];
            $colorModel = new Color();
            $colors = $colorModel->index();
            foreach ($colors as $value) {
                $color_name[] = $value['color'];
            }
            if (empty($color)) {
                Helper::flash('error', 'Kích thước không được trống');
            } elseif (!preg_match('/^[a-zA-Z]$/', $color)) {
                Helper::flash('error', 'Kích thước không đúng định dạng');
            } elseif (in_array($color, $color_name)) {
                Helper::flash('error', 'Kích thước đã tồn tại');
            } else {
                $colorModel->color = $color;
                $isInsert = $colorModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=color&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/colors/create.php');
        $this->title_page = 'Thêm mới màu';
        require_once 'views/layouts/main.php';
    }
}