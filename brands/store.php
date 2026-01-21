<?php
    //Lay du lieu tu form
    $name = $_POST["name"];
    $country = $_POST["country"];
    //Mo ket noi
    include_once "../Connections/open.php";
    //Viet sql luu du lieu
    $sql = "INSERT INTO brands(name, country) VALUES ('$name', '$country')";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../Connections/close.php";
    //Quay ve danh sach
    header("Location: index.php");
?>