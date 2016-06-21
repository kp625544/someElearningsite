<?php
require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$s=$_GET['s'];
$query = "Select * from profile where username = '".$s."'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)){
	echo "yes";
}
else echo "no";




mysqli_close($conn);
?>