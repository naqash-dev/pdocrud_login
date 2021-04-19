<?php  
include "config.php";
session_start();
 $msg = ""; 
if(isset($_POST['SignUp'])){
                    $username = $_POST['Username'];
	                $email = $_POST['email'];
	                $pass = $_POST['password'];
	         $sql = "SELECT * FROM stulogin WHERE email = :email";
	          $query = $conn->prepare($sql);
	          $query->bindValue(':email',$email);
	          $query->execute();
	          // $query->store_result();
	          $row = $query->fetch(PDO::FETCH_ASSOC);
	          if($row>0)
	          {
	          	$msg="Email already registred";
	          }else
	          {
	              	 
	               $password = password_hash($pass,PASSWORD_BCRYPT);
                         $sql =  "INSERT INTO stulogin (username,email,password) VALUES (:uname,:email,:password)";
	                     $query = $conn->prepare($sql);
	                     $query->bindValue(':uname',$username);
	                     $query->bindValue(':email',$email);
	                     $query->bindValue(':password', $password);
	                      $result=$query->execute();
	                        if($result)
	                        {
                                 $msg="Thank you for registering";
	                        } 
	                         
	          }
	         
	       }	

?> 
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<?php echo "$msg"; ?>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="Username" placeholder="Username" required="">
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP" name="SignUp">
				</form>
				<?php
                    
   if(isset($_SESSION['username'])){
        echo "<h2>Already Login: ".$_SESSION['username']."</h2>";
       echo '<br><a href="logout.php">Logout</a>';
   }else{
   	  echo '<p>Already Registered<a href="login.php"> Login Now!</a></p>';
   }

				 ?>
				 
			</div>
		</div>
		 
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>