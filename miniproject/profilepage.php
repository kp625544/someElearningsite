<?php
session_start();

require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$username="vineet";
$table = "profile";
$query="SELECT * from $table where username='$username'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);



?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#add").click(function(){
			var course = $("#course_name").val();
		});

		<?php
		


			echo"$(\"#profilepic\").attr('src','".$row['upload_address']."')";

		
		
		?>
	});
	</script>
	<style type="text/css">
	.container-fluid{
		background-image: linear-gradient(90deg, #4b6cb7, #182848);
	}
	h2{
		display: inline-block;
	}
	</style>
</head>
<body>
	<div class="container-fluid" style="height:100px ">
		<div>
			<h1 class="col-sm-6 col-lg-9" style="top:25%; "><strong><em>Coursecademy</strong></em></h1>
		</div>
		<div class="col-sm-6 col-lg-3" style="position:relative; top:25%; right:5%; ">
			<button type="button" style=" float:right; margin-right:10px " class="btn btn-lg btn-success">Courses</button>		</div>
		</div>
		<div class="container">
			<div class="panel panel-default" style="background-color:#FFFF;">
				<div class="panel-heading">
					<h1 class="panel-title">My Profile</h1>
				</div>
				<div class="panel-boby">
					<img id="profilepic"  src="/miniproject/img/defaultthididdetasddefaultsothatnonecanseethis.jpg"
					alt="Your dp goes here" width="200px" height="200px">
					<?php
					echo "<h2>".$row['username']."</h2>
					<h4>Email:".$row['email']."</h4>	
					<h4>Institute:".$row['institute']."</h4>	";
					?>
		</div>

				</div>


			</div>


		</div>
		<!--modal-->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Start a Live Course</h4>
					</div>
					<form method="post">
					<div id="modal-body" class="modal-body">
						<input type="text" id="course_name" placeholder="Enter Course Name">
					</div>
					<div class="modal-footer">
						<button id="add" type="submit" class="btn btn-default">Add</button>
					</div>
					</form>
				</div>

			</div>
		</div>
	</div>

</body>
</html>