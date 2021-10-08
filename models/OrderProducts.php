<?php
    namespace models;

    use db\DB;

    class OrderProducts 
    {
        private $tablename = 'order_products';
        private $conn;
        function __construct(){
            $db = DB::getInstance();
            $this->conn = $db::getConnection();
        }



        public function create($order,$prod,$qty)
        {
            $stm = $this->conn->prepare("INSERT INTO  {$this->tablename} 
            (order_id, product_id, qty) VALUES (?, ?, ?)");
            $stm->execute([$order, $prod, $qty]);

            return true;
        }
    }
