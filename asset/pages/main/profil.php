<?php include 'header-side-u.php'; ?>
   
    <?php
      if(isset($_GET['userid'])&&!empty($_GET['userid'])){
        $user_id = $_GET['userid'];
        $query = mysqli_query($process->connection,"SELECT * FROM user_table WHERE user_id = '$user_id'");
        if(mysqli_num_rows($query)==1){
          $userInfo = mysqli_fetch_assoc($query);
        }else{
          $userInfo = $process->session_check();
        }
      }else{
        $userInfo = $process->session_check();
      }
    ?>

    <div class="col-6 posting-u ">        
      <div class="col-12 identitas">
        <div class="col-4plus identitas-user-img">
          <img src="<?php echo $process->base_url(); ?>asset/image/user/<?php echo $userInfo['user_image']; ?>">
        </div>
        <div class="col-7plus identitas-user">
          <h2>Profil Pengguna</h2>
          <div class="col-12 idn">
            <h1><i class="fas fa-user"></i><?php echo $userInfo['user_name']; ?></h1>  
          </div>
          <div class="col-12 idn">
            <h1><i class="fas fa-envelope"></i><?php echo $userInfo['user_email']; ?></h1>
          </div>
          <div class="col-12 idn">
            <h1><i class="fas fa-phone"></i><?php echo $userInfo['user_phone']; ?></h1>
          </div>
          <div class="col-12 idn">
            <h1><i class="fas fa-map"></i><?php echo $userInfo['user_address']; ?></h1>
          </div>
        </div>
      </div>
      <div class="col-12 jumlah">

        <?php
          
          $query = mysqli_query($process->connection,"SELECT * FROM history_table WHERE user_id = '".$userInfo['user_id']."'");
          $totaldonasi = mysqli_num_rows($query);

          $query = mysqli_query($process->connection,"SELECT * FROM post_table WHERE user_id = '".$userInfo['user_id']."' AND post_status<3 ORDER BY post_id DESC");
          $totalgalang = mysqli_num_rows($query);

        ?>

        <div class="col-12 jumlah1">
          <h1>Jumlah Kebaikan</h1>
          <h2>Jumlah Penggalangan Dana : <?php echo $totalgalang; ?></h2>
          <h2>Jumlah Donasi: <?php echo $totaldonasi; ?></h2>
        </div>
      </div>
      <div class="col-12 auto-loop">
        <div class="col-12 auto-loop">
          <h2>Penggalangan Dana yang Dilakukan</h2><!--TITLE LOOP -->

            <?php

              if(mysqli_num_rows($query)==0){
                  echo '<h4 style="margin:20px 0px; color:red;">Belum Pernah Melakukan Penggalangan Dana</h4>';
                }else{
                  while($row = mysqli_fetch_assoc($query)){
                    echo '
                      <div class="col-3pluss img-posting">
                          <div class="img-post-hover"></div>
                        <a href="view-donate.php?postid='.$row['post_id'].'"> <img src="'.$process->base_url().'asset/image/post/'.$row['post_img'].'"></a>
                      </div>
                    ';
                }

              }
            ?>  
        
        </div>    
        <div class="col-12 auto-loop">
          <h2>Donasi yang Dilakukan</h2>
          <!--TITLE LOOP -->

            <?php
              $query = mysqli_query($process->connection,"SELECT history_table.*,post_table.* FROM history_table
               INNER JOIN post_table ON history_table.post_id = post_table.post_id
               WHERE history_table.user_id = '".$userInfo['user_id']."' AND post_status<3
               ORDER BY history_table.history_id DESC
                ");

                if(mysqli_num_rows($query)==0){
                  echo '<h4 style="margin:20px 0px; color:red;">Belum Pernah Melakukan Donasi</h4>';
                }else{
                  while($row = mysqli_fetch_assoc($query)){
                    echo '
                      <div class="col-3pluss img-posting">
                          <div class="img-post-hover"></div>
                        <a href="view-donate.php?postid='.$row['post_id'].'"> <img src="'.$process->base_url().'asset/image/post/'.$row['post_img'].'"></a>
                      </div>
                    ';
                }

              }
            ?>  

        </div>  
      </div>
    </div><!-- Content Postingan Tengah -->
    <script type="text/javascript">
      $("#mnu-profil").addClass('active-u');
    </script>
<?php include 'chat-footer-u.php';?>