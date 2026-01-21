<?php
    //Lay id cua ban ghi can xoa
    $id = $_GET["id"];
    //Mo ket noi
    include_once "../Connections/open.php";
    //Viet sql xoa
    $sql = "DELETE FROM brands WHERE id = '$id'";
    //Chay sql
    mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../Connections/close.php";
    //Quay ve danh sach
    header("location:index.php");
?>
