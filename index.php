<?php

   use controllers\ProductController;
   use controllers\OrderController;

   require('./views/header.php');
   $path = $_SERVER['REQUEST_URI'];
//   echo $path;
   session_start();

   spl_autoload_register(function ($class) {
      $class = str_replace('\\', '/', $class);
      require_once './'.$class . '.php';
   });


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