<?php
session_start();

$currentPage = 'product.php';

include "navigation.php";
$conn = connect();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * from products WHERE id=$id limit 100";
    $res = mysqli_fetch_assoc($conn->query($sql));

    $img = $res['image'];
    $archive=$res['archive'];
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
    <title> Products </title>
</head>

<body style="background-image: url('../img/bg4.jpg');background-size:100vmax;">
    <div class="row" style="padding: 50px;">
        <div class="center">
            <div class="pt-20" style="margin-left: 195px;">
                <div class="col-sm-10" style="background-color: white;border-radius:10px">
                    <div class="text-center">
                        <h1 style="color:#130553;"> Product Details</h1>
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
                            <h4 class="pull-left col-sm-6">Buy Quantity:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;"><?php echo $res['bought'] ?></h4>
                            </div>
                        </div>
                        <div class="row col-sm-6">
                            <h4 class="pull-left col-sm-6">Sell Quantity:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;"><?php echo $res['sold'] ?></h4>
                            </div>
                        </div>
                        <div class="row  col-sm-6">
                            <h4 class="pull-left col-sm-6">Created at:</h4>
                            <div class="col-sm-6">
                                <h4 class="pull-left" style="color: black;"><?php echo date("F j, Y", strtotime(str_replace('-', '/', $res['created_at']))) ?></h4>
                            </div>
                        </div>
                        <div class="row col-sm-6 text-center" style="padding: 20px">
                        <?php if($thisUser['is_admin']==0) {
                                ?>
                        <div>
                                <a class="btn btn-primary" href="message.php?id=<?php echo $res['id'] ?>" role="button">Message to Admin</a>
                            
                        </div>
                        <?php }
                        ?>
                        
                            <br>
                            <?php if($thisUser['is_admin']==1) {
                                ?>
                            <div>
                                <a class="btn btn-primary" href="request.php?id=<?php echo $res['id'] ?>" role="button">Message From User</a>
                            
                            </div>
                            <?php }
                        ?>
                            <br>
                            <div>
                                <a class="btn btn-primary" href="product.php" role="button">Back</a>                        
                            </div>
                            <br>
                            <div class="col-sm-12">
                                <a style="display:<?=$thisUser['is_admin']==0?"none":"block"?>" class="" href="archiveProducts.php?id=<?php echo $res['id']; ?>&archive=<?=$archive?>"><button class="btn  <?=$archive==1?"btn-success":"btn-warning"?>"><?=$archive==1?"Unarchive":"Archive"?></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>