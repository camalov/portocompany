<?php include 'header.php'; 

$aboutus_query = $db->prepare("SELECT * FROM aboutus WHERE aboutus_id=? ");
$aboutus_query->execute(array('0'));
$aboutus_result = $aboutus_query->fetch(PDO::FETCH_ASSOC);

?>
<head>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Haqqımızda</h3>
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
          <h2> <small>
            <?php  

            if($_GET['status']=='true'){ ?>              

              <b style="color:green;">Məlumatlarda edilmiş dəyişikliklər yadda saxlanıldı</b>

            <?php }else if($_GET['status']=='false'){ ?>

              <b style="color:red;">Məlumatlarda edilmiş dəyişikliklər yadda saxlanılmadı</b>

              <?php  } ?></small></h2>
              <hr>

              <div class="clearfix"></div>            

            <div class="x_contet">

              <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="first-name">Başlıq <span class="required">*</span>
                  </label>
                  <div class="col-md-9">
                    <input type="text" name="aboutus_header" value="<?php echo $aboutus_result['aboutus_header']; ?>" placeholder="Haqqımızda başlığını daxil edin" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2" for="first-name">Missiyamız</label>
                  <div class="col-md-9">
                    <input type="text" name="aboutus_mission" value="<?php echo $aboutus_result['aboutus_mission']; ?>" placeholder="Missiyanızı daxil edin" id="first-name2" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2 col-xs-12" for="first-name">Video</label>
                  <div class="col-md-9">
                    <input type="text" name="aboutus_video" value="<?php echo $aboutus_result['aboutus_video']; ?>" placeholder="Playback ID" id="first-name2" required="required" class="form-control col-md-7 col-xs-12 disabled">
                  </div>
                </div>



                <label class="control-label col-md-2" for="first-name">Məzmun <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea name="aboutus_content" id="editor1" class="ckeditor" required><?php echo $aboutus_result['aboutus_content'] ?></textarea>
                </div>

                <div align="right" class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                  <br><button type="submit" name="aboutus_save" class="btn btn-primary">Yadda saxla</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- /page content -->


    <!-- footer -->

    <?php include 'footer.php'; ?>
    <!-- /footer -->
    


