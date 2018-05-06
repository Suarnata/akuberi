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

			case 'storepost':
				if($process->image_process("storepost")['notif']=="success"){
					$process->storepost($process->get_imgname());
				}else{
					echo json_encode($process->image_process("storepost"));
				}
			break;

			case 'showposts':
				$process->showposts("");
			break;

			case 'paymentprocess':
				$process->paymentprocess();
			break;

			case 'gettotal':
				$post_id = $_POST['post_id'];
				$query = mysqli_query($process->connection,"SELECT post_revenue FROM post_table WHERE post_id = '$post_id'");
				$row = mysqli_fetch_assoc($query);
				echo "Terkumpul: Rp ".number_format($row['post_revenue'],2,",",".");
			break;

			case 'getnotification':
				$process->getnotification();
			break;

		}

	}else{
		header("Location:".$process->base_url());
	}

?>