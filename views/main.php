<!--<div>-->
<!--    in your <a href="/products">porudtcs</a> <span class="count">0</span> products-->
<!--</div>-->
<form action="/products" method="post">
<table style="width:50%;border: darkblue solid">
    <h1 style="width:50%;text-align: center">Products</h1>
    <tr >
        <th >Name</th>
        <th >Description</th>
        <th >Price</th>
        <th>Check</th>
    </tr>
    <?php
    foreach($products as $product){
        echo "
            <tr><td>$product[name]</td>
            <td>$product[description]</td>
            <td>Product Price : $product[price]</td>
            <td><input type='checkbox' name = $product[id] value=$product[id]  data-price='$product[price]' data-name='$product[name]' data-description='$product[description]' class='product_check' data-active='0' data-id='$product[id]'></td>
            
            <td>
            
            </tr>
        ";
    }


    ?>

</table>

    <button id="add">Add to product</button>
</form>
