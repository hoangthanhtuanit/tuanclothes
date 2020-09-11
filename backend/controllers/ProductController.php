<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'helpers/Helper.php';

class ProductController extends Controller
{
    public function index(){
        $productModel = new Product();
        $products = $productModel->index();
        $this->title_page = 'Danh sách sản phẩm';
        $this->content = $this->render('views/products/index.php', [
            'products' => $products
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $supplier_id = $_POST['supplier_id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $quantity_in_stock = $_POST['quantity_in_stock'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            if (empty($category_id)) {
                $this->error = 'Danh mục không được để trống';
            } elseif (empty($supplier_id)) {
                $this->error = 'Nhà cung cấp không được để trống';
            } elseif (empty($name)) {
                $this->error = 'Tên sản phẩm không được để trống';
            } elseif (empty($price)) {
                $this->error = 'Giá sản phẩm không được để trống';
            } elseif (!is_numeric($price)) {
                $this->error = 'Giá sản phẩm không hợp lệ';
            } elseif (empty($quantity_in_stock)) {
                $this->error = 'Số lượng sản phẩm nhập kho không được để trống';
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
                    $dirUploads = __DIR__ . '/../assets/uploads/products';
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-product-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $productModel = new Product();
                $productModel->name = $name;
                $productModel->image = $filename;
                $productModel->price = $price;
                $productModel->discount = $discount;
                $productModel->quantity_in_stock = $quantity_in_stock;
                $productModel->summary = $summary;
                $productModel->description = $description;
                $productModel->status = $status;
                $isInsert = $productModel->insert();
                if ($isInsert) {
                    Helper::flash('success', 'Thêm mới thành công');
                } else {
                    Helper::flash('error', 'Thêm mới thất bại');
                }
                header('Location: index.php?controller=product&action=index');
                exit();
            }
        }
        $this->title_page = 'Thêm mới sản phẩm';
        $this->content = $this->render('views/products/create.php');
        require_once 'views/layouts/main.php';
    }

    public function update(){

    }

    public function detail(){

    }

    public function delete(){

    }
}