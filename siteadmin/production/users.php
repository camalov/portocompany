<?php include 'header.php';

include 'dbnet/connection.php'; 

$session_id = $db->prepare("SLECT * FROM user WHERE user_name = :name");
$session_id_result = $session_id->execute(array('name' => $_SESSION['user']));
$active_id = $session_id_result['user_id'];

if(isset($_POST['searching_list'])){

  $searching_word = $_POST['searching_word'];
  $user_info_query = $db->prepare("SELECT * FROM user WHERE user_name LIKE '%$searching_word%' ORDER BY DESC LIMIT 25");
  $user_info_query->execute();

  $result_count = $user_info_query->rowCount();

}else{

  $user_info_query = $db->prepare("SELECT * FROM user ORDER BY user_authority DESC LIMIT 25");
  $user_info_query->execute(array( 'status' => '1' ));
}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>İstifadəçilər</h3>
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
          <h2>Mövcud istifadəçilər<small>

            <?php

            if($_GET['status']=='true'){ ?>

              <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

            <?php }if($_GET['user_del']=='true'){ ?>

              <b style="color:green;"><span style="color:tomato;"><?=$_GET[user_name] ?></span> adlı istifadəçi silindi</b>

            <?php }else if($_GET['status']=='false'){ ?>

              <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

              <?php  } ?></small></h2>
              <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px; <?php if($_GET['status']=='true' or $_GET['status']=='false'){ ?> margin-top:-27px; <? } ?>"><a href="user-add.php"><button type="button" class="btn btn-round btn-primary">Yeni istifadəçi</button></a></div>
            </div>



            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">

                    <th class="column-title">İstifadəçi adı </th>
                    <th class="column-title text-left-center">Ad soyad </th>
                    <th class="column-title text-left-center">Səlahiyyət </th>
                    <th class="column-title text-left-center">Status </th>
                    <th width="90" class="column-title"> </th>
                    <th width="80" class="column-title"> </th>
                  </th>
                  <th class="bulk-actions" colspan="7">
                    <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                  </th>
                </tr>
              </thead>
              <tbody>

                <?php  

                while($user_info_result = $user_info_query->fetch(PDO::FETCH_ASSOC)){

                  $user_id = $user_info_result['user_id'];

                  ?>

                  <tr class="even pointer">
                    <td class="text-left-center">
                      <?php echo $user_info_result['user_name']; ?>
                    </td>
                    <td class="text-left-center">
                      <?php echo $user_info_result['user_namelastname']; ?></i></td>
                      <td class="text-left-center">
                        <?php if($user_info_result['user_authority'] == 1){ echo "İnzibatçı"; }else if($user_info_result['user_authority'] == -1){ echo "Oxucu"; }else if('user_authority' == 0){ echo "Redaktor"; 

                        } ?></i></td>
                        <td class="text-left-center">
                          <?php if($user_info_result['user_status']=='1'){

                            echo "Aktiv";

                          }else if($user_info_result['user_status']=='0'){

                            echo "Passiv";

                          } ?>
                        </td>



                        <?php if($_SESSION['user'] != $user_info_result['user_name']){ ?>
                          <td class=" "><a href="user-detail-control.php?user_id=<?php echo $user_info_result['user_id']; ?>"><button class="btn btn-primary btn-xs" style="width:90px;"><i class="fa fa-pencil"></i> İdarə et</button></a></td>

                          <td class=" "><a href="dbnet/operations.php?user_del=true&user_id=<?php echo $user_info_result['user_id'];?>&user_namelastname=<?php echo $user_info_result['user_namelastname']; ?>&user_name=<?php echo $user_info_result['user_name'];?>"><button class="btn btn-danger btn-xs" style="width:80px;"><i class="fa fa-trash"></i> Sil</button></a></td>


                        <?php }else{?> <td></td> <td></td> <? } } ?>
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
