<?php include 'header.php'; ?>

<div class="col-12 u-wrapper">
  <div class="col-12 header-u bg-color3">
    <div class="col-11 content-header">
      <div class="col-1 logo-u">
        <img style="width:98.5%;    transform: translate(0%,90%);" src="<?php echo $process->base_url();?>/asset/image/website/logo.png" alt="">
      </div>
      <div class="col-4 logo-u ">
  
          <input id="searchinput" class="search2" type="text" name="search" value="" placeholder="Cari judul, nama penggalang dana">
  
      </div>
      <div class="col-6 logo-u2">
        <div class="col-7plus link">
          <ul>
            <li><a href="#">Donasi</a></li>
            <li><a href="#">Galang Dana</a></li>
          </ul>
          <div class="bell">
            <a href="#"><i class="far fa-bell"></i></a>
          </div>
        </div>
        <div class="col-3plus profil-u">
          <div class="col-6 name-profil">
            <h3 style="    font-size: 18px;transform: translate(-2%,40%);text-align: right;"><a href="#" style="text-decoration: none;color: #00aeea;"><?php echo substr($userInfo['user_name'],0,8); ?></a></h3>
            <h5 style="    font-size: 12px;text-align: right;transform: translate(-2%,5%);color: #00aeea;opacity: .5;">online</h5>
          </div>
          <div class="col-6 img-profil">
            <img style="width: 40%;height: 54%;border-radius: 50%;transform: translate(75%,45%);" src="<?php echo $process->base_url(); ?>asset/image/user/<?php echo $userInfo['user_image']; ?>" alt="">
          </div>
        </div>
        <div class="col-1pluss bar">
          <button class="burger1" type="button" name="button">
            <span></span>
          </button>
        </div>
      </div>
    </div>
  </div><!-- Header --><!-- THIS IS HEADER-->
  <div class="col-12 content-u">
    <div class="col-3 sidebar-u">
      <div class="col-9 sidebar-u-con">
        <div class="col-12 menu-u">
          <h3><i class=" fas fa-list"> </i>&nbsp; &nbsp; Menu</h3>
        </div>
        <div class="col-12 sidebar-u-link">
          <ul>
            <li id="mnu-beranda"> <a href="user.php"><i class="fas fa-columns"></i>&nbsp; &nbsp; Beranda</a> </li>
            <li id="mnu-donasil"> <a href="#"><i class="fas fa-ambulance"></i>&nbsp; &nbsp;Donasiku</a> </li>
            <li id="mnu-profil"> <a href="#"><i class="fas fa-user"></i> &nbsp; &nbsp; Profil</a> </li>
            <li id="mnu-pengaturan"> <a href="profil.php"><i class="fas fa-cog"></i> &nbsp; &nbsp; Pengaturan</a> </li>
          </ul>
        </div>
      </div>
    </div><!-- THIS IS SIDEBAR -->
    
