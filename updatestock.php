<?php
$con=mysqli_connect("localhost","root","","enlighten");
//fetching data from the stock table
$query = "SELECT * FROM stock ORDER BY id ASC";
$result = mysqli_query($con,$query);
// check that no of rows is not 0
if(mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        ?>

        <?php
        $con=mysqli_connect("localhost","root","","enlighten");
//require_once 'connect.php';

//Querying db for table values
        // $sql2 = "SELECT * FROM stock";
        // $result2 = mysqli_query($con,$sql2);
        //$row = mysqli_fetch_array($result2);

//fetching values
        $update_value = $_POST['quantity_u'];
        $current_quantity = $row['quantity'];
        $new_stock = $current_quantity+$update_value;
        $code = $row['code'];

        if ($update_value <= 0){
            echo 'input quantity';
             //echo '<script> alert("Input Quantity")</script>';
            //echo '<script> window.location. "update.php"</script>';
        } else {

            $query = "UPDATE stock SET quantity = '$new_stock' WHERE code = '$code' ";
            if (mysqli_query($con, $query)) {

                echo '<script> alert("you have successfully updated the item"); window.location= "update.php"</script>';
                //echo 'You have successfully updated the item:';
            }
            else {
                die('Error: ' .mysqli_error());
            }
        }

        ?>
        <?php
    }
}
?>
