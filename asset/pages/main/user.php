<?php include 'header.php'; ?>

<?php
  if($userInfo['user_level']!=2){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }
?>

<div class="col-12 u-wrapper">

</div>

<?php include 'footer.php'; ?>
