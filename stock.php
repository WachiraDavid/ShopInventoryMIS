
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
    <a href="shop.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">My Shop</a>
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large w3-hide-small w3-right">Home</a>
   

  
  </div>
</div>

<!-- Navbar on small screens -->
<div id="myNav" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="index.html" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Home</a>
   <a href="shop.php class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">My Shop</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">Log Out</a>
</div>

<!-- content -->
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
  <div class="w3-panel w3-center">
    <h1><b>enlightentech shop inventory MIS</b></h1>
    <p><strong>Add new purchases/items to the already exising stock</strong></p>
  </div>

  <!-- Form -->
<div class="w3-container w3-center" id="register">
  <div class="w3-center w3-padding-64">
    <span class="w3-xlarge w3-bottombar w3-border-dark-grey w3-padding-16">Stock Your Shop</span>
  </div>
 <div class="">
     <p><h4>Adding First Time Items</h4></p>
 </div>
  <form class="w3-container w3-card-4" action="firststock.php" method="POST">
      <div class="w3-section">
          <label class="w3-left">Input Item Name:</label>
          <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="text" name="description" required>
      </div>
      <div class="w3-section">
          <label class="w3-left">Input Item Code:</label>
          <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" name="code" required>
      </div>

    <div class="w3-section">
      <label class="w3-left">Quantity:</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" name="quantity" required>
    </div>

    <div class="w3-section">
      <label class="w3-left">Buying Price: @</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" min="1" name="b_price" required>
    </div>
    <div class="w3-section">
      <label class="w3-left">Selling Price: @</label>
      <input class="w3-input w3-border w3-hover-border-black" style="width:100%;" type="number" min="1"  name="s_price" required>
    </div>
    <button type="submit" class="w3-button w3-block w3-black">STOCK</button>
    <p> </p>
    <button type="reset" class="w3-button w3-block w3-black">RESET</button>

  </form>




    <div class="w3-center">
    <h4><a href="update.php">Updating Stock Quantity</a></h4>
</div>



</div>

  <!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-light-grey w3-center">
      <a href="#" class="w3-button w3-black w3-margin"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
      <div class="w3-xlarge w3-section">
          <!--<i class="fa fa-facebook-official w3-hover-opacity"></i> -->
          <P>&#169;<i>enlightentech</i></P>
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
	</body>
</html>
