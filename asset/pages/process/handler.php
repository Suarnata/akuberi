<?php
	
	require("mainprocess.php");
	$process = new akuberi();

	if(isset($_GET['action'])&&!empty($_GET['action'])){
		$action = $_GET['action'];

		switch($action){

			case 'register':
				$process->register();
			break;

		}

	}else{
		header("Location:".$process->base_url());
	}

?>