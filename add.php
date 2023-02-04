<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Books</title>
   <style type="text/css">
      .srch{
         padding-left: 80%;
      }
      body {
        background-color: #8ae960;
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.h:hover{ 
     color: white; 
/*     width: 200px;*/
     height: 50px;
     background-color: red;

    
   }
    .container{
      text-align: center;
      width: 400px;
    }



   </style>

</head>
<body><!-- -------------side nav----------->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   
      <div style="color: white; font-size: 20px; text-align: center;">
                      <?php

                      if(isset($_SESSION['login_user'])){
                      echo "<img  class='img-circle profile_img' height=120px width=120px src= 'images/".$_SESSION['pic']."'>";
                      echo "</br>";
                      echo "Welcome ".$_SESSION['login_user'];
                   }
                     ?>
      </div><br><br>
                   
  <div class="h"><a href="add.php">Add Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  <div class="container">
    <h2 style="color:black; font-size: 40px;font-weight: bold;">Add New Books</h2><br><br>
    <form action="" method="post">
       <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
       <input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
       <input type="text" name="authors" class="form-control" placeholder="Author Name" required=""><br>
       <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
       <input type="text" name="quantity" class="form-control" placeholder="Quatity" required=""><br>
       <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
       <button class="btn btn-default" type="submit" name="submit">ADD</button>
    </form>

  </div>
   <?php
        if(isset($_POST['submit'])){
          if(isset($_SESSION['login_user'])){
            mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]','$_POST[name]','$_POST[authors]','$_POST[edition]','$_POST[quantity]','$_POST[department]','available')");
            ?>
            <script type="text/javascript">
              alert("Book Added Successfully..");
            </script>
            <?php 
          }
          else{
       ?>
            <script type="text/javascript">
              alert("You need to login first.");
            </script>
            <?php 
          }
        }

   ?>

</div>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
