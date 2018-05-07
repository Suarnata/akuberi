<?php include 'header-side-u.php'; ?>
	<div class="col-6 posting-u "> 
		<div class="col-12 pilih-donasi">
			<div class="col-10plus edit-title">
				<h1 style="font-size: 24px; color: #00aeea;"><i class="far fa-edit"></i> Pilih Post</h1>  
			</div>
			<div class="col-11plus pilih-donasi-con">
				<table class="pilih-edit-table">
					<tr>
						<th >No</th>
						<th >Foto Donasi</th>
						<th >Judul Galang Dana</th>
					
						<th>Kategori</th>
						<th>Edit</th>
						<th >Hapus</th>
					</tr>
					<tr>
						<td>1</td>
						<td> <img src="<?php echo $process->base_url(); ?>asset/image/website/iklan-6.jpg"></td>
						<td>Galang Dana Untuk Orang Stres Sedunia</td>
						
						<td>Kategori</td>
						<td><a style="padding:12px 9px; color: #fff; background-color: #00aeea;border-radius: 3px; box-shadow: 0px 1px 10px rgba(0,0,0,.2);" href=""><i class="far fa-edit"></i></a></td>
						<td><a style="padding:12px 11px; color: #fff; background-color:#f65061;border-radius: 3px; box-shadow: 0px 1px 10px rgba(0,0,0,.2);" href=""><i class="fas fa-trash"></i></a></td>
					</tr>

					
				</table>
			</div>	
		</div>
		<div class="col-12 edit-post">

			<div class="col-10plus edit-title">
				<h1 style="font-size: 24px; color: #00aeea;"><i class="far fa-edit"></i> Edit Post</h1>  
			</div>
			
			<div class="col-10plus edit-content">
			 	<div class="col-12 image-edit" id="img-container">
            <button class="picture-s-edit2" type="button" name="button"></button>
          		</div>
          		
				<form name="" method="" action="">
           <div class="col-12"> 
            <input style="width: 98%;padding: 1%; height: 32px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="" name="" placeholder="Judul Baru...">
           </div> 
           <div class="col-12">
            <textarea style="width: 98%;padding: 1%; height: 52px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;resize: none;" class="" placeholder="Deskripsi Baru"></textarea>
           </div>
           <div class="col-12"> 
           <div class="col-6"> 
            <select style="width:100%;
    outline: none;
    border: solid 2px #e8e8e8;
    border-radius: 2px;
    height: 32px;
    margin: 0px 0px;
    color: #696969;
    font-family: Palanquin;" class="" name="kategori" required>
              <?php
                $process->showcategories();
              ?>
            </select>
            </div>
            <div class="col-6">
            <select style="         width: 100%;outline: none;border: solid 2px #e8e8e8;border-radius: 2px;height: 32px;margin: 0px;color: #696969;font-family: Palanquin;  margin-left: 4px;" class="" name="durasi" required>
              <option value="3h">3 Hari</option>
              <option value="1m">1 Minggu</option>
              <option value="1b">1 Bulan</option>
              <option value="1t">1 Tahun</option>
              <option value="10t">10 Tahun</option>
            </select>
            </div>
            </div>
            <div class="col-12">
              <input style="width: 98%;padding: 1%; height: 32px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="number" min="1000" name="" placeholder="Masukan No Rekening Anda">
            </div>
            <div class="col-12">
              <input style="width: 98%;padding: 1%; height: 32px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="number" min="1000" name="" placeholder="Masukan Target Donasi">
            </div>
            <div class="col-12">
             <?php
            //Menampilkan Jenis bank pada media
            $process->showbank();
              ?>
            </div> 
            <div class="col-12">
              <button style="   transform: translate(170px,5px);
    border: none;
    outline: none;
    width: 300px;
    height: 45px;
    font-family: palanquin;
    border-radius: 3px;
    color: #fff;
    background-color: #00aeea;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0px 2px 8px rgba(0,0,0,.3);" class="edit-post-new" type="submit">Edit</button>
          </form>
			</div>
		</div>
    </div><!-- Content Postingan Tengah -->
    <script type="text/javascript">
      $("#mnu-edit").addClass('active-u');
    </script>
<?php include 'chat-footer-u.php';?>