<?php
  include 'panel-header.php';
?>
<?php
  /*if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }*/
?>
          <div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
              <div class="col-12 news">
                <div class="col-4plus col-s-11 news1 bg-news-1 bg-color3">
                  <img style="width: 20%;transform: translate(200%,30%);" src="<?php echo $process->base_url(); ?>asset/image/website/users-white.png ">
                  <h3 style="font-size: 20px;color: #fff;text-align: center;transform: translate(0,20%);">Pengguna</h3>
                  <h5 style="font-size:25px;text-align:center;color: #fff;transform: translate(0,-20%);">Rp. 1000.000.000</h5>
                </div>
                <div class="col-4plus col-s-11 news1 bg-news-2 bg-color3">
                  <img style="width: 20%;transform: translate(200%,30%);" src="<?php echo $process->base_url(); ?>asset/image/website/Money-blue.png ">
                  <h3 style="font-size: 20px;color: #00aeea;text-align: center;transform: translate(0,20%);">Donasi</h3>
                   <h5 style="font-size:25px;text-align:center;color: #00aeea;transform: translate(0,-20%);">1000 Orang</h5>
                </div>
              </div>
              <div class="col-12 news-diagram">
                <br/>
                <h3 style="    font-size: 24px;transform: translate(9.5%,5%);color: #00aeea;">Grafik</h3>

                  <div class="grafik bg-color3">
                    <img style="width:100%; height:100%;" src="<?php echo $process->base_url(); ?>asset/image/website/grafik1.png" alt="">
                  </div>
              </div>

            </div> <!-- KOnten Yang bEda Beda ||||| Kalau yang di Admin.php ini isi Grafik -->


    <script type="text/javascript">
      $("#menu-admin").addClass('sb-active');
    </script>

<?php include 'chat.php';?>
