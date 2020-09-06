<?php
require_once 'controllers/Controller.php';
require_once 'models/Banner.php';
require_once 'helpers/Helper.php';

class BannerController extends Controller
{
    public function index(){
        $bannerModel = new Banner();
        $banners = $bannerModel->index();
        $this->title_page = 'Danh sách banner';
        $this->content = $this->render('views/banners/index.php', [
            'banners' => $banners
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $status = $_POST['status'];
            if (empty($title)) {
                $this->error = 'Tiêu đề không được để trống';
            } elseif (empty($summary)) {
                $this->error = 'Mô tả ngắn không được để trống';
            } elseif ($_FILES['image']['error'] == 0) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arrExtension = ['jpg', 'png', 'jpeg', 'gif'];
                $fileSize = $_FILES['image']['size'] / 1024 / 1024;
                $fileSize = round($fileSize, 2);
                if (!in_array($extension, $arrExtension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } elseif ($fileSize > 3) {
                    $this->error = 'File không được quá 3MB';
                }
            }
            if (empty($this->error)) {
                $filename = '';
                if ($_FILES['image']['error'] == 0) {

                }
            }
        }
    }

    public function update(){

    }

    public function detail(){

    }

    public function delete(){

    }
}