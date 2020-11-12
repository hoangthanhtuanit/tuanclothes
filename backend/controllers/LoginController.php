<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'helpers/Helper.php';

class LoginController extends Controller
{
    public function index(){
        if (isset($_SESSION['user_admin'])) {
            header('Location: trang-dieu-khien.html');
            exit();
        }
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if (empty($email) || empty($password)) {
                $this->error = 'Email và mật khẩu không được để trống';
            }
            if (empty($this->error)) {
                $userModel = new User();
                $user = $userModel->getUserByEmailAndPassword($email, $password);
                if (empty($user)) {
                    $this->error = 'Sai email hoặc mật khẩu';
                } else if ($user['level'] != 1 || $user['status'] != 1) {
                    $this->error = 'Bạn không được cấp quyền truy cập trang';
                } else {
                    $_SESSION['user_admin'] = $user;
                    if ($user) {
                        Helper::flash('success', 'Đăng nhập thành công');
                    } else {
                        Helper::flash('error', 'Đăng nhập thất bại');
                    }
                    header("Location: trang-dieu-khien.html");
                    exit();
                }
            }
        }
        $this->title_page = 'Đăng nhập quản trị viên';
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }

    public function logout(){
        if (!empty($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
        }
        header("Location: dang-nhap.html");
        exit();
    }
}