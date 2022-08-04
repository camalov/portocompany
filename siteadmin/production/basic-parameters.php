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
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
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
            <h2>Əsas Parametrlər <small>
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
                    <label class="control-label col-md-3" for="first-name">Sayt ünvanı <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_site_url" value="<?php echo $setting_result['setting_site_url']; ?>" placeholder="Sayt ünvanınızı (domen) daxil edin. Məs: https://www.saytunvanim.com" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Saytın adı <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_title" value="<?php echo $setting_result['setting_title']; ?>" placeholder="Saytınızın adını daxil edin. Məs: CL Yazılım"  id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Sayt haqqında <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_description" value="<?php echo $setting_result['setting_description']; ?>" placeholder="Saytınız haqqında məlumat daxil edin"  id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Sayt açar sözlər <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_keywords" value="<?php echo $setting_result['setting_keywords']; ?>" placeholder="Açar sözlər daxil edin. Məs: php, pdo, php pdo, porto , porto firma, porto firma script, Cəmil, Camalov, Cəmil Camalov, Web, Developer, Web Developer, Web Development, Developments" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Sayt müəllifi <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_author" value="<?php echo $setting_result['setting_author']; ?>" placeholder="Sayt müəllifi: Cəmil Camalov" disabled="disabled" id="first-name2" required="required" class="form-control col-md-7 col-xs-12 disabled " style="display: block;">
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="basic_parameters" class="btn btn-primary">Yadda saxla</button>
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