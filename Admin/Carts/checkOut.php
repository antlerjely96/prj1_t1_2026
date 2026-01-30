<?php
    session_start();
    //Lay carts
    $carts = $_SESSION['carts'];
    //Mo ket noi
    include_once "../../Connections/open.php";
    //Lay thong tin de luu
    $orderDate = date('Y-m-d');
    $orderStatus = 0;
    $admin_id = $_SESSION['admin_id'];
    //Viet sql len orders
    $sqlOrder = "INSERT INTO orders(order_date, order_status, admin_id) VALUES ('$orderDate', '$orderStatus', '$admin_id')";
    //Chay sqlOrder
    mysqli_query($connection, $sqlOrder);

    //Viet sql lay id
    $sqlGetOrderId = "SELECT MAX(id) AS newest_order_id FROM orders WHERE admin_id = '$admin_id'";
    //Chay sql lay id
    $newestOrderIds = mysqli_query($connection, $sqlGetOrderId);
    //Lay id cua order vua duoc tao
    foreach ($newestOrderIds as $newestOrderId) {
        $orderId = $newestOrderId["newest_order_id"];
    }
    //Luu chi tiet don hang
    foreach ($carts as $id => $quantity){
        //Viet sql lay price
        $sqlGetPrice = "SELECT price FROM products WHERE id = '$id'";
        //Chay sql lay price
        $getPrices = mysqli_query($connection, $sqlGetPrice);
        //Lay price
        foreach ($getPrices as $getPrice){
            $price = $getPrice["price"];
        }
        //Sql luu chi tiet don hang
        $sqlOrderDetails = "INSERT INTO order_details VALUES ('$orderId', '$id', '$price', '$quantity')";
        //Chay sql luu chi tiet don hang
        mysqli_query($connection, $sqlOrderDetails);
    }
    //Dong ket noi
    include_once "../../Connections/close.php";
    //Xoa gio hang
    unset($_SESSION['carts']);
    //Quay ve danh sach san pham
    header("Location: ../products/index.php");
?>
