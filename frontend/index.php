<?php
//File index.php gốc của ứng dụng
session_start();
require_once 'helpers/Helper.php';
date_default_timezone_set("Asia/Ho_Chi_Minh");
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$controller = ucfirst($controller);
$controller .= "Controller";
$path_controller = "controllers/$controller.php";
if (!file_exists($path_controller)) {
    die("Trang bạn tìm không tồn tại");
}
require_once "$path_controller";
$object = new $controller();
if (!method_exists($object, $action)) {
    die("Phương thức $action không tồn tại trong class $controller");
}
$object->$action();
