<?php
    session_start();
    //Lay id cua san pham duoc them
    $id = $_GET['id'];
    //Luu id cua san pham len session
    //Kiem tra cart ton tai chua
    if(isset($_SESSION['carts'])){
        //Kiem tra san pham da ton tai trong cart chua
        if(isset($_SESSION['carts'][$id])){
            $_SESSION['carts'][$id]++;
        } else {
            $_SESSION['carts'][$id] = 1;
        }
    } else {
        $_SESSION['carts'] = array();
        $_SESSION['carts'][$id] = 1;
    }
    header("Location: index.php");
?>