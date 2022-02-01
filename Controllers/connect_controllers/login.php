<?php 

	session_start();
	include "connection.php";

	$sql = "select * from users where username='".strip_tags(addslashes(trim($_POST["username"])))."' and password='".strip_tags(addslashes(trim($_POST["password"])))."'";
	$sonuc = $conn->query($sql);

	if($sonuc->num_rows>0){
		$datas = $sonuc->fetch_object();
		$_SESSION["isLogin"]=true;
		$_SESSION["who"]=$datas->name;
		$_SESSION["auth"]=$datas->auth;
		header("location:../../Views/others/index.php");
	}
	else{
		header('location:../../user_login.php?error=1');
	}



