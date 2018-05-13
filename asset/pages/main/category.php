<?php include 'panel-header.php';?>

	
	<div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
           
              <div class="col-12 news-diagram">
                <br/>
                <h3 style="    font-size: 24px;transform: translate(9.5%,5%);color: #00aeea;">Data Table User</h3>

                  <div class="grafik-list  bg-color3" style="height: auto;">
                    <div class="data-table-lisdonasi">
                      <table id="tabel-data-lisdonasi" class="table table-striped table-dark" width="100%" cellspacing="0">
                       <thead>
                          <tr>
                              <th>No</th>
                              <th>Kategori</th>
                              <th>Banyak Digunakan</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>No</th>
                              <th>Kategori</th>
                              <th>Banyak Digunakan</th>
                          </tr>
                      </tfoot>
                      <tbody>
                          
                          <?php

                          $query = mysqli_query($process->connection,"SELECT post_table.*,user_table.*,category_table.* FROM post_table INNER JOIN user_table ON post_table.user_id = user_table.user_id INNER JOIN category_table ON post_table.category_id = category_table.category_id");

                            $a = 1;
                            while($row = mysqli_fetch_assoc($query)){

                              echo '
                                <tr>
                                    <td style="text-align:center;">'.$a.'</td>
                                   <td style="text-align:center;"><a href="user.php?search='.$row['category_name'].'">'.$row['category_name'].'</a></td>
                                   	<td style="text-align:center;">1000</td>
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


    <script type="text/javascript">
      $("#menu-kategori").addClass('sb-active');
      $("#adminpagetitle").html("Category");
    </script>

<?php include 'footer.php';?>