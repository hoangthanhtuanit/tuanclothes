<?php
require_once 'controllers/Controller.php';
require_once 'helpers/Helper.php';
require_once 'models/Blog.php';

class BlogController extends Controller
{
    public function index(){
        $blogModel = new Blog();
        $blogs = $blogModel->index();
        $this->title_page = 'Danh sách tin tức';
        $this->content = $this->render('views/blogs/index.php', [
            'blogs' => $blogs
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            if (empty($title)) {
                $this->error = 'Tiêu đề tin không được để trống';
            } elseif (empty($summary)) {
                $this->error = 'Mô tả không được để trống';
            } elseif (empty($description)) {
                $this->error = 'Nội dung tin không được để trống';
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
                    $dirUploads = __DIR__ . '/../assets/uploads/blogs';
                    @unlink($dirUploads . '/' . $filename);
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-blog-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $blogModel = new Blog();
                $blogModel->title = $title;
                $blogModel->image = $filename;
                $blogModel->summary = $summary;
                $blogModel->description = $description;
                $blogModel->status = $status;
                $isUpdate = $blogModel->insert();
                if ($isUpdate) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=blog&action=index');
                exit();
            }
        }
        $this->title_page = 'Thêm mới tin tức';
        $this->content = $this->render('views/blogs/create.php');
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=blog&action=index');
            exit();
        }
        $id = $_GET['id'];
        $blogModel = new Blog();
        $blog = $blogModel->getBlogById($id);
        $this->title_page = 'Chi tiết tin tức';
        $this->content = $this->render('views/blogs/detail.php', [
            'blog' => $blog
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=blog&action=index');
            exit();
        }
        $id = $_GET['id'];
        $blogModel = new Blog();
        $blog = $blogModel->getBlogById($id);
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
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
                $filename = $blog['image'];
                if ($_FILES['image']['error'] == 0) {
                    $dirUploads = __DIR__ . '/../assets/uploads/blogs';
                    @unlink($dirUploads . '/' . $filename);
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-blog-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $blogModel = new Blog();
                $blogModel->title = $title;
                $blogModel->image = $filename;
                $blogModel->summary = $summary;
                $blogModel->description = $description;
                $blogModel->status = $status;
                $blogModel->updated_at = date('Y-m-d H:i:s');
                $isUpdate = $blogModel->update($id);
                if ($isUpdate) {
                    Helper::flash('success', 'Cập nhật thành công');
                } else {
                    Helper::flash('error', 'Cập nhật thất bại');
                }
                header('Location: index.php?controller=blog&action=index');
                exit();
            }
        }
        $this->title_page = 'Cập nhật tin tức';
        $this->content = $this->render('views/blogs/update.php', [
            'blog' => $blog
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=blog&action=index');
            exit();
        }
        $id = $_GET['id'];
        $blogModel = new Blog();
        $blog = $blogModel->getBlogById($id);
        $file_url = 'assets/uploads/blogs/' . $blog['image'];
        @unlink($file_url);
        $isDelete = $blogModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=blog&action=index');
        exit();
    }
}