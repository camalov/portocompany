<?php include 'header.php'; ?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Yeni İstifadəçi</h3>
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
            <h2>Yeni istifadəçi hesabı yaradırsınız</h2>
            <hr>
          </div>
          <div class="clearfix"></div>
          <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left">

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">İstifadəçi səlahiyyəti</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="user_authority">
                  <option value="1">İnzibatçı</option>
                  <option value="0">Redaktor</option>
                  <option value="-1">Oxucu</option>                  
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">İstifadəçi hesabı necə yaradılsın ?</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="user_register_type">
                  <option value="1">İnzibatçı tərəfindən qeydiyyata alınsın</option>
                  <option value="0">Qeydiyyata alınacaq istifadəçiyə form linki göndərilsin</option>
                </select>
              </div>
            </div>

            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="user_register" class="btn btn-primary">İləri</button>
            </div>
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