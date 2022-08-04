<?php include 'header.php'; 


$news_query = $db->prepare("SELECT * FROM news WHERE news_id = ?");
$news_query->execute(array($_GET['news_id']));
$news_result = $news_query->fetch(PDO::FETCH_ASSOC);

?>

<head>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Paylaşım Əməliyyatları</h3>
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
                <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px;"><a href="news.php"><button type="button" class="btn btn-round btn-warning"><i class="fa fa-fas fa-arrow-circle-left"></i> Geri qayıt</button></a>
                  <hr>
                </div>
                <div class="clearfix"></div>
                <form action="dbnet/operations.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                  <input type="hidden" name="news_id" value="<?php echo $news_result['news_id']; ?>">
                  <input type="hidden" name="old_news_photo_url" value="<?php echo $news_result['news_img_url']; ?>">


                  <div class="form-group">
                    <label class="control-label col-md-3">Paylaşım məzmunu <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-2">
                      <textarea readonly="" name="news_content" id="editor1" class="ckeditor"><?php echo $news_result['news_content']; ?></textarea>
                    </div>
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