<?php
	session_start();
	if(isset($_SESSION['loggedin'])) {
		header("location: welcome.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Eazy	</title>
	<link rel="icon" type="image/png" href="assets/ez.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"></style>
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css" rel="stylesheet">
		.centered {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		.wizard {
			margin: 20px auto;
			background: #fff;
		}
		.wizard .nav-tabs {
			position: relative;
			margin: 40px auto;
			margin-bottom: 0;
			border-bottom-color: #e0e0e0;
		}

		.wizard > div.wizard-inner {
			position: relative;
		}
		.connecting-line {
			height: 2px;
			background: #e0e0e0;
			position: absolute;
			width: 80%;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: 50%;
			z-index: 1;
		}

		.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
			color: #555555;
			cursor: default;
			border: 0;
			border-bottom-color: transparent;
		}

		span.round-tab {
			width: 70px;
			height: 70px;
			line-height: 70px;
			display: inline-block;
			border-radius: 100px;
			background: #fff;
			border: 2px solid #e0e0e0;
			z-index: 2;
			position: absolute;
			left: 0;
			text-align: center;
			font-size: 25px;
		}
		span.round-tab i{
			color:#555555;
		}
		.wizard li.active span.round-tab {
			background: #fff;
			border: 2px solid #5bc0de;

		}
		.wizard li.active span.round-tab i{
			color: #5bc0de;
		}

		span.round-tab:hover {
			color: #333;
			border: 2px solid #333;
		}

		.wizard .nav-tabs > li {
			width: 25%;
		}

		.wizard li:after {
			content: " ";
			position: absolute;
			left: 46%;
			opacity: 0;
			margin: 0 auto;
			bottom: 0px;
			border: 5px solid transparent;
			border-bottom-color: #5bc0de;
			transition: 0.1s ease-in-out;
		}

		.wizard li.active:after {
			content: " ";
			position: absolute;
			left: 46%;
			opacity: 1;
			margin: 0 auto;
			bottom: 0px;
			border: 10px solid transparent;
			border-bottom-color: #5bc0de;
		}

		.wizard .nav-tabs > li a {
			width: 70px;
			height: 70px;
			margin: 20px auto;
			border-radius: 100%;
			padding: 0;
		}

		.wizard .nav-tabs > li a:hover {
			background: transparent;
		}

		.wizard .tab-pane {
			position: relative;
			padding-top: 50px;
		}

		.wizard h3 {
			margin-top: 0;
		}

		@media( max-width : 585px ) {

			.wizard {
				width: 90%;
				height: auto !important;
			}

			span.round-tab {
				font-size: 16px;
				width: 50px;
				height: 50px;
				line-height: 50px;
			}

			.wizard .nav-tabs > li a {
				width: 50px;
				height: 50px;
				line-height: 50px;
			}

			.wizard li.active:after {
				content: " ";
				position: absolute;
				left: 35%;
			}
		}
		#logo{
			padding-top: 30px;
			position: absolute;
		}
		#huruf1{
			padding-left: 480px;
		}
		/*Floating label*/
		#floating-label .form-group {
			display: flex;
			height: 55px;
		}

		#floating-label .control-label {
			font-size: 20px;
			font-weight: 400;
			opacity: 0.4;
			pointer-events: none;
			position: absolute;
			transform: translate3d(6px, 24px, 0) scale(1);
			transform-origin: left top;
			transition: 140ms;
		}

		#floating-label .form-group.focused .control-label {
			opacity: 8;
			transform: scale(0.5);
			font-size: 30px;
		}

		#floating-label .form-control {
			align-self: flex-end;
		}

		#floating-label .form-control::-webkit-input-placeholder {
			color: transparent;
			transition: 240ms;
		}

		#floating-label .form-control:focus::-webkit-input-placeholder {
			transition: none;		}

			#floating-label .form-group.focused .form-control::-webkit-input-placeholder {
				color: #bbb;
			}
		</style>
		<script>
			$(document).ready(function() {
				$("#showpass").click(function() {
					if($("#Password").attr("type") == "text"){
						$("#Password").attr("type","password");
						$("#mata1").attr("class","glyphicon glyphicon-eye-open");
					}
					else {
						$("#Password").attr("type","text");
						$("#mata1").attr("class","glyphicon glyphicon-eye-close");
					}
				});
				$("#showpass2").click(function() {
					if($("#ConfirmPassword").attr("type") == "text"){
						$("#ConfirmPassword").attr("type","password");
						$("#mata2").attr("class","glyphicon glyphicon-eye-open");
					}
					else {
						$("#ConfirmPassword").attr("type","text");
						$("#mata2").attr("class","glyphicon glyphicon-eye-close");
					}
				});
				$("#Username").keyup(function(){
					checkLength(this,16);
				});
				$("#Password").keyup(function(){
					checkLength(this,16);
				});
				$("#Pin").keyup(function(){
					checkLength(this,8);
				});
				$("#ConfirmPassword").keyup(function(){
					checkLength(this,16);
				});
				$("#ConfirmPin").keyup(function(){
					checkLength(this,8);
				});
				$("#Phone").keyup(function(){
					checkLength(this,15);
				});
				$("#form1").click(function(){
					if(!$("#Username").val() || !$("#Phone").val() || !$("#Password").val()) {
						alert("Mohon isi form untuk melanjutkan registrasi");
						return;
					}
					if($("#Password").val().length < 8){ 
						alert("Panjang password minimal 8 karakter");
						return;
					}
					if(checkSama("#Password","#ConfirmPassword")){
						var $active = $('.wizard .nav-tabs li.active');
				    	$active.next().removeClass('disabled');
				    	nextTab($active);	
					}
					else{
						alert("Konfirmasi Password Salah !");
					}
				});
				$("#form2").click(function(){
					if(!$("#Nama").val() || !$("#Alamat").val() || !$("#TanggalLahir").val()) {
						alert("Mohon isi form untuk melanjutkan registrasi");
						return;
					}
					else {
						var $active = $('.wizard .nav-tabs li.active');
				    	$active.next().removeClass('disabled');
				    	nextTab($active);
					}
				});
				$("#finalform").click(function(){
					if(!$("#Email").val() || !$("#Pin").val()) {
						alert("Mohon isi form untuk melanjutkan registrasi");
						return;
					}
					if($("#Pin").val().length < 4){ 
						alert("Panjang pin minimal 4 karakter");
						return;
					}
					if(checkSama("#Pin","#ConfirmPin")){
						var $active = $('.wizard .nav-tabs li.active');
				    	$active.next().removeClass('disabled');
				    	nextTab($active);
				    	registration();
					}
					else {
						alert("Konfirmasi Pin Salah !");
					}
				});
			});
			$(document).ready(function () {
			    //Initialize tooltiptips
			    $('.nav-tabs > li a[title]').tooltip();
				    //Wizard
			    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
			    	var $target = $(e.target);
			    	if ($target.parent().hasClass('disabled')) {
			    		return false;
			    	}
			    });
			    $(".prev-step").click(function (e) {
			    	var $active = $('.wizard .nav-tabs li.active');
			    	prevTab($active);

			    });
			    /*Floating label java script*/
			    $('.form-control').on('focus blur', function (e) {
			    	$(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
			    }).trigger('blur');
			});
			function checkLength(v,l) {
				var str = v.value;
				var len = str.length;
				if(len > l) {
					v.value = str.substr(0,l);
				}
			}
			function checkSama(v1,v2){
				var pass1 = $(v1).val();
				var pass2 = $(v2).val();
				if(pass1 != pass2){
					return false;
				}
				return true;
			}
			function nextTab(elem) {
				$(elem).next().find('a[data-toggle="tab"]').click();
			}
			function prevTab(elem) {
				$(elem).prev().find('a[data-toggle="tab"]').click();
			}
			function registration(){
				$.ajax({
					url: "registration.php",
					type: "POST",
					async: "false",
					data: {
						regis: 1,
						username: $("#Username").val(),
						password: $("#Password").val(),
						email: $("#Email").val(),
						nama: $("#Nama").val(),
						alamat: $("#Alamat").val(),
						phone: $("#Phone").val(),
						pin: $("#Pin").val(),
						dob: $("#TanggalLahir").val()
					},
					success: function(result){}
				});
			}
		</script>
	</head>
	<body>
		<div class="row" style="margin-top:0px;">
			<div class="col-md-2 col-md-offset-3" id="logo">
				<a href="index.php"><img src="assets/ez_logo.png" style="margin-top: -25px;margin-left: 150px; width: 400px; height: 200px;"></a>
			</div>
		</div>
		<div class="container" style="padding-top: 130px;">
			<div class="row">
				<section>
					<div class="wizard">
						<div class="wizard-inner">
							<div class="connecting-line"></div>
							<ul class="nav nav-tabs" role="tablist">

								<li role="presentation" class="active">
									<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data account">
										<span class="round-tab">
											<i class="glyphicon glyphicon-user"></i>
										</span>
									</a>
								</li>

								<li role="presentation" class="disabled">
									<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Data diri">
										<span class="round-tab">
											<i class="glyphicon glyphicon-folder-open"></i>
										</span>
									</a>
								</li>
								<li role="presentation" class="disabled">
									<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Data ATM">
										<span class="round-tab">
											<i class="glyphicon glyphicon-credit-card"></i>
										</span>
									</a>
								</li>
								<li role="presentation" class="disabled">
									<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Selesai">
										<span class="round-tab">
											<i class="glyphicon glyphicon-ok"></i>
										</span>
									</a>
								</li>
							</ul>
						</div>

						<form role="form" id="floating-label">
							<div class="tab-content">
								<div class="tab-pane active" role="tabpanel" id="step1">
									<form method="post" action="" class="centered" >
										<hr>
										<div class="row">
											<div class="col-md-6 col-md-offset-3">
												<div class="form-group">
													<label class="control-label">
														Username
													</label>
													<input type="text" id="Username" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-md-offset-3">
												<div class="form-group">
													<div class="control-label">
														No. HP
													</div>
												<input type="text" id="Phone" class="form-control">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-md-offset-3">
												<div class="form-group">
													<div class="control-label">
														Password
													</div>
													<input type="password" id="Password" class="form-control">
												</div>
											</div>
											<button style="padding-left: -10px;margin-top: 21px;" class="btn btn-default" id="showpass" type="button">
												<i class="glyphicon glyphicon-eye-open" id="mata1"></i>
											</button>
										</div>
										<div class="row">
											<div class="col-md-6 col-md-offset-3">
												<div class="form-group">
													<div class="control-label">
														Confirm password
													</div>
													<input type="password" id="ConfirmPassword" class="form-control">
												</div >
											</div>
											<button style="padding-left: -10px;margin-top: 21px;" class="btn btn-default" id="showpass2" type="button">
												<i class="glyphicon glyphicon-eye-open" id="mata2"></i>
											</button>
										</div>
									</form>
									<ul class="list-inline pull-right">
										<li><button type="button" id="form1" class="btn btn-primary next-step">Save and continue</button></li>
									</ul>
								</div>
								<div class="tab-pane" role="tabpanel" id="step2">
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<div class="form-group">
												<label class="control-label">
													Nama
												</label>
												<input type="text" id="Nama" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<div class="form-group">
												<label class="control-label">
													Alamat
												</label>
												<input type="text" id="Alamat" class="form-control">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-md-offset-3">
											<div class="form-group">
												<label class="control-label">
													Tanggal lahir
												</label>
												<input type="date" id="TanggalLahir" class="form-control">
											</div>
										</div>
									</div>
									<ul class="list-inline pull-right">
										<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
										<li><button type="button" id="form2" class="btn btn-primary next-step">Save and continue</button></li>
									</ul>
								</div>
								<div class="tab-pane" role="tabpanel" id="step3">
									<div class="row">
										<div class="col-md-6 col-md-offset-1">
											<h3><strong>Masukkan nomor handphone anda</strong></h3>
											<p>Ketika anda menginputkan nomor handphone anda yang benar dan sesuai ketentuan, kami akan mengirimkan kode verifikasi</p>
										</div>
										<div class="col-md-5">
											<img src="assets/hp.png">
										</div>
									</div>
									<div class="row " style="padding-top: 30px;">
										<div class="col-md-6 col-md-offset-1" style="padding-left: 14px; padding-bottom: 30px; margin-top: -200px;">
											<div class="form-group">
													<label class="control-label">
														Email
													</label>
													<input type="email" id="Email" class="form-control">
												</div>
										</div>
									</div>
									<div class="row " style="padding-top: 70px;">
										<div class="col-md-6 col-md-offset-1" style="padding-left: 14px; padding-bottom: 30px; margin-top: -200px;">
											<div class="form-group">
												<div class="control-label">
													Masukkan nomor pin
												</div>
												<input type="password" id="Pin" class="form-control">
											</div>
										</div>
									</div>
									<div class="row " style="padding-top: 70px;">
										<div class="col-md-6 col-md-offset-1" style="padding-left: 14px; padding-bottom: 30px; margin-top: -200px;">
											<div class="form-group">
												<div class="control-label">
													Confirm pin kalian
												</div>
												<input type="password" id="ConfirmPin" class="form-control">
											</div>
										</div>
									</div>
									<ul class="list-inline pull-right">
										<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
										<li><button type="button" id="finalform" class="btn btn-success btn-info-full next-step">Submit</button></li>
									</ul>
								</div>
								<div class="tab-pane" role="tabpanel" id="complete">
									<div class="row">
										<div class="col-md-12 input-group" style="text-align: center">
											<h3>Complete</h3>
											<p>You have successfully completed all steps.</p>
										</div>
										<div class="col-md-12" style="text-align: center">
											<img src="assets/centang.png" style="width: 200px; height: 200px;">
										</div>
										<div class="col-md-12" style="text-align: center; padding-top:20px;">
											<a href="signin.php"><button type="button" class="btn btn-primary">
												Back <i class="glyphicon glyphicon-arrow-left"></i>
											</button></a>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</form>
						<div class="row form-group" style="padding-top: 50px;">
							<div class="col-md-12 input-group">
								<h5>Already have an eazy account? </h5><a href="signin.php">Sign in</a>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</body>
	</html>