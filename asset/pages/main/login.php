<?php
  require("../process/mainprocess.php");
  $process = new akuberi();
?>

<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/login.css">
</head>
<body>
	<div class="box">
		<label class="close"><a href="<?php echo $process->base_url(); ?>">X</a></label>
		<div class="login">
			<h2>Masuk Ke Akuberi</h2>
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
</body>
</html>