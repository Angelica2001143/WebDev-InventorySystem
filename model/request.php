<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/product.css">
<link rel="stylesheet" type="text/css" href="../css/navigation.css">

<style>

a:link{
  background-color:rgb(0,168,107);
  color: black;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
a:hover{
  background-color:GREEN;
}
#comments {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#comments td, #comments th {
  border: 1px solid #ddd;
  padding: 8px;
  border: 1px solid black;
}

#comments tr:nth-child(even){background-color: #f2f2f2;}

#comments tr:hover {background-color: #ddd;}

#comments th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
</style>
</head>

<body style="background-image: url('../img/bg6.jpg');background-size:100vmax;">
<br><br>
<div class="w3-container" style="padding: 80px; background-color:lightblue;">

  <h2>𝙼𝙴𝚂𝚂𝙰𝙶𝙴 𝚁𝙴𝚀𝚄𝙴𝚂𝚃 𝙵𝚁𝙾𝙼 𝚃𝙷𝙴 𝚄𝚂𝙴𝚁𝚂 𝚃𝙾 𝚈𝙾𝚄 𝙰𝙳𝙼𝙸𝙽</h2>
  <p>Note:𝕁𝕦𝕤𝕥 𝔸 ℂ𝕠𝕞𝕞𝕖𝕟𝕥 𝔽𝕣𝕠𝕞 𝕋𝕙𝕖 𝕌𝕤𝕖𝕣</p>

  <table class="request table" id="comments">
    <tr>
      <th>Product Name</th>
      <th>User Name</th>
      <th>Points</th>
    </tr>
    <?php
    include('../controller/connection.php');
    $id=$_GET['id'];
    $conn=connect();

        $sql="select products.name, request.name as request, request.message  from request inner join products on products.id = request.product_id where product_id ='".$id."'";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['request'] ?></td>
                <td><?php echo $row['message'] ?></td>
            </tr>
        <?php
        }


?>
  </table>
  <br><br>

    <a class="btn btn-primary" href="product.php" role="button">Back</a>
    <br><br>
</div>

</body>
</html>







