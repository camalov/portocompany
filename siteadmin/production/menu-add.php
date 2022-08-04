<?php include 'header.php'; 

/*
$news_query = $db->prepare("SELECT * FROM news WHERE news_id=? ");
$news_query->execute(array('?'));
$news_result = $news_query->fetch(PDO::FETCH_ASSOC);
*/

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
        <h3>Menyu Əməliyyatları</h3>
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
            <h2>Yeni menyu</h2>
            <hr>
          </div>
          <div class="clearfix"></div>
          <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Menyu kateqoriya <span class="required">*</span></label>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <select class="select2_single form-control" tabindex="-1" name="menu_up" required>
                  <option></option>
                  <option value="0">Üst menyu</option>

                  <?php  

                  $menu_query = $db->prepare("SELECT * FROM menu WHERE menu_up = :up ORDER BY menu_name ASC");
                  $menu_query->execute(array( 'up' => '0' ));
                  

                  while($menu_result = $menu_query->fetch(PDO::FETCH_ASSOC)){ ?>
                    
                    <option value="<?php echo $menu_result['menu_id']; ?>"><?php echo $menu_result['menu_name']; ?></option>


                  <? } ?>


                  ?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12" for="first-name">Menyu ad <span class="required">*</span>
              </label>
              <div class="col-md-6">
                <input type="text" name="menu_name" placeholder="Menyu adını daxil edin" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12" for="first-name">Menyu keçid</label>
              <div class="col-md-6">
                <input type="text" name="menu_url" placeholder="Menyu keçidini daxil edin"  id="first-name2" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12" for="first-name">Menyu sıra </label>
              <div class="col-md-6">
                <input type="text" name="menu_row" placeholder="Menyu sırasını daxil edin" value="0" id="first-name2" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-xs-12">Menyu status <span style="margin-left:-3px;" class="required">*</span></label>
              <div class="col-md-6 col-sm-2">
                <select class="form-control" required="required" name="menu_status">
                  <option value="1">Aktiv</option>
                  <option value="0">Passiv</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Menyu məzmunu <span class="required">*</span></label>
              <div class="col-md-6 col-sm-2">
                <textarea name="menu_detail" id="editor1" required="" class="ckeditor"></textarea>
              </div>
            </div>


            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="menu_add" class="btn btn-primary">Yadda saxla</button>
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