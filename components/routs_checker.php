<?php

use controllers\ProductController;
use controllers\OrderController;

$path = $_SERVER['REQUEST_URI'];

if($path == '/') {
    $productController = new ProductController();
    echo $productController->index();
} elseif ($path == '/add') {
    $productController = new ProductController();
    echo $productController->add();
} elseif ($path == '/products') {
    $productController = new ProductController();
    echo $productController->products();
} elseif ($path == '/order') {
    $orderController = new OrderController();
    echo $orderController->create();
}
