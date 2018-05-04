<?php include 'header.php';?>

<div class="wrapper">
      <div class="row content">
        <div class="col-2 col-s-12 sidebar-a bg-color1">
          <div class="col-12 col-s-3 logo-a">
            <img src="<?php echo $process->base_url(); ?>asset/image/website/logo-white.png" alt="">
          </div>
          <div class="col-12 col-s-12 sidebar-b">
            <ul>
              <li id="menu-admin"> <a href="admin.php"> <i class="fas fa-tachometer-alt"></i> &nbsp;&nbsp; Dashboard </a> </li>
              <li id="menu-pengguna"> <a href="pengguna.php"> <i class="fas fa-users"></i> &nbsp;&nbsp; Pengguna </a> </li>
              <li id="menu-list-donasi"> <a href="lis-donasi.php"> <i class="fas fa-ambulance"></i> &nbsp;&nbsp; List-donasi </a> </li>
              <li id="menu-pengumuman"> <a href="pengumuman.php"> <i class="fas fa-clipboard-list"></i> &nbsp;&nbsp;&nbsp;&nbsp; Pengumuman </a> </li>
              <li id="menu-pengaturan"> <a href="pengaturan.php"> <i class="fas fa-cogs"></i> &nbsp;&nbsp; Pengaturan </a> </li>
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
              <img style="    width: 60%;height: auto;border-radius: 50%;transform: translate(12px,8px);" src="<?php echo $process->base_url(); ?>asset/image/user/<?php echo $userInfo['user_image']; ?>" alt="">
            </div>
            </a>
            <div class="col-4 header-a-l exit">
              <div class="col-4 header-a-l">
              <a href="#"> <i style="    color: #00aeea;font-size: 28px;transform: translate(20px,15px);" class="far fa-bell"></i></a>
              </div>
              <div class="col-8 header-a-l">
                <h3 style="       font-size: 16px;text-align: right;color: #00aeea;transform: translate(-5%,15%);"><?php echo $userInfo['user_name']; ?></h3>
                <h5 style="  font-size: 12px;text-align: right;color: #00aeea;transform: translate(-5%,-15%);opacity: .6;  ">Admin</h5>
              </div>
            </div>
          </div>
        </div>  <!-- Header -->
        <div class="col-10 col-s-12 content-a-1 ">
          <div class="col-12 col-s-11 content-post-a">
            <div class="col-6 col-s-12 title">
              <h3 style="    font-size: 24px;transform: translate(13.5%,5%);color: #00aeea;">Dashboard</h3>
            </div>
            <div class="col-6 col-s-12 title title1">
              <h3 style="    padding: 0% 5%;margin-right: 1%;" class="bg-color1"> <a href="#">User</a> </h3>
              <h3 style="    padding: 0% 3%;" class="bg-color3"> <a style="color:#00aeea;" href="#">Donate</a> </h3>
              <h3 style="    padding: 0% 4%;transform: translate(225%,35%); cursor:pointer ;" class="bg-color2"> <a id="logout-btn" data-token="<?php echo $_COOKIE['ABID']; ?>">Sign - Out</a> </h3>
            </div>
          </div> <!-- Judul Title yang isi Tulisan Dashboard -->
