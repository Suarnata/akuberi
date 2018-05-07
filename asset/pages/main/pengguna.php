<?php include 'panel-header.php';?>

<?php
  if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }

  $user_id = $userInfo['user_id'];
  $query = mysqli_query($process->connection,"SELECT * FROM user_table WHERE user_id != $user_id");
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

                  <div class="grafik bg-color3" style="height: auto;">
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
                            echo '
                              <tr>
                                  <td>'.$a.'</td>
                                  <td>'.$row['user_name'].'</td>
                                  <td>'.$row['user_email'].'</td>
                                  <td>'.$row['user_address'].'</td>
                                  <td>'.$row['user_phone'].'</td>
                                  <td><img src="'.$process->base_url().'asset/image/user/'.$row['user_image'].'" width="100px" height="100px" /></td>
                                  <td>'.$row['user_level'].'</td>
                                  <td>'.$row['user_status'].'</td>
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
    </script>

<?php include 'footer.php';?>
