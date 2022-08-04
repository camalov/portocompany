
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3></h3>
    <ul class="nav side-menu">

      <?php $user_auth = $user_info_result['user_authority']; if($user_auth == 1) { ?>

        <li><a href="index.php"><i class="fa fa-home"></i> Əsas səhifə <span class="label label-success pull-right"></span></a></li>

        <li><a href="about-us.php"><i class="fa fa-bookmark"></i> Haqqımızda <span class="label label-success pull-right"></span></a></li>

        <li><a><i class="fa fa-cog"></i> Parametrlər<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="basic-parameters.php">Əsas Parametrlər</a></li>
            <li><a href="logo-parameters.php">Logo Parametrləri</a></li>
            <li><a href="contact-parameters.php">Əlaqə Parametrləri</a></li>
            <li><a href="social-networking-parameters.php">Sosial Şəbəkə Parametrləri</a></li>
            <li><a href="google-api-parameters.php">Google API Parametrləri</a></li>
            <li><a href="webmail-parameters.php">WebMail Parametrləri</a></li>
          </ul>
        </li>

        <li><a href="menu.php"><i class="fa fa-list"></i> Menyular<span class="label label-success pull-right"></span></a></li>

        <li><a href="slider.php"><i class="fa fa-image"></i> Slayd<span class="label label-success pull-right"></span></a></li>

        <li><a href="news.php"><i class="fa fa-newspaper-o"></i> Blog<span class="label label-success pull-right"></span></a></li>

        <li><a href="users.php"><i class="fa fa-user"></i> İstifadəçilər<span class="label label-success pull-right"></span></a></li>

      <? }else if($user_auth == 0 or $user_auth == -1) { ?>

        <li><a href="news.php"><i class="fa fa-newspaper-o"></i> Blog<span class="label label-success pull-right"></span></a></li>
        
      <? } ?>

    </ul>
  </div>

  <div class="menu_section">
    <ul class="nav side-menu">

    </ul>
  </div>

</div>
            <!-- /sidebar menu -->