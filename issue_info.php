 
 <?php
   include "connection.php";
   include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Book Request</title>
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

   </style>
</head>
<body>
   <!-- -------------side nav----------->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

   
      <div style="color: white; font-size: 20px; text-align: center;">
                      <?php
                    
                    $c=0;
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
  <div class="h"><a href="expire_info.php">Expired List</a></div>
</div>
   
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

 <div class="container"><br>
      <h2>Information of Borrowed Books</h2>       
    <br>

  <?php
  
         if(isset($_SESSION['login_user'])){
               $sql= "SELECT student.username,facultyNo,books.bid,name,authors,edition,issue,issue.return FROM student inner join issue ON student.username=issue.username inner join books ON issue.bid = books.bid WHERE issue.approve='Yes' ORDER BY `issue`.`return` ASC";
                $res= mysqli_query($db,$sql);  
               


               if(mysqli_num_rows($res)==0){
                echo "<br><br><br>";
                echo "<h>";
                  echo "There is no request information.";
                  echo "</h2>";
               }
               else{
              echo "<table class = 'table table-bordered' >";
           echo "<tr style='background-color:#40cbfc;'>";

               echo "<th>"; echo "Student Username"; echo "</th>";
               echo "<th>"; echo "Faculty No"; echo "</th>";
               echo "<th>"; echo "Book ID"; echo "</th>";
               echo "<th>"; echo "Name"; echo "</th>";
               echo "<th>"; echo "Authors"; echo "</th>";
               echo "<th>"; echo "Edition"; echo "</th>";
               echo "<th>"; echo "Issue Date"; echo "</th>";
               echo "<th>"; echo "Return Date"; echo "</th>";
               echo "</tr>";
               while($row = mysqli_fetch_assoc($res)){
               	$var='<p style="color:yellow; background-color:red;">EXPIRED</p>';
                  $d=date("Y-m-d");
                  if($d > $row['return']){
                  	$c=$c+1;
                  	mysqli_query($db,"UPDATE issue SET approve='$var' where `return`='$row[return]' and approve = 'Yes' limit $c;");
                  }



                  echo "<tr>";
                  echo "<td>"; echo $row['username']; echo "</td>";
                  echo "<td>"; echo $row['facultyNo']; echo "</td>";
                  echo "<td>"; echo $row['bid']; echo "</td>";
                  echo "<td>"; echo $row['name']; echo "</td>";
                  echo "<td>"; echo $row['authors']; echo "</td>";
                  echo "<td>"; echo $row['edition']; echo "</td>";
                  echo "<td>"; echo $row['issue']; echo "</td>";
                  echo "<td>"; echo $row['return']; echo "</td>";

                  echo "</tr>";
               }
               echo "</table>";
               }
            }
             
      ?>
</div>
    </div>
</div>
</body>
</html>
