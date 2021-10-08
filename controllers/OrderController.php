<?php
    namespace controllers;

    use models\OrdersModel;
    use models\UsersModel;
    use models\OrderProducts;
    use models\ProductModel;

    class OrderController  extends BaseController
    {
        private $orders;
        private $users;
        private $orderproducts;
        private $product;
        public function __construct()
        {
            $this->orders = new OrdersModel();
            $this->users = new UsersModel();
            $this->orderproducts = new OrderProducts();
            $this->product =  new ProductModel();
        }


        public function create()
        {
            $errors = [];
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(empty($_POST['name'])){
                    $errors['name'] = 'name is required';
                } elseif(empty($_POST['lastname'])) {
                    $errors['lastname'] = 'lastname is required';
                } elseif(empty($_POST['email'])){
                    $errors['email'] = 'email is required';
                }
                if(!empty($errors)) {
                    return $this->render('products','');

                } else {
                   $id = $this->users->create($_POST['name'], $_POST['lastname'], $_POST['email']);
                   $today = date('y/d/m');
                    $num = $_POST['number'];
                    foreach ($num as $k=>$v) {
                        $sum = $this->product->getById($k);
                        $qty = $sum['price'] * $v;
                        $orderId = $this->orders->create($id,$qty , $today);
                        $this->orderproducts->create($orderId, $k, $v);
                   }



                    $products =  $this->product->getAll();
                    return $this->render('main', compact('products'));

                }
            }
        }
    }
