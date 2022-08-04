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
          
            <h2>Google API Parametrləri <small>
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
                    <label class="control-label col-md-3" for="first-name">Google recapctha API</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_recapctha" value="<?php echo $setting_result['setting_recapctha']; ?>" placeholder="Google recapctha API'ni daxil edin" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Google map API</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_googlemap" value="<?php echo $setting_result['setting_googlemap']; ?>" placeholder="Google map API'ni daxil edin" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name" >Google analystic</label>
                    <div class="col-md-6 col-xs-12">
                      <input type="text" name="setting_google_analystic" value="<?php echo $setting_result['setting_google_analystic']; ?>" placeholder="Google analystic UA-izləmə şifrəsini daxil edin" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="google_api_parameters" class="btn btn-primary">Yadda saxla</button>
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