<?php
	session_start();
	if(!isset($_SESSION['account'])) {
		header("location: signin.php");
	}
	$user = $_SESSION['account'];
	$con = mysqli_connect("localhost","root","","eazybanking");
	$query = "SELECT * FROM activity WHERE user='$user' ORDER BY tgl desc";
	$result = mysqli_query($con,$query);
	$data = array();
	while($row = mysqli_fetch_assoc($result)) {
		$temp['tgl'] = date_format(date_create($row['tgl']),"j-F-Y");
		$temp['hms'] = date_format(date_create($row['tgl']),"g:i:s A");
		$temp['otheruser'] = $row['otheruser'];
		$temp['info'] = $row['info'];
		$temp['amount'] = $row['amount'];
		$temp['type'] = $row['type'];
		array_push($data, $temp);
	};
	echo json_encode($data);
?>