<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "leaning";
$name= $_POST["username"];
$user_password= $_POST["password"];
$emailid= $_POST["email"];
$institute = $_POST["institute"];
$one=0;
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "INSERT INTO profile (username, password, email,institute) values ('$name', '$user_password', '$emailid','$institute')";
if(mysqli_query($conn,$query)){
    

    
    echo '
       <div class="container" display="block">
        <div class="h2 text-success text-center">
            <h3>You Can Now Login!!!</h3>
        </div>
       </div>';
}
else{
    echo "Error: ". $query."<br>".mysqli_error($conn);
}

mysqli_close($conn);
?>