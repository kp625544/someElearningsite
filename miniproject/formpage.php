<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/form.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/form.js"></script>
    <script src="js/ajax.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#regusername").keyup(function(){

                var str = $(this).val();
                process(str);
            });
        });
        $(function(){
            $("#username").focusout(function(){

                var str = $(this).val();

                thephotothing(str);
            });
        });


    </script>

    <style type="text/css">
                    #submitphoto{
            background-color:#1CC32B;
            border:1px solid #fff;
            font-weight:700;
            font-size:18px;
            color:#fff;
            width:150px;
            height:30px;
            border-radius:3px;
            padding:2px;
            box-shadow:0 1px 1px 0 #a9a9a9;
            margin-left:20px;
}
#upload{
width:115px;
height:115px;
background-color:#4b6cb7;
background-repeat:no-repeat;
margin-left:35px;
box-shadow:0 0 10px grey;
background-position:5px
}
#file{
opacity:0;
width:115px;
height:115px
}
            body{
            background-color:#E6E6FA;
            }
            .container-fluid{
            background-image: linear-gradient(90deg, #4b6cb7, #182848);
            position: absolute;
            width:100%;
            top:0px;
            }
            .container{
                position: absolute;
                top:150px;
                left:100px;
            }
    </style>
  </head>
<body>
    <div class="container-fluid" style="height:100px ">
            <div>
              <a href="index.php">  <h1 class="col-sm-6 col-lg-9" style="top:25%"><strong><em>Coursecademy</strong></em></h1></a>
            </div>
            <div class="col-sm-6 col-lg-3" style="position:relative; top:25%; right:5%;">


                <button type="button" style=" float:right; margin-right:10px " class="btn btn-lg btn-success">Courses</button>
            </div>
     </div>
   <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form" action="form.php" method="post" style="display: block;">
                                    <div class="form-group">
                                        <img id="profilepic" src="/miniproject/img/defaultthididdetasddefaultsothatnonecanseethis.jpg"
                                        alt="Your dp goes here" width="200px" height="200px">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="loginusername" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="loginpassword" id="password" tabindex="2" class="form-control" placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <form id="register-form" enctype="multipart/form-data" action="register.php" method="post" role="form" style="display: none;" onsubmit= "return checkForm(this)";>

                                    <div class="form-group">
                                        <input type="text" name="username" id="regusername" tabindex="1" class="form-control" placeholder="Username" value=""><span id="display" class="glyphicon "></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="institute" id="institute" tabindex="1" class="form-control" placeholder="Institute"value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password"><span id="passdisplay" class = "glyphicon" color="red"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <span id ="finalconfirm" color="red"></span>
                                                <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
