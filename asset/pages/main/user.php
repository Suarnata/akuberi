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


      <?php

      $query = mysqli_query($process->connection,"SELECT post_table.*, category_table.*  FROM post_table
          INNER JOIN category_table ON post_table.category_id = category_table.category_id
          ORDER BY post_table.post_id DESC
        ");

      while($row = mysqli_fetch_assoc($query)){
        echo '
      <div class="col-12 post-u">
        <div class="col-12 box-post-u">
          <div class="col-4 box-post-con bg-color1">
            <img style="width: 100%; height:100%;" src="'.$process->base_url().'asset/image/post/'.$row['post_img'].'">
          </div>
          <div class="col-8 box-post-con">
            <div class="col-6">
              <h1 style="    font-size: 24px;
    transform: translate(25px, 10px);
    color: #00aeea;">'.$row['post_title'].'</h1>       
            </div>
            
            <div class="col-6">
               <button class="bullet" type="button">
                 <span></span>
               </button>
            </div>
            
            <div class="col-12">
              <h2 style="     font-size: 17px;
    width: 85%;
    transform: translate(25px,5px);
    opacity: 0.5;">'.$row['category_name'].'</h2>
            </div>
            
            <div class="col-12">
              <h2 style="      opacity: .8;
    font-size: 14px;
    width: 90%;
    transform: translate(25px,16px);">'.$row['post_desc'].'</h2>
            </div>
            
            <div class="col-2plus">
              <h2 style="     font-size: 17px;
    transform: translate(25px,24px);
    opacity: .7;">'.date('d-m-Y',strtotime($row['post_due'])).'</h2>
            </div>
            
            <div class="col-3plus">
            <h2 style="    font-size: 17px;
    transform: translate(25px,24px);
    opacity: .7;">Rp '.number_format($row['post_revenue'],2,",",".").'</h2>
            </div>
            
            <div class="col-3 donate">
             <h2 style="    font-size: 14px;transform: translate(49px,60px);"><a style="background-color: #00aeea;
    text-decoration: none;
    color: #fff;
    padding: 5px 20px;
    box-shadow: 0px 1px 2px rgba(0,0,0,.4);" href=""> Donasi</a></h2>
           </div>

           <div class="col-3 look">
             <h2 style="    font-size: 14px;transform: translate(26px,60px);"><a style="    background-color: #2b5f67;
    text-decoration: none;
    color: #fff;
    padding: 5px 25px;
    box-shadow: 0px 1px 2px rgba(0,0,0,.4);" href=""> Lihat</a></h2>
            </div>
             
          </div>
        </div>
      </div>

      ';

    }

      ?>



    </div><!-- Content Postingan Tengah -->

    <script type="text/javascript">

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
