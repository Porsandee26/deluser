<html>
<head><title>Line Notify</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <SCRIPT language="JavaScript">
   alert("Register Successfully");
  window.location='showdata.php';

  </SCRIPT>
<head>
<body>
<?php
	mysql_connect("192.168.2.220","sa","sa");
	mysql_select_db("hos_log");
$strSQL = "INSERT INTO pt_token (id,hn,token) VALUES ('','".$_POST["txtHn"]."','".$_POST["txtToken"]."') ";
$objQuery = mysql_query($strSQL);


if ($objQuery) {
  mysql_connect("192.168.2.220","sa","sa");
	mysql_select_db("hos");
$strSQL2 = "select concat(fname,space(1),lname) ptname from patient where hn='".$_POST["txtHn"]."' ";
$objQuery2 = mysql_query($strSQL2);
$objResult = mysql_fetch_array($objQuery2);
$token=$_POST["txtToken"];
$lineapi=$token;
$ptname=iconv('TIS-620','UTF-8//ignore',$objResult['ptname']);
echo $_POST["txtHn"];
echo $ptname;
echo $lineapi;

    $mms =$ptname;

    date_default_timezone_set("Asia/Bangkok");

    $chOne = curl_init();
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt( $chOne, CURLOPT_POST, 1);
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=คุณ$mms ได้ทำการลงทะเบียนการรับบริการแจ้งเตือนนัดล่วงหน้า ผ่านโปรแกรมไลน์เรียบร้อยแล้วค่ะ ");
    curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
    $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec( $chOne );
    if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
    else { $result_ = json_decode($result, true);
    echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
    curl_close( $chOne );
    }

	mysql_close();

?>
</body>
</html>
