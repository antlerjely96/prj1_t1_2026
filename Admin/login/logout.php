<?php
    session_start();
    //Xoa id, email tren session
    unset($_SESSION["admin_id"]);
    unset($_SESSION["admin_email"]);
    //Quay ve form login
    header("Location: ../index.php");
?>
