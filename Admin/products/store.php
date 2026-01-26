<?php
    //Lay du lieu tu form
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $locked = $_POST["locked"];
    $brand_id = $_POST["brand_id"];
    //Ket noi
    include_once "../../Connections/open.php";
    //Viet sql
    $sql = "INSERT INTO products(name, price, quantity, locked, brand_id) VALUES ('$name', '$price', '$quantity', '$locked', '$brand_id')";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../../Connections/close.php";
    //Quay ve danh sach
    header("location: index.php");
?>