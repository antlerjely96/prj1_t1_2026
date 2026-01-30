<?php
    //Lay du lieu tu form
    $name = $_POST["name"];
    $image = $_FILES['image']['name'];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $locked = $_POST["locked"];
    $brand_id = $_POST["brand_id"];
    //Ket noi
    include_once "../../Connections/open.php";
    //Viet sql
    $sql = "INSERT INTO products(name, image, price, quantity, locked, brand_id) VALUES ('$name', '$image', '$price', '$quantity', '$locked', '$brand_id')";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../../Connections/close.php";
    //Kiem tra anh da co trong thu muc Images chua
    if(!file_exists('../../Images/' . $image)){
        //Lay path
        $path = $_FILES['image']['tmp_name'];
        //Chuyen file
        move_uploaded_file($path, '../../Images/' . $image);
    }
    //Quay ve danh sach
    header("location: index.php");
?>