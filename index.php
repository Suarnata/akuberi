<?php
	require("asset/pages/process/mainprocess.php");
	$process = new akuberi();
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

  </head> <!-- INI HEAD - nya .... -->
  <body>


	<div class="wrapper">
			<div class="header">
					<div class="row">
						<div class="col-6 col-s-6 logo">
							<img src="<?php echo $process->base_url(); ?>asset/image/website/logo.png" alt="">
						</div>
						<div class="col-6 col-s-6 bar">
							<button class="burger" type="button" name="button">
								<span></span>
							</button>
						</div>
						<div class="sidebar">
							<div class="col-6 col-s-9 sidebar-con">
								<h3 style="text-align:center;"><a href="#" >Home</a></h3>
								<h3 style="text-align:center;"><a href="#" >Tentang</a></h3>
								<h3 style="text-align:center;"><a href="#" >Services</a></h3>
								<h3 style="text-align:center;"><a href="#" >Testimonial</a></h3>
								<h3 style="text-align:center;"><a href="#" >Contact</a></h3>

							</div>
							<button class="button-size-4 bg-color3" type="button" name="button">Sign In</button>

						</div>
					</div>
			</div> <!-- Ini Headernya -->

			<div class="row banner">
				<div class="col-12 col-s-12 banner1">
						<h2 style="text-align:center; transform:translateY(200px); color: #fff;">Selamat Datang Sahabat</h2>
						<h5 style="width:60%; text-align:center; line-height:30px; margin:auto; transform:translateY(210px); color:#fff;">Mari Berbagi Kepada Saudara Saudara Kita yang Membutuhkan Pertolongan, Untuk Mencapai Suatu Hal Tertentu</h5>
						<div class="col-12 col-s-12 button">
								<div class="col-6 col-s-12 button1">
									<button class="button-size-1 bg-color1 right" type="button" name="button">Donasi</button>
								</div>
								<div class="col-6 col-s-12 button1">
									<button class="button-size-1 bg-color2" type="button" name="button">Galang Dana</button>
								</div>
						</div>
				</div>
			</div> <!-- Ini Bannernya -->
			<div class="row content1">
				<div class="col-12 col-s-12 vector-one">
						<div class="col-6 col-s-12 word1">
								<h1 style="font-size: 28px;color:#00aeea; transform: translate(120px,130px);">Mari Berbagi Dan Membantu</h5>
								<h6 style="font-size: 16px;line-height: 20px;opacity: .7;width: 70%;transform: translate(120px,135px);">Kita dapat membantu saudara saudari kita yang terkena sakit ringan maupun keras, agar sepat mendapat pertolongan dengan ahlinya.</h6>
								<h6 style="font-size:16px;transform: translate(120px,140px);"><a href="" style="text-decoration: none; color:#e90052;">Telusuri lebih lengkap</a></h6>
						</div>
						<div class="col-6 col-s-12 image1">
								<img style="margin:2% 0% 0% 12%; width:70%; height:auto;" src="<?php echo $process->base_url(); ?>asset/image/website/vector-6.png" alt="">
						</div>
				</div>
				<div class="col-12 col-s-12 vector-two">

						<div class="col-6 col-s-12 image1">
								<img style="margin:2% 0% 0% 15%; width:80%; height:auto;" src="asset/image/website/vector-4.jpg" alt="">
						</div>
						<div class="col-6 col-s-12 word1">
								<h1 style=" text-align: right;font-size: 28px;color:#00aeea;transform: translate(-135px,40px);">Berikan Donasi Kepada Sahabat</h5>
								<h6 style=" text-align: right;font-size:16px; line-height:20px; opacity:.7; width: 70%;transform: translate(67px,45px);">Anda dapat membantu sahabat sahabat kita yang memerlukan uluran tangan kita, dengan memberikan suplai barang barang tertentu ke korban bencana alam dan yang lainnya</h6>
								<h6 style=" text-align: right;font-size:16px;    transform: translate(-135px,50px);"><a href="" style="text-decoration: none; color:#e90052;">Telusuri lebih lengkap</a></h6>
						</div>
				</div>
			</div> <!-- ini konten yang isi pengenalan -->
			<div class="row content3">
				<h2 style="font-size: 36px;width:55%; text-align:center;line-height: 40px;margin: auto; color:#00aeea; "> Anda Bisa Membantu Sesama Dalam Bentuk Apa Saja dan Kemana Saja</h2>
			</div> <!-- ini Judul Kategori -->
			<div class="row content2">
					<div class="col-12 col-s-12 icon1 bg-color1">
						<div class="col-3 col-s-12 icon2 bg-img1">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon1.png" alt="">
								<h3>Inovasi</h3>
							</div>
						</div>
						<div class="col-3 col-s-12 icon2 bg-img2">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon2.png" alt="">
								<h3>Kesehatan</h3>
							</div>
						</div>
						<div class="col-3 col-s-12 icon2 bg-img3">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon3.png" alt="">
								<h3>Anak - Anak</h3>
							</div>
						</div>
						<div class="col-3 col-s-12 icon2 bg-img4">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon4.png" alt="">
								<h3>Pendidikan</h3>
							</div>
						</div>
					</div>
					<div class="col-12 col-s-12 icon1 bg-color2">
						<div class="col-3 col-s-12 icon2 bg-img5">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon5.png" alt="">
								<h3>Bencana</h3>
							</div>
						</div>
						<div class="col-3 col-s-12 icon2 bg-img6">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon11.png" alt="">
								<h3>Rumah Ibadah</h3>
							</div>
						</div>
						<div class="col-3 col-s-12 icon2 bg-img7">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon10.png" alt="">
								<h3>Difabel</h3>
							</div>
						</div>
						<div class="col-3 col-s-12 icon2 bg-img8">
							<div class="col-12 col-s-12 icon3">
								<img src="<?php echo $process->base_url(); ?>asset/image/website/icon8.png" alt="">
								<h3>Riset</h3>
							</div>
						</div>
					</div>
			</div><!-- Ini yang isi Kategori -->
			<div class="row content4">
				<h3 style="   text-align: center; color: #00aeea;width: 40%;line-height: 50px;margin: auto;transform: translateY(80px);">Beberapa Penggalangan Dana Terpopuler</h3>
				<div class="col-3plus col-s-11 post1">
					<div class="col-12 img-post bg-color1">
						 <img src="<?php echo $process->base_url(); ?>asset/image/website/penggalang-2.png" alt="">
					</div>
					<div class="col-12 desc">
						<div class="col-12 desc-post">
							<h5 style="font-size: 18px;transform: translate(20px,10px);">Giovani da Cunha <span class="time">| &nbsp;2 hari lalu</span></h5>
							<h3 style="line-height: 35px;font-size: 30px;color: #00aeea;transform: translate(20px,15px);">Ayo Bersama Kita Bisa Membuat Pesawat</h3>
							<h6 style="opacity: .8;font-size: 17px;line-height: 20px;width: 90%;transform: translate(20px,25px);">Mari berdonasi untuk pembuatan Pesawat Terbang asli Indonesia, agar dapat menjadi alat pemersatu bangsa</h6>
						</div>
						<div class="col-12 dana-post ">
							<div class="col-6 dana ">
								<h5 style="font-size: 18px;color: #00aeea;transform: translateX(20px);">sisa hari</h5>
								<h3 style="font-size: 24px;color: #e90052;transform: translate(20px,-10px);">6 hri</h3>
							</div>
							<div class="col-6 dana">
								<h5 style="font-size: 18px;color: #00aeea;text-align: right;transform: translateX(-20px);">Dana Terkumpul</h5>
								<h3 style="font-size: 24px;color: #e90052;text-align: right;transform: translate(-20px,-10px);">Rp 1.5M</h3>
							</div>
						</div>
					</div>
					<div class="col-12 button-post">
						<button class="button-size-2 bg-color1" type="button" name="button">Donasi</button>
					</div>
				</div>
				<div class="col-3plus col-s-11 post1">
					<div class="col-12 img-post bg-color1">
						 <img src="<?php echo $process->base_url(); ?>asset/image/website/penggalang-2.png" alt="">
					</div>
					<div class="col-12 desc">
						<div class="col-12 desc-post">
							<h5 style="font-size: 18px;transform: translate(20px,10px);">Giovani da Cunha <span class="time">| &nbsp;2 hari lalu</span></h5>
							<h3 style="line-height: 35px;font-size: 30px;color: #00aeea;transform: translate(20px,15px);">Ayo Bersama Kita Bisa Membuat Pesawat</h3>
							<h6 style="opacity: .8;font-size: 17px;line-height: 20px;width: 90%;transform: translate(20px,25px);">Mari berdonasi untuk pembuatan Pesawat Terbang asli Indonesia, agar dapat menjadi alat pemersatu bangsa</h6>
						</div>
						<div class="col-12 dana-post ">
							<div class="col-6 dana ">
								<h5 style="font-size: 18px;color: #00aeea;transform: translateX(20px);">sisa hari</h5>
								<h3 style="font-size: 24px;color: #e90052;transform: translate(20px,-10px);">6 hri</h3>
							</div>
							<div class="col-6 dana">
								<h5 style="font-size: 18px;color: #00aeea;text-align: right;transform: translateX(-20px);">Dana Terkumpul</h5>
								<h3 style="font-size: 24px;color: #e90052;text-align: right;transform: translate(-20px,-10px);">Rp 1.5M</h3>
							</div>
						</div>
					</div>
					<div class="col-12 button-post">
						<button class="button-size-2 bg-color1" type="button" name="button">Donasi</button>
					</div>
				</div>
				<div class="col-3plus col-s-11 post1">
					<div class="col-12 img-post bg-color1">
						 <img src="<?php echo $process->base_url(); ?>asset/image/website/penggalang-2.png" alt="">
					</div>
					<div class="col-12 desc">
						<div class="col-12 desc-post">
							<h5 style="font-size: 18px;transform: translate(20px,10px);">Giovani da Cunha <span class="time">| &nbsp;2 hari lalu</span></h5>
							<h3 style="line-height: 35px;font-size: 30px;color: #00aeea;transform: translate(20px,15px);">Ayo Bersama Kita Bisa Membuat Pesawat</h3>
							<h6 style="opacity: .8;font-size: 17px;line-height: 20px;width: 90%;transform: translate(20px,25px);">Mari berdonasi untuk pembuatan Pesawat Terbang asli Indonesia, agar dapat menjadi alat pemersatu bangsa</h6>
						</div>
						<div class="col-12 dana-post ">
							<div class="col-6 dana ">
								<h5 style="font-size: 18px;color: #00aeea;transform: translateX(20px);">sisa hari</h5>
								<h3 style="font-size: 24px;color: #e90052;transform: translate(20px,-10px);">6 hri</h3>
							</div>
							<div class="col-6 dana">
								<h5 style="font-size: 18px;color: #00aeea;text-align: right;transform: translateX(-20px);">Dana Terkumpul</h5>
								<h3 style="font-size: 24px;color: #e90052;text-align: right;transform: translate(-20px,-10px);">Rp 1.5M</h3>
							</div>
						</div>
					</div>
					<div class="col-12 button-post">
						<button class="button-size-2 bg-color1" type="button" name="button">Donasi</button>
					</div>
				</div>
				<div class="col-3plus col-s-11 post1 baris2">
					<div class="col-12 img-post bg-color1">
						 <img src="<?php echo $process->base_url(); ?>asset/image/website/penggalang-2.png" alt="">
					</div>
					<div class="col-12 desc">
						<div class="col-12 desc-post">
							<h5 style="font-size: 18px;transform: translate(20px,10px);">Giovani da Cunha <span class="time">| &nbsp;2 hari lalu</span></h5>
							<h3 style="line-height: 35px;font-size: 30px;color: #00aeea;transform: translate(20px,15px);">Ayo Bersama Kita Bisa Membuat Pesawat</h3>
							<h6 style="opacity: .8;font-size: 17px;line-height: 20px;width: 90%;transform: translate(20px,25px);">Mari berdonasi untuk pembuatan Pesawat Terbang asli Indonesia, agar dapat menjadi alat pemersatu bangsa</h6>
						</div>
						<div class="col-12 dana-post ">
							<div class="col-6 dana ">
								<h5 style="font-size: 18px;color: #00aeea;transform: translateX(20px);">sisa hari</h5>
								<h3 style="font-size: 24px;color: #e90052;transform: translate(20px,-10px);">6 hri</h3>
							</div>
							<div class="col-6 dana">
								<h5 style="font-size: 18px;color: #00aeea;text-align: right;transform: translateX(-20px);">Dana Terkumpul</h5>
								<h3 style="font-size: 24px;color: #e90052;text-align: right;transform: translate(-20px,-10px);">Rp 1.5M</h3>
							</div>
						</div>
					</div>
					<div class="col-12 button-post">
						<button class="button-size-2 bg-color1" type="button" name="button">Donasi</button>
					</div>
				</div>
				<div class="col-3plus col-s-11 post1 baris2">
					<div class="col-12 img-post bg-color1">
						 <img src="<?php echo $process->base_url(); ?>asset/image/website/penggalang-2.png" alt="">
					</div>
					<div class="col-12 desc">
						<div class="col-12 desc-post">
							<h5 style="font-size: 18px;transform: translate(20px,10px);">Giovani da Cunha <span class="time">| &nbsp;2 hari lalu</span></h5>
							<h3 style="line-height: 35px;font-size: 30px;color: #00aeea;transform: translate(20px,15px);">Ayo Bersama Kita Bisa Membuat Pesawat</h3>
							<h6 style="opacity: .8;font-size: 17px;line-height: 20px;width: 90%;transform: translate(20px,25px);">Mari berdonasi untuk pembuatan Pesawat Terbang asli Indonesia, agar dapat menjadi alat pemersatu bangsa</h6>
						</div>
						<div class="col-12 dana-post ">
							<div class="col-6 dana ">
								<h5 style="font-size: 18px;color: #00aeea;transform: translateX(20px);">sisa hari</h5>
								<h3 style="font-size: 24px;color: #e90052;transform: translate(20px,-10px);">6 hri</h3>
							</div>
							<div class="col-6 dana">
								<h5 style="font-size: 18px;color: #00aeea;text-align: right;transform: translateX(-20px);">Dana Terkumpul</h5>
								<h3 style="font-size: 24px;color: #e90052;text-align: right;transform: translate(-20px,-10px);">Rp 1.5M</h3>
							</div>
						</div>
					</div>
					<div class="col-12 button-post">
						<button class="button-size-2 bg-color1" type="button" name="button">Donasi</button>
					</div>
				</div>
				<div class="col-3plus col-s-11 post1 baris2">
					<div class="col-12 img-post bg-color1">
						 <img src="<?php echo $process->base_url(); ?>asset/image/website/penggalang-2.png" alt="">
					</div>
					<div class="col-12 desc">
						<div class="col-12 desc-post">
							<h5 style="font-size: 18px;transform: translate(20px,10px);">Giovani da Cunha <span class="time">| &nbsp;2 hari lalu</span></h5>
							<h3 style="line-height: 35px;font-size: 30px;color: #00aeea;transform: translate(20px,15px);">Ayo Bersama Kita Bisa Membuat Pesawat</h3>
							<h6 style="opacity: .8;font-size: 17px;line-height: 20px;width: 90%;transform: translate(20px,25px);">Mari berdonasi untuk pembuatan Pesawat Terbang asli Indonesia, agar dapat menjadi alat pemersatu bangsa</h6>
						</div>
						<div class="col-12 dana-post ">
							<div class="col-6 dana ">
								<h5 style="font-size: 18px;color: #00aeea;transform: translateX(20px);">sisa hari</h5>
								<h3 style="font-size: 24px;color: #e90052;transform: translate(20px,-10px);">6 hri</h3>
							</div>
							<div class="col-6 dana">
								<h5 style="font-size: 18px;color: #00aeea;text-align: right;transform: translateX(-20px);">Dana Terkumpul</h5>
								<h3 style="font-size: 24px;color: #e90052;text-align: right;transform: translate(-20px,-10px);">Rp 1.5M</h3>
							</div>
						</div>
					</div>
					<div class="col-12 button-post">
						<button class="button-size-2 bg-color1" type="button" name="button">Donasi</button>
					</div>
				</div>
				<h3 style="   text-align: center; color: #00aeea;width: 60%;line-height: 30px;margin: auto;transform: translateY(240px); font-size:20px;">Andapun Dapat Melihat Lebih Lengkap Tentang Penggalangan Dana yang Telah Terdanai Maupun Belum Terdanai</h3>
				<button class="button-size-5 bg-color1" type="button" name="button">Lihat Lebih Lengkap</button>

			</div> <!-- Penggalangan Dana Terpopuler -->
			<div class="row content2">
				<h3 style="transform: translateY(35px);text-align: center;color: #00aeea;">Testimonial</h3>
				<div class="col-9 col-s-11 testimonial">
					<div class="col-12 testimo-1">
						<div class="col-12 carousel-cell">
							<div class=" col-9 testimo-2">
								<h6 style="text-align: center;line-height: 25px;opacity: .7;transform: translateY(50px);">"Kita memang membutuhkan Media seperti ini karena, dengan adanya Media ini kita dapat membantu Saudara - Saudari Kita yang membutuhkan"</h6>
								<img style="width: 8%;border-radius: 50%;border:;transform: translate(350px,75px);" src="<?php echo $process->base_url(); ?>asset/image/website/kim.jpg" alt="">
								<h3 style="text-align: center;transform: translateY(85px);font-size: 20px;color: #e90052;">Kim Jong Un</h3>
							</div>
						</div>
						<div class="col-12 carousel-cell">
							<div class=" col-9 testimo-2 ">
								<h6 style="text-align: center;line-height: 25px;opacity: .7;transform: translateY(50px);">"Kita memang membutuhkan Media seperti ini karena, dengan adanya Media ini kita dapat membantu Saudara - Saudari Kita yang membutuhkan"</h6>
								<img style="width: 8%;border-radius: 50%;border:;transform: translate(350px,75px);" src="<?php echo $process->base_url(); ?>asset/image/website/kim.jpg" alt="">
								<h3 style="text-align: center;transform: translateY(85px);font-size: 20px;color: #e90052;">Kim Jong Un</h3>
							</div>
						</div>
						<div class="col-12 carousel-cell">
							<div class=" col-9 testimo-2">
								<h6 style="text-align: center;line-height: 25px;opacity: .7;transform: translateY(50px);">"Kita memang membutuhkan Media seperti ini karena, dengan adanya Media ini kita dapat membantu Saudara - Saudari Kita yang membutuhkan"</h6>
								<img style="width: 8%;border-radius: 50%;border:;transform: translate(350px,75px);" src="<?php echo $process->base_url(); ?>asset/image/website/kim.jpg" alt="">
								<h3 style="text-align: center;transform: translateY(85px);font-size: 20px;color: #e90052;">Kim Jong Un</h3>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- ini Testimonial -->

			<div class="row footer">
				<div class="col-12 col-s-12 subs bg-color1">
					<h3 style="text-align: center;font-size: 30px;width: 60%;color: #ffffff;margin: auto;transform: translateY(100px);">Ayo, Mulai Bergabung Bersama Kami, dan Mulai untuk Menggalang Dana atau Mendonasi</h3>
					<button class="button-size-3 bg-color3" type="button" name="button">Mulai Galang Dana</button>
				</div>
				<div class="col-12 col-s-12 foot1">
					<div class="col-4 col-s-12 foot3">
						<div class="col-9 foot4">
							<div class="col-3 img-foot">
								<img style="width: 60%;transform: translate(20px,4px);" src="<?php echo $process->base_url(); ?>asset/image/website/foot-22.png" alt="">
							</div>
							<div class="col-9 desc-foot">
								<h5 style="    font-size: 20px;color: #00aeea;">Jln. Tukad Citarum</h5>
								<h6 style="font-size: 14px;line-height: 10px;opacity: .8;">Anda dapat mengunjungi kami</h6>
							</div>
						</div>
					</div>
					<div class="col-4 col-s-12 foot3">
						<div class="col-9 foot4">
							<div class="col-3 img-foot">
								<img style="width: 60%;transform: translate(20px,4px);" src="<?php echo $process->base_url(); ?>asset/image/website/foot-33.png" alt="">
							</div>
							<div class="col-9 desc-foot">
								<h5 style="    font-size: 20px;color: #00aeea;">(0361) 14045 14022</h5>
								<h6 style="font-size: 14px;line-height: 10px;opacity: .8;">Anda dapat Menghubungi Kami via HP</h6>
							</div>
						</div>
					</div>
					<div class="col-4 col-s-12 foot3">
						<div class="col-9 foot4">
							<div class="col-3 img-foot">
								<img style="width: 60%;transform: translate(20px,4px);" src="<?php echo $process->base_url(); ?>asset/image/website/foot-11.png" alt="">
							</div>
							<div class="col-9 desc-foot">
								<h5 style="    font-size: 20px;color: #00aeea;">Hubungi Lewat Gmail</h5>
								<h6 style="font-size: 14px;line-height: 10px;opacity: .8;">Anda dapat bertanya dan lainnya</h6>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-s-12 foot2 bg-color1">
					<h5 style="text-align:center; font-size:16px; color:#fff; opacity:.8; line-height:40px;">copyright &copy; 2018</h5>
					<h3 style="text-align:center; font-size:18px; color:#fff; line-height:10px;">akuberi.com</h3>
				</div>
			</div> <!-- Ini Footernya
		</div>
	</div>
</body>
</html>
