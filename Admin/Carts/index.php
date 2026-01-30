<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="updateCart.php">
        <table border="1px" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th></th>
            </tr>
            <?php
                $total = 0;
                if(isset($_SESSION['carts'])){
                    //Mo ket noi
                    include_once "../../Connections/open.php";
                    //Lay cart hien tai
                    $carts = $_SESSION['carts'];
                    //Hien thi cart
                    foreach($carts as $id => $quantity){
                        //Viet sql
                        $sql = "SELECT * FROM products WHERE id = '$id'";
                        //Chay sql
                        $products = mysqli_query($connection, $sql);
                        //Hien thi thong tin
                        foreach ($products as $product){
                            ?>
                            <tr>
                                <td>
                                    <?php echo $id; ?>
                                </td>
                                <td>
                                    <?php echo $product['name']; ?>
                                </td>
                                <td>
                                    <?php echo $product['price']; ?>
                                </td>
                                <td>
                                    <a href="updateProductInCart.php?id=<?php echo $id; ?>&&operator=minus"> - </a>
                                    <input type="number" name="quantity[<?php echo $id; ?>]" value="<?php echo $quantity; ?>">
                                    <a href="updateProductInCart.php?id=<?php echo $id; ?>&&operator=plus"> + </a>
                                </td>
                                <td>
                                    <?php
                                        echo $product['price'] * $quantity;
                                        $total += $product['price'] * $quantity;
                                    ?>
                                </td>
                                <td>
                                    <a href="deleteProductInCart.php?id=<?php echo $id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                }
            ?>
            <tr>
                <td colspan="6">
                    Total: <?php echo $total; ?>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <button>Update Cart</button>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <a href="deleteCart.php">Delete Cart</a>
                </td>
            </tr>
        </table>
        <a href="checkOut.php">Place order</a>
    </form>
</body>
</html>