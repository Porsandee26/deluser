<html>
<head>
<title>HosXP Delete Online User</title>
<META HTTP-EQUIV="Refresh"  CONTENT="2;URL=index.php">
</head>
<body>
<center><h1><?php
	ini_set('display_errors', 1);
	error_reporting(~0);
include "connect.php";

	$LoginUser = $_GET["loginuser"];
	$UserName = $_GET["username"];
	$sql = "DELETE FROM onlineuser
			WHERE kskloginname = '".$LoginUser."' ";

	$query = mysqli_query($objConnect,$sql);

	if(mysqli_affected_rows($objConnect)) {
echo '<img src="bin.png">';
	echo '<br>Delete User : ' .$LoginUser. ' Successfully';

	}
<!-- First Comment !-->
<?php echo "Porsandee";?>
<?php echo "Champanil";?>
	mysqli_close($objConnect);
?></h1>
</body>
</html>
