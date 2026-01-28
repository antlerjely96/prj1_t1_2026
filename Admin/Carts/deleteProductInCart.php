<?php
    session_start();
    //Lay id can xoa
    $id = $_GET['id'];
    //Xoa san pham trong cart
    unset($_SESSION['carts'][$id]);
    header("Location: index.php");
?>
