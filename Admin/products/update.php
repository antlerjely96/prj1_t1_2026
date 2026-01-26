<?php
    //Lay du lieu tu form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $locked = $_POST['locked'];
    $brand_id = $_POST['brand_id'];
    //Ket noi
    include_once "../../Connections/open.php";
    //Viet sql
    $sql = "UPDATE products SET name = '$name', price = '$price', quantity = '$quantity', locked = '$locked', brand_id = '$brand_id' WHERE id = '$id'";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../../Connections/close.php";
    //Quay ve danh sach
    header("location: index.php");
?>
