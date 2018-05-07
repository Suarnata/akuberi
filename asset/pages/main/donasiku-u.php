<?php include 'header-side-u.php'; ?>

<div class="col-6 posting-u">

	<div class="col-12 donate-u-ku">	
		<div class="col-7plus">	
			<h2 style="font-size: 28px;    font-size: 28px;
    color: #696969;
    line-height: 40px;">Penggalangan Dana Terpopuler Milik Anda</h2>	
		</div>
	</div>

  <!-- Post Section -->
    <div id="postsection">
      <?php
        $process->donasiku_popular();
      ?>
     </div> 
     <!-- / post section -->

  <!-- Post Section -->
    <div id="postsection">
      <?php
        $process->donasiku_showpost('all');
      ?>
     </div> 
     <!-- / post section -->

  <div class="col-12 judul-d">
    <h1>Riwayat Donasi</h1>
  </div>

    <!-- Post Section -->
      <div id="postsection">
        <?php
          $process->donasiku_showpost('history');
        ?>
       </div> 
       <!-- / post section -->

</div>
 <script type="text/javascript">
      $("#mnu-donasi").addClass('active-u');
    </script>

<?php include 'chat-footer-u.php';?>
