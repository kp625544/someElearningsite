<?php
session_start();

require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$table = "courses";
?>

<html>
<head>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/ajax.js"></script>
    <style type="text/css">
    @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
    /* HERE STARTS THE MAGIC */

    .container-fluid{
        background-image: linear-gradient(90deg, #4b6cb7, #182848);
    }

    .stylish-input-group .input-group-addon{
        background: white !important;
    }
    .stylish-input-group .form-control{
        border-right:0;
        box-shadow:0 0 0;
        border-color:#ccc;
    }
    .stylish-input-group button{
        border:0;
        background:transparent;
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
    <script type="text/javascript">
    $(function(){
       <?php
       if(isset($_SESSION['username'])){
          $loginusername=$_SESSION['username'];

            echo "
            $('#profile').html('$loginusername');
            $('#logout').css('display','block');
            $('#profile').css('display','block');
            $('#login').css('display','none');";
          }
        ?>
        $("#head").click(function(){
          window.location.href="/miniproject/"
        });
        $("#search").click(function(){
            $("#modal-body").html("");
            var searchterm = $("#search_field").val();
            search(searchterm);
            });
          $("#Courses").click(function(){
            window.location.href="/miniproject/newcourses.php";
            });
          $("#login").click(function(){
            window.location.href="/miniproject/formpage.php";
            });

        $("#logout").click(function(){
        $(this).css('display','none');
        $("#profile").css('display','none');
        $("#login").css('display','block');
        window.location.href="/miniproject/logout.php";
        });
        $(".cards").click(function(){
        var name = $(this).data().name;
        window.location.href="/miniproject/videopage.php?s="+name+"";
      });

   });
   $(function(){
       $("#search_field").keyup(function(){

           var str = $(this).val();
           livesearch(str);
       });
   });
    </script>
    <?php
require_once('conn.php');
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$table = "courses";

$query = "SELECT * FROM `courses`";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
     $issue="<script type=\"text/javascript\">
          $(function(){
          $('.xcontainer').append(\"<div data-name=\\\"".$row['Courses_Name']."\\\" class=\\\"cards w3-card-4\\\"><center><strong><p>".$row['Courses_Name']."</p></strong></center></div>\");
          });
          </script>";

    echo $issue;
  }
}
mysqli_close($conn);
?>
</head>
<body>

    <div class="container-fluid" style="height:100px; width=100%;">
        <div>
            <a href="/miniproject/"><h1 id="head" class="col-sm-12 col-lg-6" style="top:25%; height:40px; width=300px;"><strong><em>Coursecademy</strong></em></h1></a>
        </div>
        <div class="col-sm-12 col-lg-6" style="position:relative; top:25%; right:5%;">
            <button id="logout" type="button" style="margin-right:10px;margin-left:10px; float:right; display:none;" class="btn btn-lg btn-danger">Log Out</button>
            <a href="/miniproject/redirect.php"><button id="profile" type="button" style=" float:right; display:none;" class="btn btn-lg btn-warning">Profile</button></a>
            <button id="login" type="button" style=" float:right; " class="btn btn-lg btn-success">Login</button>
            <button id="Courses" type="button" style=" float:right; margin-right:10px " class="btn btn-lg btn-success">Courses</button>
        </div>
    </div>
    <div  class="" style="width:100%; height:400px">
        <img style="width:100%; height:400px" src="Bitmap.png">
        <div class="container" style="position:absolute; top:300px">
            <div class="row">

                <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container">
                        <div class="input-group stylish-input-group">

                            <input id="search_field"  type="text" class="form-control" placeholder="Search" >
                            <span class="input-group-addon">
                                <button  type="submit" id="search" style="align:center;" data-toggle="modal" data-target="#myModal">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <p id="search-output"></p>
   <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Search Results</h4>
      </div>
      <div id="modal-body" class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <div class="container xcontainer" style="position:relative;  height:400px;">
        <h3 align="center">Popular Courses</h3>

    </div>
    <div id="footer" style="position:relative; background-color:#A9A9A9; top:100px">
        <div class="container">
            <div class="row">
                <h3 class="footertext">About Us:</h3>
                <br>
                <div class="col-md-4">
                    <center>
                      <img src="http://oi60.tinypic.com/w8lycl.jpg" class="img-circle" alt="the-brains">
                      <br>
                      <h4 class="footertext">Kaushal Parikh</h4>
                  </center>
              </div>
              <div class="col-md-4">
                <center>
                  <img src="http://oi60.tinypic.com/2z7enpc.jpg" class="img-circle" alt="...">
                  <br>
                  <h4 class="footertext">Raunak Khithani</h4>
              </center>
          </div>
          <div class="col-md-4">
            <center>
              <img src="http://oi61.tinypic.com/307n6ux.jpg" class="img-circle" alt="...">
              <br>
              <h4 class="footertext">Vineet Hariharan</h4>
          </center>
      </div>
  </div>
  <div class="row">
    <p><center><p class="footertext">Copyright 2014</p></center></p>
</div>
</div>
</div>

<!-- /.container-fluid -->

</body>
</html>
