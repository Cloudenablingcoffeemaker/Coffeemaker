<?php

$con=mysqli_connect("localhost","dotmonsc_client","clientpayment@123","dotmonsc_clientpayment");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


if ($con->query("UPDATE clientpayment SET value='61' WHERE id = '1'") === TRUE) {
    echo "61";
}
mysqli_close($con);
?>