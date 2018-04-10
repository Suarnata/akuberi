<?php include 'header.php'; ?>

<?php
  /*if($userInfo['user_level']!=2){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }*/
?>

<div class="col-12 u-wrapper">
  <div class="col-12 header-u bg-color3">
    <div class="col-11 content-header">
      <div class="col-1 logo-u">
        <img style="width:98.5%;    transform: translate(0%,90%);" src="<?php echo $process->base_url();?>/asset/image/website/logo.png" alt="">
      </div>
      <div class="col-4 logo-u ">
        <input class="search2" type="text" name="search" value="" placeholder="Cari judul, nama penggalang dana">
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
            <h3 style="    font-size: 18px;transform: translate(-2%,40%);text-align: right;"><a href="#" style="text-decoration: none;color: #00aeea;">Giovani D</a></h3>
            <h5 style="    font-size: 12px;text-align: right;transform: translate(-2%,5%);color: #00aeea;opacity: .5;">online</h5>
          </div>
          <div class="col-6 img-profil">
            <img style="width: 40%;height: auto;border-radius: 50%;transform: translate(75%,45%);" src="<?php echo $process->base_url(); ?>asset/image/website/kim.jpg" alt="">
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
    <div class="col-3 sidebar-u bg-color1">
      <div class="col-9 sidebar-u-con">

      </div>
    </div><!-- THIS IS SIDEBAR -->
    <div class="col-6 posting-u bg-color2">
      <div class="col-12 post-u-con">
        <div class="col-3 push bg-color1">
          
        </div>

        <div class="col-9 push bg-color2">

        </div>
      </div>

      <div class="col-12 post-u">
        <div class="col-12 box-post-u">

        </div>
      </div>

    </div>
    <div class="col-3 chat-u bg-color1">
      <div class="col-9 chat-u-con">

      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
