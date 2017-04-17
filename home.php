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
.foot {
	background-color: #cce6ff;
	padding: 5%;
}
</style>
	<title>
  <?php startblock('title') ?>
  <?php endblock() ?>
	</title>
	<link rel="icon" type="image/png" href="assets/ez_logo.png"> 	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <?php startblock('head') ?>
  <?php endblock() ?>
</head>
<body>
	<nav class="nav navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="pull-left" href="index.php"> 
					<img src="assets/ez_logo.png" id="gambar"> 
				</a>
				<a class="navbar-brand" href="index.php" id="nama">Eazy</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="index.php" id="activity">Activity</a></li>
				<li><a href="#transfer" id="transfer">Transfer</a></li>
				<li><a href="#setgoals" id="setgoals">Set Goals</a></li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-credit-card"></i> Card</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-wrench"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
			</ul>
		</div>	
	</nav>

<?php startblock('body') ?>
<?php endblock() ?>

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
							<img src="assets/github-logo.png" style="width: 75%; height: 75%;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/facebook-logo.png" style="width: 75%; height: 75%;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/twitter-logo.png" style="width: 75%; height: 75%;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/instagram-logo.png" style="width: 75%; height: 75%;">
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
							<img src="assets/gmail-logo.png" style="width: 75%; height: 75%;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/telegram-logo.png" style="width: 75%; height: 75%;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/whatsapp-logo.png" style="width: 75%; height: 75%;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>QWERTY qwerty</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/messenger-logo.png" style="width: 75%; height: 75%;">
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