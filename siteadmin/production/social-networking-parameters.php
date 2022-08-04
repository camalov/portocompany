<?php include 'header.php'; 

$setting_query = $db->prepare("SELECT * FROM settings WHERE setting_id=? ");
$setting_query->execute(array('0'));
$setting_result = $setting_query->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Parametrlər</h3>
      </div>

<!--   <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Açar söz....">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Axtar!</button>
            </span>
          </div>
        </div>
      </div> -->
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <h2>Sosial Şəbəkə Parametrləri <small>
            <?php  

            if($_GET['status']=='true'){ ?>              

              <b style="color:green;">Məlumatlarda edilmiş dəyişikliklər yadda saxlanıldı</b>

            <?php }else if($_GET['status']=='false'){ ?>

              <b style="color:red;">Məlumatlarda edilmiş dəyişikliklər yadda saxlanılmadı</b>

              <?php  } ?></small></h2>
              <hr>
                      
              <div class="clearfix"></div>



              <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3" for="first-name">Facebook hesabınız</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" name="setting_facebook" value="<?php echo $setting_result['setting_facebook']; ?>" placeholder="Facebook hesabınızı daxil edin məs(https://www.facebook.com/profile.php?id=100006245626146)" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="first-name">Instagram hesabınız</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" name="setting_instagram" value="<?php echo $setting_result['setting_instagram']; ?>" placeholder="Instagram hesabınızı daxil edin məs(https://www.instagram.com/profile.php?id=100006245626146)" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="first-name" >Twitter hesabınız</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" name="setting_twitter" value="<?php echo $setting_result['setting_twitter']; ?>" placeholder="Twitter hesabınızı daxil edin məs(https://www.twitter.com/profile.php?id=100006245626146)" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="first-name">YouTube kanalınız</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" name="setting_youtube" value="<?php echo $setting_result['setting_youtube']; ?>" placeholder="YouTube hesabınızı daxil edin məs(https://www.youtube.com/profile.php?id=100006245626146)" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="first-name">VKontakte hesabınız</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" name="setting_vkontakte" value="<?php echo $setting_result['setting_vkontakte']; ?>" placeholder="VKontakte hesabınızı daxil edin məs(https://www.vkontakte.com/profile.php?id=100006245626146)" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3" for="first-name">LinkedIn hesabınız</label>
                  <div class="col-md-6 col-xs-12">
                    <input type="text" name="setting_linkedin" value="<?php echo $setting_result['setting_linkedin']; ?>" placeholder="LinkedIn hesabınızı daxil edin məs(https://www.linkedin.com/profile.php?id=100006245626146)" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="social_networking_parameters" class="btn btn-primary">Yadda saxla</button>
                </div>


              </form>        


            </form>
          </div>


        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!-- footer -->
<?php include 'footer.php'; ?>
       <!-- /footer -->