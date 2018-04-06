<?php
  require("../process/mainprocess.php");
  $process = new akuberi();

  if($process->session_check()['login']==true){
    $userInfo = $process->session_check();
    if($userInfo['user_level']==1){
    	header("Location:".$process->base_url().'asset/pages/main/admin.php');
    }else{	
    	header("Location:".$process->base_url().'asset/pages/main/user.php');
    }
  }
  
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/register.css">
</head>
<body>
	<div class="box">
			<label class="close"><a href="<?php echo $process->base_url(); ?>">X</a></label>
			<h2>Register</h2>
			<form id="registerform" method="POST">
				<table>
					<tr>
						<td><div class="depan">
					<input type="text" name="fname" required="true">
					<label>Nama Depan</label>
				</div></td>
						<td><div class="belakang">
					<input type="text" name="sname" required="true">
					<label>Nama Belakang</label>
				</div>
				</div></td>
					</tr>
				</table>
			
				<div class="email">
					<input type="email" name="email" required="true">
					<label>Email</label>
				</div>
				<div>
					<input type="text" name="telp" required="true">
					<label>No Hp</label>
				</div>
				<div>
					<input type="password" name="password" required="true">
					<label>Password</label>
				</div>
				<div>
					<input type="text" name="address" required="true">
					<label>Alamat</label>
				</div>

				<p id="notification"></p>

				<input type="submit" name="submit" value="Buat Akun">
			</form>
			<div class="sosmed">
				<br/>
				<label><center>Atau</center></label>
				<div>
					<button type="submit" class="facebook">facebook</button>
					<button type="submit" class="google">Google</button>
				</div>
			</div>
	</div>

	<script src="<?php echo $process->base_url(); ?>asset/javascript/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $process->base_url() ?>asset/javascript/mainprocess.js"></script>
</body>
</html>