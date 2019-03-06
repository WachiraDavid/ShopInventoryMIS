<?php
/*statement of valuables*/
require_once 'connect.php';


  $confirm_password_err = "";
/*retrieving the data entered into the form*/

$value1=$_POST['description'];
$value2=$_POST['quantity'];
$value3=$_POST['buying_p'];
$value4=$_POST['selling_p'];
     

/*inserting data into the table in the database*/

$sql = "INSERT INTO stock
(description, quantity, buying_p, selling_p)
VALUES
('$value1', '$value2', '$value3', '$value4')";

if (!mysql_query($sql)) {
    die('Error: ' .mysql_error());
}
echo 'You have successfully stocked your shop'
 //header("location:home.html");

?>
