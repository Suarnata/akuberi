<?php include 'panel-header.php';?>

<?php
  if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  
  }

    $query = mysqli_query($process->connection,"SELECT SUM(post_revenue) AS total FROM post_table");
    $total = mysqli_fetch_assoc($query);

    $query = mysqli_query($process->connection,"SELECT * FROM post_table");
    $kampanye = mysqli_num_rows($query);

    $query = mysqli_query($process->connection,"SELECT * FROM history_table");
    $donatur = mysqli_num_rows($query);
?>

          <div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
              <div class="col-12 news">
                <div class="col-4plus col-s-11 news1 bg-news-2 bg-color3">
                  <img style="width: 25%;transform: translate(150%,30%);" src="<?php echo $process->base_url(); ?>asset/image/website/Money-blue.png">
                  <h3 style="font-size: 20px;color: #00aeea;text-align: center;transform: translate(0,20%);">Donasi</h3>
                </div>
                <div style="box-shadow: none;" class="col-4plus col-s-11 news1 ">
                  <table style="color: #00aeea">
                    <tr>
                      <td><h5>Dana Total</h5></td>
                      <td><h5>&nbsp;:&nbsp;</h5></td>
                      <td><h5>Rp <?php echo number_format($total['total'],2,",","."); ?></h5></td>
                    </tr>
                    <tr>
                      <td><h5>Kampanye</h5></td>
                      <td><h5>&nbsp;:&nbsp;</h5></td>
                      <td><h5><?php echo $kampanye; ?> Postingan</h5></td>
                    </tr>
                    <tr>
                      <td><h5>Donasi</h5></td>
                      <td><h5>&nbsp;:&nbsp;</h5></td>
                      <td><h5><?php echo $donatur; ?> Kali</h5></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="col-12 news-diagram">
                <br/>
                <h3 style="    font-size: 24px;transform: translate(9.5%,5%);color: #00aeea;">Data Table User</h3>

                  <div class="grafik-list  bg-color3" style="height: auto;">
                    <div class="data-table-lisdonasi">
                      <table id="tabel-data-lisdonasi" class="table table-striped table-dark" width="100%" cellspacing="0">
                       <thead>
                          <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Penulis</th>
                              <th>Kategori</th>
                              <th>Target</th>
                              <th>Gambar</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Judul</th>
                              <th>Penulis</th>
                              <th>Kategori</th>
                              <th>Target</th>
                              <th>Gambar</th>
                              <th>Status</th>
                          </tr>
                      </tfoot>
                      <tbody>
                          
                          <?php

                          $query = mysqli_query($process->connection,"SELECT post_table.*,user_table.*,category_table.* FROM post_table INNER JOIN user_table ON post_table.user_id = user_table.user_id INNER JOIN category_table ON post_table.category_id = category_table.category_id WHERE post_status !=2 ORDER BY post_table.post_id DESC");

                            $a = 1;
                            while($row = mysqli_fetch_assoc($query)){
                              switch($row['post_status']){
                                case 1:
                                  $sts[0] = 'selected';
                                  $sts[1] = '';
                                break;
                              
                                case 3:
                                  $sts[0] = '';
                                  $sts[1] = 'selected';
                                break;

                            }

                              echo '
                                <tr>
                                    <td>'.$a.'</td>
                                    <td><a href="view-donate.php?postid='.$row['post_id'].'">'.$row['post_title'].'</a></td>
                                    <td><a href="profil.php?userid='.$row['user_id'].'">'.$row['user_name'].'</a></td>
                                    <td><a href="user.php?search='.$row['category_name'].'">'.$row['category_name'].'</a></td>
                                    <td>Rp '.number_format($row['post_target'],2,",",".").'</td>
                                    <td><img src="'.$process->base_url().'asset/image/post/'.$row['post_img'].'" width="100px" height="100px" /></td>
                                    <td><select id="poststatus" data-id="'.$row['post_id'].'">
                                      <option value="1" '.$sts[0].'>Aktif</option>
                                      <option value="3" '.$sts[1].'>Banned</option>
                                    </select></td>
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
      $("#menu-list-donasi").addClass('sb-active');
      $("#adminpagetitle").html("List Donasi");
    </script>

<?php include 'footer.php';?>
