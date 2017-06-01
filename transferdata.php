<?php
	session_start();
	if(!isset($_SESSION['account'])) {
		header("location: signin.php");
	}
	date_default_timezone_set("Asia/Jakarta");
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
			$data['msg'] = "Pin yang dimasukkan salah !";
			$ex = mysqli_query($con,"SELECT counter FROM user WHERE account='$user'");
			$c = mysqli_fetch_assoc($ex);
			$time = date("Y-m-d H:i:s");
			if($c['counter'] >= 2){
				$ex2 = mysqli_query($con,"UPDATE user SET counter=0, status=0, timer='$time' WHERE account='$user'");
				$data['suspend'] = 1;
			}
			else {
				$ex2 = mysqli_query($con,"UPDATE user SET counter=counter+1, timer='$time' WHERE account='$user'");
			}
			echo json_encode($data);
			exit;
		}

		$query1 = "INSERT INTO transfer VALUES(null,'$amount','$bankcode','$user','$other','$info',now())";
		$query2 = "INSERT INTO activity VALUES(null,now(),'$othername','$info','$amount',1,'$user')";
		$query3 = "UPDATE user SET balance=balance - $amount WHERE account='$user'";		
		$exe1 = mysqli_query($con,$query1);
		$exe2 = mysqli_query($con,$query2);
		
		if($bankcode == '0001') {
			$query4 = "INSERT INTO activity VALUES(null,now(),'$name','$info','$amount',0,'$other')";
			$query5 = "UPDATE user SET balance=balance + $amount WHERE account='$other'";
			$exe4 = mysqli_query($con,$query4);
			$exe5 = mysqli_query($con,$query5);
		}else {
			$query5 = "UPDATE otheruser SET balance=balance + $amount WHERE account='$other'";
			$exe5 = mysqli_query($con,$query5);
			$amount += 6500;
		}
		$exe3 = mysqli_query($con,$query3);

		$data['msg'] = "Transaksi Berhasil !";
		echo json_encode($data);
		exit;
	}
	if(isset($_POST['history'])) {
		$query = "SELECT otheruser,bankcode FROM transfer WHERE user='$user'";
		$exe = mysqli_query($con,$query);
		$data = array();
		while($row = mysqli_fetch_assoc($exe)) {
			$tmp = $row['otheruser'];
			$cek = 1;
			foreach($data as $val){
				if($tmp == $val['acc']) {
					$cek = 0;
				}
			}
			if($cek == 1){
				$temp['acc'] = $row['otheruser'];
				$temp['bankcode'] = $row['bankcode'];
				if($row['bankcode'] == '0001') {
					$exe2 = mysqli_query($con,"SELECT name FROM user WHERE account='$tmp'");
				}
				else {
					$exe2 = mysqli_query($con,"SELECT name FROM otheruser WHERE account='$tmp'");
				}
				$row2 = mysqli_fetch_assoc($exe2);
				$temp['name'] = $row2['name'];
				array_push($data,$temp);
			}
		}
		echo json_encode($data);
	}
	if(isset($_POST['cek'])) {
		$query = "SELECT timer,status,counter FROM user WHERE account='$user'";
		$exe = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($exe);
		if($row['counter'] > 0 || $row['status'] == 0) {
			$time1 = strtotime($row['timer']);
			$time2 = strtotime(date("Y-m-d H:i:s"));
			$hasil = ($time2 - $time1)/60;
			if($hasil < 30 && $row['status'] == 0) {
				$data['timer'] = 0;
			}
			else if($hasil >= 30){
				$ex = mysqli_query($con, "UPDATE user SET counter=0, timer=DEFAULT, status=1 WHERE account='$user'");
				$data['timer'] = 1;
			}
			else {
				$data['timer'] = 1;
			}
		}
		else {
			$data['timer'] = 1;
		}
		echo json_encode($data);
	}
?>