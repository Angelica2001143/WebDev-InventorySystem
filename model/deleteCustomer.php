<?php
    session_start();

    $currentPage = 'customer.php';
    include('../controller/connection.php');
    $conn= connect();


   if(isset($_GET['id'])){
        $customerId= $_GET['id'];
        $sql= "DELETE FROM customers_info WHERE id='$customerId' limit 100";
        $conn->query($sql);
        header("Location: customer.php");
    } elseif($_POST['Submit']){
        $icustomerIdd= $_POST['id'];
        $sql= "DELETE FROM customers_info WHERE id='$customerId' limit 100";
        $conn->query($sql);
        header("Location: customer.php");
    }


    $sql= "SELECT * from customers_info WHERE id=$id limit 100";
    $res= mysqli_fetch_assoc($conn->query($sql));

    // $img= $res['image'];

    if($thisUser['is_admin']!=100){
        header("Location: customer.php");
    }


?>