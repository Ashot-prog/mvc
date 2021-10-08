<?php
    namespace controllers;

    use models\ProductModel;

    class ProductController extends BaseController
    {
        private $model;

        public function __construct()
        {
            $this->model = new ProductModel();
        }

        public function index()
        {
            $products =  $this->model->getAll();
            return $this->render('main',compact('products'));


//            ob_start();
//            require_once $_SERVER['DOCUMENT_ROOT'].'/views/main.php';
//            $out = ob_get_clean();
//            return $out;
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
                    $this->model->create($_POST['name'],$_POST['description'],$_POST['price']);
                }
            }
            return $this->render('products',compact(''));


        }


        public function products()
        {

            $selected = new ProductModel();
            $selected->getSelected();
            $errors = array();
            return $this->render('products');

        }

    }
