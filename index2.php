<html>
<head>
<title>HosXP Onlineuser</title>
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">

<!-- <script type="text/javascript">
 function ConfirmDelete()
 {
   if (confirm("Delete User"))
    location.href='userdelete.php?loginuser=sirip';
}
</script> -->
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
<body onLoad="loaded()">
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<?php

ini_set('display_errors', 1);
error_reporting(~0);




 <div class="container">
 <div class="row">
   <center><h1>

     <img src="user.png" width="60" valign="middle"> Hosxp Onlineuser

</h1>
 <div class="col-lg-12">

<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="0">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>

 <table class="table table-bordered table-hover">

 <thead>

 <tr>
 <th align="center"><center>ID</th>
 <th><center>LOGINNAME</th>
 <th><center>USERNAME</th>
<th><center>ACTION</th>
  <th><center>STATION</th>
  <th><center>LOGIN TIME</th>
 </tr>
 </thead>
 <tbody>
 <?php while ($result = mysqli_fetch_assoc($query3)) {
  //  ?>
 <tr>
  <td><center><?php echo $result['id']; ?></td>
 <td><?php echo $result['kskloginname']; ?>
</td>

 <td><?php echo iconv('TIS-620','UTF-8//ignore',$result['name']); ?>

</td>
<td><center>
<a href="JavaScript:if(confirm('Confirm Delete User : <?php echo $result["kskloginname"];?> ?')==true)
{window.location='userdelete.php?loginuser=<?php echo $result["kskloginname"];?>&username=<?php echo $result["name"];?>';}">
  <img src="delete.png" width="25"></a></td>

  <td><?php echo iconv('TIS-620','UTF-8//ignore',$result['servername']); ?></td>
 <td><?php echo $result['ksklogintime']; ?>
</td>

</td>
 </tr>
 <?php } ?>
 </tbody>
 </table>
 <?php
 $sql2 = "select * from onlineuser ";
 $query2 = mysqli_query($con, $sql2);
 $total_record = mysqli_num_rows($query2);
 $total_page = ceil($total_record / $perpage);
echo "<div style='font-size:1.50em;color:black;font-weight:bold;'>จำนวนผู้ใช้งานทั้งหมด : $total_record ราย</div>";
 ?>

 <nav>
 <ul class="pagination">
 <li>
 <a href="index.php?page=1" aria-label="Previous">
 <span aria-hidden="true">&laquo;</span>
 </a>
 </li>
 <?php for($i=1;$i<=$total_page;$i++){ ?>
 <li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
 <?php } ?>
 <li>
 <a href="index.php?page=<?php echo $total_page;?>" aria-label="Next">
 <span aria-hidden="true">&raquo;</span>
 </a>
 </li>
 </ul>
 </nav>
 </div>
 </div>
 </div> <!-- /container -->
 <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
<script>
//Popup window function
function openWindow(){

   var win = window.open('http://www.kapook.com', '1366002941508',  'width=500,height=500,right=375,top=330');
   setTimeout(function(){
       win.close()
   }, 5000);
   return false;
}
 </script>

</html>
