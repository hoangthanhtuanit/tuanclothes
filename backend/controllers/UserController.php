<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'helpers/Helper.php';

class UserController extends Controller
{
    public function __construct(){
        if (!isset($_SESSION['user_admin'])) {
            Helper::flash('error', 'Đăng nhập để tiếp tục');
            header('Location: dang-nhap.html');
            exit();
        }
    }

    public function index(){
        $userModel = new User();
        $users = $userModel->index();
        $this->title_page = 'Danh sách người dùng';
        $this->content = $this->render('views/users/index.php', [
            'users' => $users
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        $user_info = [];
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $level = $_POST['level'];
            $status = $_POST['status'];
            $userModel = new User();
            $users = $userModel->index();
            foreach ($users as $item) {
                $user_info[] = $item['email'];
            }
            if (empty($email)) {
                $this->error = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } elseif (in_array($email, $user_info)) {
                $this->error = 'Email đã tồn tại';
            } elseif (empty($password)) {
                $this->error = 'Mật khẩu không được để trống';
            } elseif (strlen($password) < 6) {
                $this->error = 'Mật khẩu phải nhiều hơn 6 ký tự';
            } elseif (empty($full_name)) {
                $this->error = 'Họ tên không được để trống';
            } elseif (empty($phone_number)) {
                $this->error = 'Số điện thoại không được để trống';
            } elseif (empty($address)) {
                $this->error = 'Địa chỉ không được để trống';
            } elseif ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arrExtension = ['jpg', 'png', 'jpeg', 'gif'];
                $fileSize = $_FILES['avatar']['size'] / 1024 / 1024;
                $fileSize = round($fileSize, 2);
                if (!in_array($extension, $arrExtension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } elseif ($fileSize > 3) {
                    $this->error = 'File không được quá 3MB';
                }
            }
            if (empty($this->error)) {
                $filename = '';
                if ($_FILES['avatar']['error'] == 0) {
                    $dirUploads = __DIR__ . '/../assets/uploads/users';
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    $tmp_name = $_FILES['avatar']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $userModel->email = $email;
                $userModel->password = md5($password);
                $userModel->full_name = $full_name;
                $userModel->phone_number = $phone_number;
                $userModel->address = $address;
                $userModel->avatar = $filename;
                $userModel->level = $level;
                $userModel->status = $status;
                $isInsert = $userModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=user&action=index');
                exit();
            }
        }
        $this->title_page = 'Thêm mới người dùng';
        $this->content = $this->render('views/users/create.php');
        require_once 'views/layouts/main.php';
    }

    public function update(){
        $user_info = [];
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=user&action=index');
            exit();
        }
        $id = $_GET['id'];
        $userModel = new User();
        $user = $userModel->getUserById($id);
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $level = $_POST['level'];
            $status = $_POST['status'];
            $users = $userModel->index();
            foreach ($users as $item) {
                $user_info[] = $item['email'];
            }
            $key_del = array_search($user['email'], $user_info);
            unset($user_info["$key_del"]);
            if (empty($email)) {
                $this->error = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } elseif (in_array($email, $user_info)) {
                $this->error = 'Email đã tồn tại';
            } elseif (empty($password)) {
                $this->error = 'Mật khẩu không được để trống';
            } elseif (strlen($password) < 6) {
                $this->error = 'Mật khẩu phải nhiều hơn 6 ký tự';
            } elseif (empty($full_name)) {
                $this->error = 'Họ tên không được để trống';
            } elseif (empty($phone_number)) {
                $this->error = 'Số điện thoại không được để trống';
            } elseif (empty($address)) {
                $this->error = 'Địa chỉ không được để trống';
            } elseif ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arrExtension = ['jpg', 'png', 'jpeg', 'gif'];
                $fileSize = $_FILES['avatar']['size'] / 1024 / 1024;
                $fileSize = round($fileSize, 2);
                if (!in_array($extension, $arrExtension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } elseif ($fileSize > 3) {
                    $this->error = 'File không được quá 3MB';
                }
            }
            if (empty($this->error)) {
                $filename = $user['avatar'];
                if ($_FILES['avatar']['error'] == 0) {
                    $dirUploads = __DIR__ . '/../assets/uploads/users';
                    @unlink($dirUploads . '/' . $filename);
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    $tmp_name = $_FILES['avatar']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $userModel->email = $email;
                if ($password != $user['password']) {
                    $userModel->password = md5($password);
                } else {
                    $userModel->password = $password;
                }
                $userModel->full_name = $full_name;
                $userModel->phone_number = $phone_number;
                $userModel->address = $address;
                $userModel->avatar = $filename;
                $userModel->level = $level;
                $userModel->status = $status;
                $userModel->updated_at = date('Y-m-d H:i:s');
                $isUpdate = $userModel->update($id);
                if ($isUpdate) {
                    Helper::flash('success', 'Cập nhật thành công');
                } else {
                    Helper::flash('error', 'Cập nhật thất bại');
                }
                header('Location: index.php?controller=user&action=index');
                exit();
            }
        }
        $this->title_page = 'Cập nhật người dùng';
        $this->content = $this->render('views/users/update.php', [
            'user' => $user
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=user&action=index');
            exit();
        }
        $id = $_GET['id'];
        $userModel = new User();
        $user = $userModel->getUserById($id);
        $this->title_page = 'Chi tiết người dùng';
        $this->content = $this->render('views/users/detail.php', [
            'user' => $user
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=user&action=index');
            exit();
        }
        $id = $_GET['id'];
        $userModel = new User();
        $user = $userModel->getUserById($id);
        $file_url = 'assets/uploads/users/' . $user['avatar'];
        @unlink($file_url);
        $isDelete = $userModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=user&action=index');
        exit();
    }
}