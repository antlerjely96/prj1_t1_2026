<?php
    session_start();
    //Lay id dang can update
    $id = $_GET['id'];
    //Lay dang cong hay tru
    $operator = $_GET['operator'];
    //update
    if($operator == 'minus'){
        $_SESSION['carts'][$id]--;
    } else if ($operator == 'plus'){
        $_SESSION['carts'][$id]++;
    }
    header("Location: index.php");
?>
