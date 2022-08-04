<?php include 'header.php'; 

/*
$slider_query = $db->prepare("SELECT * FROM slider WHERE slider_id=? ");
$slider_query->execute(array('?'));
$slider_result = $slider_query->fetch(PDO::FETCH_ASSOC);
*/

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Slayd Əməliyyatları</h3>
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
            <h2>Yeni slayd</h2>
              <hr>
            </div>
            <div class="clearfix"></div>
            <form action="dbnet/operations.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3" for="first-name">Slayd mövzusu <span class="required">*</span>
                </label>
                <div class="col-md-6">
                  <input type="file" name="slider_photo_url" value="" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for="first-name">Slayd ad <span class="required">*</span>
                </label>
                <div class="col-md-6">
                  <input type="text" name="slider_name" placeholder="Slayd adını daxil edin" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for="first-name">Slayd link </label>
                <div class="col-md-6">
                  <input type="text" name="slider_photo_link" placeholder="Slayd link"  id="first-name2" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3" for="first-name">Slayd sıra </label>
                <div class="col-md-6">
                  <input type="text" name="slider_number" value="0" id="first-name2" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-xs-12">Slayd status  <span class="required"> * </span></label>
                <div class="col-md-6 col-sm-12">
                  <select class="form-control" required="required" name="slider_status">
                    <option value="1">Aktiv</option>
                    <option value="0">Passiv</option>
                  </select>
                </div>
              </div>
                

              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="slider_parameters" class="btn btn-primary">Yadda saxla</button>
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