<?php

   session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>
      Online Library Management System
   </title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <style type="text/css">
      nav{
           float: right;
           margin: 20px;
           word-spacing: 35px;
           padding: 20px;
        }
        nav li{
   
           display: inline-block;
           line-height: 90px;
        }
        footer{
    height: 200px;
}
   </style>
</head>
<body>
   <div class="wrapper">
    <header>
      <div class ="logo">
      <img src="images/9.png">
      <h1 style="color: white;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
      </div>
        <?php
        if(isset($_SESSION['login_user'])){
         ?>
      <nav>
         <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOK</a></li>
            <li><a href="logout.php">STUDENT-LOGOUT</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
         </ul>
      </nav>
      <?php 
        }
         else{
            ?>
            <nav>
         <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="books.php">BOOK</a></li>
            <li><a href="studentLogin.php">STUDENT-LOGIN</a></li>
            <li><a href="registration.php">REGISTRATION</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
         </ul>
      </nav>
      <?php 
         }
        ?>
    </header>


    <section>
      <div class = "sectionIma">
      <br><br>
         <div class="box">
            <br><br><br>
            <h1 style="text-align: center; font-size: 40px;">Welcome to  library</h1>
            <br><br>
            <h1 style="text-align: center; font-size: 30px">Open at: 09:00 </h1><br>
            <h1 style="text-align: center; font-size: 30px">Closes at: 15:00 </h1>
         </div>
         </div>
    </section>
</div>
<?php
    include "footer.php";


?>
</body>
</html>