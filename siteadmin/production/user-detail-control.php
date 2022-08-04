<?php include 'header.php'; 

$user_id = $_GET['user_id'];
$user_query = $db->prepare("SELECT * FROM user WHERE user_id = :id ");
$user_query->execute(array('id' => $user_id));
$user_result = $user_query->fetch(PDO::FETCH_ASSOC);
$user_auth = $user_result['user_authority'];
$user_name = $user_result['user_name'];
$user_status = $user_result['user_status'];
?>

<head>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>İstifadəçi idarə etməsi</h3>
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
            <h2>İstifadəçinin səlahiyyəti dəyişdirilə və hesabına daxil ola bilərsiniz...<small>              

              <?php  

              if($_GET['status']=='true'){ ?>              

                <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

              <?php }else if($_GET['status']=='false'){ ?>

                <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

                <?php  } ?></small></h2>
                <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px;"><a href="users.php"><button type="button" class="btn btn-round btn-warning"><i class="fa fa-fas fa-arrow-circle-left"></i> Geri qayıt</button></a>
                  <hr>
                </div>
                <div class="clearfix"></div>
                <form action="dbnet/operations.php" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">İstifadəçi səlahiyyəti</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="user_authority">
                       <option value="1" <?php if($user_auth == 1) echo "disabled"; ?>>İnzibatçı</option> 
                       <option value="0" <?php if($user_auth == 0) echo "disabled"; ?>>Redaktor</option>
                       <option value="-1" <?php if($user_auth == -1) echo "disabled"; ?>>Oxucu</option>
                     </select>
                   </div>
                 </div>

                 

                 <input type="hidden" name="user_id" value="<?php echo $user_result['user_id']; ?>">


                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="" style="text-align: left;">
                    <a type="submit" href="dbnet/operations.php?user_token=access-true&user_name=<?php echo $user_name; ?>" class="btn btn-info" style="">Hesaba daxil ol</a>
                  </div>
                </div>
              </div>

              <?php //echo $user_result['user_authority']; ?>

              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="user_edit" class="btn btn-primary">Yadda saxla</button>
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