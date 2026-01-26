<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h3>Create product</h3>
    <form method="POST" action="store.php">
        Name: <input type="text" name="name"><br>
        Price: <input type="text" name="price"><br>
        Quantity: <input type="text" name="quantity"><br>
        Locked: <input type="radio" name="locked" value="0"> Unlocked <input type="radio" name="locked" value="1"> Locked <br>
        Brand: <select name="brand_id">
            <?php
                //Ket noi
                include_once "../../Connections/open.php";
                //viet sql
                $sql = "SELECT * FROM brands";
                //Chay sql
                $brands = mysqli_query($connection, $sql);
                //Dong ket noi
                include_once "../../Connections/close.php";
                //Hien thi
                foreach ($brands as $brand) {
            ?>
                <option value="<?php echo $brand['id'] ?>">
                    <?php echo $brand["name"]; ?>
                </option>
            <?php
                }
            ?>
        </select><br>
        <button>Add</button>
    </form>
</body>
</html>