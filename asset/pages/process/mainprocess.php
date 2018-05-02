<?php
	
	class akuberi{

		private $base_url = "http://localhost/akuberi/";
		public $connection;
		public $img_name;

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

		public function dd($array){
			echo '<pre>';
				print_r($array);
			echo '</pre>';
		}

		public function get_imgname(){
			return $this->img_name;
		}

		//Memproses gambar sebelum diupload
		public function image_process($type){

			if(!empty($_FILES['image']['name'])){

				$image_ext = explode('.', $_FILES['image']['name']);
				$image_whitelist = array('jpg','png','jpeg','gif');
				$data = array();

				if(in_array(strtolower($image_ext[1]), $image_whitelist)){
					
					if($_FILES['image']['size']<=100000000){

						if($_FILES['image']['error']==0){
							$test = bin2hex(openssl_random_pseudo_bytes(8));	
							$data['image_name'] = $test."_".$image_ext[0].".".$image_ext[1];

							switch($type){
								case 'storepost':
									$moveurl = "../../../asset/image/post/".$data['image_name'];
								break;
							}

							move_uploaded_file($_FILES['image']['tmp_name'],$moveurl);

							$this->img_name = $data['image_name'];
							$data['notif'] = 'success';

						}else{
							$data['notif'] = 'err-img';
						}
						
					}else{
						$data['notif'] = 'err-size';
					}
				
				}else{
					$data['notif'] = 'err-ext';
				}

			}else{
				
				switch($type){
					case 'storepost':
						$this->img_name = "defaultpost.jpg";
						$data['notif']="success";
					break;
				}

			}

				return $data;
		}

//==============================AUTHENTICATION===========================================================================

		//Fungsi Pendaftaran User
		public function register(){

			$data = array();
			$emptycount = 0;

			if(isset($_POST['fname'])&&isset($_POST['sname'])&&isset($_POST['email'])&&isset($_POST['telp'])&&isset($_POST['password'])&&isset($_POST['address'])){

				$username = $_POST['fname']." ".$_POST['sname'];
				$dataset = array('NULL',$username,$_POST['email'],md5($_POST['password']),$_POST['address'],$_POST['telp'],2,1,'defaultuser.jpg');

				for($a=0;$a<=8;$a++){
					if(empty($dataset[$a])){
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
//=========================== / AUTHENTICATION===========================================================================

//================================USER PAGE==============================================================================
		//Menampilkan jenis kategori pada halaman user
		public function showcategories(){
			$query = mysqli_query($this->connection,"SELECT * FROM category_table");

	        while($row = mysqli_fetch_assoc($query)){
	        
	        	echo '

	        		<option value="'.$row['category_id'].'">'.$row['category_name'].'</option>

	        	';

	        }
		}

		//Menampilkan jenis bank pada modal media
		public function showbank(){
			$query = mysqli_query($this->connection,"SELECT * FROM bank_table");

	        while($row = mysqli_fetch_assoc($query)){
	        
	        	echo '

	        		<div class="col-3 bank1">
		              <img src="'.$this->base_url().'/asset/image/website/bank/'.$row['bank_image'].'">
		              <br/>
		              <input class="radio-bnk" type="radio" name="bank" value="'.$row['bank_id'].'">
		            </div>

	        	';

	        }
		}

		//Memasukkan informasi sementara no rekening dalam media
		public function addpayment(){
			if(!empty($_POST['rekening'])&&!empty($_POST['bank'])){
				setcookie('rekening_temp',$_POST['rekening'],time() + (60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
				setcookie('bank_temp',$_POST['bank'],time() + (60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
				$data = ['notif'=>'success'];
			}else{
				$data = ['notif'=>'empty'];
			}
			echo json_encode($data);
		}

		public function validatepost(){
			$data = array();
			if(isset($_COOKIE['rekening_temp'])&&isset($_COOKIE['bank_temp'])&&!empty($_COOKIE['rekening_temp'])&&!empty($_COOKIE['bank_temp'])){

				$data['norek'] = $_COOKIE['rekening_temp'];
				$data['bank'] = $_COOKIE['bank_temp'];

				if(!empty($_POST['judul'])&&!empty($_POST['deskripsi'])&&!empty($_POST['kategori'])&&!empty($_POST['durasi'])){

					$data['judul'] = $_POST['judul'];
					$data['deskripsi'] = $_POST['deskripsi'];
					$data['kategori'] = $_POST['kategori'];
					$data['durasi'] = $_POST['durasi'];
					$data['notif'] = "success";

					switch($data['durasi']){
						case '3h':
							$date = date("Y-m-d");
							$date = strtotime(date("Y-m-d", strtotime($date)) . " +3 day");
						break;

						case '1m':
							$date = date("Y-m-d");
							$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 week");
						break;

						case '1b':
							$date = date("Y-m-d");
							$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 month");
						break;

						case '1t':
							$date = date("Y-m-d");
							$date = strtotime(date("Y-m-d", strtotime($date)) . " +1 year");
						break;

						case '10t':
							$date = date("Y-m-d");
							$date = strtotime(date("Y-m-d", strtotime($date)) . " +10 year");
						break;

					}

					$data['durasi'] = date("Y-m-d",$date);

				}else{
					$data['notif'] = 'err-empty';
				}

			}else{
				$data['notif'] = 'err-account';
			}


			return $data;
		}

		public function storepost($image){
			$dt = $this->validatepost();
			$dt['image'] = $image;
			$dt['userid'] = $this->session_check()['user_id'];
			$data = array();

			switch($dt['notif']){

				case 'success':
					
					$query = mysqli_query($this->connection,"INSERT INTO post_table VALUES(
						NULL,
						'".$dt['userid']."',
						'".$dt['kategori']."',
						'".$dt['judul']."',
						'".$dt['deskripsi']."',
						'".$dt['image']."',
						1,
						'".$dt['durasi']."',
						0,
						'".$dt['bank']."',
						'".$dt['norek']."'
				)");

					if($query){
						setcookie("rekening_temp", "", time() - 7200,'/');
						setcookie("bank_temp", "", time() - 7200,'/');
						$data['notif'] = 'success';
					}else{
						$data['notif'] = 'err-db';
					}

				break;

				default:
				$data['notif'] = $dt['notif'];
			}

			echo json_encode($data);
		}
//=============================== / USER PAGE============================================================================



	}

?>