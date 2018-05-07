<?php include 'header-side-u.php'; ?>
	<div class="col-6 posting-u "> 
		



		<div class="col-12 edit-post">

			<div class="col-10plus edit-title">
				<h1 style="font-size: 24px; color: #00aeea;"><i class="far fa-edit"></i> Edit Post</h1>  
			</div>
			
			<div class="col-10plus edit-content">

        <div class="col-12 image-push" id="img-container">
          <img src="<?php echo $process->base_url() ?>asset/image/website/editmodel.jpg" width="200px" height="145px"/><br/>
          <button class="picture-s2" type="button">Ubah</button>
        </div>
          		
				<form id="editpostform" method="POST" enctype="multipart/form-data">
           <div class="col-12"> 
            <input style="width: 98%;padding: 1%; height: 32px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="" name="judul" placeholder="Judul" required>
            <input type="file" name="image" id="inputfile" hidden/>
            <input type="hidden" name="postid" value=""/>
            <input type="hidden" name="imageid" value=""/>
            <input type="hidden" name="durasiid" value=""/>
           </div> 
           <div class="col-12">
            <textarea style="width: 98%;padding: 1%; height: 52px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;resize: none;" name="deskripsi" class="" placeholder="Deskripsi" required></textarea>
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
    font-family: Palanquin;" class="selectkategori" name="kategori" id="" required>
              <?php
                $process->showcategories();
              ?>
            </select>
            </div>
            <div class="col-6">
            <select style="         width: 100%;outline: none;border: solid 2px #e8e8e8;border-radius: 2px;height: 32px;margin: 0px;color: #696969;font-family: Palanquin;  margin-left: 4px;" class="" name="durasi" required>
              <option value="tetap">Waktu Tetap</option>
              <option value="perpanjang">Perpanjang (3 Hari)</option>
            </select>
            </div>
            </div>
            <div class="col-12">
              <input style="width: 98%;padding: 1%; height: 32px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="number" min="1000" name="norek" placeholder="No Rekening" required>
            </div>
            <div class="col-12">
              <input style="width: 98%;padding: 1%; height: 32px;margin: 4px 0px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="number" min="1000" name="target" placeholder="Target Donasi (Rp)" required>
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
    box-shadow: 0px 2px 8px rgba(0,0,0,.3);" class="edit-post-new" id="submitbtn" type="submit" hidden>Edit</button>
          <p style="margin: 10px 0px; text-align: center;" id="pesan">Pilih Postingan Dibawah <i class="fa fa-arrow-down"></i></p>
          </form>
			</div>
		</div>












    </div><!-- Content Postingan Tengah -->
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

          <tbody id="postlistsection">
          <?php
            $process->vieweditlist();
          ?>
          </tbody>

					
				</table>
			</div>	
		</div><!-- PILIHAN DONASI -->
    <script type="text/javascript">
      $("#mnu-edit").addClass('active-u');

      $(document).on('click','.picture-s2',function(){
        $('#inputfile').click();
      });

      function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $("#img-container").html(`
                <img src="${e.target.result}" width="200px" height="145px"/><br/>
                <button class="picture-s2" type="button">Ubah</button>
              `);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $('#inputfile').change(function(){
        readURL(this);
      });

    </script>
<?php include 'chat-footer-u.php';?>