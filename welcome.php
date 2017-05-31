<?php
	session_start();
	if(!isset($_SESSION['loggedin'])){
		header("location: signin.php");
	}
	function generateRandomString($length = 8) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #094cb7;
    overflow-x: hidden;
    transition: 0.08s;
    padding-top: 60px;
}

.sidenav a {
	padding-top: 20px;
    text-decoration: none;
    font-size: 20px;
    color: #fff;
    display: block;
    transition: 0s;
}

.sidenav li {
    text-decoration: none;
    font-size: 25px;
    color: #fff;
    display: block;
    transition: 0s;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
#nyala{
	background-color: #012359;
}
#main {
    transition: margin-left .3s;
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.foot {
	background-color: #e7f5fe;
	color: #333e48;
	padding: 5%;
}
</style>
<script src="bootstrap/js/jquery.js"></script>
<script type="text/javascript">
<?php echo '
var me="'.$_SESSION['account'].'";
var mecard = '.$_SESSION['card'].';';
?>
function PinGen(len)
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for(var i=0; i < len; i++)
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}
$(document).ready(function(){
	Navigation("activity.php");
	$("#navActivity").click(function() {
		Navigation("activity.php");
		closeNav();
	});
	$("#navTransfer").click(function() {
		Navigation("transfer.php");
		closeNav();
	});
	$("#navCard").click(function() {
		Navigation("manage-card.php");
		closeNav();
	});
	$("#navProfile").click(function() {
		Navigation("ubahpp.php");
		closeNav();
	});
	$("#navAccount").click(function() {
		Navigation("settingakun.php");
		closeNav();
	});
});
function Navigation(nav) {
	$.ajax({
		url: nav,
		type: "POST",
		async: "false",
		success: function(result){
			$("#body").html(result);
		}
	});
}
function openNav() {
    document.getElementById("mySidenav").style.width = "315px";
    document.body.style.marginLeft = "315px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    $(".well").css("background-color", "rgba(0,0,0,0.05)");
    $("#navbar").hide();
    $("form :input").attr("disabled", true);
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
    $(".well").css("background-color", "#f5f5f5");
    $("#navbar").show();
    $("form :input").attr("disabled", false);
}
</script>
	<title>
		Welcome to be Eazy
	</title>
	<link rel="icon" type="image/png" href="assets/ez.png"> 	
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<script src="bootstrap/js/jquery.min.js"></script>
 	<script src="bootstrap/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="bootstrap/css/side.css">
</head>
<body>
<div id="mySidenav" class="sidenav text-center">
  <a href="javascript:void(0)" class="closebtn text-left" onclick="closeNav()">&times;</a>
	  <img src="assets/ez_logo.png" padding width="200px" height="90px">
	  <div class="row collapse navbar-collapse navbar-ex1-collapse">
	  	<ul>
	  		<li href="#" class="text-left">
	  		<a id="navActivity" href="#"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	  		Activity</a>
	  		</li>
	  		<li href="#" class="text-left">
	  		<a id="navTransfer" href="#"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
	  		Send Money</a>
	  		</li>
	  		<li href="#" class="text-left">
	  		<a id="navCard" href="#"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
	  		Your Card</a>
	  		</li>
	  		<li href="#" class="text-left">
	  		<a href="javascript:;" data-toggle="collapse" data-target="#demo">
	  		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	  		Account settings</a>
	  		<ul id="demo" class="collapse" style="float: left;">
	  			<li><a id="navProfile" href="#"><i class="glyphicon glyphicon-user"></i>&nbspProfile</a></li>
                <li><a id="navAccount" href="#"><i class="glyphicon glyphicon-wrench"></i>&nbspAccount</a></li>
                <li><a href="index.php?logout"><i class="glyphicon glyphicon-off"></i>&nbspLog Out</a></li>
            </ul>
	  		</li>
	  	</ul>
	  </div>
</div>
<div id="main">
<nav id="navbar" class="navbar navbar-default navbar-fixed-top">
	<div class="navbar-header">
	  <a class="navbar-brand" href="#"><span style="font-size:30px; cursor:pointer" onclick="openNav()">&#9776;</span></a>
	  <a class="pull-left" href="welcome.php"> 
		<img src="assets/ez_logo.png" style="width: 110px; height: 50px;" id="gambar"></a>
	</div>
    <div class="container">
    <ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="#" onclick="openNav()" data-toggle="collapse" data-target="#demo" class="sliding-middle-out" id="home">
		<i class="glyphicon glyphicon-user"></i> Dummy </a></li>
	</ul>
  </div>
</nav>
<div id="body">
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
					<a href="https://github.com/taezatria/eazybanking">
						<div class="col-md-3">
							<img src="assets/github-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>GitHub EazyBanking</label>
						</div>
					</a>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/twitter-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>Twitter @EazyBanking</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/instagram-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>Instagram eazybanking99</label>
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
							<label>cssupport@eazy.bank</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<img src="assets/whatsapp-logo.png" style="width: 50px; height: 50px; margin: 0 auto;">
						</div>
						<div class="col-md-9" style="padding: 15px 0;">
							<label>+1 3457 8414</label>
						</div>
					</div>
				</div>
			</div>
		</div>
  	</footer>
</body>
</html>