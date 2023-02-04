<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Feedback</title>

  <style type="text/css">
     body{
        background-image: url("images/66.jpg");
     }
     .wrapper{
           width: 900px;
           height: 600px;
           background-color:black;
           color: white;
           margin: -20px auto;
           padding: 10px;
           opacity: .6;
     }
     .form-control{
       height: 70px;
       width: 60%;
     }
     form{
/*      text-align: center;*/
      margin-left: 30%;
     }
     .scroll {
    width: 100%;
    height: 300px;
    overflow: auto;

}
  </style>
</head>
<body>
    <div class="wrapper">

       <h1 style="text-align: center; font-size:50px;">If you have any suggesions or questions please comment below</h1>

       <form style="color: black;" action="" method="post">
           <input class="form-control" type="text" name="Comments" placeholder="Write Something..."><br>
           <input class="btn btn-default" type="submit" name="submit" value="Comment" style="width:100px; height:35px;">
       </form>

    <div class="scroll">
      <br><br>
       <?php
         if(isset($_POST['submit'])){

         $sql = "INSERT INTO `comments` VALUES(NULL,'$_SESSION[login_user]','$_POST[Comments]')";
            if(mysqli_query($db,$sql)){
               $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
               $res = mysqli_query($db,$q);

           echo "<table class = 'table table-bordered' >";
         
               while($row = mysqli_fetch_assoc($res)){
                  echo "<tr>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                   echo "<td>"; echo $row['Comments']; echo "</td>";
                  echo "</tr>";
               }
         
            }

           }
           else{
               $q = "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
               $res = mysqli_query($db,$q);

           echo "<table class = 'table table-bordered' >";
         
               while($row = mysqli_fetch_assoc($res)){
                  echo "<tr>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                   echo "<td>"; echo $row['Comments']; echo "</td>";
                  echo "</tr>";
               }
         
           }


       ?>
    </div>
    </div>
</body>
</html>