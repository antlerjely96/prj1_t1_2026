<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h3>Update a brand</h3>
    <?php
        //Lay id cua ban ghi can sua
        $id = $_GET["id"];
        //Mo ket noi
        include_once "../../Connections/open.php";
        //Viet sql
        $sql = "SELECT * FROM brands WHERE id = '$id'";
        //Chay sql
        $brands = mysqli_query($connection, $sql);
        //Dong ket noi
        include_once "../../Connections/close.php";
    ?>
    <form method="POST" action="update.php">
        <?php
            //Hien thi
            foreach ($brands as $brand) {
        ?>
            <input type="hidden" name="id" value="<?php echo $brand["id"] ?>" />
            Name: <input type="text" name="name" value="<?php echo $brand["name"] ?>"><br>
            Country: <input type="text" name="country" value="<?php echo $brand["country"] ?>"><br>
        <?php
            }
        ?>
        <button>Edit</button>
    </form>
</body>
</html>
