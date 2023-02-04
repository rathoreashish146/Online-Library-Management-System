<?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Approve Request</title>
   <style type="text/css">
      .srch{
         padding-left: 70%;
      }
 body {
  background-image: url(images/13.jpg);
  background-repeat: no-repeat;
  font-family: "Lato", sans-serif;
}
.container{
  font-size: 30px;
  text-align: center;
  color: white;
  background-color: black;
  opacity: .7;
  width: 100%;
  height:630px;
  overflow: auto;
  style="text-align: center; 

/*  margin: -67px auto;*/
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
.srch{
  margin-top: 40px;
}
.Approve{
   margin: 50px auto;
   padding-left: 30%;
   padding-right: 30%;
}
   </style>
</head>
<body>
   <!-- -------------side nav----------->

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
                   
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>

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
   <div class="container">
     <h3 style="margin-top:50px;margin-bottom: 20px;">Approve Request</h3>
     <form class="Approve" action="" method="post">
         <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>
         <input class="form-control" type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required=""><br>
         <input class="form-control" type="text" name="return" placeholder="Return Date yyyy-mm-dd" required=""><br>
         <button class="btn btn-default" type="submit" name="submit">
           Approved
         </button>
     </form>
   </div>
</div>
<?php 
   if(isset($_POST['submit'])){

    mysqli_query($db,"UPDATE `issue` SET  `approve` ='$_POST[approve]', `issue` ='$_POST[issue]', `return` ='$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");
    mysqli_query($db,"UPDATE `books` SET `quantity`=quantity-1 WHERE bid ='$_SESSION[bid]';");

    $res = mysqli_query($db,"SELECT `quantity` from `books` where bid='$_SESSION[bid]';");

    while($row=mysqli_fetch_assoc($res)){
      if($row['quantity']==0){
           mysqli_query($db,"UPDATE `books` SET `status`='Not available' WHERE bid ='$_SESSION[bid]';");
      }
    }
    ?>
    <script type="text/javascript">
      alert("Updated Successfully.");
      window.location="request.php";
    </script>
    <?php
   }
  
?>
</body>
</html>
