<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'helpers/Helper.php';

class CategoryController extends Controller
{
    public function __construct(){
        if (!isset($_SESSION['user_admin'])) {
            Helper::flash('error', 'Đăng nhập để tiếp tục');
            header('Location: dang-nhap.html');
            exit();
        }
    }

    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->index();
        $this->title_page = 'Danh sách danh mục sản phẩm';
        $this->content = $this->render('views/categories/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        $category_name = [];
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            $categoryModel = new Category();
            $categories = $categoryModel->index();
            foreach ($categories as $item) {
                $category_name[] = $item['name'];
            }
            if (empty($name)) {
                $this->error = 'Tên không được để trống';
            } elseif (strlen($name) < 5) {
                $this->error = 'Tên không được ít hơn 5 ký tự';
            } elseif (in_array($name, $category_name)) {
                $this->error = 'Danh mục đã tồn tại';
            } else {
                $categoryModel->name = $name;
                $categoryModel->status = $status;
                $isInsert = $categoryModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/categories/create.php');
        $this->title_page = 'Thêm mới danh mục';
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=category&action=index');
            exit();
        }

        $id = $_GET['id'];
        $categoryModel = new Category();
        $categories = $categoryModel->index();
        $category   = $categoryModel->getCategoryById($id);
        foreach ($categories as $item) {
            $category_name[] = $item['name'];
        }
        $key_del = array_search($category['name'], $category_name);
        unset($category_name["$key_del"]);
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $status = $_POST['status'];
            if (empty($name)) {
                $this->error = 'Tên không được để trống';
            } elseif (strlen($name) < 5) {
                $this->error = 'Tên không được ít hơn 5 ký tự';
            } elseif (in_array($name, $category_name)) {
                $this->error = 'Danh mục đã tồn tại';
            } else {
                $categoryModel->name = $name;
                $categoryModel->status = $status;
                $categoryModel->updated_at = date('Y-m-d H:i:s');
                $isUpdate = $categoryModel->update($id);
                if ($isUpdate) {
                    Helper::flash('success', 'Cập nhật thành công');
                } else {
                    Helper::flash('error', 'Cập nhật thất bại');
                }
                header('Location: index.php?controller=category&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/categories/update.php', [
            'category' => $category
        ]);
        $this->title_page = 'Cập nhật danh mục';
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=category&action=index');
            exit();
        }
        $id = $_GET['id'];
        $categoryModel = new Category();
        $isDelete = $categoryModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=category&action=index');
        exit();
    }
}