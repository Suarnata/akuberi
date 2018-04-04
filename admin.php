<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>akuberi | admin</title>
    <link rel="stylesheet" type="text/css" href="asset/css/main.css">
    <link rel="stylesheet" type="text/css" href="asset/css/responsive1.css" media="screen and (max-width:780px)">
    <link rel="stylesheet" type="text/css" href="asset/css/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="asset/css/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.min.css">
    <script src="asset/javascript/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
      zero = 0;
      $(document).ready(function(){
        $(window).on('scroll', function(){
          $('.header-a').toggleClass('hider-hide', $(window).scrollTop() > zero);
          zero = $(window).scrollTop();
        })
      })
    </script>
  </head>
  <body>
    <div class="wrapper">
      <div class="row content">
        <div class="col-2 col-s-12 sidebar-a bg-color1">
          <div class="col-12 col-s-3 logo-a">
            <img src="asset/image/website/logo-white.png" alt="">
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
                <img style="width: 65%;border-radius: 50%;transform: translate(25%,20%);" src="asset/image/website/kim.jpg" alt="">
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
                <div class="col-3 col-s-11 news1 bg-color3">

                </div>
                <div class="col-3 col-s-11 news1 bg-color3">

                </div>
                <div class="col-3 col-s-11 news1 bg-color3">

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
  </body>
</html>
