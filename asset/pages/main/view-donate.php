<?php include 'header-side-u.php'; ?>

<?php

	if(isset($_GET['postid'])&&!empty($_GET['postid'])){
		$post_id = $_GET['postid'];
		$query = mysqli_query($process->connection,"SELECT post_table.*, category_table.*, user_table.*, bank_table.*  FROM post_table
				    INNER JOIN category_table ON post_table.category_id = category_table.category_id 
				    INNER JOIN user_table ON post_table.user_id = user_table.user_id
				    INNER JOIN bank_table ON post_table.bank_id = bank_table.bank_id
				    WHERE post_table.post_id = '$post_id' AND post_table.post_status=1
				  ");
		
		if(mysqli_num_rows($query)==1){
			$row = mysqli_fetch_assoc($query);
		}else{
			header('Location: '.$process->base_url().'asset/pages/main/user.php');
		}

	}else{
		header('Location: '.$process->base_url().'asset/pages/main/user.php');
	}

?>

	<div class="col-6">
		<div class="col-12 img-view bg-color1">
			<img style="" src="<?php echo $process->base_url();?>/asset/image/post/<?php echo $row['post_img']; ?>">
		</div>
		<div class="col-12 dsc-view">
			<h1><?php echo $row['post_title']; ?></h1>
			<h3><a href="	"><?php echo $row['user_name']; ?></a></h3>
			<h2><?php echo $row['category_name']; ?></h2>
			<p style="font-size:25px;"><?php echo $row['post_desc']; ?></p>
			<h6 class="col-6">Berakhir Pada: <?php echo date('d/m/Y',strtotime($row['post_due'])); ?></h6>
			<h5 class="col-6" id="terkumpultext">Terkumpul: Rp <?php echo number_format($row['post_revenue'],2,",","."); ?></h5>
			<h5 class="col-6">Target: Rp <?php echo number_format($row['post_target'],2,",","."); ?></h5>
		</div>
		<div class="col-12 donasi-form">
			<h5 style="text-align:center;">Silahkan Berdonasi Dengan Mentransfer Ke Rekening Berikut</h5>
			<h3 style="text-align:center;"><img src="<?php echo $process->base_url();?>/asset/image/website/bank/<?php echo $row['bank_image']; ?>" width="70px" height="70px" /> <?php echo $row['post_rek']; ?></h3>
			<form id="paymentform" method="POST">
				<input type="hidden" name="userpostid" value="<?php echo $row['user_id']; ?>">
				<input type="hidden" name="postid" value="<?php echo $row['post_id']; ?>">
				<input class="col-10 norek" step="1000" min="1000" class="norek" type="number" name="total" placeholder=" Masukan Jumlah Donasi Anda (Rp)... ">
        
				<button style="      transform: translate(40px,5px);
    border: none;
    outline: none;
    width: 595px;
    height: 45px;
    font-family: palanquin;
    border-radius: 3px;
    color: #fff;
    background-color: #00aeea;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0px 2px 8px rgba(0,0,0,.3);"
    class="" type="submit">Donasi</button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$("#mnu-beranda").addClass('active-u');
	</script>

<?php include 'chat-footer-u.php' ?>