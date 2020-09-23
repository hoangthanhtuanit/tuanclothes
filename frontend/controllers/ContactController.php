<?php
require_once 'controllers/Controller.php';
require_once 'models/Contact.php';
require_once 'models/Category.php';
require_once 'helpers/Helper.php';

class ContactController extends Controller
{
    public function index(){
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategory();

        if (isset($_POST['submit'])) {
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            if (empty($full_name)) {
                $this->error = 'Họ tên không được để trống';
            } elseif (empty($email)) {
                $this->error = 'Email không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } elseif (empty($subject)) {
                $this->error = 'Tiêu đề không được để trống';
            } elseif (empty($message)) {
                $this->error = 'Nội dung liên hệ không được để trống';
            } else {
                $contactModel = new Contact();
                $contactModel->full_name = $full_name;
                $contactModel->email = $email;
                $contactModel->subject = $subject;
                $contactModel->message = $message;
                $isInsert = $contactModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Gửi thành công');
                } else {
                    Helper::flash('error', 'Gửi thất bại');
                }
                header('Location: index.php?controller=contact&action=index');
                exit();
            }
        }
        $this->title_page = 'Liên hệ';
        $this->content = $this->render('views/contacts/index.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }
}