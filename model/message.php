<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<style>

a:link{
  background-color: green;
  color: black;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}


body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body style="background-image: url('../img/bg6.jpg');background-size:100vmax;">

<?php session_start();?>
<br><br>
<div class="container">
  <form method="post">
  <input type="hidden" id="id" name="id" value="<?php echo $_GET['id'] ?>" placeholder="Your name..">
    
    <input type="hidden" id="fname" name="firstname" value="<?php echo $_SESSION['user'] ?>" placeholder="Your name..">
    
    <center>
<h3>Message to Admin</h3></center>
    <label for="subject">YOUR MESSAGE REQUEST TO ADMIN.....</label>
    
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" name ="request"  value="Submit">
   

   <a class="btn btn-primary" href="product.php" role="button">Back</a> 
                            
                            
    
    <br><br>
  </form>
  
</div>


<?php
  include('../controller/connection.php');

  $conn=connect();
if(isset($_POST['request'])){
    $id=$_POST['id'];
    $name=$_POST['firstname'];
    $subject=trim($_POST['subject']);
  $sql="insert into request(product_id, name, message) values('".$id."', '".$name."', '".$subject."')";
  if($conn->query($sql)===TRUE){
      echo '<script>alert("Request sent")</script>';
  }else{
    echo '<script>alert("Something went wrong")</script>';
  }

}
?>
</body>
</html>
