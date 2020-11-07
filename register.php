<?php

//Code referred from professors database examples and this youtube video:
//https://www.youtube.com/watch?v=NXAHkqiIepc&fbclid=IwAR0aUNUbw0SFZW60E8UaeesWaeB0prZjhdNF2AqLhCZNzDqo6i3WHVvDy3U


// 1. Create a connection to the database
@$dbhost = "localhost";
@$dbuser = "root";
@$dbpass = "";
@$dbname = "jastej_sehra";

// create new connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test if connection succeeded
if (mysqli_connect_errno()) {
    die("Database connection failed:" .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")"
    );
}

$role = "";
if (isset($_POST['Register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "select * from usertable where name = '$username'";
    $result = mysqli_query($connection, $query);
    $num = mysqli_num_rows($result);


    if ($num >= 1) {
        echo "<script>alert('Username Already Exists. Please choose a different username.')</script>";
    } else {
        $reg = "Insert into usertable(name,password,role) values ('$username','$password','member')";
        mysqli_query($connection, $reg);
        echo "<script>alert('Registration complete. Please Go to Login Page to Continue.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Store</title>

        <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <!--Font-Awesome CDN-->

      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="style/style.css"/>

      <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<html>

<body>
  <div id="top" >                                         <!--Top Bar Start-->
    <div class="container">                               <!--Container Start-->
      <div class="col-md-6 offer">                        <!--col-md-6 Start-->
        <a href="#" class="btn btn-success btn-sm" >
          Welcome Guest
        </a> <!--using bootstrap's btn and btn-success class and making the button small with btn-sm class-->
        <!--Bootstrap classes- https://www.w3schools.com/bootstrap/bootstrap_ref_all_classes.asp-->
      </div><!--col-md-6 End-->

      <div class="col-md-6"><!---->
        <ul class="menu">
          <li>
            <a href="register.php">Register Here</a>
          <li>
            <a href="login.php">Login</a>
      </div>

    </div><!--Container End-->
  </div><!--Top Bar End-->


  <div class="navbar navbar-default" id="navbar"> <!--navbar Start-->
    <div class="container"> <!--navbar container start-->
      <div class="navbar-header"> <!--navbar header start-->
        <a class="navbar-brand home">
          <img src="images/logo.jpg" alt="logo" class="hidden-xs"> <!--hidden xs hides the logo when screen is extra small-->
          <img src="images/logoShort.jpg" alt="logo" class="visible-xs">
        </a>
      </div><!--navbar header end-->
    </div> <!--navbar container end-->
  </div><!--navbar default end-->


  <div id="content">
    <div  class="container">
         <div class="col-md-12"><!--colmd9-->
           <div class="box">
             <div class="box-header">
               <center>
                 <h1>Register<h1>
                   <p class="contactUsP">Make a new account with us and start shopping.  </p>
               </center>
             </div><!--boxheader end-->
             <div>
               <center>
                 <form action="" method="post">
                     <div class="container-center">
                         <label for="username"><b>Username</b></label>
                         <input type="text" placeholder="Create a Username" name="username" required>
                         <br>

                         <label for="password"><b>Password</b></label>
                         <input type="password" placeholder="Create Password" name="password" required>
                         <br>

                         <button class="btn btn-primary" type="submit" name="Register">Register New Account</button>
                         <br>
                     </div>
                 </form>
                 <a href="login.php" class="btn btn-custom-cart"  >Go to Login Page </a>

                </center>
            </div>
           </div><!--box end-->
         </div><!--colmd12 end-->
    </div><!--container end-->
  </div><!--content end-->
