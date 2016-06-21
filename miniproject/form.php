<?php
	session_start();
$connection = mysqli_connect('localhost', 'root','','leaning') or die("Server Not Found");
$name= $_POST['loginusername'];
$user_password= $_POST['loginpassword'];
$query="SELECT username from profile where username = '$name' && password = '$user_password'";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)==1){
	$row = mysqli_fetch_assoc($result);
	echo $row['username'];

	echo $_SESSION['username']=$row['username'];

	if(isset($_SESSION['username']))
	header("Location: /miniproject/");

}
?>