<?php
    include "connection.php";
    include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<style type="text/css">
		body{
			height: 650px;
			background-color: #182db3;
			background-image: url("images/12.jpg");
			background-repeat: no-repeat;
		}
		.wrapper{
			width: 400px;
			height: 400px;
			background-color: black;
			margin: 100px auto;
			color: white;
			padding: 25px 15px;
		}
	</style>


</head>
<body>
	<div class="wrapper">
		<div>
				<h1 style="text-align: center; font-size: 40px;">Change Your Password</h1>
	</div>
        <form action="" method="post"><br>
        	<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
        	<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
        	<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
        	<button class="btn btn-default" type="submit" name="submit">Update
        	</button><br>
        </form>
	</div>
	<?php
     if(isset($_POST['submit'])){
     	if(mysqli_query($db,"UPDATE student SET password = '$_POST[password]' WHERE username='$_POST[username]' AND email = '$_POST[email]';")){
     		?>
             <script type="text/javascript">
             	alert("The Password Updated Successfully..");
             </script>
           
     		<?php
     	}
     }

   ?>

</body>
</html>