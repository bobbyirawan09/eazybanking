<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Eazy	</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="assets/ez.png">
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
		.form-control-placeholder {
			position: absolute;
			top: 0;
			padding: 7px 0 0 13px;
			pointer-events: none;
			color: #aaa;
			transition: all 200ms;
		}

		.form-control:focus + .form-control-placeholder {
			color: #000;
			font-size: 25px;
			top: -45px;
		}
	</style>
	<script>
		$(document).ready(function() {
			$("#showpass").click(function() {
				if($("#password").attr("type") == "text"){
					$("#password").attr("type","password");
				}
				else {
					$("#password").attr("type","text");
				}
			})
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

	    $(".next-step").click(function (e) {

	    	var $active = $('.wizard .nav-tabs li.active');
	    	$active.next().removeClass('disabled');
	    	nextTab($active);

	    });
	    $(".prev-step").click(function (e) {

	    	var $active = $('.wizard .nav-tabs li.active');
	    	prevTab($active);

	    });
	});
		function nextTab(elem) {
			$(elem).next().find('a[data-toggle="tab"]').click();
		}
		function prevTab(elem) {
			$(elem).prev().find('a[data-toggle="tab"]').click();
		}
	</script>
</head>
<body>
	<div class="row" style="margin-top:0px;">
		<div class="col-md-12" id="logo">
			<a href="index.php"><img src="assets/ez_logo.png" style="margin: 0 auto; display: block; width: 300px; height: 140px;"></a>
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

					<form role="form">
						<div class="tab-content">
							<div class="tab-pane active" role="tabpanel" id="step1">
								<form method="post" action="" class="centered">
									<hr>
									<div class="row">
										<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
											<div class="form-group">
												<input type="text" name="Username" class="form-control">
												<div class="form-control-placeholder">
													Username
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
											<div class="form-group">
												<input type="email" name="Email" class="form-control">
												<div class="form-control-placeholder">
													Email
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
											<div class="form-group">
												<input type="email" name="Email" class="form-control">
												<div class="form-control-placeholder">
													Password
												</div>
											</div>
										</div>
										<button style="padding-left: -10px;" class="btn btn-default" id="showpass" type="button">
											<i class="glyphicon glyphicon-eye-open"></i>
										</button>
									</div>
									<div class="row">
										<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
											<div class="form-group">
												<input type="email" name="Email" class="form-control">
												<div class="form-control-placeholder">
													Confirm password
												</div>
												</div >
										</div>
										<button style="padding-left: -10px;" class="btn btn-default" id="showpass" type="button">
											<i class="glyphicon glyphicon-eye-open"></i>
										</button>
									</div>
								</form>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" role="tabpanel" id="step2">
								<div class="row">
									<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
										<div class="form-group">
											<input type="text" name="Username" class="form-control">
											<div class="form-control-placeholder">
												Nama
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
										<div cla ss="form-group">
											<input type="text" name="Username" class="form-control">
											<div class="form-control-placeholder">
												Alamat
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-md-offset-3" style="padding-bottom: 30px;">
										<div class="form-group">
											<input type="text" name="Username" class="form-control">
											<div class="form-control-placeholder">
												Tanggal lahir
											</div>
										</div>
									</div>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
									<li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" role="tabpanel" id="step3">
								<div class="row" style="padding-bottom: 30px;">
									<div class="col-md-6 col-md-offset-1">
										<h3><strong>Masukkan nomor handphone anda</strong></h3>
										<p>Ketika anda menginputkan nomor handphone anda yang benar dan sesuai ketentuan, kami akan mengirimkan kode verifikasi</p>
									</div>
									<div class="col-md-5" style="text-align: center;">
										<img src="assets/hp.png">
									</div>
								</div>
								<div class="row " style="padding-top: 30px;">
									<div class="col-md-6 col-md-offset-1" style="padding-left: 14px; padding-bottom: 30px; margin-top: -200px;">
										<div class="form-group">
											<input type="text" name="Username" class="form-control">
											<div class="form-control-placeholder">
												No. HP
											</div>
										</div>
									</div>
								</div>
								<div class="row " style="padding-top: 80px;">
									<div class="col-md-6 col-md-offset-1" style="padding-left: 14px; padding-bottom: 30px; margin-top: -200px;">
										<div class="form-group">
											<input type="text" name="Username" class="form-control">
											<div class="form-control-placeholder">
												Masukkan nomor pin, maks. 6 angka
											</div>
										</div>
									</div>
								</div>
								<div class="row " style="padding-top: 80px;">
									<div class="col-md-6 col-md-offset-1" style="padding-left: 14px; padding-bottom: 30px; margin-top: -200px;">
										<div class="form-group">
											<input type="text" name="Username" class="form-control">
											<div class="form-control-placeholder">
												Confirm pin kalian
											</div>
										</div>
									</div>
								</div>
								<ul class="list-inline pull-right">
									<li><button type="button" class="btn btn-default prev-step">Previous</button></li>
									<li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
								</ul>
							</div>
							<div class="tab-pane" role="tabpanel" id="complete">
								<div class="row">
									<div class="col-md-12 input-group" style="text-align: center">
										<h3>Complete</h3>
										<p>You have successfully completed all steps.</p>
									</div>
									<div class="col-md-12" style="text-align: center">
										<img src="assets/icon.png" style="width: 200px; height: 200px;">
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