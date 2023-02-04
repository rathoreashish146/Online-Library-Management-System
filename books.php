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
         padding-left: 70%;
      }
 body {
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
                   
  <div class="h"><a href="books.php">Books</a></div>
  <div class="h"><a href="request.php">Book Request</a></div>
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
   




   <!------------------search bar------------  -->
      <div class="srch"> 
         <form class="navbar-form" method="post" name="form1">
            <input class = "form-control" type="text" name="search" placeholder="Search Books.." required="">
            <button style="background-color: #40cbfc;" type="submit" name="submit" class="btn btn-default">
               <span class="glyphicon glyphicon-search"></span>
            </button>
         </form>

         <!--------palceholder for requesting a book-------------->

         <form class="navbar-form" method="post" name="form1">
            <input class = "form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
            <button style="background-color: #40cbfc;" type="submit" name="submit1" class="btn btn-default">
               SUBMIT REQUEST
            </button>
         </form>
      </div>
   

       <h2 style="margin-left: 40%; margin-bottom: 10px; font-size: 40px;">List of Books</h2>
       
       <?php
            
            if(isset($_POST['submit'])){
               $q = mysqli_query($db,"SELECT * FROM books WHERE name LIKE '%$_POST[search]%' ");
               if(mysqli_num_rows($q)==0){
                  echo "Sorry! No book found. Try searching again.";
               }

               else{
                  echo "<table class = 'table table-bordered table-hover' >";
           echo "<tr style='background-color:#40cbfc;'>";

               echo "<th>"; echo "ID"; echo "</th>";
               echo "<th>"; echo "Book-Name"; echo "</th>";
               echo "<th>"; echo "Authors-Name"; echo "</th>";
               echo "<th>"; echo "Edition"; echo "</th>";
               echo "<th>"; echo "Quantity"; echo "</th>";
               echo "<th>"; echo "Department"; echo "</th>";
               echo "<th>"; echo "Status"; echo "</th>";
               echo "</tr>";
               while($row = mysqli_fetch_assoc($q)){
                  echo "<tr>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $row['name']; echo "</td>";
                  echo "<td>"; echo $row['authors']; echo "</td>";
                  echo "<td>"; echo $row['edition']; echo "</td>";
                  echo "<td>"; echo $row['quantity']; echo "</td>";
                  echo "<td>"; echo $row['department']; echo "</td>";
                  echo "<td>"; echo $row['status']; echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
               }
            }
            /* if button is not pressed  */
            else{
                 $res = mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");
           echo "<table class = 'table table-bordered table-hover' >";
           echo "<tr style='background-color:#40cbfc;'>";

               echo "<th>"; echo "ID"; echo "</th>";
               echo "<th>"; echo "Book-Name"; echo "</th>";
               echo "<th>"; echo "Authors-Name"; echo "</th>";
               echo "<th>"; echo "Edition"; echo "</th>";
               echo "<th>"; echo "Quantity"; echo "</th>";
               echo "<th>"; echo "Department"; echo "</th>";
               echo "<th>"; echo "Status"; echo "</th>";
               echo "</tr>";
               while($row = mysqli_fetch_assoc($res)){
                  echo "<tr>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $row['name']; echo "</td>";
                  echo "<td>"; echo $row['authors']; echo "</td>";
                  echo "<td>"; echo $row['edition']; echo "</td>";
                  echo "<td>"; echo $row['quantity']; echo "</td>";
                  echo "<td>"; echo $row['department']; echo "</td>";
                  echo "<td>"; echo $row['status']; echo "</td>";
                  echo "</tr>";
               }
               echo "</table>";
            }
          
          if(isset($_POST['submit1'])){
          if(isset($_SESSION['login_user'])){
            mysqli_query($db,"INSERT INTO issue VALUES ('$_SESSION[login_user]','$_POST[bid]','','','')");
            ?>
            <script type="text/javascript">
              window.location="request.php";
            </script>
            <?php 
          }
          else{
       ?>
            <script type="text/javascript">
              alert("You need to login first to Request a book.");
            </script>
            <?php 
          }
        }
       ?>
       </div>

</body>
</html>