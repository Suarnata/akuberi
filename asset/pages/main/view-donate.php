<?php include 'header-side-u.php'; ?>

	<div class="col-6">
		<div class="col-12 img-view bg-color1">
			<img style="" src="<?php echo $process->base_url();?>/asset/image/website/photo.png">
		</div>
		<div class="col-12 dsc-view">
			<h1>Title Locate Title</h1>
			<h3><a href="	">User Name</a></h3>
			<h2>Category</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<h6 class="col-6">Batas hari</h6><h5 class="col-6">Rp.1000000000</h5>
		</div>
		<div class="col-12 donasi-form">
			<h1>Silahkan Masukan Donasi Anda</h1>
			<form name="" method="" action="">
				<input class="col-10 norek" type="number" name="" placeholder=" Masukan No Rekening Anda... ">
				<input class="col-10 norek" class="norek" type="number" name="" placeholder=" Masukan Jumlah Donasi Anda (Rp)... ">

      <?php
        //Menampilkan Jenis bank pada media
        $process->showbank();
      ?>
        
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