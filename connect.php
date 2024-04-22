<?php
$hostname = "172.16.0.10";
$user = "sa";
$password = "sa";
$dbname = "hos";
$objConnect=mysqli_connect($hostname, $user, $password,$dbname) or die("cccติดต่อฐานข้อมูลไม่ได้");
mysqli_query($objConnect,"SET NAMES UTF8");
if (!$objConnect) {
    die('Could not connect: ' . mysqli_connect_errno());
}
//mysqli_select_db($dbname) or die("xxxเลือกฐานข้อมูลไม่ได้");

?>
