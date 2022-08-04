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
          <div>
            <h2>Əlaqə Parametrləri <small>
              <?php  

              if($_GET['status']=='true'){ ?>              

                <b style="color:green;">Məlumatlarda edilmiş dəyişikliklər yadda saxlanıldı</b>

              <?php }else if($_GET['status']=='false'){ ?>

                <b style="color:red;">Məlumatlarda edilmiş dəyişikliklər yadda saxlanılmadı</b>

                <?php  } ?></small></h2>
                <hr>


                <div class="clearfix"></div>
              </div>
              <div class="x_contet">

                <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Telefon nömrəniz <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" maxlength="25" name="setting_mob" value="<?php echo $setting_result['setting_mob']; ?>" placeholder="Telefon nömrənizi daxil edin" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">E-Poçt ünvanı <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_mail" value="<?php echo $setting_result['setting_mail']; ?>" id="first-name2" placeholder="E-Poçt ünvanınızı daxil edin" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12" for="first-name">Şəhər</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_city" value="<?php echo $setting_result['setting_city']; ?>" placeholder="Yaşadığınız vəya şirkətinizin, firmanızın və.s yerləşdiyi şəhəri daxil edin " id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12" for="first-name">Ünvan</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_adress" value="<?php echo $setting_result['setting_adress']; ?>" placeholder="məs: N.Gəncəvi prospekti, 27-ci məhəllə. " id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12" for="first-name">Faks</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_fax" value="<?php echo $setting_result['setting_fax']; ?>" placeholder="Faks nömrəniz" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">İş saatları</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_operating_time" value="<?php echo $setting_result['setting_operating_time']; ?>" placeholder="İş saatını istəyə bağlı olaraq qeyd edə bilərsiniz" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="contact_parameters" class="btn btn-primary">Yadda saxla</button>
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