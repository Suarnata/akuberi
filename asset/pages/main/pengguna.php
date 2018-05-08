<?php include 'panel-header.php';?>

<?php
  if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }

  $user_id = $userInfo['user_id'];

  $query = mysqli_query($process->connection,"SELECT SUM(total) AS total FROM history_table");
  $total = mysqli_fetch_assoc($query);

  $query = mysqli_query($process->connection,"SELECT * FROM post_table");
  $kampanye = mysqli_num_rows($query);

  $query = mysqli_query($process->connection,"SELECT * FROM history_table");
  $donatur = mysqli_num_rows($query);

  $query = mysqli_query($process->connection,"SELECT * FROM user_table WHERE user_id != $user_id AND user_id > 0");
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

                  <div class="grafik-list bg-color3" style="height: auto;">
                    <div class="data-table-pengguna">
                      <table id="tabel-data-pengguna" class="table table-striped table-dark" width="1000px" cellspacing="0">
                       <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Alamat</th>
                              <th>No Telp</th>
                              <th>Gambar</th>
                              <th>Level</th>
                              <th>Status</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Nama</th>
                              <th>Email</th>
                              <th>Alamat</th>
                              <th>No Telp</th>
                              <th>Gambar</th>
                              <th>Level</th>
                              <th>Status</th>
                          </tr>
                      </tfoot>
                      <tbody>

                        <?php
                          $a = 1;
                          while($row = mysqli_fetch_assoc($query)){
                            if($row['user_level']==1){
                              $slc[0] = 'selected';
                              $slc[1] = '';
                            }else{
                              $slc[0] = '';
                              $slc[1] = 'selected';
                            }

                            if($row['user_status']==1){
                              $bnd[0] = 'selected';
                              $bnd[1] = '';
                            }else{
                              $bnd[0] = '';
                              $bnd[1] = 'selected';
                            }

                            echo '
                              <tr>
                                  <td>'.$a.'</td>
                                  <td><a href="profil.php?userid='.$row['user_id'].'">'.$row['user_name'].'</a></td>
                                  <td>'.$row['user_email'].'</td>
                                  <td>'.$row['user_address'].'</td>
                                  <td>'.$row['user_phone'].'</td>
                                  <td><img src="'.$process->base_url().'asset/image/user/'.$row['user_image'].'" width="100px" height="100px" /></td>
                                  <td><select id="userlevel" data-id="'.$row['user_id'].'">
                                    <option value="1" '.$slc[0].'>Admin</option>
                                    <option value="2" '.$slc[1].'>User</option>
                                  </select></td>
                                  <td><select id="userlevel" data-id="'.$row['user_id'].'">
                                    <option value="1" '.$bnd[0].'>Active</option>
                                    <option value="2" '.$bnd[1].'>Banned</option>
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
      $("#menu-pengguna").addClass('sb-active');
      $("#adminpagetitle").html("List Pengguna");
    </script>

<?php include 'footer.php';?>
