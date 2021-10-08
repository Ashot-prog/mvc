<form action="/add" method="POST">
    <input type="text" name="name" placeholder="name"><br>
        <?php
            if(isset($errors["name"])) {
                echo $errors["name"];
            }
        ?>
    <br>
    <input type="text" name="description" placeholder="description"><br>
        <?php
            if(isset($errors["description"])) {
                echo $errors["description"];
            }
        ?>
    <br>
    <input type="number" name="price" placeholder="price"><br>
        <?php
            if(isset($errors["price"])) {
                echo $errors["price"];
            }
        ?>
    <br>
    <input type="submit" value="add">
</form>
<?php
    if(isset($addmesaage)){
        echo $addmesaage;
    }
?>