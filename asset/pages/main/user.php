<?php include 'header-side-u.php'; ?>
   
  <!-- <div class="col-12 edit">
      <div class="edit-form">
        <div class="col-12 form-edit">
           <button class="cancle-edit" type="button">
                <span></span>
           </button>
          <h1 style="font-size: 24px; color: #00aeea; transform: translate(20px,20px);"><i class="far fa-edit"></i> Edit Post</h1>    
         <div class="col-10plus" style="margin: 8% 4%"> 
          <form name="" method="" action="">
           <div class="col-12"> 
            <input style="width: 98%;padding: 1%; height: 32px;margin: 4px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="" name="" placeholder="Judul Baru...">
           </div> 
           <div class="col-12">
            <textarea style="width: 98%;padding: 1%; height: 52px;margin: 4px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;resize: none;" class="" placeholder="Deskripsi Baru"></textarea>
           </div>
           <div class="col-12"> 
           <div class="col-6"> 
            <select style="width:100%;
    outline: none;
    border: solid 2px #e8e8e8;
    border-radius: 2px;
    height: 32px;
    margin: 0px 4px 0px;
    color: #696969;
    font-family: Palanquin;" class="" name="kategori" required>
              <?php
                $process->showcategories();
              ?>
            </select>
            </div>
            <div class="col-6">
            <select style="         width: 100%;outline: none;border: solid 2px #e8e8e8;border-radius: 2px;height: 32px;margin: 0px 4px 0px;color: #696969;font-family: Palanquin;  margin-left: 8px;" class="" name="durasi" required>
              <option value="3h">3 Hari</option>
              <option value="1m">1 Minggu</option>
              <option value="1b">1 Bulan</option>
              <option value="1t">1 Tahun</option>
              <option value="10t">10 Tahun</option>
            </select>
            </div>
            </div>
            <div class="col-12">
              <input style="width: 98%;padding: 1%; height: 32px;margin: 4px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="number" min="1000" name="" placeholder="Masukan No Rekening Anda">
            </div>
            <div class="col-12">
              <input style="width: 98%;padding: 1%; height: 32px;margin: 4px; outline: none;border-radius: 2px; border: solid 2px #e8e8e8;" type="number" min="1000" name="" placeholder="Masukan Target Donasi">
            </div>
            <div class="col-12">
             <?php
            //Menampilkan Jenis bank pada media
            $process->showbank();
              ?>
            </div> 
            <div class="col-12">
              <button style="   transform: translate(37px,5px);
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
      </div>
      </div>      
   </div> Edit -->

    <div class="col-6 posting-u ">
      <div class="col-12 banner-u"> 
        <div class="col-12 carousel-cell">
          <img src="<?php echo $process->base_url(); ?>asset/image/website/iklan-5.jpg">
        </div>

        <div class="col-12 carousel-cell">
          <img src="<?php echo $process->base_url(); ?>asset/image/website/iklan-6.jpg">
        </div>

        <div class="col-12 carousel-cell">
          <img src="<?php echo $process->base_url(); ?>asset/image/website/iklan-4.jpg">
        </div>
      </div>  
      <div class="col-12 post-u-con">
        <div class="col-3 push">
          <div class="col-12 image-push" id="img-container">
            <button class="picture-s" type="button" name="button"></button>
          </div>
        </div>

        <form method="POST" id="postform" enctype="multipart/form-data">

        <div class="col-9 push bg-color3">
          
          <div class="col-12 jdl-post-u">
            <input style="width: 489px;
    outline: none;font-family: Palanquin;
    border: solid 2px #e8e8e8;
    border-radius: 2px;
    height: 20px;
    margin: 4px 4px 0px;
    padding: 3px;" type="text" name="judul" value="" placeholder="Judul Galang Dana" required>
          </div>

          <div class="col-12 desc-post-u">
            <textarea style="       width: 489px;    outline: none;
    border: 2px solid rgb(232, 232, 232);font-family: Palanquin;
    border-radius: 2px;
    height: 50px;
    margin: 4px 4px 0px;
    overflow: hidden;
    resize: none;
    padding: 3px;" name="deskripsi" rows="5" cols="70" placeholder="Deskripsi Galang Dana" required></textarea>
          </div>

          <div class="col-6 category-post-u">
            <select style="width:100%;
    outline: none;
    border: solid 2px #e8e8e8;
    border-radius: 2px;
    height: 32px;
    margin: 0px 4px 0px;
    color: #696969;
    font-family: Palanquin;" class="" name="kategori" required>
              <?php
                $process->showcategories();
              ?>
            </select>
          </div>

          <div class="col-6 time-post-u">
            <select style="         width: 242px;outline: none;border: solid 2px #e8e8e8;border-radius: 2px;height: 32px;margin: 0px 4px 0px;color: #696969;font-family: Palanquin;  margin-left: 8px;" class="" name="durasi" required>
              <option value="3h">3 Hari</option>
              <option value="1m">1 Minggu</option>
              <option value="1b">1 Bulan</option>
              <option value="1t">1 Tahun</option>
              <option value="10t">10 Tahun</option>
            </select>
          </div>

          <input type="file" id="inputfile" name="image" hidden>

          <div class="col-12 category-btn-u">
                   <button style="     border: none;
    width: 80px;
    height: 33px;
    font-family: palanquin;
    border-radius: 3px;
    color: #fff;
    float: right;
    margin: 4px 4px 0px 0px;
    background-color: #00aeea;cursor: pointer;box-shadow: 0px 2px 6px rgba(0,0,0,.5);" class="col-1 val-s1" type="submit" name="button"><i class="far fa-paper-plane"></i>&nbsp;&nbsp;Kirim</button> 
            <button style="     border: none;
            outline: none;
    width: 40px;
    height: 33px;
    font-family: palanquin;
    border-radius: 3px;
    color: #fff;
    float: right;
    margin: 4px 4px 0px 0px;
    background-color: #f65061;cursor: pointer;
    box-shadow: 0px 2px 6px rgba(0,0,0,.5);" class="col-1 val-s1" type="reset" id="reset-btn"><i class="fas fa-trash"></i></button>
       
   
          <button style=" border: none;
    outline: none;
    width: 40px;
    height: 33px;
    font-family: palanquin;
    border-radius: 3px;
    color: #696969;
    float: right;
    margin: 4px 4px 0px 0px;
    background-color: #f0f0f0;cursor: pointer;box-shadow: 0px 1px 6px rgba(0,0,0,.3);" class="col-1 val-s" type="button" name="button"><i class="far fa-credit-card"></i></button>
          </div>
        </div>
      </div>

    </form>

      <div class="val-byr">
        <div class="val-con-byr">

            <h2 style="font-size: 25px;
    color: #00aeea;
    width: 30%;
    text-align: center;
    line-height: 25px;
    transform: translate(280px,55px); margin-bottom: 55px;">Akuberi Media Transfer</h2>
           
             <div class="col-12">
              <input style="      width: 80%;
    height: 20px;
    font-family: arial;
    padding: 1% 3%;
    margin: 2% 7%;" type="number" min="1000" name="rekening" placeholder="Masukan No Rekening Anda" required>
            </div>
            <div class="col-12">
              <input style="      width: 80%;
    height: 20px;
    font-family: arial;
    padding: 1% 3%;
    margin: 0% 7%;" type="number" min="1000" step="1000" name="target" placeholder="Masukan Jumlah Target Donasi (Rp)" required>
            </div>
            <h3 style="    font-size: 15px;
    color: #00aeea;
    width: 30%;
    text-align: center;
    line-height: 25px;
    transform: translate(42px,0px);">Masukan Jenis Bank Pilihan Anda</h3>
       
       <?php
        //Menampilkan Jenis bank pada media
        $process->showbank();
      ?>
     
            
            <div class="col-12">
                 <button style="      transform: translate(250px,5px);
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
    box-shadow: 0px 2px 8px rgba(0,0,0,.3);" class="col-1 val-s" id="addpayment" type="button" name="button">Tambahkan</button>
            </div>
          
          
              <button class="val-toggle" type="button">
                <span></span>
              </button>
        
        </div>
      </div>
    
    <!-- Post Section -->
    <div id="postsection">
      <?php

        if(isset($_GET['search'])&&!empty($_GET['search'])){
          $search = $_GET['search'];
        }else{
          $search="";
        }


        $process->showposts($search);
      ?>
     </div> 
     <!-- / post section -->

    </div><!-- Content Postingan Tengah -->

    <script type="text/javascript">

      $("#mnu-beranda").addClass('active-u');

      $(document).on('click','.picture-s',function(){
        $('#inputfile').click();
      });

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

        $(document).on('click','.bullet',function(){
          var data = $(this).data('id');
          $(".bullet-menu-"+data).toggleClass("active-bull");
        });

    </script>

<?php include 'chat-footer-u.php';?>
