<?php
	
	require("mainprocess.php");
	$process = new akuberi();

	if(isset($_GET['action'])&&!empty($_GET['action'])){
		$action = $_GET['action'];

		switch($action){

			case 'register':
				$process->register();
			break;

			case 'login':
				$process->login();
			break;

			case 'logout':
				$process->logout();
			break;

			case 'addpayment':
				$process->addpayment();
			break;

		}

	}else{
		header("Location:".$process->base_url());
	}

?>