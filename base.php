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
	background-color: #cce6ff;
	padding: 5%;
}
</style>
	<title>
  <?php startblock('title') ?>
  <?php endblock() ?>
	</title>
	<link rel="icon" type="image/png" href="assets/logo.png"> 	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <?php startblock('head') ?>
  <?php endblock() ?>
</head>
<body>
	<nav class="nav navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="pull-left" href="index.php"> 
					<img src="assets/logo.png" id="gambar"> 
				</a>
				<a class="navbar-brand" href="index.php" id="nama">Eazy Bank Online</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php" id="home">Home</a></li>
				<li><a href="#aboutus" id="features">Features</a></li>
				<li><a href="#login" id="login">Log in</a></li>
				<a href="#signup"><button class="btn btn-primary navbar-btn">Get Eazy!</button></a>
			</ul>
		</div>	
	</nav>
<?php startblock('body') ?>
<?php endblock() ?>
	<div class="container-fluid geteasy">
		<div class="container">
			<h1><strong>Save Easily. Bank Beautifully.</strong><br>
			<small>Open your Account in just a couple of minutes</small></h1><br>
			<button class="btn btn-primary btn-lg">Get Eazy</button>
		</div>
	</div>
	<footer class="foot">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					About us
				</div>
				<div class="col-md-4">
					Find Us At
				</div>
				<div class="col-md-4">
					Have any Question?
					Contact us !
				</div>
			</div>
		</div>
  	</footer>
  </div>
</body>
</html>
