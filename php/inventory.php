<?php
session_status();


//connect to server and select database
require_once 'connect.php';
$con=mysqli_connect("localhost","root","","enlighten");
if (isset($_POST["add"])){
    if(isset($_SESSION["inventory"])){
        $item_array_id = array_column($_SESSION["inventory"],"product_id" );
        if(!in_array($_GET["id"],$item_array_id)){
            $count = count($_SESSION["inventory"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_description"],
                'product_bprice' => $_POST["hidden_bprice"],
                'product_price' => $_POST["hidden_sprice"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["inventory"][$count] = $item_array;
            echo '<script> window.location"inventory.php"</script>';

            $value1=$_POST["hidden_description"];
            $value2=$_POST["quantity"];
            $value3=$_POST["hidden_bprice"];
            $value4=$_POST["hidden_sprice"];
            $value6=$value2*$value3;
            $value7=$value2*$value4;
            $value5=$value4-$value3;

            $sql = "INSERT INTO sales
        (item_name, quantity, b_price, s_price, profit)
          VALUES
          ('$value1]', '$value2', '$value6', '$value7', '$value5')";

            if (!mysql_query($sql)) {
                die('Error: ' .mysql_error());
            }
            echo 'the sale has been recorded';
    //header("location:home.html");
        }else{
            echo '<script> alert("product is already added to cart")</script>';
            echo '<script> window.location. "inventory.php"</script>';
        }
    }else{
        $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_description"],
                'product_bprice' => $_POST["hidden_bprice"],
                'product_price' => $_POST["hidden_sprice"],
                'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["inventory"][0] = $item_array;
        $value1=$_POST["hidden_description"];
        $value2=$_POST["quantity"];
        $value3=$_POST["hidden_bprice"];
        $value4=$_POST["hidden_sprice"];
        $value5=$value4-$value3;

        $sql = "INSERT INTO sales
        (item_name, quantity, b_price, s_price, profit)
          VALUES
          ('$value1]', '$value2', '$value3', '$value4', '$value5')";

        if (!mysql_query($sql)) {
            die('Error: ' .mysql_error());
        }
        echo 'the sale has been recorded';
        //header("location:home.html");
    }

   if(isset($_GET["action"])){
       if($_GET["action"] == "delete"){
           foreach($_SESSION["inventory"] as $key => $value){
               if($value["product_id"] == $_GET["id"]){
                   unset($_SESSION["inventory"][$key]);
                   echo '<script>alert ("product has been removed from sale")</script>';
                   echo '<script>window.location. "inventory.php"</script>';
               }
           }
       }
   }
}
?>
<!doctype html>
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



<!--  Content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
  <div class="w3-panel w3-center">
    <h1><b>enlighten shop inventory MIS</b></h1>
    <p>Track your stock progress and make sales</p>
  </div>

    <?php
    //$con=mysqli_connect("localhost","root","","enlighten");
    //fetching data from the stock table
    $query = "SELECT * FROM stock ORDER BY id ASC";
    $result = mysqli_query($con,$query);
    // check that no of rows is not 0
    if(mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_array($result)) {


            ?>
<!--table-->

    <div class="table-responsive">

        <br/>
        <br/>
        <table class="table table-bordered w3-card-4 w3-table-all w3-centered">
            <tr class="w3-light-gray">
                <th width="30%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="10%">Item Code</th>
                <th width="25%">Buying Price</th>
                <th width="25%">Sellimg Price</th>

            </tr>

              <td><?php echo $row["description"]?></td>
              <td><?php echo $row["quantity"]?> </td>
              <td><?php echo $row["code"]?> </td>
              <td><?php echo $row["b_price"]?></td>
              <td><?php echo $row["s_price"]?></td>

          </tr>
        </table>
    </div>

            <div class="col-md-3 w3-third">
            <!-- displaying stock -->
                <form method="post" action="inventory.php?action=add&id=<?php echo $row["id"] ?>">
                    <div class="product w3-card-4">
                        <!--Display Products-->
                        <img src="<?php echo $row[image];?>" class="img-responsive">
                        <h5 class="text-info"><?php echo 'Item Name: '; echo $row["description"]; ?></h5>
                        <h5 class="text-info"><?php echo 'Item Quantity: '; echo $row["quantity"]; ?></h5>
                        <h5  class="text-info"><?php echo 'Buying Price: sh. '; echo  $row["b_price"]; ?></h5>
                        <h5  class="text-info"><?php echo 'Selling Price: sh. '; echo $row["s_price"]; ?></h5>
                        <input type="hidden" name="hidden_description" value="<?php echo $row["description"]; ?>">
                        <input type="hidden" name="hidden_bprice" value="<?php echo $row["b_price"]; ?>">
                        <input type="hidden" name="hidden_sprice" value="<?php echo $row["s_price"]; ?>">
                    </div>
                </form>


            </div>
            <?php
        }
    }
    ?>

    </div>
</div>

<div class="w3-center w3-padding-64">
     </p><button  class="w3-button w3-block w3-black"><a href="mypdf.php">Sold Stock</a></button></p>
         </p><button class="w3-button w3-block w3-black"><a href="inventory.php">Current Stock</a></button></p>
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
// Slideshow
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}

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

</body>

</html>