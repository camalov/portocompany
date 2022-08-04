<?php include 'header.php';

include 'dbnet/connection.php'; 

if(isset($_POST['searching_list'])){

  $searching_word = $_POST['searching_word'];
  $slider_query = $db->prepare("SELECT * FROM slider WHERE slider_name LIKE '%$searching_word%' ORDER BY slider_status DESC, slider_number ASC LIMIT 25");
  $slider_query->execute();

  $result_count = $slider_query->rowCount();

}else{

  $slider_query = $db->prepare("SELECT * FROM slider ORDER BY slider_status DESC, slider_number ASC LIMIT 25");
  $slider_query->execute();

}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Slayd Əməliyyatları</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <form action="" method="POST">
            <div class="input-group">
              <input type="text" name="searching_word" class="form-control" value="<?php echo $_POST['searching_word']; ?>" placeholder="Açar söz...">
              <span class="input-group-btn">
                <button class="btn btn-default" name="searching_list" type="submit">Axtar!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="">
          <h2>Mövcud slaydlar<small>              

            <?php
            if($_GET['status']=='true'){ ?>              

              <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

            <?php }else if($_GET['status']=='false'){ ?>

              <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

              <?php  } ?></small></h2>
              <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px; <?php if($_GET['status']=='true' or $_GET['status']=='false'){ ?> margin-top:-10px; <? }if($_GET['status']=='false'){ ?> margin-top:-26px; margin-left:15px; <? } ?>"><a href="slider-add.php"><button type="button" class="btn btn-round btn-primary">Slayd əlavə et</button></a></div>
            </div>



            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">

                    <th class="column-title">Mövzu </th>
                    <th class="column-title text-center">Ad </th>
                    <th class="column-title text-center">Sıra </th>
                    <th class="column-title text-center">Status </th>
                    <th width="90" class="column-title"> </th>
                    <th width="80" class="column-title"> </th>
                  </th>
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
              </thead>
              <?php // while($slider_result){ ?>
                <tbody>

                  <?php  


                  
                  while($slider_result = $slider_query->fetch(PDO::FETCH_ASSOC)){

                    ?>

                    <tr class="even pointer">
                      <td class=" "><img style="width:200px; height:100px;" src="<?php echo "../../".$slider_result['slider_photo_url']; ?>"></td>
                      <td class="text-center"><?php echo $slider_result['slider_name']; ?></td>
                      <td class="text-center"><?php echo $slider_result['slider_number']; ?></i></td>
                      <td class="text-center"><?php if($slider_result['slider_status']=='1'){

                        echo "Aktiv";

                      }else if($slider_result['slider_status']=='0'){

                        echo "Passiv";

                      } ?></td>
                      <td class=" "><a href="slider-edit.php?slider_id=<?php echo $slider_result['slider_id']; ?>"><button class="btn btn-primary btn-xs" style="width:90px;"><i class="fa fa-pencil"></i> Redaktə et</button></a></td>

                      <td class=" "><a href="dbnet/operations.php?slider_del=true&slider_id=<?php echo $slider_result['slider_id']; ?>&slider_photo_url=<?php echo $slider_result['slider_photo_url']; ?>"><button class="btn btn-danger btn-xs" style="width:80px;"><i class="fa fa-trash"></i> Sil</button></a></td>

                    </tr>

                  <?php } ?>

                </tbody>
                <?php  // } ?>            
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- /page content -->

    <!-- footer -->
    <?php include 'footer.php'; ?>
       <!-- /footer -->