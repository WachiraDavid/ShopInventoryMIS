<?php
function getData()
{
$output = '';
    $con=mysqli_connect("localhost","root","","enlighten");
$sql = "SELECT item_name, quantity, s_price, b_price, timestamp, MONTH (timestamp) from sales";;
$result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
{
    //$date = strtotime($row["timestamp"]);
    $profit = $row["s_price"] - $row["b_price"];
$output .= '<tr>
    <td>'.date($row['timestamp']).'</td>
    <td>'.$row["item_name"].'</td>
     <td>'.$row["quantity"].'</td>
    <td>sh: '.$row["s_price"].'</td>
    <td>sh: '.$row["b_price"].'</td>
    <td>sh: '.$profit.'</td>
    
</tr>

';

}
return $output;
}
function getTotal()
{
    $out = '';
    $con = mysqli_connect("localhost", "root", "", "enlighten");
    $sql = "SELECT item_name, s_price, b_price from sales";;
    $result = mysqli_query($con, $sql);


        if ($result->num_rows > 0) {
            $total = 0;
            while ($row =mysqli_fetch_array($result)) {

                $total = $total + ($row["s_price"] - $row["b_price"]);


                $out .= '<tr>
            <td colspan="5" ><strong>Total</strong></td>
            <td>Sh: ' . number_format($total) . '</td>
        </tr>';
            }
            return $out;

        }
}


if(isset($_POST["generate_pdf"])) {
    require_once('tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Financial Statement");
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 11);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '

<h4 align="center">Enlighten Financial Statement </h4><br /> 
<table border="1" cellspacing="0" cellpadding="0">  
     <tr>
        <th width="30%">Time of Sale </th>
        <th width="15%">Item Name</th>
        <th width="10%">Quantity</th>
        <th width="15%">Selling Price</th>  
        <th width="15%">Buying Price</th>  
        <th width="15%">Total</th>  
         
     </tr>
           ';
    $content .= getData();
 $content .= getTotal();

    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('mypdf.pdf', 'I');

}
?>


<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
        <p>Get your statements here</p>
    </div>
<div class="table-responsive">
    <div class="col-md-12" align="right">
    <form method="post">
        <input type="submit" name="generate_pdf" class="btn btn-success w3-black w3-card-4" value="Get in PDF Format">
    </form>
    </div>
    <br/>
    <br/>
    <table class="table table-bordered w3-card-4 w3-table-all w3-centered">
        <tr class="w3-light-gray">
            <th width="30%">Time of Sale</th>
            <th width="15%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="15%">Selling Price</th>
            <th width="15%">Buying Price</th>
            <th width="15%">Profit</th>
        </tr>

        <?php
        $con=mysqli_connect("localhost","root","","enlighten");
        $sql = "SELECT item_name, s_price, b_price from sales";;
        $result = mysqli_query($con, $sql);
        $total = 0;
        while($row = mysqli_fetch_array($result)) {

            $total = $total + ($row["s_price"] - $row["b_price"]);
        }
        ?>

        <?php
echo getData();
?>
        <tr>
            <td colspan="5" ><strong>Total</strong></td>
            <th>sh: <?php echo number_format($total); ?></th>
        </tr>
</table>
    </div>
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
</body>
</html>

