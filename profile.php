<?php
   include "navbar.php";
   include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
   <style type="text/css">
      .wrapper{
         width: 400px;
         margin: 0 auto;
         color: black;
      }
   </style>
</head>
<body style="background-color: #4e66db;">
     <div class="container">
     	
      <div class="wrapper">

      <?php
         $q=mysqli_query($db,"SELECT * FROM student where username='$_SESSION[login_user]';");

         ?>
         <h2 style="text-align: center; font-size: 40px;">My profile</h2><br><br>
         <?php
            $row = mysqli_fetch_assoc($q);
            echo "<div style='text-align: center;'><img class='img-circle profile_img' height = 150px width = 150px src= 'images/".$_SESSION['pic']."'></div>";
         ?>
         <br>
         <div style="text-align:center;">
            <b>Welcome </b>
            <br>
         <h4>
            <?php
            echo $_SESSION['login_user'];
            ?>
         </h4><br><br>
         </div>
         <?php
            echo "<table class = 'table table-bordered table-hover' >";
                  echo "<tr>";
                  echo "<th>"; echo "First-Name:"; echo "</th>";
                  echo "<td>"; echo $row['firstName']; echo "</td>";
                  echo "</tr>";

                  echo "<tr>";
                  echo "<th>"; echo "Last-Name:"; echo "</th>";
                  echo "<td>"; echo $row['lastName']; echo "</td>";
                  echo "</tr>";

                  echo "<tr>";
                  echo "<th>"; echo "Faculty No:"; echo "</th>";
                  echo "<td>"; echo $row['facultyNo']; echo "</td>";
                  echo "</tr>";

                  echo "<tr>";
                 echo "<th>"; echo "Enrollment No:"; echo "</th>";
                  echo "<td>"; echo $row['enrollmentNo']; echo "</td>";
                  echo "</tr>";

                  echo "<tr>";                                 
                  echo "<th>"; echo "Username:"; echo "</th>";

                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "</tr>";

                  echo "<tr>";
                  echo "<th>"; echo "Email id:"; echo "</th>";
                  echo "<td>"; echo $row['email']; echo "</td>";
                  echo "</tr>";
                 
      
               echo "</table>";
         ?>
      </div>
     </div>
</body>
</html>