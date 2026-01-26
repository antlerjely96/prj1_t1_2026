<?php
    session_start();
    //Lay du lieu tu form
    $email = $_POST["email"];
    $pwd = $_POST["password"];
//    die($password);
    //Mo ket noi
    include_once "../../Connections/open.php";
    //Viet sql
    $sql = "SELECT *, COUNT(id) AS count_id FROM admins WHERE email = '$email' AND password = '$pwd'";
//    die($sql);
    //Chay sql
    $accounts = mysqli_query($connection, $sql);
    //Dong ket noi
    include_once "../../Connections/close.php";
    //Chuyen hương
    foreach ($accounts as $account) {
        if($account["count_id"] == 0){
            header("Location: ../index.php");
        } else {
            //Lưu id, email cua admin len session
            $_SESSION["admin_id"] = $account["id"];
            $_SESSION["admin_email"] = $account["email"];
            header("Location: ../brands/index.php");
        }
    }
?>