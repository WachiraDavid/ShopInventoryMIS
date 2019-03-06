<?php
/*statement of valuables*/

$hostname = "localhost";
$username = "root";
$password = "";
$database = "user";

/*connecting to server*/
$link = mysql_connect($hostname,$username,$password);

if (!$link) {
    die('could not connet: ' . mysql_error());
}
 echo 'linked'
 /*connecting to the database*/
 $db_selected = mysql_select_db($database, $link);


if (!$db_selected) {
    die('can\'t use ' . $database . ': ' . mysql_error());
}
echo 'connected'

?>