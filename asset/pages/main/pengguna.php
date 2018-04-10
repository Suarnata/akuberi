<?php include 'panel-header.php';?>

<?php
  /*if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }*/
?>

          <div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
              <div class="col-12 news">
                <div class="col-4plus col-s-11 news1 bg-news-1 bg-color3">
                  <img style="width: 25%;transform: translate(150%,30%);" src="<?php echo $process->base_url(); ?>asset/image/website/users-white.png ">
                  <h3 style="font-size: 20px;color: #fff;text-align: center;transform: translate(0,20%);">User</h3>
                </div>
                <div style="box-shadow: none;" class="col-4plus col-s-11 news1 ">
                  <table style="color: #00aeea">
                    <tr>
                      <td><h5>Jumlah</h5></td>
                      <td><h5>&nbsp;:&nbsp;</h5></td>
                      <td><h5>Rp. 1000.000</h5></td>
                    </tr>
                    <tr>
                      <td><h5>Kampanye</h5></td>
                      <td><h5>&nbsp;:&nbsp;</h5></td>
                      <td><h5>Gak tau</h5></td>
                    </tr>
                    <tr>
                      <td><h5>Donasi</h5></td>
                      <td><h5>&nbsp;:&nbsp;</h5></td>
                      <td><h5>Rp. 100.000</h5></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-12 news-diagram">
                <br/>
                <h3 style="    font-size: 24px;transform: translate(9.5%,5%);color: #00aeea;">Data Table User</h3>

                  <div class="grafik bg-color3">
                    <img style="width:100%; height:100%;" src="<?php echo $process->base_url(); ?>asset/image/website/grafik1.png" alt="">
                  </div>
              </div>

            </div> <!-- KOnten Yang bEda Beda ||||| Kalau yang di Admin.php ini isi Grafik -->

            <div class="col-3 content-post-a3">
              <div class="col-12 chat">
                <div class="chat-work bg-color3">
                  <div class="col-12 chat-title bg-color3">
                    <h3 style="font-size: 16px;transform: translate(3%,4%);color: #00aeea;">Chat Komunitas</h3>
                  </div>
                  <div class="col-12 chat-content bg-color3">

                  </div>
                  <textarea class="chat2" name="chat" placeholder="Ketik Chat"></textarea>
                </div>
              </div>
              <div class="col-12 calender">

              </div>
            </div> <!-- This is Chat -->
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $("#menu-pengguna").addClass('sb-active');
    </script>

<?php include 'footer.php';?>
