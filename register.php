<?php
/*statement of valuables*/
require_once 'connect.php';


  $confirm_password_err = "";
/*retrieving the data entered into the form*/

$value1=$_POST['first_name'];
$value2=$_POST['last_name'];
$value3=$_POST['email'];
$value4=$_POST['password'];
     

/*inserting data into the table in the database*/

$sql = "INSERT INTO users
(first_name, last_name, email, password)
VALUES
('$value1', '$value2', '$value3', '$value4')";

if (!mysql_query($sql)) {
    die('Error: ' .mysql_error());
}
echo 'Registered successfully'
 //header("location:home.html");

?>

	


