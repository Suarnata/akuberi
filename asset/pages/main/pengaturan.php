<?php
  include 'panel-header.php';
?>
<?php
  /*if($userInfo['user_level']!=1){
    header("Location:".$process->base_url().'asset/pages/main/login.php');
  }*/
?>
          <div class="container" style="width: 60%;float:  left;margin-left: 10%;margin-right: 5%;"> 

            <div class="card-panel">
              <h5><b>PROFIL</b></h5>
              <hr size="0.01">
              <form method="post" id="form-profil" class="form">
                <div class="rows">
                  <div class="col s12 m8 offset-m2 l6 offset-l3 center">
                    <div class="input-field col s13">
                      <div class="posts">
                        <div class="col-3 pushs">
                          <div class="col-12 image-push">
                            <button class="picture-s" type="submit" name="button"></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="input-field col s12">
                      <input id="nama" name="nama" type="text" class="validate" placeholder="Nama..." required="" value="">
                    </div>
                      <div class="input-field col s12 m6">
                      <input id="email" name="email" type="email" class="validate" placeholder="Email..." value="">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="no_telepon" name="no_telepon" type="text" class="validate" placeholder="No Telepon..." value="">
                    </div>
                    <div class="col s12 left-align info-text" id="email-telp-info">E-mail dan nomer hp opsional</div>
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
              <form method="post" id="form-password">
                <div class="rows">
                  <div class="col s12 m8 offset-m2 l6 offset-l3 center">
                    <div class="input-field col s12">
                      <input id="old_password" name="old_password" type="password" class="validate" placeholder="Password Lama..." required="">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="password" name="password" type="password" class="validate" placeholder="Password..." required="">
                    </div>
                    <div class="input-field col s12 m6">
                      <input id="conf_pass" name="conf_pass" type="password" class="validate" placeholder="Confirm Password..." required="">
                    </div>
                    <div class="col s12 left-align info-text" id="pass-info"></div>
                  </div>
                </div>
                 <hr size="0.01"><br>
                <div class="right-align">
                  <button type="submit" class="waves-effect waves-light btn-flat amber darken-3 white-text" id="btn-update">update</button>
                </div>
              </form>

            </div>
          </div>

    <script type="text/javascript">
      $("#menu-pengaturan").addClass('sb-active');
    </script>

<?php include 'chat.php';?>
