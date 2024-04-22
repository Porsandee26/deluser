<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
.button {
    background-color: #116c8c;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
.button:hover{
	background-color:#29a6e0;
	color:white;
}
.button2 {
    background-color: #126c8c;
    border: none;
    padding:5px;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
width:80%;
    cursor: pointer;
}
.button2:hover{
	background-color:#29a6e0;
	color:white;
}
</style>
</head>

<body>
 <div class="container">
    <center><h1>

     <img src="user.png" width="60" valign="middle"> Hosxp Onlineuser

</h1>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="0">
    <tr>
      <th>Search
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php
 $con = mysqli_connect('172.16.0.10', 'sa', 'sa', 'hos');
 $perpage = 30;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }

 $start = ($page - 1) * $perpage;

 $sql = "SELECT cast(@a:=@a+1 as signed) as id,a.*
from (select kskloginname,name,servername,ksklogintime
from (select @a:=0) as m,onlineuser o
left outer join opduser o2 on o.kskloginname=o2.loginname) as a order by ksklogintime desc limit {$start} , {$perpage} ";
 $query3 = mysqli_query($con, $sql);
 ?>

<?php

   $serverName = "172.16.0.10";
   $userName = "sa";
   $userPassword = "sa";
   $dbName = "hos";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
   $sql = "SELECT cast(@a:=@a+1 as signed) as id,a.*
from (select kskloginname,name,servername,ksklogintime
from (select @a:=0) as m,onlineuser o
left outer join opduser o2 on o.kskloginname=o2.loginname
where (kskloginname LIKE '%".$strKeyword."%' or name LIKE '%".$strKeyword."%'  )) as a 
order by ksklogintime desc limit 50  ";

   $query = mysqli_query($conn,$sql);

?>

<table class="table table-bordered table-hover">
<thead>
  <tr>
    <th><div align="center">ID </div></th>
    <th><div align="center">LOGINNAME </div></th>
    <th> <div align="center">USERNAME </div></th>
    <th> <div align="center">ACTION </div></th>
    <th> <div align="center">STATION </div></th>
    <th> <div align="center">LOGIN TIME </div></th>
  </tr></thead>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["id"];?></div></td>
    <td><?php echo $result["kskloginname"];?></td>
    <td><?php echo $result['name']; ?></td>
    <td>
		<center>
<a href="JavaScript:if(confirm('Confirm Delete User : <?php echo $result["kskloginname"];?> ?')==true)
{window.location='userdelete.php?loginuser=<?php echo $result["kskloginname"];?>&username=<?php echo $result["name"];?>';}">
  <img src="delete.png" width="25"></a>
  </td>
    <td align="left"><?php echo $result['servername']; ?></td>
    <td align="left"><?php echo $result["ksklogintime"];?></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</div>
</body>
</html>