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
            <h2>Logo Parametrləri <small>
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

                <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">

                  <input type="hidden" name="old_header_logo" value="<?php echo $setting_result['setting_logo_header'] ?>">

                  <input type="hidden" name="old_footer_logo" value="<?php echo $setting_result['setting_logo_footer'] ?>">

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Mövcud üst logo'nuz (Header)<br>313*103 px</label>
                    <div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image">
                          <img style="width:90%; display: block;" src="<?php echo "../../".$setting_result['setting_logo_header']; ?>" alt="<?php echo "../../".$setting_result['setting_logo_header']; ?>" />
                          <div class="mask">
                            <div class="tools tools-bottom">
                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <p>Mövcud logo'nuz</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Yeni üst logo (Header) <span class=""></span>
                    </label>
                    <div class="col-md-6">
                      <input type="file" name="new_logo_header" value="" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Mövcud alt logo'nuz (Footer)<br>313*103 px</label>
                    <div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image">
                          <img style="width:90%; display: block;" src="<?php echo "../../".$setting_result['setting_logo_footer']; ?>" alt="<?php echo "../../".$setting_result['setting_logo_footer']; ?>" />
                          <div class="mask">
                            <div class="tools tools-bottom">
                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <p>Mövcud logo'nuz</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Yeni alt logo (Footer) <span class=""></span>
                    </label>
                    <div class="col-md-6">
                      <input type="file" name="new_logo_footer" value="" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="logo_parameters" class="btn btn-primary">Yadda saxla</button>
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