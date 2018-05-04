<?php include 'header-side-u.php'; ?>
   
    <div class="col-6 posting-u ">
      <div class="col-12 banner-u"> 

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
    background-color: #00aeea;cursor: pointer;" class="col-1" type="submit" name="button">Post</button> 
            <button style="     border: none;
    width: 80px;
    height: 33px;
    font-family: palanquin;
    border-radius: 3px;
    color: #fff;
    float: right;
    margin: 4px 4px 0px 0px;
    background-color: #ff1215;cursor: pointer;" class="col-1" type="reset" name="button">Delete</button>
       
   
          <button style="     border: none;
    outline: none;
    width: 80px;
    height: 33px;
    font-family: palanquin;
    border-radius: 3px;
    color: #fff;
    float: right;
    margin: 4px 4px 0px 0px;
    background-color: #696969;cursor: pointer;" class="col-1 val-s" type="button" name="button">Media</button>
          </div>
        </div>
      </div>

    </form>

      <div class="val-byr">
        <div class="val-con-byr">

            <h2 style="    font-size: 25px;
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
    margin: 2% 7%;" type="number" min="0" name="rekening" placeholder="Masukan No Rekening Anda">
            </div>
            <h3 style="   font-size: 15px;
    color: #00aeea;
    width: 30%;
    text-align: center;
    line-height: 25px;
    transform: translate(0px,0px);">Masukan Jenis Bank Pilihan Anda</h3>
      
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

    </script>

<?php include 'chat-footer-u.php';?>
