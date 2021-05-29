<?php
    session_start();

    $currentPage = 'customer.php';
    
    include "navigation.php";

    // $m='';
    
    $conn=connect();

    $id= $_SESSION['userid'];
   
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql= "SELECT * from customers_info WHERE id='$id' limit 1";
        $res= mysqli_fetch_assoc($conn->query($sql));

        $img= $res['avatar'];
    }elseif(isset($_POST['id'])){
        $id =$_POST['id'];
        $pName= $_POST['pname'];
        $email= $_POST['email'];
        $type= $_POST['type'];
        $cuOrders= $_POST['current_orders'];
        $address= $_POST['address'];

            if(isset($_POST['submit'])){
                $sql= "UPDATE customers_info SET name= '$pName', email= '$email', type= '$type', current_orders='$cuOrders', shipping_address='$address' WHERE id = '$id'";
                if($conn->query($sql)===true){
                    header("Location: customer.php");
                } else{
                    $m= "Connection Failure!";
                    header("Location: editCustomer.php?id=$id");
                }
            } else{
            header("Location: customer.php?id=$id");
        }
    }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=10" >

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/product.css">
        <link rel="stylesheet" type="text/css" href="../css/navigation.css">
        <title> Products </title>
    </head>

     <body style="background-image: url('../img/bg4.jpg');background-size:110vmax;">
        <div class="row" style="padding: 50px;" >
            <div class="leftcolumn" style="margin-left:14rem;"> 
                <div class="pt-20 pl-20">
                    <div class="col-sm-12" style="background-color: white;">
                        <div class="text-center">
                            <h1 style="color:#130553;"> Edit Customer</h1>
                        </div>
                        <div class="row p-20" >
                            <div class="row col-sm-6">
                                <div class="col-sm-6 p-20 pull-left" >
                                    <img src="<?php echo $img; ?>" height="250" width="250">
                                </div>
                            </div>
                            <form method="POST" action="editCustomer.php" class="row">
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Name:</h4>
                                        <div class="col-sm-4">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input"  name="pname" value="<?php echo $res['name']; ?>" placeholder=""></h4>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Email:</h4>
                                    <div class="col-sm-6">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input" name="email" value="<?php echo $res['email']; ?>" placeholder=""></h4>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Type</h4>
                                    <div class="col-sm-6">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input" name="type" value="<?php echo $res['type']; ?>" placeholder=""></h4>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Current Orders</h4>
                                    <div class="col-sm-6">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input" name="current_orders" value="<?php echo $res['current_orders']; ?>" placeholder="Sell Quantity"></h4>
                                    </div>
                                </div>
                                <div class="row col-sm-6" style="margin-left:33rem">
                                    <h4 class="pull-left col-sm-6">Shipping Address</h4>
                                    <div class="col-sm-2">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input" name="address" value="<?php echo $res['shipping_address']; ?>" placeholder="Sell Quantity"></h4>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $id; ?>" name="id">
                                <div class="row col-sm-7 text-center" style="padding: 20px">
                                    <div class="col-sm-13" style="margin-left:39rem">
                                    <input class="btn btn-success" type="submit" name="submit" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>                               
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>