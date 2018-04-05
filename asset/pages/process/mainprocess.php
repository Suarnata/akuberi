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
				$dataset = array('NULL',$username,$_POST['email'],md5($_POST['password']),$_POST['address'],$_POST['telp'],2,1);

				for($a=0;$a<=7;$a++){
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

								$query = mysqli_query($this->connection,"INSERT INTO user_table VALUES ('$dataset[0]','$dataset[1]','$dataset[2]','$dataset[3]','$dataset[4]','$dataset[5]','$dataset[6]','$dataset[7]')");

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

	}

?>