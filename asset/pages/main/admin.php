<?php
  require("../process/mainprocess.php");
  $process = new akuberi();
?>
<?php include 'header.php';?>
    <div class="wrapper">
      <div class="row content">
        <div class="col-2 col-s-12 sidebar-a bg-color1">
          <div class="col-12 col-s-3 logo-a">
            <img src="<?php echo $process->base_url(); ?>asset/image/website/logo-white.png" alt="">
          </div>
        </div>
        <div class="col-10 col-s-12 header-a">
          <div class="col-6 header-a-l ">
            <form class="" action="index.html" method="post">
              <input class="search" type="text" name="" value="" placeholder="Search">
            </form>
          </div>
          <div class="col-6 header-a-l  ">
            <a href="#">
            <div class="col-1plus header-a-l exit exit-a bg-color1">
               <i class="fas fa-sign-out-alt"></i>
            </div>
            </a>
            <div class="col-4 header-a-l exit">
              <div class="col-4 header-a-l">
                <img style="width: 65%;border-radius: 50%;transform: translate(25%,20%);" src="<?php echo $process->base_url(); ?>asset/image/website/kim.jpg" alt="">
              </div>
              <div class="col-8 header-a-l">
                <h3 style="    font-size: 18px;text-align: left;color: #00aeea;transform: translate(5%,2%);">Kim Jong Un</h3>
                <h5 style="    font-size: 16px;text-align: left;color: #00aeea;transform: translate(5%,-30%);opacity: .6;">Admin</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-10 col-s-12 content-a-1 ">
          <div class="col-12 col-s-11 content-post-a">
            <div class="col-6 col-s-12 title">
              <h3 style="    font-size: 24px;transform: translate(13.5%,5%);color: #00aeea;">Dashboard</h3>
            </div>
            <div class="col-6 col-s-12 title">

            </div>
          </div>
          <div class="col-12 col-s-12 content-post-a1">
            <div class="col-9 col-s-12 content-post-a2">
              <div class="col-12 news">
                <div class="col-3 col-s-11 news1 bg-news-1 bg-color3">
                  a
                </div>
                <div class="col-3 col-s-11 news1 bg-news-2 bg-color3">

                </div>
                <div class="col-3 col-s-11 news1 bg-news-3 bg-color3">

                </div>
              </div>
              <div class="col-12 news-diagram">

              </div>
              <div class="col-12 news-link ">

              </div>

            </div>

            <div class="col-3 content-post-a3 bg-color3">

            </div>
          </div>
        </div>
      </div>
    </div>

<?php include 'footer.php';?>
