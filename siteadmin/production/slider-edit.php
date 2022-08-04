<?php include 'header.php'; 


$slider_query = $db->prepare("SELECT * FROM slider WHERE slider_id = ?");
$slider_query->execute(array($_GET['slider_id']));
$slider_result = $slider_query->fetch(PDO::FETCH_ASSOC);

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
            <h2>Redaktə<small>              

              <?php  

              if($_GET['status']=='true'){ ?>              

                <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

              <?php }else if($_GET['status']=='false'){ ?>

                <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

                <?php  } ?></small></h2>
                <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px;"><a href="slider.php"><button type="button" class="btn btn-round btn-warning"><i class="fa fa-fas fa-arrow-circle-left"></i> Geri qayıt</button></a>
                  <hr>
                </div>
                <div class="clearfix"></div>
                <form action="dbnet/operations.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                  <input type="hidden" name="slider_id" value="<?php echo $slider_result['slider_id']; ?>">
                  <input type="hidden" name="old_slider_photo_url" value="<?php echo $slider_result['slider_photo_url']; ?>">

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name"></label>
                    <div class="col-md-55">
                      <div class="thumbnail">
                        <div class="image view view-first">
                          <img style="width:100%; height:75%; display: block;" src="<?php echo "../../".$slider_result['slider_photo_url']; ?>" alt="<?php echo "../../".$slider_result['slider_photo_url']; ?>" />
                          <div class="mask">
                            <p><?php echo $slider_result['slider_name']; ?></p>
                            <div class="tools tools-bottom">

                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <p>Mövcud slayd mövzunuz</p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Slayd mövzusu </label>
                    <div class="col-md-6">
                      <input type="file" name="slider_photo_url" value="" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Slayd ad <span class="required">*</span>
                    </label></label>
                    <div class="col-md-6">
                      <input type="text" name="slider_name" placeholder="Slayd adını daxil edin" value="<?php echo $slider_result['slider_name']; ?>" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Slayd link </label>
                    <div class="col-md-6">
                      <input type="text" name="slider_photo_link" placeholder="Slayd link" value="<?php echo $slider_result['slider_photo_link']; ?>" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3" for="first-name">Slayd sıra </label>
                    <div class="col-md-6">
                      <input type="text" name="slider_number" value="<?php echo $slider_result['slider_number']; ?>" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Slayd status <span style="" class="required"> *</span></label>
                    <div class="col-md-6 col-sm-2">
                      <?php if($slider_result['slider_status']==1){ ?>

                        <select class="form-control" required="required" name="slider_status">
                          <option value="1">Aktiv</option>
                          <option value="0">Passiv</option>
                        </select>

                      <?php } else if($slider_result['slider_status']==0){ ?>

                        <select class="form-control" required="required" name="slider_status">
                          <option value="0">Passiv</option>
                          <option value="1">Aktiv</option>
                        </select> 
                      <?php } ?>
                    </div>
                  </div>


                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="slider_edit" class="btn btn-primary">Yadda saxla</button>
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