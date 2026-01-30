<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "../../Layouts/header.php";
        include_once "../../Layouts/menu.php";
    ?>
    <h3>Product management</h3>
    <?php
        //Ket noi db
        include_once "../../Connections/open.php";
        //Viet sql
        $sql = "SELECT products.*, brands.name AS brand_name FROM products INNER JOIN brands ON products.brand_id = brands.id";
        //Chay query
        $products = mysqli_query($connection, $sql);
        //Dong ket noi
        include_once "../../Connections/close.php";
    ?>
    <a href="create.php">Add a product</a>
    <table border="1px" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Lock</th>
            <th>Brand</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
            //Hien thi
            foreach ($products as $product) {
        ?>
            <tr>
                <td>
                    <?php echo $product["id"]; ?>
                </td>
                <td>
                    <?php echo $product["name"]; ?>
                </td>
                <td>
                    <img src="../../Images/<?php echo $product['image']; ?>" width="100px" height="100px">
                </td>
                <td>
                    <?php echo $product["price"]; ?>
                </td>
                <td>
                    <?php echo $product["quantity"]; ?>
                </td>
                <td>
                    <?php
                        if($product["locked"] == 0){
                            echo "Unlocked";
                        } else {
                            echo "Locked";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $product["brand_name"]; ?>
                </td>
                <td>
                    <a href="edit.php?id=<?php echo $product['id']; ?>">Edit</a>
                </td>
                <td>
                    <a href="destroy.php?id=<?php echo $product['id']; ?>">Delete</a>
                </td>
                <td>
                    <a href="../Carts/addToCart.php?id=<?php echo $product['id']; ?>">Add to cart</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <?php
        include_once "../../Layouts/footer.php";
    ?>
</body>
</html>
