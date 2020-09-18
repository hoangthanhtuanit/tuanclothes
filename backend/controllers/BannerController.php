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
            $status = $_POST['status'];
            if ($_FILES['image']['error'] == 0) {
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
                    $dirUploads = __DIR__ . '/../assets/uploads/banners';
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-banner-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $bannerModel = new Banner();
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
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=banner&action=index');
            exit();
        }
        $id = $_GET['id'];
        $bannerModel = new Banner();
        $banner = $bannerModel->getBannerById($id);
        if (isset($_POST['submit'])) {
            $status = $_POST['status'];
            if ($_FILES['image']['error'] == 0) {
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
                $filename = $banner['image'];
                if ($_FILES['image']['error'] == 0) {
                    $dirUploads = __DIR__ . '/../assets/uploads/banners';
                    @unlink($dirUploads . '/' . $filename);
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-banner-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }

                $bannerModel->image = $filename;
                $bannerModel->status = $status;
                $bannerModel->updated_at = date('Y-m-d H:i:s');
                $isUpdate = $bannerModel->update($id);
                if ($isUpdate) {
                    Helper::flash('success', 'Cập nhật thành công');
                } else {
                    Helper::flash('error', 'Cập nhật thất bại');
                }
                header('Location: index.php?controller=banner&action=index');
                exit();
            }
        }
        $this->title_page = 'Cập nhật banner';
        $this->content = $this->render('views/banners/update.php', [
            'banner' => $banner
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=banner&action=index');
            exit();
        }
        $id = $_GET['id'];
        $bannerModel = new Banner();
        $banner = $bannerModel->getBannerById($id);
        $this->title_page = 'Chi tiết banner';
        $this->content = $this->render('views/banners/detail.php', [
            'banner' => $banner
        ]);
        require_once 'views/layouts/main.php';
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
        $file_url = 'assets/uploads/banners/' . $banner['image'];
        @unlink($file_url);
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