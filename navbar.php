<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title></title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
      
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            
           <div class ="navbar-header">
           <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
           </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php">HOME</a></li>
                <li><a href="books.php">BOOK</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
            <?php
            if(isset($_SESSION['login_user'])){
            ?>
             <ul class="nav navbar-nav">
                <li><a href="profile.php">PROFILE</a></li>
             </ul>
            <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php">
                      <div style="color: white;">
                      <?php
                      echo "<img  class='img-circle profile_img' height=17px width=17px src= 'images/".$_SESSION['pic']."'>";
                      echo " ".$_SESSION['login_user'];
                     ?>
                     </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon
                  glyphicon-log-out"> LOGOUT</span></a></li>
              </ul>

        <?php 
              
   }
   else{
    ?>

        <ul class="nav navbar-nav navbar-right">

                 <li><a href="studentLogin.php"><span class="glyphicon
                  glyphicon-log-in"> LOGIN</span></a></li>
    
                 <li><a href="registration.php"><span class="glyphicon
                  glyphicon-user"> SIGN UP</span></a></li>
              </ul>
        <?php 
   }
   ?>
        </div>
        </nav>
</body>
</html>