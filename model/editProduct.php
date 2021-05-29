<?php
    session_start();

    $currentPage = 'product.php';
    
    include "navigation.php";

    $m='';
    $conn=connect();

    $id= $_SESSION['userid'];
   
    if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql= "SELECT * from products WHERE id='$id' limit 1";
        $res= mysqli_fetch_assoc($conn->query($sql));

        $img= $res['image'];
    }elseif(isset($_POST['id'])){
        $id =$_POST['id'];
        $pName= $_POST['pname'];
        $buy= intval($_POST['buy']);
        $sell= intval($_POST['sell']);

        if($buy>=$sell){
            if(isset($_POST['Submit'])){
                $sql= "UPDATE products SET name= '$pName', bought= '$buy', sold= '$sell' WHERE id = '$id'";
                if($conn->query($sql)===true){
                    $m= "Field Updated!";
                    header("Location: product.php");
                } else{
                    $m= "Connection Failure!";
                    header("Location: editProduct.php?id=$id");
                }
            }
        } else{
            $m= "Buy quantity should be larger than Sell quantity!";
            header("Location: editProduct.php?id=$id");
        }
    }
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=10" >

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/product.css">
        <link rel="stylesheet" type="text/css" href="../css/navigation.css">
        <title> Products </title>
    </head>

     <body style="background-image: url('../img/bg4.jpg');background-size:100vmax;height:100vmax;">
        <div class="row" style="padding: 50px;">
            <div class="leftcolumn" style="margin-left:14rem"> 
                <div class="pt-20 pl-20">
                    <div class="col-sm-12" style="background-color: white;">
                        <div class="text-center">
                            <h2 style="color:#130553;"> Edit Product</h2>
                            <h4 style="color: red;"> <?php echo $m; ?> </h4>
                        </div>
                        <div class="row p-20" >
                            <div class="row col-sm-6">
                                <div class="col-sm-6 p-20 pull-left" >
                                    <img src="<?php echo $img; ?>" height="250" width="250">
                                </div>
                            </div>
                            <form method="POST" action="editProduct.php" class="row">
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Name:</h4>
                                        <div class="col-sm-4">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input"  name="pname" value="<?php echo $res['name']; ?>" placeholder="Product Name"></h4>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Buy Quantity:</h4>
                                    <div class="col-sm-6">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input" name="buy" value="<?php echo $res['bought']; ?>" placeholder="Buy Quantity"></h4>
                                    </div>
                                </div>
                                <div class="row col-sm-6">
                                    <h4 class="pull-left col-sm-4">Sell Quantity:</h4>
                                    <div class="col-sm-6">
                                        <h4  class="pull-left" style="color: black;"><input type="text" class="login-input" name="sell" value="<?php echo $res['sold']; ?>" placeholder="Sell Quantity"></h4>
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $id; ?>" name="id">
                                <div class="row col-sm-6 text-center" style="padding: 20px">
                                    <div class="col-sm-6">
                                    <input class="btn btn-success" type="submit" name="Submit" value="Save Changes">
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