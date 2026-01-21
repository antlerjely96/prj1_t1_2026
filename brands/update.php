<?php
    //Lay du lieu tu form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $country = $_POST["country"];
    //Mo ket noi
    include_once "../Connections/open.php";
    //Viet sql update
    $sql = "UPDATE brands SET name = '$name', country = '$country' WHERE id = '$id'";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../Connections/close.php";
    //Quay ve danh sach
    header("Location: index.php");
?>
