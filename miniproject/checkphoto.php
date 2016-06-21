<?php
require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection"/miniproject/img/defaultthididdetasddefaultsothatnonecanseethis.jpg"
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$s=$_GET['s'];
$query = "Select * from profile where username = '".$s."'";
$result = mysqli_query($conn,$query);
mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
	if($row=='NULL' || !$row || $s=='')
		echo "/miniproject/img/defaultthididdetasddefaultsothatnonecanseethis.jpg" ;
	else echo $row['upload_address'];




mysqli_close($conn);
?>