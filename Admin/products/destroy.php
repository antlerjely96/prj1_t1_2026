<?php
    //Lay id tu url
    $id = $_GET['id'];
    //Mo ket noi
    include_once "../../Connections/open.php";
    //Viet sql
    $sql = "DELETE FROM products WHERE id = '$id'";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once '../../Connections/close.php';
    //Quay ve danh sach
    header('Location: index.php');
?>
