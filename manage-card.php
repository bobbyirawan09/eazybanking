<?php include "basemember.php" ?>
<?php startblock('title') ?>
	Your Card
<?php endblock() ?>
<?php startblock('head') ?>
<?php
	if(isset($_POST['card'])) {
		if($_POST['card'] == 1) {
			$card = 0;
		}
		else {
			$card = 1;
		}
		$acc = $_SESSION['account'];
		$con = mysqli_connect("localhost","root","","eazybanking");
		$query = "UPDATE user SET card=$card WHERE account='$acc'";
		$exe = mysqli_query($con,$query);
		exit();
	}
?>
	<script>
		function changeCard(){
			$.ajax({
				url: "manage-card.php",
				type: "POST",
				async: "false",
				data: {
					card: $("#card").val()
				},
				success: function(res){
					if($("#card").val() == 1) {
						alert("Success block your card");
						$("#change").html("Activate Card");
						$("#change").removeClass("btn-danger").addClass("btn-success");
						$("#card").val(0);
					}
					else {
						alert("Success activate your card");
						$("#change").html("Block Card");
						$("#change").removeClass("btn-success").addClass("btn-danger");
						$("#card").val(1);
					}
				}
			});
		};
		$(document).ready(function(){
			$("#change").click(function(){
				changeCard(0);
			});
		});
	</script>
<?php endblock() ?>
<?php startblock('body') ?>
<?php
	$acc = $_SESSION['account'];
	$con = mysqli_connect("localhost","root","","eazybanking");
	$query = "SELECT * FROM user WHERE account=$acc";
	$res = mysqli_query($con,$query);
	$me = mysqli_fetch_assoc($res);
?>
<div class="container">
	<img src="assets/card-visa.png" class="img-rounded" style="display: block; margin: auto;">
	<hr>
	<div class="col-md-8 col-md-offset-2">
<?php
	if($me['card'] == 1) {
		echo '<button type="button" id="change" class="btn btn-danger btn-lg btn-block">Block Card</button>';
	}
	else if($me['card'] == 0) {
		echo '<button type="button" id="change" class="btn btn-success btn-lg btn-block">Activate Card</button>';
	}
	echo '<input type="hidden" id="card" value="'.$me['card'].'">';
	mysqli_close($con);
?>
	</div>
</div>
<?php endblock() ?>