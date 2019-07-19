<?php
/*statement of valuables*/
require_once 'connect.php';
//$con=mysqli_connect("localhost","root","","enlighten");


/*retrieving the data entered into the form*/

$value1=$_POST['description'];
$value2=$_POST['quantity'];
$value3=$_POST['b_price'];
$value4=$_POST['s_price'];
$value5=$_POST['code'];

/*inserting data into the table in the database*/

$sql = "INSERT INTO stock
(description, quantity, b_price, s_price, code)
VALUES
('$value1', '$value2', '$value3', '$value4', '$value5')";

if (!mysql_query($sql)) {
    die('Error: ' .mysql_error());
}
//echo '<script> alert("You have successfully stocked your shop")</script>';
//echo '<script> window.location. "stock.php"</script>';
//echo 'You have successfully stocked your shop'
//header("location:stock.php");
echo '<script> alert("you have successfully stocked your shop"); window.location= "stock.php"</script>';

?>