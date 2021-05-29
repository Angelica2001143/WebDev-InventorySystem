<?php
include "../controller/connection.php";
$conn = connect();
$id=$_GET['id'];
$archive=$_GET['archive']==1?0:1;
$sql="update products set archive='$archive' where id='$id'";
$result=mysqli_query($conn,$sql);
if($result){
    header("location:viewProduct.php?id='".$id."'");
}else{
    echo mysqli_error($conn);
}


?>
