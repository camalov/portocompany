<?php include 'header.php'; ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>İstifadəçi qeydiyyatı</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2></h2>
                        <div class="clearfix">Qeydiyyat formu <small>

                                <?php
                            
                                if($_GET['status'] == 'usernamenotavailable'){ ?>

                                <b style="color:orange;">İstifadəçi adı artıq mövcuddur !</b>

                                <?php }else if($_GET['status'] == 'systemless_command'){ ?>

                                <b style="color:red;">Form'da tələb edilən məlumatları tam şəkildə doldurun !</b>

                                <?php }else if($_GET['status'] == 'incrorrect_passwords'){ ?>

                                <b style="color:orange;">Daxil edilmiş şifrələr uyğun gəlmir !</b>

                                <?php } ?>

                            </small></div>
                    </div>
                    <div class="x_content">


                        <!-- Smart Wizard -->
                        <p>Formu doldurmaqla qeydiyyatı tamamla.</p>
                        <div id="step-1">
                            <form action="dbnet/operations.php" method="POST" class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İstifadəçi adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_name" id="first-name" required="required" placeholder="İstifadəçi adı" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ad Soyad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_namelastname" id="last-name" placeholder="Ad Soyad" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Şifrə <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="user_password_1" id="last-name" placeholder="Şifrə daxil edin" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Şifrəni yenidən daxil edin <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="user_password_2" id="last-name" placeholder="Şifrəni yenidən daxil edin" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">E-poçt ünvanı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="user_email" id="last-name" placeholder="E-poçt ünvanını daxil edin" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Yaşadığınız ünvan <span class="required"> </span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_address" id="last-name" placeholder="Yaşadığınız ünvanı daxil edin" name="last-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefon nömrəsi </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="user_mob" id="last-name" placeholder="Telefon nömrənizi daxil edin" name="last-name" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cins <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div id="gender" class="btn-group" required="" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="user_gender" required="" value="1"> &nbsp; Kişi &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="user_gender" required="" value="0"> Qadın
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="user_auth" value="<?php echo $_GET['user_authority'] ?>">

                                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="user_add" class="btn btn-primary">İləri</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!-- End SmartWizard Content -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include 'footer.php'; ?>
<!-- /footer content -->
