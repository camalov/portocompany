<?php include 'header.php';

include 'dbnet/connection.php'; 

if(isset($_POST['searching_list'])){

  $searching_word = $_POST['searching_word'];
  $menu_query = $db->prepare("SELECT * FROM menu WHERE menu_name LIKE '%$searching_word%' ORDER BY menu_status DESC, menu_row ASC LIMIT 25");
  $menu_query->execute();

  $result_count = $menu_query->rowCount();

}else{

  $menu_query = $db->prepare("SELECT * FROM menu WHERE menu_up = :menu_up ORDER BY menu_status DESC, menu_row ASC LIMIT 25");
  $menu_query->execute(array( 'menu_up' => '0' ));
}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Menyu Əməliyyatları</h3>
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
          <h2>Mövcud menyular<small>              

            <?php
            if($_GET['status']=='true'){ ?>              

              <b style="color:green;">Əməliyyat yerinə yetirildi...</b>

            <?php }else if($_GET['status']=='false'){ ?>

              <b style="color:red;">Əməliyyat yerinə yetirilərkən səhv baş verdi...</b>

              <?php  } ?></small></h2>
              <div class="clearfix" align="right" style="margin-top:-33px; margin-bottom: 3px; <?php if($_GET['status']=='true' or $_GET['status']=='false'){ ?> margin-top:-27px; <? } ?>"><a href="menu-add.php"><button type="button" class="btn btn-round btn-primary">Yeni menyu</button></a></div>
            </div>



            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">

                    <th class="column-title">Ad </th>
                    <th class="column-title text-center">Üst menyu </th>
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
              <tbody>

                <?php  


                
                while($menu_result = $menu_query->fetch(PDO::FETCH_ASSOC)){

                  $menu_id = $menu_result['menu_id'];

                  ?>

                  <tr class="even pointer">
                    <td class="text-"><?php echo $menu_result['menu_name']; ?></td>
                    <td class="text-center"><?php echo $menu_result['menu_up']; ?></i></td>
                    <td class="text-center"><?php echo $menu_result['menu_row']; ?></i></td>
                    <td class="text-center"><?php if($menu_result['menu_status']=='1'){

                      echo "Aktiv";

                    }else if($menu_result['menu_status']=='0'){

                      echo "Passiv";

                    } ?></td>
                    <td class=" "><a href="menu-edit.php?menu_id=<?php echo $menu_result['menu_id']; ?>"><button class="btn btn-primary btn-xs" style="width:90px;"><i class="fa fa-pencil"></i> Redaktə et</button></a></td>

                    <td class=" "><a href="dbnet/operations.php?menu_del=true&menu_id=<?php echo $menu_result['menu_id'];?>-->"><button class="btn btn-danger btn-xs" style="width:80px;"><i class="fa fa-trash"></i> Sil</button></a></td>

                  </tr>

                  <?php  

                  $submenu_query = $db->prepare("SELECT * FROM menu WHERE menu_up = :menu_id ORDER BY menu_row ASC");
                  $submenu_query->execute(array( 'menu_id' => $menu_id ));

                  while($submenu_result = $submenu_query->fetch(PDO::FETCH_ASSOC)){ ?>

                    <tr class="even pointer">
                      <td class="text-">---- &nbsp;<?php echo $submenu_result['menu_name']; ?></td>
                      <td class="text-center"><?php echo $submenu_result['menu_up']; ?></i></td>
                      <td class="text-center"><?php echo $submenu_result['menu_row']; ?></i></td>
                      <td class="text-center"><?php if($submenu_result['menu_status']=='1'){ 


                        echo "Aktiv";

                      }else if($submenu_result['menu_status']=='0'){

                        echo "Passiv";

                      } ?></td>
                      <td class=" "><a href="menu-edit.php?menu_id=<?php echo $submenu_result['menu_id']; ?>"><button class="btn btn-primary btn-xs" style="width:90px;"><i class="fa fa-pencil"></i> Redaktə et</button></a></td>

                      <td class=" "><a href="dbnet/operations.php?menu_del=true&menu_id=<?php echo $submenu_result['menu_id'];?>"><button class="btn btn-danger btn-xs" style="width:80px;"><i class="fa fa-trash"></i> Sil</button></a></td>
                    </tr>


                  <?php }} ?>

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
    <script type="text/javascript" src="">

      $(document).ready(function(){

        $(".btn btn-danger btn-xs").click(function(){
          $(".btn btn-danger btn-xs").css({color: "yellow"});
          console.log("asdasd");
        });
          
      });
$(".btn btn-danger btn-xs").css({color: "yellow"});alert(asdasd);
    </script>