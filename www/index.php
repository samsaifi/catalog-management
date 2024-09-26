<?php
ob_start();
require_once 'controllers/ProductController.php';
$controller = new ProductController();
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'delete':
        $controller->delete($_GET['id']);
        break;
    default:
        $controller->index();
        break;
}
ob_end_flush();
