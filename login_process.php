<?php
	ob_start();
	session_start();
	include_once('configs/config.php');
	include_once('engines/crud_engine.php');

	$crudEngine = new crudEngine(DBParams::HOST_NAME, DBParams::DB_NAME, DBParams::USER_NAME, DBParams::PASSWORD);
	$user_email = $_POST['user_email'];
	// $user_email = htmlspecialchars($_POST['user_email'], ENT_QUOTES);
	$password_plain = $_POST['user_password'];

	if ($crudEngine->verifyCredential($user_email, $password_plain))
		{
			$user_details = $crudEngine->getUserDetailsByEmail($user_email);
			if(!empty($user_details) && !is_null($user_details))	
				{
					$_SESSION['status']="loggedin";
					$_SESSION['user_id']=$user_details['user_id'];
					$ip = $_SERVER['REMOTE_ADDR'];
					$browser=$_SERVER['HTTP_USER_AGENT'];

					header( "location:home.php");
				}
			else 
				{
					header("location:login.php?msg=21");
				}
		}
	else
		{
			header("location:login.php?msg=20");
		}

	ob_end_flush();
?>