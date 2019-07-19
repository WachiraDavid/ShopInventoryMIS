
<html lang="en">
<head>

    <title>shop inventory MIS</title>
    <link rel="icon" href="images/capture.png" type="image/gif" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"

    <link rel="stylesheet" type="text/css" href="fonts.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <style>
        html,body,h1,h2,h3,h4 {font-family:"Lato", sans-serif}
        .mySlides {display:none}
        .w3-tag, .fa {cursor:pointer}
        .w3-tag {height:15px;width:15px;padding:0;margin-top:6px}
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
    </style>

</head>
<body >

<!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-white w3-card ">
        <div class="w3-bar-item w3-left"> <img src="images/elogo.png" style="width:42px;height:42px;border:0;"><strong>enlighten</strong></div>
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Log Out</a>
        <a href="#login" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Log In</a>
        <a href="shop.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">My Shop</a>
        <a href="#register" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Register</a>
        <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">About</a>
        <a href="index.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Home</a>



    </div>
</div>

<!-- Navbar on small screens -->
<div id="myNav" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Home</a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">about</a>
    <a href="shop.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">My Shop</a>
    <a href="#register" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Register</a>
    <a href="#login" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Log In</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Log Out</a>
</div>

<!-- content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
    
    <div class="w3-panel w3-center w3-light-gray w3-card-4">
            <h1><b>enlighten shop inventory MIS</b></h1>
            <h3><p><b>update Stock Quantity</b></p></h3>
        </div>
<?php
$con=mysqli_connect("localhost","root","","enlighten");
//fetching data from the stock table
//require_once 'updatestock.php';
$query = "SELECT * FROM stock ORDER BY id ASC";
$result = mysqli_query($con,$query);
// check that no of rows is not 0
if(mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        ?>
        <div class="col-md-3">
            <!-- displaying stock -->
            <form method="post" action="updatestock.php">
                <div class="product w3-card-4">
                    <!--Display Products-->
                    <img src="<?php echo $row[image];?>" class="img-responsive">
                    <h5 class="text-info"><?php echo 'Item Name: '; echo $row["description"]; ?></h5>
                    <h5 class="text-info"><?php echo 'Item Code: '; echo $row["code"]; ?></h5>
                    <h5 class="text-info"><?php echo 'Item Quantity: '; echo $row["quantity"]; ?></h5>
                    <h5  class="text-info"><?php echo 'Buying Price: sh. '; echo  $row["b_price"]; ?></h5>
                    <h5  class="text-info"><?php echo 'Selling Price: sh. '; echo $row["s_price"]; ?></h5>
                    <input type="hidden" name="hidden_quantity" value="<?php echo $row["quantity"]; ?>">
                    <input type="hidden" name="hidden_description" value="<?php echo $row["description"]; ?>">
                    <input type="hidden" name="hidden_bprice" value="<?php echo $row["b_price"]; ?>">
                    <input type="hidden" name="hidden_sprice" value="<?php echo $row["s_price"]; ?>">
                    <div class="w3-section">
                        <label>Input Quantity</label>
                        <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" placeholder="Input Quantity" name="quantity_u">
                    </div>
                    <input type="submit" style="margin-top: 5px" class="btn btn-success w3-button w3-block w3-blue-grey" value="Update">

                </div>
            </form>


        </div>



        <?php
    }
}
?>

</div>
<!-- Footer -->
<footer class="w3-container w3-padding-32 w3-light-grey w3-center">
    <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
    <div class="w3-xlarge w3-section">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <P>&#169;<i>enlighten</i></P>
    </div>
</footer>

<script>
    //Collapse nav bar
    function myFunction() {
        var x = document.getElementById("myNav");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

</script>
