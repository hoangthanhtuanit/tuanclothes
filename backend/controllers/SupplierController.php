<?php
require_once 'controllers/Controller.php';
require_once 'models/Supplier.php';
require_once 'helpers/Helper.php';

class SupplierController extends Controller
{
    public function index(){
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->index();
        $this->title_page = 'Danh sách nhà cung cấp';
        $this->content = $this->render('views/suppliers/index.php', [
            'suppliers' => $suppliers
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
            $supplierModel = new Supplier();
            $suppliers = $supplierModel->index();
            foreach ($suppliers as $value) {
                $supplier_name[] = $value['name'];
            }
            if (empty($name)) {
                $this->error = 'Tên không được để trống';
            } elseif (strlen($name) < 5) {
                $this->error = 'Tên không được ít hơn 5 ký tự';
            } elseif (in_array($name, $supplier_name)) {
                $this->error = 'Nhà cung cấp đã tồn tại';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $this->error = 'Email không đúng định dạng';
            } elseif (empty($phone_number)) {
                $this->error = 'Số điện thoại không được để trống';
            } elseif (empty($address)) {
                $this->error = 'Địa chỉ không được để trống';
            } else {
                $supplierModel->name = $name;
                $supplierModel->phone_number = $phone_number;
                $supplierModel->address = $address;
                $supplierModel->email = $email;
                $isInsert = $supplierModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=supplier&action=index');
                exit();
            }
        }
        $this->title_page = 'Thêm nhà cung cấp';
        $this->content = $this->render('views/suppliers/create.php');
        require_once 'views/layouts/main.php';
    }

    public function update($id){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=supplier&action=index');
            exit();
        }
        $id = $_GET['id'];
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->index();
        $supplier  = $supplierModel->getSupplierById($id);
        foreach ($suppliers as $value) {
            $supplier_name[] = $value['name'];
        }
        $key_del = array_search($supplier['name'], $supplier_name);
        unset($supplier_name["$key_del"]);
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
            if (empty($name)) {
                $this->error = 'Tên không được để trống';
            } elseif (strlen($name) < 5) {
                $this->error = 'Tên không được ít hơn 5 ký tự';
            } elseif (in_array($name, $supplier_name)) {
                $this->error = 'Nhà cung cấp đã tồn tại';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
                $this->error = 'Email không đúng định dạng';
            } elseif (empty($phone_number)) {
                $this->error = 'Số điện thoại không được để trống';
            } elseif (empty($address)) {
                $this->error = 'Địa chỉ không được để trống';
            } else {
                $supplierModel->name = $name;
                $supplierModel->phone_number = $phone_number;
                $supplierModel->address = $address;
                $supplierModel->email = $email;
                $supplierModel->updated_at = date('Y-m-d H:i:s');
                $isUpdate = $supplierModel->update($id);
                if ($isUpdate) {
                    Helper::flash('success', 'Cập nhật thành công');
                } else {
                    Helper::flash('error', 'Cập nhật thất bại');
                }
                header('Location: index.php?controller=supplier&action=index');
                exit();
            }
        }
        $this->title_page = 'Cập nhật nhà cung cấp';
        $this->content = $this->render('views/suppliers/update.php', [
            'supplier' => $supplier
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail($id){

    }

    public function delete($id){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=supplier&action=index');
            exit();
        }
        $id = $_GET['id'];
        $supplierModel = new Supplier();
        $isDelete = $supplierModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=supplier&action=index');
        exit();
    }
}