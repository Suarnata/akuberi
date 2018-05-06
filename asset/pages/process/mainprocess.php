 <?php
	
	class akuberi{

		public $connection;
		private $base_url = "http://localhost/akuberi/";
		private $img_name;

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

								case 'updateprofile':
									$moveurl = "../../../asset/image/user/".$data['image_name'];
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

					case 'updateprofile':
						$this->img_name = $this->session_check()['user_image'];
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
			if(!empty($_POST['rekening'])&&!empty($_POST['bank'])&&!empty($_POST['target'])){
				setcookie('rekening_temp',$_POST['rekening'],time() + (60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
				setcookie('bank_temp',$_POST['bank'],time() + (60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
				setcookie('target_temp',$_POST['target'],time() + (60 * 60 * 24 * 7), '/', NULL, NULL, TRUE);
				$data = ['notif'=>'success'];
			}else{
				$data = ['notif'=>'empty'];
			}
			echo json_encode($data);
		}

		public function validatepost(){
			$data = array();
			if(isset($_COOKIE['rekening_temp'])&&isset($_COOKIE['bank_temp'])&&isset($_COOKIE['target_temp'])&&!empty($_COOKIE['rekening_temp'])&&!empty($_COOKIE['bank_temp'])&&!empty($_COOKIE['target_temp'])){

				$data['norek'] = $_COOKIE['rekening_temp'];
				$data['bank'] = $_COOKIE['bank_temp'];
				$data['target'] = $_COOKIE['target_temp'];

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
						'".$dt['target']."',
						0,
						'".$dt['bank']."',
						'".$dt['norek']."'
				)");

					if($query){
						setcookie("rekening_temp", "", time() - 7200,'/');
						setcookie("bank_temp", "", time() - 7200,'/');
						setcookie("target_temp", "", time() - 7200,'/');
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

		public function showposts($search){
			$search = '%'.$search.'%';
			if($search!="%%"){
				$query = mysqli_query($this->connection,"SELECT post_table.*, category_table.*, user_table.*  FROM post_table
				    INNER JOIN category_table ON post_table.category_id = category_table.category_id 
				    INNER JOIN user_table ON post_table.user_id = user_table.user_id
				    WHERE post_table.post_title LIKE '$search' OR user_table.user_name LIKE '$search' OR category_table.category_name LIKE '$search' AND post_table.post_status=1
				    ORDER BY post_table.post_id DESC
				  ");
			}else{
				$query = mysqli_query($this->connection,"SELECT post_table.*, category_table.*, user_table.*  FROM post_table
				    INNER JOIN category_table ON post_table.category_id = category_table.category_id
				    INNER JOIN user_table ON post_table.user_id = user_table.user_id 
				    WHERE post_table.post_status=1
				    ORDER BY post_table.post_id DESC
				  ");
			}

			if(mysqli_num_rows($query)==0){
				echo '<p style="color:#c0392b; font-size:20px; text-align:center; font-weight:bold; margin:50px 0px;">Post Donasi Atau Nama Penggalang Dana Tidak Ditemukan</p>';
			}else{

				  while($row = mysqli_fetch_assoc($query)){
				    echo '
				    <div class="col-12 post-u">
				      <div class="col-12 box-post-u">
				        <div class="col-4 box-post-con bg-color1">
				          <img style="width: 100%; height:  100%;" src="'.$this->base_url().'/asset/image/post/'.$row['post_img'].'">
				        </div>
				        <div class="col-8 box-post-con">
				          <div class="col-6">
				            <h1 style="    font-size: 20px;
				  transform: translate(25px, 15px);
				  color: #00aeea;line-height:30px;">'.substr($row['post_title'],0,30).'...</h1>       
				          </div>

				          <style type="text/css">
				          	.bullet-menu-'.$row['post_id'].'{position: absolute; width: 100px;height: 135px; background-color: #fff;box-shadow: 0px 1px 10px rgba(0,0,0,.3); transform: translate(345px,50px);z-index: 1; display: none;}
				          	.bullet-menu-'.$row['post_id'].' ul{width: 100%; height: 100%;overflow: hidden;}
				          	.bullet-menu-'.$row['post_id'].' ul li{display: block; list-style: none; width: 100%;height:33%; border-bottom: solid 1px #e8e8e8;}
				          	.bullet-menu-'.$row['post_id'].' ul li a{display: block;text-decoration: none; line-height: 45px;color: #696969;font-size: 16px; font-family: Palanquin; text-align: center;}
				          	.bullet-menu-'.$row['post_id'].' ul li h1{cursor:pointer;display: block;text-decoration: none; line-height: 45px;color: #696969;font-size: 16px; font-family: Palanquin; text-align: center;}
				          	.bullet-menu-'.$row['post_id'].' ul li a:hover{background-color: #e8e8e8;}
				          	.bullet-menu-'.$row['post_id'].' ul li h1:hover{background-color: #e8e8e8;}
				          	
				          	.bullet-menu-'.$row['post_id'].':before{content:"";position: absolute; width: 20px;height: 20px; background-color: #fff; transform: rotate(45deg); z-index: -2;top:-10px; right: 8px;}
				          </style>

				          <div class="col-6">
				             <button class="bullet" data-id='.$row['post_id'].' type="button">
				               <span></span>
				             </button>
				           
				          </div>
				           <div class="bullet-menu-'.$row['post_id'].'">
				            <ul>';
				             
				            if($row['user_id']==$this->session_check()['user_id']){
				             echo '<li class="edit-show"><h1>Edit</h1></li>';	
				            }
				              

				          echo '
				              <li><a href="">Bagikan</a></li>
				              <li><a href="">Hilangkan</a></li>
				            </ul>
				           </div> 

				          <div class="col-12">
				            <h2 style="     font-size: 17px;
				  width: 85%;
				  transform: translate(25px,15px);
				  opacity: 0.5;"><a id="linkkategori" href="user.php?search='.$row['category_name'].'">'.$row['category_name'].'</h2>
				          </div>
				            
				        
				          <div class="col-12">
				            <h2 style="     font-size: 12px;
				  width: 85%;
				  transform: translate(25px,10px);
				  opacity: 0.5;"><a style="color:#696969;" href="profil.php?userid='.$row['user_id'].'">'.$row['user_name'].'</a></h2>
				          </div>
				          <div class="col-12">
				            <h2 style="      opacity: .8;
				  font-size: 14px;
				  width: 90%;
				  transform: translate(25px,10px);">'.substr($row['post_desc'],0,110).'...</h2>
				          </div>
				          <div class="col-3">
				            <h2 style="     font-size: 17px;
				  transform: translate(25px,15px);
				  opacity: .7;">'.date('d/m/Y',strtotime($row['post_due'])).'</h2>
				          </div>
				          <div class="col-9">
				          <h2 style="    font-size: 17px;
				  transform: translate(25px,15px);
				  opacity: .7;"> Rp '.number_format($row['post_revenue'],2,",",".").'</h2>
				          </div>
				          <div class="col-12">
				            
				              <div class="col-3 donate">
				            <h2 style="    font-size: 14px;transform: translate(25px,35px);"><a style="    background-color:#00aeea;
				  text-decoration: none;
				  color: #fff;
				  padding: 5px 25px;
				  
				  box-shadow: 0px 2px 6px rgba(0,0,0,.5);" href="view-donate.php?postid='.$row['post_id'].'"> Donasi</a></h2>
				              </div>
				              <div class="col-9 look">
				            <h2 style="    font-size: 14px;transform: translate(15px,35px);"><a style="    background-color:#fff ;
				  text-decoration: none;
				  color: #808080;
				  padding: 5px 25px;
				  box-shadow: 0px 2px 6px rgba(0,0,0,.5);
				  " href="view-donate.php?postid='.$row['post_id'].'">Lihat <i class="fas fa-eye"></i></a></h2>
				              </div>

				          </div>
				     
				           
				        </div>
				      </div>
				    </div>

				  ';

				}

			}	

		}

		public function getnotification(){
			$user_id = $this->session_check()['user_id'];
			$query = mysqli_query($this->connection,"SELECT notification_table.*, user_table.* FROM notification_table
					 INNER JOIN user_table ON notification_table.user_id = user_table.user_id
					 WHERE target_id = '$user_id' ORDER BY notif_id DESC");
			if(mysqli_num_rows($query)>0){

				while($row = mysqli_fetch_assoc($query)){
					$uname = explode(' ', $row['user_name']);

					switch($row['notif_type']){
						
						case 1: 
							echo '
								  <div class="col-12 notif1">
								    <div class="col-2plus profil-img">
								       <img style="width: 65%;
								height: 55%;
								border-radius: 50%;
								transform: translate(25%,45%);" src="'.$this->base_url().'asset/image/user/'.$row['user_image'].'" alt="">
								    </div>
								    <div class="col-9plus profil-img">
								      <h6 style="     font-size: 12px;
								color: #00aeea;
								transform: translate(5px,7px);" class="col-6">Admin</h6>
								      <h6 style=" font-size: 12px;
								color: #696969;
								transform: translate(5px,7px);
								opacity: .5;" class="col-6">05/05/2015</h6>
								      <h6 style=" font-size: 12px;
								color: #008ebf;
								transform: translate(5px);
								opacity: .5;" class="col-12">Description only 4 word</h6>
								    </div>
								  </div><!-- Notifikasi -->
							';
						break;
						
						case 2: 
							echo '
										<div class="col-12 notif2">
											<div class="col-2plus profil-img">
												 <img style="width: 65%;
								  height: 55%;
								  border-radius: 50%;
								  transform: translate(25%,45%);" src="'.$this->base_url().'asset/image/user/'.$row['user_image'].'" alt="">
											</div>
											<div class="col-9plus profil-img">
												<a href="profil.php?userid='.$row['user_id'].'"><h6 style="	    font-size: 12px;
								  color: #00aeea;
								  transform: translate(5px,7px);" class="col-6">'.substr($uname[0],0,14).'</h6></a>
								  			<h6 style="	font-size: 12px;
								  color: #696969;
								  transform: translate(5px,7px);
								  opacity: .5;" class="col-6">'.date('d/m/Y',strtotime($row['notif_date'])).'</h6>
												<h6 style="	font-size: 12px;
								  color: #008ebf;
								  transform: translate(5px);
								  opacity: .5;" class="col-12"><a id="linktopost" href="view-donate.php?postid='.$row['post_id'].'">Berdonasi Di Postingan Anda</a></h6>
											</div>
										</div>
								
							';
						break;
					}
				}

			}else{
				echo '<p style="text-align:center; margin:20px 0px; color:red;">Tidak Ada Notifikasi</p>';
			}

		}

		public function sendchat(){
			$chat = $_POST['chat'];
			$user_id = $this->session_check()['user_id'];
			$data = [];
			if(!empty($chat)){

				$query = mysqli_query($this->connection,"INSERT INTO chat_table VALUES(
					'NULL',
					'$user_id',
					'$chat',
					NOW()
				)");

				if($query){
					$data['notif'] = 'success';
				}else{
					$data['notif'] = 'err-db';
				}

			}else{
				$data['notif'] = 'err-empty';
			}

			echo json_encode($data);
		}

		public function getchat(){
			$query = mysqli_query($this->connection,"SELECT chat_table.*, user_table.* FROM chat_table INNER JOIN user_table ON chat_table.user_id = user_table.user_id ORDER BY chat_id ASC");
			if(mysqli_num_rows($query)!=0){
				while($row = mysqli_fetch_assoc($query)){
					$uname = explode(' ', $row['user_name']);
					if($row['user_id']==$this->session_check()['user_id']){
					
						echo '
									<div class="col-12 chat-me">
										<div class="col-8 chat-msg-u">	
											<h6 style="    font-size: 12px;
							  color: #fff;
							  transform: translate(5px,2px);
							  line-height: 16px;margin: 0% 0%;" class="col-10plus">'.$row['chat_data'].'</h6>

											<h6 style="    font-size: 12px;
							  transform: translate(5px,2px);
							  line-height: 16px;border-top: solid 1px #f0f0f0;  opacity: .7;margin: 7% 0%;padding: 3% 0% 0%;" class="col-10plus"><span style="color: #f0f0f0;">'.date('h:i',strtotime($row['chat_date'])).'</span>&nbsp;&nbsp;<a style="" href="">Hapus</a></h6>
										</div>


										<div class="col-2plus">
											 <img style="width: 65%;
							  height: 55%;
							  border-radius: 50%;
							  transform: translate(25%,45%);" src="'.$this->base_url().'asset/image/user/'.$row['user_image'].'" alt="">
										</div>
									</div>
						';
					
					}else{
					
						echo '
									<div class="col-12 chat-lawan">
										<div class="col-2plus">
											 <img style="width: 65%;
							  height: 55%;
							  border-radius: 50%;
							  transform: translate(25%,45%);" src="'.$this->base_url().'asset/image/user/'.$row['user_image'].'" alt="">
										</div>
										<div class="col-8 chat-msg">	
											<h6 style="    font-size: 12px;
							  color: #00aeea;
							  transform: translate(5px,0px);
							  border-bottom: solid 1px #e8e8e8;" class="col-10plus">'.substr($uname[0],0,14).' &nbsp;&nbsp;<span style="color:#696969; opacity: .4;">'.date('h:i',strtotime($row['chat_date'])).'</span></h6>
											<h6 style="    font-size: 12px;
							  color: #00aeea;
							  transform: translate(5px,2px);
							  line-height: 16px;" class="col-10plus">'.$row['chat_data'].'</h6>
										</div>		
									</div>
						';
					
					}
				}
			}else{
				echo '<p style="text-align:center; font-size:13px; margin:10px 0px;">Chat Kosong, Mulai Ketik Pesan!</p>';
			}

		}
//=============================== / USER PAGE============================================================================

//================================DONATION PAGE==========================================================================
		public function paymentprocess(){
			if(!empty($_POST['userpostid'])&&!empty($_POST['postid'])&&!empty($_POST['total'])){
				$user_id = $this->session_check()['user_id'];
				$target_id = $_POST['userpostid'];
				$post_id = $_POST['postid'];
				$total = $_POST['total'];

				$query = mysqli_query($this->connection,"UPDATE post_table SET post_revenue = post_revenue + '$total' WHERE post_id = '$post_id'");

				$query = mysqli_query($this->connection,"SELECT * FROM history_table WHERE user_id = '$user_id' AND post_id = '$post_id'");

				if(mysqli_num_rows($query)==0){
					$query = mysqli_query($this->connection,"INSERT INTO history_table VALUES (
						'NULL',
						'$user_id',
						'$post_id',
						'$total',
						DATE(NOW())
					)");
				}else{
					$query = mysqli_query($this->connection,"UPDATE history_table SET
						total = total+'$total' WHERE user_id = '$user_id' AND post_id = '$post_id'
						");
				}

				if($query){

					$query = mysqli_query($this->connection,"INSERT INTO notification_table VALUES (
						'NULL',
						'$user_id',
						'$target_id',
						0,
						'$post_id',
						2,
						DATE(NOW())
					)");

					if($query){
						$data['notif'] = 'success';
						$data['post_id'] = $post_id;
					}else{
						$data['notif'] = 'err-db';
					}

				}else{
					$data['notif'] = 'err-db';
				}

			}else{
				$data['notif'] = 'err-empty';
			}

			echo json_encode($data);
		}
//============================= / DONATION PAGE==========================================================================

//================================SETTINGS PAGE==========================================================================
		public function updateprofile($image){

			$data = [];

			if(!empty($_POST['email'])&&!empty($_POST['nama'])&&!empty($_POST['telp'])&&!empty($_POST['alamat'])){
				
				$user_id = $this->session_check()['user_id'];
				$name = $_POST['nama'];
				$email = $_POST['email'];
				$phone = $_POST['telp'];
				$alamat = $_POST['alamat'];

				if(!preg_match("/^[a-zA-Z ]*$/",$name)){
					$data['notif'] = 'err-name';
				}else{

					if(!is_numeric($phone)){
						$data['notif'] = 'err-telp';
					}else{
						
						if($this->session_check()['user_image']!='defaultuser.jpg'&&$image!=$this->session_check()['user_image']){
							unlink('../../image/user/'.$this->session_check()['user_image']);
						}

						$query = mysqli_query($this->connection,"UPDATE user_table SET 
							user_name = '$name',
							user_email = '$email',
							user_address = '$alamat',
							user_phone = '$phone',
							user_image = '$image'
							WHERE user_id = '$user_id'
							");
						if($query){
							$data['notif'] = 'success';
						}else{
							$data['notif'] = 'err-db';
						}
					}
				}

			}else{
				$data['notif'] = 'err-empty';
			}

			echo json_encode($data);
		}

		public function updatepass(){

			$data = [];

			if(!empty($_POST['pass-lm'])&&!empty($_POST['pass-br'])&&!empty($_POST['pass-ul'])){
				$user_id = $this->session_check()['user_id'];
				$pw_lm = md5($_POST['pass-lm']);
				$pw_br = md5($_POST['pass-br']);
				$pw_ul = md5($_POST['pass-ul']);

				$query = mysqli_query($this->connection,"SELECT user_password FROM user_table WHERE user_password = '$pw_lm' AND user_id = '$user_id'");

				if(mysqli_num_rows($query)==1){

					if($pw_br==$pw_ul){
						
						$query = mysqli_query($this->connection,"UPDATE user_table SET user_password = '$pw_br' WHERE user_id = '$user_id'");

						if($query){
							$data['notif'] = 'success';
						}else{
							$data['notif'] = 'err-db';	
						}

					}else{
						$data['notif'] = 'err-wrongrepeat';	
					}

				}else{
					$data['notif'] = 'err-wrong';
				}

			}else{
				$data['notif'] = 'err-empty';
			}

			echo json_encode($data);
		}
//============================= / SETTINGS PAGE==========================================================================

//==============================MYDONATION PAGE==========================================================================
		public function donasiku_showpost($type){
			$user_id = $this->session_check()['user_id'];

			switch($type){
				case 'all':
					$query = mysqli_query($this->connection,"SELECT post_table.*, category_table.*, user_table.*  FROM post_table
						    INNER JOIN category_table ON post_table.category_id = category_table.category_id
						    INNER JOIN user_table ON post_table.user_id = user_table.user_id 
						    WHERE user_table.user_id = '$user_id' AND post_table.post_status=1
						    ORDER BY post_table.post_id DESC
						  ");
				break;

				case 'history':
					$query = mysqli_query($this->connection,"SELECT history_table.*,post_table.*,user_table.*,category_table.* FROM history_table
						INNER JOIN post_table ON history_table.post_id = post_table.post_id
						INNER JOIN category_table ON post_table.category_id = category_table.category_id
						INNER JOIN user_table ON post_table.user_id = user_table.user_id
						WHERE history_table.user_id = '$user_id'
						");
				break;
			}

			if(mysqli_num_rows($query)==0){
				echo '<p style="color:#c0392b; font-size:20px; text-align:center; font-weight:bold; margin:50px 0px;">Donasi Atau Penggalangan Dana Tidak Ditemukan, Ayo Mulai Berdonasi <a href="user.php">Donasi</a></p>';
			}else{

				  while($row = mysqli_fetch_assoc($query)){
				    echo '
				    <div class="col-12 post-u">
				      <div class="col-12 box-post-u">
				        <div class="col-4 box-post-con bg-color1">
				          <img style="width: 100%; height:  100%;" src="'.$this->base_url().'/asset/image/post/'.$row['post_img'].'">
				        </div>
				        <div class="col-8 box-post-con">
				          <div class="col-6">
				            <h1 style="    font-size: 20px;
				  transform: translate(25px, 15px);
				  color: #00aeea;line-height:30px;">'.substr($row['post_title'],0,30).'...</h1>       
				          </div>

				          <style type="text/css">
				          	.bullet-menu-'.$row['post_id'].'{position: absolute; width: 100px;height: 135px; background-color: #fff;box-shadow: 0px 1px 10px rgba(0,0,0,.3); transform: translate(345px,50px);z-index: 1; display: none;}
				          	.bullet-menu-'.$row['post_id'].' ul{width: 100%; height: 100%;overflow: hidden;}
				          	.bullet-menu-'.$row['post_id'].' ul li{display: block; list-style: none; width: 100%;height:33%; border-bottom: solid 1px #e8e8e8;}
				          	.bullet-menu-'.$row['post_id'].' ul li a{display: block;text-decoration: none; line-height: 45px;color: #696969;font-size: 16px; font-family: Palanquin; text-align: center;}
				          	.bullet-menu-'.$row['post_id'].' ul li h1{cursor:pointer;display: block;text-decoration: none; line-height: 45px;color: #696969;font-size: 16px; font-family: Palanquin; text-align: center;}
				          	.bullet-menu-'.$row['post_id'].' ul li a:hover{background-color: #e8e8e8;}
				          	.bullet-menu-'.$row['post_id'].' ul li h1:hover{background-color: #e8e8e8;}
				          	
				          	.bullet-menu-'.$row['post_id'].':before{content:"";position: absolute; width: 20px;height: 20px; background-color: #fff; transform: rotate(45deg); z-index: -2;top:-10px; right: 8px;}
				          </style>

				          <div class="col-6">
				             <button class="bullet" data-id='.$row['post_id'].' type="button">
				               <span></span>
				             </button>
				           
				          </div>
				           <div class="bullet-menu-'.$row['post_id'].'">
				            <ul>';
				             
				            if($row['user_id']==$this->session_check()['user_id']){
				             echo '<li class="edit-show"><h1>Edit</h1></li>';	
				            }
				              

				          echo '
				              <li><a href="">Bagikan</a></li>
				              <li><a href="">Hilangkan</a></li>
				            </ul>
				           </div> 

				          <div class="col-12">
				            <h2 style="     font-size: 17px;
				  width: 85%;
				  transform: translate(25px,15px);
				  opacity: 0.5;"><a id="linkkategori" href="user.php?search='.$row['category_name'].'">'.$row['category_name'].'</a></h2>
				          </div>
				            
				        
				          <div class="col-12">
				            <h2 style="     font-size: 12px;
				  width: 85%;
				  transform: translate(25px,10px);
				  opacity: 0.5;"><a style="color:#696969;" href="profil.php?userid='.$row['user_id'].'">'.$row['user_name'].'</a></h2>
				          </div>
				          <div class="col-12">
				            <h2 style="      opacity: .8;
				  font-size: 14px;
				  width: 90%;
				  transform: translate(25px,10px);">'.substr($row['post_desc'],0,110).'...</h2>
				          </div>
				          <div class="col-3">
				            <h2 style="     font-size: 17px;
				  transform: translate(25px,15px);
				  opacity: .7;">'.date('d/m/Y',strtotime($row['post_due'])).'</h2>
				          </div>
				          <div class="col-9">
				          <h2 style="    font-size: 17px;
				  transform: translate(25px,15px);
				  opacity: .7;"> Rp '.number_format($row['post_revenue'],2,",",".").'</h2>
				          </div>
				          <div class="col-12">
				            
				              <div class="col-3 donate">
				            <h2 style="    font-size: 14px;transform: translate(25px,35px);"><a style="    background-color:#00aeea;
				  text-decoration: none;
				  color: #fff;
				  padding: 5px 25px;
				  
				  box-shadow: 0px 2px 6px rgba(0,0,0,.5);" href="view-donate.php?postid='.$row['post_id'].'"> Donasi</a></h2>
				              </div>
				              <div class="col-9 look">
				            <h2 style="    font-size: 14px;transform: translate(15px,35px);"><a style="    background-color:#fff ;
				  text-decoration: none;
				  color: #808080;
				  padding: 5px 25px;
				  box-shadow: 0px 2px 6px rgba(0,0,0,.5);
				  " href="view-donate.php?postid='.$row['post_id'].'">Lihat <i class="fas fa-eye"></i></a></h2>
				              </div>

				          </div>
				     
				           
				        </div>
				      </div>
				    </div>

				  ';

				}

			}

		}

		public function donasiku_popular(){
			$user_id = $this->session_check()['user_id'];

			$query = mysqli_query($this->connection,"SELECT post_table.*, category_table.*, user_table.*  FROM post_table
				    INNER JOIN category_table ON post_table.category_id = category_table.category_id
				    INNER JOIN user_table ON post_table.user_id = user_table.user_id 
				    WHERE user_table.user_id = '$user_id' AND post_table.post_status=1
				    ORDER BY post_table.post_revenue DESC LIMIT 0,1
				  ");

			if(mysqli_num_rows($query)==0){
				echo '<p style="color:#c0392b; font-size:20px; text-align:center; font-weight:bold; margin:50px 0px;">Penggalangan Dana Terpopuler Tidak Ditemukan</p>';
			}else{

				  while($row = mysqli_fetch_assoc($query)){
				    echo '
				    <div class="col-12 bg-color3 post-now">
				    		<div class="col-6 bg-color1 post-now-pict">
				    			<img style="width: 100%; height: 100%;" src="'.$this->base_url().'/asset/image/post/'.$row['post_img'].'">
				    		</div>
				    		<div class="col-6">
				    			<div class="col-6">	
				                  <h1 style="    font-size: 20px;
				        transform: translate(25px, 10px);
				        color: #00aeea;">'.substr($row['post_title'],0,20).'...</h1>       
				            	</div>
				                <div class="col-2plus">
				                   <button style="margin-left: 130px" class="bullet" type="button">
				                     <span></span>
				                   </button>
				                </div>
				                 <div class="col-12">
				                  <h2 style="     font-size: 17px;
				        width: 85%;
				        transform: translate(25px,2px);
				        opacity: 0.5;"><a id="linkkategori" href="user.php?search='.$row['category_name'].'">'.$row['category_name'].'</a></h2>
				                </div>
				                <div class="col-12">
				                  <h2 style="     font-size: 11px;
				        width: 85%;
				        transform: translate(25px,0px);
				        opacity: 0.5;"><a href="profil.php?userid='.$row['user_id'].'">'.$row['user_name'].'</a></h2>
				                </div>
				                <div class="col-12">
				                  <h2 style="     margin-top: 20px;
				        opacity: .8;
				        font-size: 14px;
				        width: 80%;
				        transform: translate(25px,10px);">'.substr($row['post_desc'],0,200).'...</h2>
				                </div>
				                <div class="col-12">
				                	<div class="col-2plus">
				                  <h2 style="     font-size: 17px;
				                      margin: 12px 0px;
				        transform: translate(25px,24px);
				        opacity: .7;">'.date('d/m/Y',strtotime($row['post_due'])).'</h2>
				                </div>
				                <div class="col-4plus">
				                <h2 style="    font-size: 17px;
				                    margin: 12px 0px;
				        transform: translate(25px,24px);
				        opacity: .7;"> Rp '.number_format($row['post_revenue'],2,",",".").'</h2>
				                </div>
				                </div>
				              <div class="col-12">
				                  
				                  <div class="col-3 donate">
				                  <h2 style="    font-size: 14px;transform: translate(25px,35px);"><a style="    background-color:#00aeea;
				        text-decoration: none;
				        color: #fff;
				        padding: 5px 25px;
				        
				        box-shadow: 0px 2px 6px rgba(0,0,0,.5);
				        " href=""> Donasi</a></h2>
				                    </div>
				                    <div class="col-9 look">
				                  <h2 style="    font-size: 14px;transform: translate(40px,35px);"><a style="    background-color:#fff ;
				        text-decoration: none;
				        color: #808080;
				        padding: 5px 25px;
				        box-shadow: 0px 2px 6px rgba(0,0,0,.5);
				        " href="">Lihat <i class="fas fa-eye"></i></a></h2>
				                    </div>

				                </div>

				                
				            </div>   

				    	</div> <!-- GALANG DANA NOW -->

				  ';

				}

			}

		}
//=========================== / MYDONATION PAGE==========================================================================

	}

?>