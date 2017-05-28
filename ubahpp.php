<?php require_once 'basemember.php' ?>
<?php startblock('title') ?>
Eazy banking
<?php endblock() ?>
<?php startblock ('head') ?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<style type="">
	#gambar{
		height: 200px;
		width: 200px;
	}
	#pp{
		size: 150%;
	}
	.btn-file {
		position: relative;
		overflow: hidden;
	}
	.btn-file input[type=file] {
		position: absolute;
		top: 0;
		right: 0;
		min-width: 100%;
		min-height: 100%;
		font-size: 100px;
		text-align: right;
		filter: alpha(opacity=0);
		opacity: 0;
		outline: none;
		background: white;
		cursor: inherit;
		display: block;
	}
</style>
<script type="">
$('#gambarpp').on('change', function(){
	var a=$(this).val();
});
</script>
<?php endblock() ?>
<?php startblock('body') ?>
<div class="container">
		<div class="row">
			<div class="col-md-6" style="padding-top: 50px; padding-left: 480px">
				<div class="form-group">
					<img src="assets/ez_logo.png" class="img-circle" id="gambar">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6" style="margin-left: 420px;">
				<div class="form-group">
					<div>
						<span class="btn btn-default btn-file">
							Browse<input type="file" id="gambarpp">
						</span>
						<input type="text" name="namapp" disabled="">
					</div>
				</div>
			</div>
		</div>
		<center>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px;">
				<button class="btn btn-primary">
					Coba pasang
				</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px;">
				<button class="btn btn-success">
					Simpan
				</button>
			</div>
		</div>
		</center>
</div>
<?php endblock() ?>