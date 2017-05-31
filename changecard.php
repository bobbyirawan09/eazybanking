<?php
	session_start();
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
		exit;
	}
?>