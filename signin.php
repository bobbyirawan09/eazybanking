<?php
	session_start();
	if(isset($_SESSION['loggedin'])) {
		header("location: welcome.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In | Eazy</title>
	<link rel="icon" type="image/png" href="assets/ez.png"> 	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="bootstrap/js/jquery.min.js"></script>
 	<script src="bootstrap/js/bootstrap.min.js"></script>
 	<style type="text/css" rel="stylesheet">
		.centered {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		#lupa{
			padding-top: -10px;
		}
	</style>
	<script>
		$(document).ready(function() {
			$("#showpass").click(function() {
				if($("#password").attr("type") == "text"){
					$("#password").attr("type","password");
					$("#iconpass").removeClass("glyphicon-eye-close");
					$("#iconpass").addClass("glyphicon-eye-open");
				}
				else {
					$("#password").attr("type","text");
					$("#iconpass").removeClass("glyphicon-eye-open");
					$("#iconpass").addClass("glyphicon-eye-close");
				}
			})
		});
	</script>
</head>
<body>
<?php
	if(isset($_POST['signin'])) {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$con = mysqli_connect("localhost","root","","eazybanking");
		$query = "SELECT account,card FROM user WHERE username='$user' AND password='$pass'";
		$res = mysqli_query($con,$query);
		$log = mysqli_fetch_assoc($res);
		echo $log['account'];
		if($log) {
			$_SESSION['loggedin'] = 1;
			$_SESSION['account'] = $log['account'];
			$_SESSION['card'] = $log['card'];
			header("location: welcome.php");
		}
		else {
			echo "login failed";
		}
	}
?>
<div class="container">
	<form method="post" action="signin.php" class="centered">
		<div class="row">
			<div class="col-md-12">
				<a href="index.php"><img src="assets/ez_logo.png" style="padding-bottom: 20px; width: 200px; height: 110px;"></a>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input type="text" class="form-control input-lg" name="username" placeholder="Username">
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password">
				 <div class="input-group-btn">
				    <button class="btn btn-default btn-lg" id="showpass" type="button">
				        <i id="iconpass" class="glyphicon glyphicon-eye-open"></i>
				    </button>
				 </div>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 input-group">
				<button type="submit" class="btn btn-primary btn-block btn-lg" name="signin">Sign In</button>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 input-group">
				<h5>Not have eazy account yet? <a href="signup.php">Sign up</a></h5>
			</div>
		</div>
		<div class="row form-group">
			<div class="col-md-12 input-group">
				<a href="#" id="lupa">Forgot your password?</a>
			</div>
		</div>
	</form>
</div>
</body>
</html>