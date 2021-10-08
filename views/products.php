

    <input type="text" name="name" placeholder="name"><br>
    <?php
            if(isset($errors[   "name"])) {
                echo $errors["name"];
            }
        ?>
    <br>
    <input type="text" name="lastname" placeholder="lastname"><br>
    <?php
            if(isset($errors["lastname"])) {
                echo $errors["lastname"];
            }
        ?>
    <br>
    <input type="email" name="email" placeholder="email"><br>
    <?php
            if(isset($errors["email"])) {
                echo $errors["email"];
            }
        ?>
    <br>
    <input type="submit" value="Order">
</form>