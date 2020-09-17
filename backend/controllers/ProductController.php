<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/Supplier.php';
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
        $arrName = [];
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $supplier_id = $_POST['supplier_id'];
            $name = $_POST['name'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $quantity_in_stock = $_POST['quantity_in_stock'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $productModel = new Product();
            $products = $productModel->index();
            foreach ($products as $value) {
                $arrName[] = $value['name'];
            }
            if (empty($category_id)) {
                $this->error = 'Danh mục không được để trống';
            } elseif (empty($supplier_id)) {
                $this->error = 'Nhà cung cấp không được để trống';
            } elseif (empty($name)) {
                $this->error = 'Tên sản phẩm không được để trống';
            } elseif (in_array($name, $arrName)) {
                $this->error = 'Sản phẩm đã tồn tại';
            } elseif (empty($color)) {
                $this->error = 'Màu không được để trống';
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
                $productModel->category_id = $category_id;
                $productModel->supplier_id = $supplier_id;
                $productModel->name = $name;
                $productModel->image = $filename;
                $productModel->color = $color;
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

        $categoryModel = new Category();
        $categories = $categoryModel->index();
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->index();
        $this->title_page = 'Thêm mới sản phẩm';
        $this->content = $this->render('views/products/create.php', [
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $arrName = [];
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $supplier_id = $_POST['supplier_id'];
            $name = $_POST['name'];
            $color = $_POST['color'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $quantity_in_stock = $_POST['quantity_in_stock'];
            $summary = $_POST['summary'];
            $description = $_POST['description'];
            $status = $_POST['status'];
            $products = $productModel->index();
            foreach ($products as $value) {
                $arrName[] = $value['name'];
            }
            $key_del = array_search($product['name'], $arrName);
            unset($arrName["$key_del"]);
            if (empty($category_id)) {
                $this->error = 'Danh mục không được để trống';
            } elseif (empty($supplier_id)) {
                $this->error = 'Nhà cung cấp không được để trống';
            } elseif (empty($name)) {
                $this->error = 'Tên sản phẩm không được để trống';
            } elseif (in_array($name, $arrName)) {
                $this->error = 'Sản phẩm đã tồn tại';
            } elseif (empty($color)) {
                $this->error = 'Màu không được để trống';
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
                $filename = $product['image'];
                if ($_FILES['image']['error'] == 0) {
                    $dirUploads = __DIR__ . '/../assets/uploads/products';
                    @unlink($dirUploads . '/' . $filename);
                    if (!file_exists($dirUploads)) {
                        mkdir($dirUploads);
                    }
                    $filename = time() . '-product-' . $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $destination = $dirUploads . '/' . $filename;
                    move_uploaded_file($tmp_name, $destination);
                }
                $productModel->category_id = $category_id;
                $productModel->supplier_id = $supplier_id;
                $productModel->name = $name;
                $productModel->image = $filename;
                $productModel->color = $color;
                $productModel->price = $price;
                $productModel->discount = $discount;
                $productModel->quantity_in_stock = $quantity_in_stock;
                $productModel->summary = $summary;
                $productModel->description = $description;
                $productModel->status = $status;
                $isUpdate = $productModel->update($id);
                if ($isUpdate) {
                    Helper::flash('success', 'Cập nhật thành công');
                } else {
                    Helper::flash('error', 'Cập nhật thất bại');
                }
                header('Location: index.php?controller=product&action=index');
                exit();
            }
        }
        $categoryModel = new Category();
        $categories = $categoryModel->index();
        $supplierModel = new Supplier();
        $suppliers = $supplierModel->index();
        $this->title_page = 'Cập nhật sản phẩm';
        $this->content = $this->render('views/products/update.php', [
            'product' => $product,
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        $this->title_page = 'Chi tiết sản phẩm';
        $this->content = $this->render('views/products/detail.php', [
            'product' => $product
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=product&action=index');
            exit();
        }
        $id = $_GET['id'];
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        $file_url = 'assets/uploads/products/' . $product['image'];
        @unlink($file_url);
        $isDelete = $productModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=product&action=index');
        exit();
    }
}