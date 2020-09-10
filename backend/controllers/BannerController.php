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
                $this->error = 'Mô tả không được để trống';
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
                    $dirUploads = __DIR__ . '/../assets/uploads';
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-banner-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $bannerModel = new Banner();
                $bannerModel->title = $title;
                $bannerModel->summary = $summary;
                $bannerModel->image = $filename;
                $bannerModel->status = $status;
                $isInsert = $bannerModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=banner&action=index');
                exit();
            }
        }
        $this->title_page = 'Thêm mới banner';
        $this->content = $this->render('views/banners/create.php');
        require_once 'views/layouts/main.php';
    }

    public function update(){

    }

    public function detail(){

    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=banner&action=index');
            exit();
        }
        $id = $_GET['id'];
        $bannerModel = new Banner();
        $banner = $bannerModel->getBannerById($id);
        $file_url = 'assets/uploads/' . $banner['image'];
        unlink($file_url);
        $isDelete = $bannerModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=banner&action=index');
        exit();
    }
}