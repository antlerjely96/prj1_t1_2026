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
    <?php
        if(!isset($_SESSION["admin_email"])){
            header("Location: ../index.php");
        }
    ?>
    <h3>Brands List</h3>
    <a href="create.php">Add brand</a>
    <table style="width:100%" border="1px" cellpadding="0" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            //Mo ket noi
            include_once "../../Connections/open.php";
            //Viet sql lay du lieu tu db
            $sql = "SELECT * FROM brands";
            //Chay sql
            $brands = mysqli_query($connection, $sql);
            //Dong ket noi
            include_once "../../Connections/close.php";
            //Hien thi du lieu
            foreach ($brands as $brand) {
        ?>
            <tr>
                <td>
                    <?php echo $brand["id"]; ?>
                </td>
                <td>
                    <?php echo $brand["name"]; ?>
                </td>
                <td>
                    <?php echo $brand["country"]; ?>
                </td>
                <td>
                    <a href='edit.php?id=<?php echo $brand["id"] ?>'>Edit</a>
                </td>
                <td>
                    <a href='destroy.php?id=<?php echo $brand["id"] ?>'>Delete</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    <a href="../login/logout.php">Logout</a>
</body>
</html>