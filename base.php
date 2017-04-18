<?php require_once 'ti.php' ?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
img{
	width: 51px;
	height: 48px;
	display: block;
}
nav{
	font-family: 
}
#nama{
	border-left: 2px solid;
	padding-left: 10px;
}
#gambar{
	padding-right: 10px;
}
li:hover{
	background-color: #ffffff;
}
#bar{
	color: #000000;
}
nav{
	background-color: #ffffff;
}
.geteasy {
	background-image: url("assets/pattern-birdfeet.png");
	background-repeat: repeat;
	padding: 5%;
}
.foot {
	background-color: #e7f5fe;
	color: #333e48;
	padding: 5%;
}
.sliding-middle-out {
	display: inline-block;
	position: relative;
	padding-bottom: 3px;
}
.sliding-middle-out:after {
	content: '';
	display: block;
	margin: auto;
	height: 3px;
	width: 0px;
	background: transparent;
	transition: width .5s ease, background-color .5s ease;
}
.sliding-middle-out:hover:after {
	width: 100%;
	background: blue;
}
#nyala{
	border-bottom: blue solid 1px;	
}
</style>
	<title>
  <?php startblock('title') ?>
  <?php endblock() ?>
	</title>
	<link rel="icon" type="image/png" href="assets/ez.png"> 	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <?php startblock('head') ?>
  <?php endblock() ?>
</head>
<body>
	<nav class="nav navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="pull-left" href="index.php"> 
					<img src="assets/ez_logo.png" style="width: 110px; height: 50px;" id="gambar"> 
				</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php" class="sliding-middle-out" id="home">Home</a></li>
				<li><a href="#features" class="sliding-middle-out" id="features">Features</a></li>
				<li><a href="signin.php" class="sliding-middle-out" id="login">Log in</a></li>
				<a href="signup.php"><button class="btn btn-primary navbar-btn">Get Eazy!</button></a>
			</ul>
		</div>	
	</nav>
<?php startblock('body') ?>
<?php endblock() ?>
	<div class="container-fluid geteasy">
		<div class="container">
			<h1><strong>Save Easily. Bank Beautifully.</strong><br>
			<small>Open your Account in just a couple of minutes</small></h1><br>
			<a href="signup.php"><button class="btn btn-primary btn-lg">Get Eazy</button></a>
		</div>
	</div>
	<footer class="foot">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					About us
					<hr>
				</div>
				<div class="col-md-4">
					Find Us At
					<hr>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/github-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/facebook-logo.png" style="width: 65px; height: 65px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/twitter-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/instagram-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					Have any Question?
					Contact us !
					<hr>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/gmail-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/telegram-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/whatsapp-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/messenger-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</footer>
</body>
</html>