<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h3>Update product</h3>
    <?php
        //Lay id tu url
        $id = $_GET['id'];
        //Mo ket noi
        include_once "../../Connections/open.php";
        //Viet SQL
        $sql = "SELECT * FROM products WHERE id = '$id'";
        //Chay SQL
        $products = mysqli_query($connection, $sql);
    ?>
    <form method="POST" action="update.php">
        <?php
            //Hien thi
            foreach ($products as $product) {
        ?>
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            Name: <input type="text" name="name" value="<?php echo $product['name']?>"><br>
            Price: <input type="text" name="price" value="<?php echo $product['price']?>"><br>
            Quantity: <input type="text" name="quantity" value="<?php echo $product['quantity']?>"><br>
            Locked: <input type="radio" name="locked" value="0" checked> Unlocked
                <input type="radio" name="locked" value="1"
                    <?php
                        if($product['locked'] == 1){
                            echo "checked";
                        }
                    ?>
                > Locked <br>
            Brand: <select name="brand_id">
                <?php
                //Viet SQL
                $sql = "SELECT * FROM brands";
                //Chay SQL
                $brands = mysqli_query($connection, $sql);
                //Dong ket noi
                include_once "../../Connections/close.php";
                //Hien thi
                foreach ($brands as $brand) {
                    ?>
                    <option value="<?php echo $brand['id'] ?>"
                        <?php
                            if($brand['id'] == $product['brand_id']){
                                echo "selected";
                            }
                        ?>
                    >
                        <?php echo $brand['name']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        <?php
            }
        ?><br>
        <button>Update</button>
    </form>
</body>
</html>