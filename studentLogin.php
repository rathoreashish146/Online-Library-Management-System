<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Login</title>

	<link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        .navbar{
           margin-bottom: 0px;
        }
        .alert-danger {
    color: white;
    background-color: red;
    border-color: #ebccd1;
}
    </style>
</head>
<body>

     <section>
         <div class="log_img">
        <br><br>
         <div class="box">
            <h1 style="text-align: center; font-size: 40px;">Library Management System</h1>
            <br>
            <h1 style="text-align: center; font-size: 30px">User Login Page</h1>
            <form name="login" action="" method="post">
                <div class="login">
                    <br>
                <input class = "form-control" type="text" name="username" placeholder="Username" required=""><br>
                <input class = "form-control" type="password" name="password" placeholder="Password" required=""><br>
                <input class =" btn btn-default" type="Submit" name="Submit" value="Login" style="color: black; width: 70px; padding-bottom: 5px;">          </div>
                <p style="color:white; padding-left: 15px;">
                    <br>
                    <a style="color:white;" href="update_password.php">Forgot Password?</a>
                    <br><br>
                    New to this website? 
                    <a style="color:white;" href="registration.php">
                    Sign Up</a>
                </p>

                </form>
            
         </div>
         </div>	

     </section>
      <?php

        if(isset($_POST['Submit'])){
        
        $count =0;
        $res = mysqli_query($db,"SELECT * FROM student WHERE username ='$_POST[username]' && password = '$_POST[password]';");

        $row=mysqli_fetch_assoc($res);
        $count = mysqli_num_rows($res);

        if($count == 0){

       ?>
         <div class="alert alert-danger" style="width:700px; margin-left: 500px;">
             <strong>
                 username and password doesn't match.
             </strong>
         </div>
         <?php 
        }
        else{

            /* ----------user name and password match----*/

              $_SESSION['pic']=$row['pic'];
              $_SESSION['login_user'] = $_POST['username'];
            ?>

       <script type="text/javascript">
           window.location = "index.php";
       </script>
        <?php 
        }

}
      ?>

</body>
</html>