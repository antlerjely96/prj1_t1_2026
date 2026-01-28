<?php
    session_start();
    //Lay thong tin can duoc update
    $cartUpdate = $_POST['quantity'];
    //Update session
    foreach ($cartUpdate as $id => $quantity){
        $_SESSION['carts'][$id] = $quantity;
    }
    header('Location: index.php');
?>