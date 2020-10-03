<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'helpers/Helper.php';

class OrderController extends Controller
{
    public function index(){
        $orderModel = new Order();
        $orders = $orderModel->index();
        $this->title_page = 'Danh sách đơn hàng';
        $this->content = $this->render('views/orders/index.php', [
            'orders' => $orders
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=order&action=index');
            exit();
        }
        $id = $_GET['id'];
        $orderModel = new Order();
        $order_details = $orderModel->getOrderById($id);
        $this->title_page = 'Chi tiết đơn hàng';
        $this->content = $this->render('views/orders/detail.php', [
            'order_details' => $order_details
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=order&action=index');
            exit();
        }

        if (!isset($_GET['status'])) {
            Helper::flash('error', 'Trạng thái không hợp lệ');
            header('Location: index.php?controller=order&action=index');
            exit();
        }
        $id = $_GET['id'];
        $status = $_GET['status'];
        $orderModel = new Order();
        $order = $orderModel->getOrderById($id);
        if ($order) {
            switch ($status) {
                case 'process':
                    $orderModel->status = 1;
                    break;
                case 'success':
                    $orderModel->status = 2;
                    break;
                case 'cancel':
                    $order->status = 3;
                    break;
            }
            $orderModel->updated_at = date('Y-m-d H:i:s');
            $isUpdate = $orderModel->update($id);
            if ($isUpdate) {
                Helper::flash('success', 'Xử lý thành công');
            } else {
                Helper::flash('error', 'Xử lý thất bại');
            }
            header('Location: index.php?controller=order&action=index');
            exit();
        }
    }

    public function delete(){
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            Helper::flash('error', 'ID không hợp lệ');
            header('Location: index.php?controller=order&action=index');
            exit();
        }
        $id = $_GET['id'];
        $orderModel = new Order();
        $isDelete = $orderModel->delete($id);
        if ($isDelete) {
            Helper::flash('success', 'Xoá thành công');
        } else {
            Helper::flash('error', 'Xoá thành công');
        }
        header('Location: index.php?controller=order&action=index');
        exit();
    }
}