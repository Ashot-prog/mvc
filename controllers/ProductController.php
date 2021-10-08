<?php
    namespace controllers;

    use models\ProductModel;
    use db\DB;


    class ProductController  
    {
        private $model;

        public function __construct()
        {
            $this->model = new ProductModel();
        }

        public function index()
        {
            $products =  $this->model->getAll();
            ob_start();
            require_once $_SERVER['DOCUMENT_ROOT'].'/views/main.php';
            $out = ob_get_clean();
            return $out;
        }

        public function add()
        {
            $errors = [];
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if(empty($_POST['name'])) {
                    $errors['name'] = 'name is required';
                } elseif(empty($_POST['description'])) {
                    $errors['description'] = 'description is required';
                } elseif(empty($_POST['price'])) {
                    $errors['price'] = 'price is required';
                } else {
                    $addmesaage = 'Product Added';
                    $this->model->create($_POST['name'],$_POST['description'],$_POST['price']);
                }
            }
            ob_start();
            require_once $_SERVER['DOCUMENT_ROOT'].'/views/add.php';
            $out = ob_get_clean();
            return $out;
        }


        public function products()
        {

            $selected = new ProductModel();
            $selected->getSelected();
            $errors = array();
            ob_start();
            require_once $_SERVER['DOCUMENT_ROOT'].'/views/products.php';
            $out = ob_get_clean();
            return $out;
        }

    }
