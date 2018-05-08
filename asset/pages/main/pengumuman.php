<?php  
  include "panel-header.php";
?>
  
 <?php
  if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }
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

                  <div class="grafik-list  bg-color3" style="height: auto;">
                    <div class="data-table-pengumuman">
                      <table id="tabel-data-pengumuman" class="table table-striped table-bordered" width="100%" cellspacing="0">
                       <thead>
                          <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>Name</th>
                              <th>Position</th>
                              <th>Office</th>
                              <th>Age</th>
                              <th>Start date</th>
                              <th>Salary</th>
                          </tr>
                      </tfoot>
                      <tbody>
                          <tr>
                              <td>Tiger Nixon</td>
                              <td>System Architect</td>
                              <td>Edinburgh</td>
                              <td>61</td>
                              <td>2011/04/25</td>
                              <td>$320,800</td>
                          </tr>
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
