<?php
require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$s=$_GET['s'];
$query = "SELECT * from courses where Courses_Name LIKE '%". $s ."%'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)){
	while($row_2 = mysqli_fetch_assoc($result)){
		$issue_2="<a href=\"/miniproject/videopage.php?s=".$row_2['Courses_Name']."\">".$row_2['Courses_Name']."</a><br/>";
		echo $issue_2;
}
}
mysqli_close($conn);
?>