<?php
	session_start();
	if(!isset($_SESSION['account'])) {
		header("location: signin.php");
	}
	$user = $_SESSION['account'];
	$con = mysqli_connect("localhost","root","","eazybanking");
	if(isset($_POST['check'])) {
		$query1 = "SELECT * FROM user";
		$query2 = "SELECT * FROM otheruser";
		$res1 = mysqli_query($con,$query1);
		$res2 = mysqli_query($con,$query2);
		$data = array();
		while($row = mysqli_fetch_assoc($res1)) {
			$temp['account'] = $row['account'];
			$temp['name'] = $row['name'];
			$temp['bankcode'] = $row['bankcode'];
			$temp['amount'] = $row['balance'];
			array_push($data,$temp);
		}
		while($row = mysqli_fetch_assoc($res2)) {
			$temp['account'] = $row['account'];
			$temp['name'] = $row['name'];
			$temp['bankcode'] = $row['bankcode'];
			$temp['amount'] =  -1;
			array_push($data,$temp);
		}
		echo json_encode($data);
	}
	if(isset($_POST['transfer'])) {
		$amount = $_POST['amount'];
		$bankcode = $_POST['bankcode'];
		$other = $_POST['other'];
		$info = $_POST['info'];
		$cpin = $_POST['pin'];

		$pre1 = "SELECT * FROM user WHERE account='$user'";
		if($bankcode != '0001') {
			$pre2 = "SELECT * FROM otheruser WHERE account='$other'";
		}
		else {
			$pre2 = "SELECT * FROM user WHERE account='$other'";
		}

		$get1 = mysqli_query($con,$pre1);
		$user1 = mysqli_fetch_assoc($get1);
		$get2 = mysqli_query($con,$pre2);
		$user2 = mysqli_fetch_assoc($get2);
		$othername = $user2['name'];
		$name = $user1['name'];
		$pin = $user1['pin'];

		if($cpin != $pin) {
			echo "Pin yang dimasukkan salah !";
			exit;
		}

		$query1 = "INSERT INTO transfer VALUES(null,'$amount','$bankcode','$user','$other','$info',now())";
		$query2 = "INSERT INTO activity VALUES(null,now(),'$othername','$info','$amount',1,'$user')";
		$query3 = "UPDATE user SET balance=balance - $amount WHERE account='$user'";
		

		$exe1 = mysqli_query($con,$query1);
		$exe2 = mysqli_query($con,$query2);
		$exe3 = mysqli_query($con,$query3);
		if($bankcode == '0001') {
			$query4 = "INSERT INTO activity VALUES(null,now(),'$name','$info','$amount',0,'$other')";
			$query5 = "UPDATE user SET balance=balance + $amount WHERE account='$other'";
			$exe4 = mysqli_query($con,$query4);
			$exe5 = mysqli_query($con,$query5);
		}
		echo "Transaksi Berhasil !";
		exit;
	}
?>