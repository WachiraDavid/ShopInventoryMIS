<?php
$con=mysqli_connect("localhost","root","","enlighten");
//require_once 'connect.php';

//Querying db for table values
$sql2 = "SELECT * FROM stock";
$result2 = mysqli_query($con,$sql2);
$row = mysqli_fetch_array($result2);

//fetching values
$update_value = $_POST['quantity_u'];
$current_quantity = $row['quantity'];
$new_stock = $current_quantity+$update_value;
$code = $row['code'];

$query = "UPDATE stock SET quantity = '$new_stock' WHERE code = '$code' ";
if (mysqli_query($con,$query)){
    echo "Record Updated";
}else{
    echo "Error Updating". mysqli_errno($con);
}



?>