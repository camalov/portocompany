<?php include 'header.php'; 

$menu_id = $_GET['menu_id'];
$menu_query_2 = $db->prepare("SELECT * FROM menu WHERE menu_id = :id ");
$menu_query_2->execute(array('id' => $menu_id));
$menu_result_2 = $menu_query_2->fetch(PDO::FETCH_ASSOC);
$menu_up = $menu_result_2['menu_up'];


$submenu_query = $db->prepare("SELECT * FROM menu");
$submenu_query->execute(); 



while($submenu_result = $submenu_query->fetch(PDO::FETCH_ASSOC)){

  if($submenu_result['menu_id'] == $menu_up){

    $menu_name = $submenu_result['menu_name']; 

  }

}

if(!isset($menu_name)){

  $menu_name = $menu_result_2['menu_name']; 

}

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
            <h2>Redaktə<small>              

              <?php  

              if($_GET['status']=='true'){ ?>              

                <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

              <?php }else if($_GET['status']=='false'){ ?>

                <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

                <?php  } ?></small></h2>
                <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px;"><a href="menu.php"><button type="button" class="btn btn-round btn-warning"><i class="fa fa-fas fa-arrow-circle-left"></i> Geri qayıt</button></a>
                  <hr>
                </div>
                <div class="clearfix"></div>
                <form action="dbnet/operations.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Menyu kateqoriya <span class="required">*</span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <select class="select2_single form-control" tabindex="-1" name="menu_up" required>
                        <option value="<?php echo $menu_result_2['menu_up'];  ?>"><?php echo $menu_name; ?></option>
                        <option value="0">Üst menyu</option>

                        <?php  

                        $menu_query = $db->prepare("SELECT * FROM menu WHERE menu_up = :up ORDER BY menu_name ASC");
                        $menu_query->execute( array('up' => '0' ));


                        while($menu_result = $menu_query->fetch(PDO::FETCH_ASSOC)){ 

                          if($menu_result == $menu_result_2)
                            continue;
                          else if($menu_result['menu_id'] == $menu_result_2['menu_up'])
                            continue;

                          ?>

                          <option value="<?php echo $menu_result['menu_id']; ?>"><?php echo $menu_result['menu_name']; ?></option>

                        <? } ?>

                        ?>

                      </select>
                    </div>
                  </div>

                  <input type="hidden" name="editing_menu_id" value="<?php echo $menu_id ?>">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12" for="first-name">Menyu ad <span class="required">*</span>
                    </label></label>
                    <div class="col-md-6">
                      <input type="text" name="menu_name" placeholder="Menyu adını daxil edin" value="<?php echo $menu_result_2['menu_name']; ?>" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12" for="first-name">Menyu keçid</label>
                    <div class="col-md-6">
                      <input type="text" name="menu_url" placeholder="Menyu keçidini daxil edin" value="<?php echo $menu_result_2['menu_url'] ?>" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12" for="first-name">Menyu sıra </label>
                    <div class="col-md-6">
                      <input type="text" name="menu_row" placeholder="Menyu sırasını daxil edin" value="<?php echo $menu_result_2['menu_row'] ?>" id="first-name2" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-xs-12">Menyu status <span class="required"> *</span></label>
                    <div class="col-md-6 col-sm-2">
                      <?php if($menu_result_2['menu_status'] == '1'){ ?>

                        <select class="form-control" required="required" name="menu_status">
                          <option value="1">Aktiv</option>
                          <option value="0">Passiv</option>
                        </select>

                      <?php } else if($menu_result_2['menu_status'] == '0'){ ?>

                        <select class="form-control" required="required" name="menu_status">
                          <option value="0">Passiv</option>
                          <option value="1">Aktiv</option>
                        </select> 
                      <?php } ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Menyu məzmunu <span class="required">*</span></label>
                    <div class="col-md-6 col-sm-2">
                      <textarea name="menu_detail" id="editor1" required="" class="ckeditor"><?php echo $menu_result_2['menu_detail'] ?></textarea>
                    </div>
                  </div>

                  <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="menu_edit" class="btn btn-primary">Yadda saxla</button>
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