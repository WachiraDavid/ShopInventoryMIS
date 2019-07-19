<?php
/*statement of valuables*/
require_once 'connect.php';

/*retrieving the data entered into the form*/

$value1=$_POST['first_name'];
$value2=$_POST['last_name'];
$value3=$_POST['email'];
$value5=$_POST['contact'];
$value4=$_POST['password'];
$value6=$_POST['type'];


/*inserting data into the table in the database*/

$sql = "INSERT INTO users
(first_name, last_name, email, contact, password, type)
VALUES
('$value1', '$value2', '$value3', '$value5', '$value4', '$value6')";

if (!mysql_query($sql)) {
    die('Error: ' .mysql_error());
}
echo 'Registered successfully';
 header("location:index.html");
echo 'Registered successfully';

?>

	


