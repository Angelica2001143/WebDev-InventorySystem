<?php
session_start();

$currentPage = 'customer.php';

include "navigation.php";
$conn = connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * from customers_info WHERE id=$id limit 1";
    $res = mysqli_fetch_assoc($conn->query($sql));

    $img = $res['avatar'];
}

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=10">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/product.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <title> Customers </title>
</head>

<body style="background-image: url('../img/bg8.jpg');background-size:100vmax;">
    <div class="row" style="padding: 50px;">
        <div>
            <div class="pt-20 pl-20" style="margin-left:160px;margin-right:160px">
                <div class="col-sm-12" style="background-color: white; border: solid rgb(0, 162, 255);">
                    <div class="text-center">
                        <h1 style="color:#130553;"> Customer Details</h1>
                    </div>
                    <div class="row p-20">
                        <div class="row col-sm-6">
                            <div class="col-sm-6 p-20 pull-left">
                                <img src="<?php echo $img; ?>" height="250" width="250">
                            </div>
                        </div>
                        <div class="row col-sm-6">
                            <h4 class="pull-left col-sm-6">Name:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;"><?php echo ucwords($res['name']) ?></h4>
                            </div>
                        </div>
                        <div class="row col-sm-6">
                            <h4 class="pull-left col-sm-6">Email:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;"><?php echo $res['email'] ?></h4>
                            </div>
                        </div>
                        <div class="row col-sm-6">
                            <h4 class="pull-left col-sm-6">Type:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;">
                                    <?php
                                    echo '<td>' . $res['type'] . '</td>';
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-sm-6">
                            <h4 class="pull-left col-sm-6">Current Orders:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;">
                                    <?php
                                    echo '<td>' . $res['current_orders'] . '</td>';
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row  col-sm-6">
                            <h4 class="pull-left col-sm-6">Shipping Address:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;">
                                    <?php
                                    echo '<td>' . $res['shipping_address'] . '</td>';
                                    ?>
                                </h4>
                            </div>
                        </div>
                        <div class="row col-sm-6 text-center" style="padding: 20px">
                            <div class="col-sm-6">
                                <a href="editCustomer.php?id=<?php echo $res['id']; ?>"><button class="btn btn-warning">Edit</button></a>
                            </div>
                            <div class="col-sm-6">
                                <a href="deleteCustomer.php?id=<?php echo $res['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="customer.php" role="button">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>