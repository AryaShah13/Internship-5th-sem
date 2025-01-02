<?php
$server="localhost";
$username="root";
$pass="arya1306";
$db="rcommerce";

$conn=mysqli_connect($server,$username,$pass,$db);
    if(!$conn){
        echo "some error occur pls check your connection!!!";
    }

?>