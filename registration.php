<?php
   include "navbar.php";
   include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Registration</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <style type="text/css">
        .navbar{
           margin-bottom: 0px;
        }
    </style>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



     <section>
         <div class="reg_img">
          <br><br><br><br>
         <div class="box1">
            <h1 style="text-align: center; font-size: 30px;">Library Management System</h1>
   
            <h1 style="text-align: center; font-size: 20px">User Registration Form</h1>
            <form name="registration" action="" method="post">
                <div class="login">
                	<br>
                <input class = "form-control" type="text" name="firstName" placeholder="First Name" required=""><br>
                <input  class = "form-control" type="text" name="lastName" placeholder="Last Name"><br>
                <input  class = "form-control" type="text" name="facultyNo" placeholder="Faculty No" required=""><br>
                <input class = "form-control"  type="text" name="enrollmentNo" placeholder="Enrollment No" required=""><br>
                <input class = "form-control"  type="text" name="username" placeholder="Username" required=""><br>
                <input class = "form-control"  type="text" name="email" placeholder="Email" required=""><br>
                <input class = "form-control"  type="password" name="password" placeholder="Password" required=""><br>
                <input class =" btn btn-default" type="Submit" name="Submit" value="Sign Up" style="color: black; width: 70px; padding-bottom: 5px;">   
                </div>
            </form>
         </div>
         </div>	
     </section>

      <?php

        if(isset($_POST['Submit'])){
            
        $count =  0;
        $sql="SELECT username from student";

        $res = mysqli_query($db,$sql);
        while($row = mysqli_fetch_assoc($res)){
            if($row['username']==$_POST['username']){
                $count++;
            }
        }

        if($count == 0){

        mysqli_query($db,"INSERT INTO `Student` VALUES('$_POST[firstName]','$_POST[lastName]','$_POST[facultyNo]','$_POST[enrollmentNo]','$_POST[username]','$_POST[email]','$_POST[password]');");
       ?>
       <script type="text/javascript">
           alert("Registration Successful");
       </script>


        <?php
        }
        else{
            ?>
       <script type="text/javascript">
           alert("username already exist.");
       </script>

        <?php
        }

}

      ?>

</body>
</html>
