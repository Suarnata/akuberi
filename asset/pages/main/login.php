<?php
  require("../process/mainprocess.php");
  $process = new akuberi();
  $message = "";

  if(isset($_GET['status'])&&!empty($_GET['status'])){
  	switch($_GET['status']){
  		case 'registered':
  			$message = "Registrasi Berhasil, Silahkan Login";
  		break;
  	}

  }

?>

<html>
<head>
	<title>akuberi | Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/login.css">
</head>
<body>
	<div class="box">

		<label class="close"><a href="<?php echo $process->base_url(); ?>">X</a></label>
		<div class="login">

			<h2>Masuk Ke Akuberi</h2>

			<p style="color:#2ecc71;"><?php echo $message;?></p>
			
			<form id="loginform" method="POST">
				<div>
					<input type="email" name="email" required="true">
					<label>Email</label>
				</div>
				<div>
					<input type="password" name="password" required="true">
					<label>Password</label>
				</div>
				<input type="submit" name="submit" value="Submit">
			</form>

			<p id="notification"></p>

		</div>
		<div class="sosmed">
			<br/>
			<label>Atau Masuk Dengan</label>
			<div>
				<button type="submit" class="facebook">facebook</button>
			</div>
			<div>
				<button type="submit" class="google">Google</button>
			</div>
		</div>
	</div>

	<script src="<?php echo $process->base_url(); ?>asset/javascript/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="<?php echo $process->base_url() ?>asset/javascript/mainprocess.js"></script>

</body>
</html>