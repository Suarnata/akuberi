<?php include 'header-side-u.php'; ?>
   
    <style type="text/css">
      
      .notiferr{
        color:#c0392b;
      }

      .notifsuc{
        color:#27ae60;
      }

    </style>

    <div class="col-6 posting-u ">
     
      <div class="container">

            <div class="card-panel">
              <h5><b>PROFIL</b></h5>
              <hr size="0.01">
              <form method="post" id="editprofileform" class="form">
                <div class="rows">
                  <div class="col s12 m8 offset-m2 l6 offset-l3 center">
                    <div class="input-field col s13">
                      <div class="posts">
                        <div class="col-3 pushs">
                          <div class="col-12 image-push" id="img-container">
                            <img src="<?php echo $process->base_url() ?>asset/image/user/<?php echo $userInfo['user_image']; ?>" width="200px" height="145px"/><br/>
                            <button class="picture-s2" type="button">Ubah</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input-field col s12">
                      <input type="file" id="inputfile" name="image" hidden/>
                      <input id="nama" name="nama" type="text" value="<?php echo $userInfo['user_name']; ?>" class="validate" placeholder="Nama..." required="">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="email" name="email" value="<?php echo $userInfo['user_email']; ?>" type="email" class="validate" placeholder="Email...">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="no_telepon" name="telp" type="text" class="validate" placeholder="No Telepon..." value="<?php echo $userInfo['user_phone']; ?>">
                    </div>
                    <div class="input-field col s12 m6">
                      <textarea style="width: 340px; height: 100px; border:2px solid #95a5a6; font-size: 16px;" name="alamat"><?php echo $userInfo['user_address']; ?></textarea>
                    </div>
                    <div class="col s12 left-align info-text" style="font-size: 16px;" id="notif"></div>
                  </div>
                </div>
                <hr size="0.01">
                <div class="divider"></div><br>
                <div class="right-align">
                  <button type="submit" class="waves-effect waves-light btn-flat amber darken-3 white-text" id="btn-update" onclick="update_profil()">update</button>
                </div>
              </form>

            </div>

            <div class="card-panel">
              <h5><b>GANTI PASSWORD</b></h5>
               <hr size="0.01">
              <form method="post" id="updatepassform">
                <div class="rows">
                  <div class="col s12 m8 offset-m2 l6 offset-l3 center">
                    <div class="input-field col s12">
                      <input id="old_password" name="pass-lm" type="password" class="validate" placeholder="Password Lama..." required="">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="password" name="pass-br" type="password" class="validate" placeholder="Password Baru..." required="">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="conf_pass" name="pass-ul" type="password" class="validate" placeholder="Confirm Password..." required="">
                    </div>

                    <div class="col s12 left-align info-text" style="font-size: 16px;" id="notifpw"></div>
                  
                  </div>
                </div>
                 <hr size="0.01"><br>
                <div class="right-align">
                  <button type="submit" class="waves-effect waves-light btn-flat amber darken-3 white-text" id="btn-update">update</button>
                </div>
              </form>
              

            </div>
          </div>

    </div><!-- Content Postingan Tengah -->
    <script type="text/javascript">
      $("#mnu-pengaturan").addClass('active-u');

      $(document).on('click','.picture-s2',function(){
        $('#inputfile').click();
      });

      function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $("#img-container").html(`
                <img src="${e.target.result}" width="200px" height="145px"/><br/>
                <button class="picture-s2" type="button">Ubah</button>
              `);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $('#inputfile').change(function(){
        readURL(this);
      });

    </script>
<?php include 'chat-footer-u.php';?>
