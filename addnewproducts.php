<?php
session_start();
if ($_SESSION['usertype']!=102) 
       header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/index.php");

$flag=0;
if (isset($_POST['submit'])){

$message=NULL;

 if (empty($_POST['productname'])){
  $productname=FALSE;
  $message.='<p>You forgot to enter the product name!';
 }else
  $productname=$_POST['productname'];

 if (empty($_POST['productdescription'])){
  $productdescription=NULL;
 }else
  $productdescription=$_POST['productdescription'];

 if (empty($_POST['productprice'])){
  $productprice=0;
 }else{
  if (!is_numeric($_POST['productprice'])){
   $message.='<p>The product price you entered is not numeric!';
  }else
   $productprice=$_POST['productprice'];
 }

if(!isset($message)){
require_once('../mysql_connect.php');
$query="insert into products (name,description,price) values ('{$productname}','{$productdescription}','{$productprice}')";
$result=mysqli_query($dbc,$query);
$message="<b><p>Name: {$productname}<br>Description: {$productdescription}<br>Price: {$productprice}<br>added! </b>";
$flag=1;
}
 

}/*End of main Submit conditional*/

if (isset($message)){
 echo '<font color="red">'.$message. '</font>';
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<fieldset><legend>Add New Product: </legend>

<p>Product Name: <input type="text" name="productname" size="20" maxlength="30" value="<?php if (isset($_POST['productname']) && !$flag) echo $_POST['productname']; ?>"/>
<p>Description: <input type="text" name="productdescription" size="20" maxlength="30" value="<?php if (isset($_POST['productdescription']) && !$flag) echo $_POST['productdescription']; ?>"/>
<p>Price: <input type="text" name="productprice" size="20" maxlength="30" value="<?php if (isset($_POST['productprice']) && !$flag) echo $_POST['productprice']; ?>"/>
<div align="center"><input type="submit" name="submit" value="Add!" /></div>
</fieldset>
</form>
<p>
<a href="admin.php">Return to dashboard</a>
