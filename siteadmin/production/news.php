<?php include 'header.php';

include 'dbnet/connection.php'; 

if(isset($_POST['searching_list'])){

  $searching_word = $_POST['searching_word'];
  $news_query = $db->prepare("SELECT * FROM news WHERE news_name LIKE '%$searching_word%' ORDER BY news_id DESC, news_status DESC LIMIT 25");
  $news_query->execute();

  $result_count = $news_query->rowCount();

}else{

  $news_query = $db->prepare("SELECT * FROM news ORDER BY news_status DESC, news_id DESC LIMIT 25");
  $news_query->execute();

}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Blog</h3>
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
          <h2>Mövcud paylaşımlar<small>              

            <?php
            if($_GET['status']=='true'){ ?>              

              <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

            <?php }else if($_GET['status']=='false'){ ?>

              <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

              <?php  } ?></small></h2>

              <?php if($user_auth == 1 or $user_auth == 0) {

                ?>

                <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px; <?php if($_GET['status']=='true' or $_GET['status']=='false'){ ?> margin-top:-27px; <? } ?>"><a href="news-add.php"><button type="button" class="btn btn-round btn-primary">Yeni paylaşım</button></a></div>
              </div>

            <? } ?>

            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">

                    <?php $user_auth = $user_info_result['user_authority']; ?>

                    <th class="column-title">Ad </th>
                    <th class="column-title text-center">Paylaşım tarixi </th>
                    <th class="column-title text-center">Müəllif </th>
                    <th class="column-title text-center">Status </th>
                    <?php if($user_auth == 1 or $user_auth == 0){ ?>
                      <th width="80" class="column-title"> </th>
                    <? } ?>
                    <th width="90" class="column-title"> </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <?php // while($news_result){ ?>
                  <tbody>

                    <?php  



                    while($news_result = $news_query->fetch(PDO::FETCH_ASSOC)){

                      ?>

                      <tr class="even pointer">
                        <td class="text-"><?php echo $news_result['news_name']; ?></td>
                        <td class="text-center"><?php echo $news_result['news_date']; ?></i></td>
                        <td class="text-center"><?php echo $news_result['news_author']; ?></i></td>
                        <td class="text-center"><?php if($news_result['news_status']=='1'){

                          echo "Aktiv";

                        }else if($news_result['news_status'] == '0'){

                          echo "Passiv";

                        } ?></td>


                        <?php if($user_auth  == (-1) ){ ?>

                          <td class=" "><a href="read-only.php?news_id=<?php echo $news_result['news_id']; ?>"><button class="btn btn-primary btn-xs" style="width:90px;"> Oxu</button></a></td> 

                        <? }else if($user_auth == 0 or $user_auth == 1) { ?>

                        <td class=" "><a href="news-edit.php?news_id=<?php echo $news_result['news_id']; ?>"><button class="btn btn-primary btn-xs" style="width:90px;"><i class="fa fa-pencil"></i> Redaktə et</button></a></td>

                        <td class=" "><a href="dbnet/operations.php?news_del=true&news_id=<?php echo $news_result['news_id']; ?>&news_photo_url=<?php echo $news_result['news_img_url']; ?>"><button class="btn btn-danger btn-xs" style="width:80px;"><i class="fa fa-trash"></i> Sil</button></a></td>

                      <? } } ?>
                    </tr>

                  </tbody>

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