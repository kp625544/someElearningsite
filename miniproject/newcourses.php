
<html>
<head>
	
	
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<style type="text/css">
	.container-fluid{
		background-image: linear-gradient(90deg, #4b6cb7, #182848);
	}
	body{
		background-color:#E6E6FA;
	}
	div.cards{
  		width:150px;
  		height: 100px;
  		margin-left: 150px;
  		margin-top: 20px;
  		display:inline-block;
  		
  	}
  	.w3-card-4{
  		background-color:#90EE90;
  	}

	</style>
	<?php
require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$table = "courses";

$query = "SELECT * FROM `courses` WHERE `Type`='Non Live'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		 $issue="<script type=\"text/javascript\">
					$(function(){
					$('#NotLive').append(\"<div data-name=\\\"".$row['Courses_Name']."\\\" class=\\\"cards w3-card-4 notlive\\\"><center><strong><p>".$row['Courses_Name']."</p></strong></center></div>\");
					});
					</script>";
					
		echo $issue;
	}
}
$query_2 = "SELECT * FROM `courses` WHERE `Type`='Live'";
$result_2 = mysqli_query($conn,$query_2);
if(mysqli_num_rows($result_2) > 0){
	while($row_2 = mysqli_fetch_assoc($result_2)){
		 $issue_2="<script type=\"text/javascript\">
					$(function(){
					$('#Live').append(\"<div class=\\\"cards w3-card-4 live\\\"><center><strong><p>".$row_2['Courses_Name']."</p></strong></center></div>\");
					});
					</script>";
					
		echo $issue_2;
	}
}

mysqli_close($conn);
?>
<script type="text/javascript">
		$(function(){
			$(".notlive").click(function(){
			alert();
				var name = $(this).data().name;
				window.location.href="/miniproject/videopage.php?s="+name+"";
			});
			$(".live").click(function(){
			alert();
				var name = $(this).data().name;
				window.location.href="/miniproject/theultimatepage.php";
			});		
		});
	</script>

	</head>
	<body>
		<div class="container-fluid" style="height:100px ">
			<div>
				<h1 class="col-sm-12 col-lg-9" style="top:30%"><strong><em></strong></em></h1>
			</div>
			<div class="col-sm-12 col-lg-3" style="position:relative; top:25%; right:5%;">

				<button id="profile" type="button" style=" float:right; display:none;" class="btn btn-lg btn-success">Profile</button>
				<button id="login" type="button" style=" float:right; " class="btn btn-lg btn-success">Login</button>
				<button type="button" style=" float:right; margin-right:10px " class="btn btn-lg btn-success">Courses</button>
			</div>
		</div>
		
		<div align="container-fluid" id="NotLive" style="position:relative; width:100%;">
				<h3 align="center">Non Live Courses</h3>
				
			
			
		</div>
		<div align="container-fluid" id="Live" style="position:relative; width:100%;">
				<h3 align="center">Live Courses</h3>
			
		</div>
		
	</body>
	
	</html>