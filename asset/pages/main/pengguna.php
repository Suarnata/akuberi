<?php include 'header.php';?>

<?php
  /*if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }*/
?>

    <div class="wrapper">
      <div class="row content">
        <div class="col-2 col-s-12 sidebar-a bg-color1">
          <div class="col-12 col-s-3 logo-a">
            <img src="<?php echo $process->base_url(); ?>asset/image/website/logo-white.png" alt="">
          </div>
          <div class="col-12 col-s-12 sidebar-b">
            <ul>
              <li> <a href="admin.php"> <i class="fas fa-tachometer-alt"></i> &nbsp;&nbsp; Dashboard </a> </li>
              <li class="sb-active"> <a href="pengguna.php"> <i class="fas fa-users"></i> &nbsp;&nbsp; Pengguna </a> </li>
              <li> <a href="lis-donasi.php"> <i class="fas fa-ambulance"></i> &nbsp;&nbsp; List-donasi </a> </li>
              <li> <a href="pengumumam.php"> <i class="fas fa-clipboard-list"></i> &nbsp;&nbsp;&nbsp;&nbsp; Pengumuman </a> </li>
              <li> <a href="#"> <i class="fas fa-cogs"></i> &nbsp;&nbsp; Pengaturan </a> </li>
            </ul>
          </div>
        </div>  <!-- Sidebar -->
        <div class="col-10 col-s-12 header-a">
          <div class="col-6 header-a-l ">
            <form class="" action="index.html" method="post">
              <input class="search" type="text" name="" value="" placeholder="Search">
            </form>
          </div>
          <div class="col-6 header-a-l  ">
            <a href="#">
            <div class="col-1plus header-a-l exit exit-a">
              <img style="    width: 60%;height: auto;border-radius: 50%;transform: translate(12px,8px);" src="<?php echo $process->base_url(); ?>asset/image/website/kim.jpg" alt="">
            </div>
            </a>
            <div class="col-4 header-a-l exit">
              <div class="col-4 header-a-l">
              <a href="#"> <i style="    color: #00aeea;font-size: 28px;transform: translate(20px,15px);" class="far fa-bell"></i></a>
              </div>
              <div class="col-8 header-a-l">
                <h3 style="       font-size: 16px;text-align: right;color: #00aeea;transform: translate(-5%,15%);">Kim Jong Un</h3>
                <h5 style="  font-size: 12px;text-align: right;color: #00aeea;transform: translate(-5%,-15%);opacity: .6;  ">Admin</h5>
              </div>
            </div>
          </div>
        </div>  <!-- Header -->
        <div class="col-10 col-s-12 content-a-1 ">
          <div class="col-12 col-s-11 content-post-a">
            <div class="col-6 col-s-12 title">
              <h3 style="    font-size: 24px;transform: translate(13.5%,5%);color: #00aeea;">Pengguna</h3>
            </div>
            <div class="col-6 col-s-12 title title1">
              <h3 style="    padding: 0% 5%;margin-right: 1%;" class="bg-color1"> <a href="#">User</a> </h3>
              <h3 style="    padding: 0% 3%;" class="bg-color3"> <a style="color:#00aeea;" href="#">Donate</a> </h3>
              <h3 style="    padding: 0% 4%;transform: translate(225%,35%);" class="bg-color2"> <a href="#">Sign - Out</a> </h3>
            </div>
          </div> <!-- Judul Title yang isi Tulisan Dashboard -->
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
                      <table id="tabel-data-pengguna" class="table table-striped table-dark" width="100%" cellspacing="0">
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

<?php include 'footer.php';?>
