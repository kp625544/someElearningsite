

<html>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
	var first = $("a:first").data().link;
	$('#video').attr('src',first);
	$('a').click(function(){
		var $link =$(this).data().link;
		//alert($link);
		$('#video').attr('src',$link);
	});
});
</script>
<style type="text/css">
@media screen and (max-width:100px;){
    h1{
        width:100px;
    }
    .container-fluid{
        height:150px;
    }
}

li{
	width: 200px;
	top:120px;
	padding:10px;
}
iframe{
	position: fixed;
	top: 200px;
	left: 400px
}
.container-fluid{
        background-image: linear-gradient(90deg, #4b6cb7, #182848);
        top:0px;
        width: 100%;
    }


    body{
        background-color:#E6E6FA;
    }
</style>
</head>
<body>

	<div class="container-fluid" style=" position:absolute; top:0px; height:100px; width=100%;">
        <div>
            <a href="index.php"><h1 class="col-sm-12 col-lg-6" style="top:25%; height:40px; width=300px;"><strong><em>Coursecademy</strong></em></h1></a>
        </div>
        <div class="col-sm-12 col-lg-6" style="position:relative; top:25%; right:5%;">
            <button id="logout" type="button" style="margin-right:10px;margin-left:10px; float:right; display:none;" class="btn btn-lg btn-danger">Log Out</button>
            <button id="profile" type="button" style=" float:right; display:none;" class="btn btn-lg btn-warning">Profile</button>
            <a href="formpage.php"<button id="login" type="button" style=" float:right; " class="btn btn-lg btn-success">Login</button></a>
            <button id="Courses" type="button" style=" float:right; margin-right:10px " class="btn btn-lg btn-success">Courses</button>
        </div>
    </div>
    <div id='navlist'><ul class='nav nav-pills nav-stacked'>
    <?php
$table=$_GET["s"];
require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "Select * from $table";
$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		echo "<li><a href='#'class='link' data-link=".$row["link"]."> ".$row["lect_name"]."</a></li>";

	}
}


mysqli_close($conn);
?>
</ul></div>
<iframe id="video" width="560" height="315" src="" frameborder="0" allowfullscreen></iframe></body>
</html>
