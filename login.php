
<?php

//connect to server and select database
require_once 'connect.php';


if (!$db_selected) {
    die('can\'t use ' . $database . ': ' . mysql_error());
}

// Get values passed from the login form
$email = $_POST['email'];
$password = $_POST['password'];

function getInputs(){

    $mail = $_POST['email'];
    $pword = $_POST['password'];
}

// to prevent mysql injection
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);


// Query the database for user
$result = mysql_query("select*from users where email = '$email' and password = '$password'")
or die("Failed to query database ".mysql_error());
$row = mysql_fetch_array($result);
if ($row['email'] == $email && $row['password'] == $password) {

    session_start();

    $_SESSION['email'] = $email;

    require_once 'sms.php';
    //fetching data from the stock table
    $con = mysqli_connect("localhost", "root", "", "enlighten");
    $query = "SELECT * FROM stock";
    $sql = "SELECT * FROM users";
    $result3 = mysqli_query($con, $query);
    $result2 = mysqli_query($con, $sql);
    //check that no of rows is not 0
  //  if (mysqli_num_rows($result) > 0) {


        //$row = mysqli_fetch_array($result);
        //$row2 = mysqli_fetch_array($result2);
        if ($row2 = mysqli_fetch_array($result2)) {
            while ($row3 = mysqli_fetch_array($result3)) {

                if ($row3['quantity'] < 11) {
                    sms($row2['contact'], 'You are running out of ' . $row3['description'] . ' ' . 'at enlighten shop. Please stock soon.');
                }
                //sms(+254706636596, 'Hey, you have got stock');
            }

        }

        //sms(+254706636596, 'Hey there');


    echo '<script> alert("you have logged in successfully"); window.location= "index.html"</script>';

}
else{
    echo '<script> alert("Wrong username and password"); window.location= "login1st.html"</script>';

}


?>

