<?php
	
	class akuberi{

		private $base_url = "http://localhost/akuberi/";
		public $connection;

		//Fungsi Yang Menjalankan Perintah Dasar Ke Semua Halaman
		function __construct(){
			ob_start();
			$this->connection = @mysqli_connect('127.0.0.1','root','','db_akuberi');
			if(!$this->connection){
				$this->alert("Database Connection Error!");
			}

		}

		//Fungsi Alert Untuk Mempermudah Error Handling
		public function alert($text){
			echo '
				<script>
					alert("'.$text.'");
				</script>
			';
		}

		//Fungsi Yang Berisi URL Website
		public function base_url(){
			return $this->base_url;
		}

		//Fungsi Pendaftaran User
		public function register(){

			$data = array();
			$emptycount = 0;

			if(isset($_POST['fname'])&&isset($_POST['sname'])&&isset($_POST['email'])&&isset($_POST['telp'])&&isset($_POST['password'])&&isset($_POST['address'])){

				$username = $_POST['fname']." ".$_POST['sname'];
				$dataset = array('NULL',$username,$_POST['email'],md5($_POST['password']),$_POST['address'],$_POST['telp'],2,1,'defaultuser.jpg');

				for($a=0;$a<=8;$a++){
					if(empty($dataset[0])){
						$emptycount++;
					}
				}

				if($emptycount!=0){
					$data['notif'] = 'err-empty';
				}else{

					if(!preg_match("/^[a-zA-Z ]*$/",$username)){
						$data['notif'] = 'err-username';
					}else{

						if(!is_numeric($dataset[5])){
							$data['notif'] = 'err-telp';
						}else{

							$query = mysqli_query($this->connection,"SELECT user_email FROM user_table WHERE user_email = '$dataset[2]' ");
							if(mysqli_num_rows($query)!=0){
								$data['notif'] = 'err-email';
							}else{

								$query = mysqli_query($this->connection,"INSERT INTO user_table VALUES ('$dataset[0]','$dataset[1]','$dataset[2]','$dataset[3]','$dataset[4]','$dataset[5]','$dataset[6]','$dataset[7]','$dataset[8]')");

								if($query){
									$data['notif'] = 'success';
								}else{
									$data['notif'] = 'err-failed';
								}

							}	

						}

					}

				}
					

			}else{
				header("Location:".$this->base_url());
			}

			echo json_encode($data);
		}

		//Fungsi Untuk Login
		public function login(){
			if(isset($_POST['email'])&&isset($_POST['password'])){
				$email = $_POST['email'];
				$password = md5($_POST['password']);
				$data = array();

				if(!empty($email)&&!empty($password)){

					$query = mysqli_query($this->connection,"SELECT user_id,user_level,user_status FROM user_table WHERE user_email = '$email' AND user_password = '$password'");
					
					if(mysqli_num_rows($query)==1){

						$row = mysqli_fetch_assoc($query);
						$user_id = $row['user_id'];

						if($row['user_status']==1){	

							$strong = true;
							$token = bin2hex(openssl_random_pseudo_bytes(64,$strong));
							setcookie('ABID',$token,time() + (60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);

							$token = sha1($token);
							$query = mysqli_query($this->connection,"INSERT INTO token_table VALUES(NULL,'$user_id','$token')");

							if($query){

								$data['notif'] = 'success';

								if($row['user_level']==1){
									$data['level'] = 'admin';
								}else{
									$data['level'] = 'user';
								}

							}else{
								$data['notif'] = 'err-db';
							}

						}else{
							$data['notif'] = 'err-blocked';
						}

					}else{
						$data['notif'] = 'err-wrong';
					}

				}else{
					$data['notif'] = 'err-empty';
				}

			}else{
				header("Location:".$this->base_url());
			}

			echo json_encode($data);
		}

		//Fungsi Untuk Memastikan User Telah Login Dan Mengambil Data User Yang Login
		public function session_check(){
			if(isset($_COOKIE['ABID'])&&!empty($_COOKIE['ABID'])){
				$cookie = sha1($_COOKIE['ABID']);
				$query = mysqli_query($this->connection,"SELECT user_id FROM token_table WHERE token_code = '$cookie'");
				if(mysqli_num_rows($query)==1){
					$row = mysqli_fetch_assoc($query);
					$user_id = $row['user_id'];

					$query = mysqli_query($this->connection,"SELECT * FROM user_table WHERE user_id = '$user_id'");

					$row = mysqli_fetch_assoc($query);
					$row['login'] = true;
					return $row;

				}else{
					setcookie("ABID", "", time() - 7200,'/');
					header("Location:".$this->base_url());
				}
			}
		}

		//Fungsi Untuk Logout User
		public function logout(){
			$data = array();
			$token = sha1($_POST['token']);
			$query = mysqli_query($this->connection,"DELETE FROM token_table WHERE token_code = '$token'");
			if($query){
				setcookie("ABID", "", time() - 7200,'/');
				$data['notif'] = 'success';
			}

			echo json_encode($data);
		}

	}

?>