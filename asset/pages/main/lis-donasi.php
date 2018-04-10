<?php  
  include "panel-header.php";
?>
  
 <?php
  /*if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }*/
?> 

          <div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
              <div class="col-12 news">
              <div class="col-12 chat">
                <div class="chat-work bg-color3" style="width: 80%;transform: translate(10%,5%);height: 150%;">
                    <div class="col-12 chat-titles bg-color3">
                      <h3 style="font-size: 16px;transform: translate(96%,16%);color: #00aeea;"><i class="fas fa-trash"></i></h3>
                    </div>
                    <textarea class="chat2" name="chat" placeholder="Ketik Chat" style="transform: translate(0,50%);"></textarea>
                    <div class="col-12 chat-titles bg-color3">
                      <button class="button-size-6 bg-color1" type="button" name="button">Kirim</button>
                    </div>
                  </div>
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
      $("#menu-list-donasi").addClass('sb-active');
    </script>

<?php include 'footer.php';?>
