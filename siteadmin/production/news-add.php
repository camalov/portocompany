<?php include 'header.php'; 

/*
$news_query = $db->prepare("SELECT * FROM news WHERE news_id=? ");
$news_query->execute(array('?'));
$news_result = $news_query->fetch(PDO::FETCH_ASSOC);
*/

include 'authority-control.php';

$time_zone_set=date_default_timezone_set("Asia/Baku");
$date = date("Y:m:d H:i:s");

?>

<head>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Blog</h3>
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
            <h2>Yeni paylaşım</h2>
            <hr>
          </div>
          <div class="clearfix"></div>
          <form action="dbnet/operations.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

            <input type="hidden" name="news_date" value="<?php echo $date; ?>">

            <div class="form-group">
              <label class="control-label col-md-3" for="first-name">Paylaşım mövzusu <span class="required">*</span>
              </label>
              <div class="col-md-6">
                <input type="file" name="news_img_url" value="" required="" id="first-name2" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12" for="first-name">Paylaşım ad <span class="required">*</span>
              </label>
              <div class="col-md-6">
                <input type="text" name="news_name" placeholder="Paylaşım adını daxil edin" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12" for="first-name">Müəllif </label>
              <div class="col-md-6">
                <input type="text" name="news_author" placeholder="Paylaşım müəllifini daxil edin"  id="first-name2" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12" for="first-name">Açar sözlər </label>
              <div class="col-md-6">
                <input type="text" name="news_keywords" placeholder="Açar sözlər..." id="first-name2" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12">Paylaşım status <span style="margin-left:-3px;" class="required">*</span></label>
              <div class="col-md-6 col-sm-2">
                <select class="form-control" required="required" name="news_status">
                  <option value="1">Aktiv</option>
                  <option value="0">Passiv</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Paylaşım məzmunu <span class="required">*</span></label>
              <div class="col-md-6 col-sm-2">
                <textarea name="news_content" id="editor1" required="" class="ckeditor"></textarea>
              </div>
            </div>


            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="news_add" class="btn btn-primary">Yadda saxla</button>
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