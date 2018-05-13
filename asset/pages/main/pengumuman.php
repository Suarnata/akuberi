<?php  
  include "panel-header.php";
?>
  
 <?php
  if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }

  $user_id = $userInfo['user_id'];
  $query = mysqli_query($process->connection,"SELECT * FROM user_table WHERE user_id != $user_id AND user_id > 0");
?> 

          <div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
              <div class="col-12 news">
              <div class="col-12 chat">
                <div class="chat-work bg-color3" style="width: 80%;transform: translate(10%,5%);height: 24vh;">
                    <div class="col-12 chat-titles bg-color3">
                      <h3 id="reseticon" style="font-size: 16px;cursor:pointer;transform: translate(96%,16%);color: #00aeea;"><i class="fas fa-trash"></i></h3>
                    </div>
                    <textarea class="chat2" name="chat" id="bctext" placeholder="Ketik Chat" style="transform: translate(0,50%);"></textarea>
                    <div class="col-12 chat-titles bg-color3">
                      <button class="button-size-6 bg-color1" type="button" id="sendbc" name="button">Kirim</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 news-diagram">
                <br/>
                <h3 style="    font-size: 24px;transform: translate(9.5%,5%);color: #00aeea;">Data Table User</h3>

                  <div class="grafik-list  bg-color3" style="height: auto;">
                    <div class="data-table-pengumuman">
                      <table style="text-align: center;" id="tabel-data-pengguna" class="table table-striped table-dark" width="1000px" cellspacing="0">
                       <thead>
                          <tr style="border: none;">
                            <td style="border: none;">Toggle Pilih Semua <input type="checkbox" id="selectall"></td>
                          </tr>
                          <tr>
                              <th>No</th>
                              <th>Pilih</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>No Telp</th>
                              <th>Gambar</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Pilih</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>No Telp</th>
                              <th>Gambar</th>
                          </tr>
                      </tfoot>
                      <tbody>

                        <?php
                          $a = 1;
                          while($row = mysqli_fetch_assoc($query)){

                            echo '
                              <tr>
                                  <td>'.$a.'</td>
                                  <td><input type="checkbox" data-id="'.$row['user_id'].'" class="selecteduser onuser-'.$row['user_id'].'"></td></td>
                                  <td><a href="profil.php?userid='.$row['user_id'].'">'.$row['user_name'].'</a></td>
                                  <td>'.$row['user_email'].'</td>
                                  <td>'.$row['user_phone'].'</td>
                                  <td><img src="'.$process->base_url().'asset/image/user/'.$row['user_image'].'" width="100px" height="100px" /></td>
                              </tr>
                            ';

                            $a++;
                          }
                        ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>

            </div> <!-- KOnten Yang bEda Beda ||||| Kalau yang di Admin.php ini isi Grafik -->

        
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $("#menu-pengumuman").addClass('sb-active');
      $("#adminpagetitle").html("Pengumuman");
    </script>

<?php include 'footer.php';?>
