
<?php

//connect to server and select database
require_once 'connect.php';


if (!$db_selected) {
    die('can\'t use ' . $database . ': ' . mysql_error());
}

// Get values passed from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// to prevent mysql injection
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);


// Query the database for user
$result = mysql_query("select*from users where email = '$email' and password = '$password'")
or die("Failed to query database ".mysql_error());
$row = mysql_fetch_array($result);
if ($row['email'] == $email && $row['password'] == $password){
  
    session_start();

      $_SESSION['email'] = $email;

   

 header
 
 ("location:home.html");

 //echo "Succesful login!!! welcome ".$row['email'];
}else{
    echo "Failed to login";
}
?>

