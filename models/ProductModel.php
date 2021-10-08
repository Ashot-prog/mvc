<?php
    namespace models;

    use db\DB;

    class ProductModel 
    {
        private $tablename = 'products';
        private $conn;
        public function __construct()
        {
            $db = DB::getInstance();
            $this->conn = $db::getConnection();
        }

        public function getById($id){
            $result = $this->conn->query("SELECT price FROM {$this->tablename} WHERE id = $id");
            return $result->fetch();
        }

        public function getAll()
        {
            $result = $this->conn->query("SELECT * FROM {$this->tablename}");
            $all = [];
            while ($row = $result->fetch()) {
                $all[] = $row;
            }
            return $all;
        }

        public function getSelected()
        {

            echo "
<form action='/order' method='POST' style='width:50%;border: darkblue solid'>
<table style='width:100%;border: darkblue solid'>
        <tr>
            <td>name</td>
            <td>description</td>
            <td>price</td>
            <td>quantity</td>
        </tr>";

            $result = $this->conn->query("SELECT * FROM {$this->tablename}");

            while ($row = $result->fetch()) {
                $i = $row['id'];
                if (isset($_POST[$i])) {
                    echo "<tr><td>".$row[1]."</td>
                          <td>".$row[2]."</td>
                          <td>".$row[3]."</td>
                          <td><input type='number' name='number[$row[0]]' ></td></tr>";
                }
            }
            echo '</table>';
        }

        public function create($name, $desc, $price)
        {
            $stm = $this->conn->prepare("INSERT INTO  {$this->tablename} 
            (name, description, price) VALUES (?, ?, ?)");
            $stm->execute([$name, $desc, $price]);
            return true;
        }
    }
