<?php
	session_start();
	if(isset($_SESSION['loggedin'])) {
		header("location: welcome.php");
	}
	function generateRandomString($length = 10) {
	    $characters = '0123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	if(isset($_POST['regis'])) {
		$nama = $_POST['nama'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$alamat = $_POST['alamat'];
		$dob = $_POST['dob'];
		$pin = $_POST['pin'];

		$con = mysqli_connect("localhost","root","","eazybanking");

		$check = mysqli_query($con,"SELECT account FROM user");
		$jumlah=0;
		while($cek = mysqli_fetch_row($check)) {
			$temp[$jumlah] = $cek[0];
			$jumlah++;
		}
		$acc = generateRandomString();
		for($i=0 ; $i <= $jumlah ; $i++){
			if($acc == $temp[$i]) {
				$acc = generateRandomString();
				$i = -1;
			}
		}
		$query = "INSERT INTO user VALUES('$acc','$nama','$alamat','$dob','$phone','$email','$username','$password','$pin',0,'0001',0,0)";

		$in = mysqli_query($con,$query);
		echo $in;
		exit;
	}
?>