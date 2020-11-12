<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class LoginController extends Controller
{
    public function index(){
        if (isset($_SESSION['user'])) {
            header('Location: index.php?controller=dashboard&action=index');
            exit();
        }
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if (empty($email) || empty($password)) {
                $this->error = 'Email hoặc password không được để trống';
            }
            if (empty($this->error)) {
                $userModel = new User();
                $user = $userModel->getUserByEmailAndPassword($email, $password);
                if (empty($user)) {
                    $this->error = 'Sai email hoặc password';
                } else {
                    $_SESSION['user'] = $user;
                    if ($user) {
                        Helper::flash('success', 'Đăng nhập thành công');
                    } else {
                        Helper::flash('error', 'Đăng nhập thất bại');
                    }
                    header("Location: index.php?controller=dashboard&action=index");
                    exit();
                }
            }
        }
        $this->title_page = 'Đăng nhập quản trị viên';
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }

    public function logout()
    {
        
    }
}