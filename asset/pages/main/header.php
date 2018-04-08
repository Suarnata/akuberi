<?php
  require("../process/mainprocess.php");
  $process = new akuberi();
  
  if($process->session_check()['login']==true){
    $userInfo = $process->session_check();
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>akuberi | Mari Ber Donasi</title>

    <link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/responsive1.css" media="screen and (max-width:780px)">
    <link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/fontawesome-free-5.0.8/web-fonts-with-css/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/flickity.css">
  	<link rel="stylesheet" type="text/css" href="<?php echo $process->base_url(); ?>asset/css/flickity.min.css">
    <script src="<?php echo $process->base_url(); ?>asset/javascript/jquery-2.1.3.min.js"></script>
    <script src="<?php echo $process->base_url(); ?>asset/javascript/myscript.js"></script>
    <script src="<?php echo $process->base_url(); ?>asset/javascript/flickity.pkgd.js"></script>
    <script src="<?php echo $process->base_url(); ?>asset/javascript/flickity.pkgd.min.js"></script>
    <script type="text/javascript">
      zero = 0;
      $(document).ready(function(){
        $(window).on('scroll', function(){
          $('.header-a').toggleClass('hider-hide', $(window).scrollTop() > zero);
          zero = $(window).scrollTop();
        })
      })
    </script>
    <script type="text/javascript">
      (function(){
        $(document).ready(function(){
          $(".testimo-1").flickity({
            wrapAround : true,
            autoPlay : 3500

          });
        });
      })(jQuery)
    </script>

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">

  </head>
  <body>
