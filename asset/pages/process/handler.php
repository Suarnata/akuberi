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

			case 'updateprofile':
				if($process->image_process("updateprofile")['notif']=="success"){
					$process->updateprofile($process->get_imgname());
				}else{
					echo json_encode($process->image_process("updateprofile"));
				}
			break;

			case 'updatepass':
				$process->updatepass();
			break;

			case 'sendchat':
				$process->sendchat();
			break;

			case 'getchat':
				$process->getchat();
			break;

			case 'deletechat':
				$process->deletechat();
			break;

			case 'deletepost':
				$process->deletepost();
			break;

			case 'vieweditpost':
				$process->vieweditpost();
			break;

			case 'editpost':
				if($process->image_process("editpost")['notif']=="success"){
					$process->editpost($process->get_imgname());
				}else{
					echo json_encode($process->image_process("updateprofile"));
				}
			break;

			case 'vieweditlist':
				$process->vieweditlist();
			break;

			case 'sendbc':
				$process->sendbc();
			break;

			case 'showbc':
				$process->showbc();
			break;

			case 'updateuserlevel':
				$process->updateuser_LS('level');
			break;

			case 'updateuserstatus':
				$process->updateuser_LS('status');
			break;

			case 'updatepoststatus':
				$process->updatepoststatus();
			break;

		}

	}else{
		header("Location:".$process->base_url());
	}

?>