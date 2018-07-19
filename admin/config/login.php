<?php
	include("koneksi.php");
	session_start();

	$user = mysqli_real_escape_string($con,$_POST['username']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);
	$pass = sha1($pass);

	$query = mysqli_query($con, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");
	$res_q = mysqli_fetch_assoc($query);

	$user_q = $res_q['username'];
	$pass_q = $res_q['password'];

	if($user == $user_q && $pass == $pass_q) {
		$_SESSION['user'] = $user;
		header("location:../index.php");
	} else {
		header("location:../login.php"); 
	}
?>