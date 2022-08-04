<?php 
ob_start();
session_start();

if(isset($_SESSION['user']))
    Header("Location:index.php");
// <device ip>

/*

$comp_ip = "loading";

while($comp_ip_result){

  if($_SERVER['REMOTE_ADDR'] == $comp_ip_result['comp_ip']){

    $comp_ip = $comp_ip_result['comp_ip'];
    exit;

  }

}

if($_SERVER['REMOTE_ADDR'] != $comp_ip){

  $comp_ip = $_SERVER['REMOTE_ADDR'];

}

*/

// </device ip>

if($_SERVER['REMOTE_ADDR'] != '::'){ ?>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" class>
                <a href="../../index.php"><button type="button" class="close" data-dismiss=""><span aria-hidden="true">×</span>
                    </button></a>
                <h4 class="modal-title" style="color:red;" id="myModalLabel">Xəbərdarlıq</h4>
            </div>
            <div class="modal-body">
                <h4>Sizin, "İnzibatçı Bölməsi"nə giriş hüququnuz yoxdur</h4>
                <p>Tərəfimizdən inzibatçı bölməsinə, icazəsiz şəkildə daxil olmağa çalışdığnızı müəyyən etdik. </p>
                <p>Növbəti dəfə inzibatçı bölməsinə icazəsiz şəkildə daxil olmağa çalışdığnız müəyyən edildiyi halda, cihazınız haqqında məlumatlar (IP-Internet Protokol ünvanı, cihazınızın əməliyyat sistemi, daxil olarkən istifadə etdiyiniz veb-brauzer, giriş nöqtəsi, və.s) sayt inzibatçılarına göndəriləcək, və sahifəyə girişiniz məhdudlaşdırılacaq.</p>
            </div>
            <div class="modal-footer">
                <a href="../../index.php"><button type="button" class="btn btn-primary">Oldu</button></a>
            </div>

        </div>
    </div>
</div>

<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CL Yazılım İnzibatçı Girişi | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php if($_SERVER['REMOTE_ADDR'] == '::1') echo " dbnet/operations.php"; else echo "../../index.php" ; ?>" method="POST">
                        <h1>İnzibatçı Paneli</h1>
                        <div>
                            <input type="text" name="user_name" autofocus="" class="form-control" placeholder="İstifadəçi adı" required="" />
                        </div>
                        <div>
                            <input type="password" name="user_password" class="form-control" placeholder="Şifrə" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="<?php if($_SERVER['REMOTE_ADDR'] == '::1') echo " submit"; else echo "button" ; ?>" name="login" style="width:100%; background-color:#73879C; color:white;" data-toggle="
                                <?php if($_SERVER['REMOTE_ADDR'] != '::1') echo "modal";?>" data-target="
                                <?php if($_SERVER['REMOTE_ADDR'] != '::1') echo ".bs-example-modal-lg";?>">Daxil ol</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">
                                <?php  

              if($_GET['status'] == 'false'){

                echo "İstifadəçi tapılmadı";
              }else if($_GET['status'] == 'logout'){ 
                echo "Səhifədən çıxış etdiniz. Yenidən daxil olmaq üçün istifadəçi məlumatlarını daxil edin.";
              }else if($_GET['status'] == 'systemless_command'){ ?>

                                <b style="color:red;">Sistemdən kənar əməliyyat qeydə alındı. Səhifəyə girişiniz məhdudlaşdırıldı</b>

                                <?php } ?>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> CL Yazılım</h1>
                                <p>©2018 CL Yazılım tərəfindən hazırlanıb. <small>Cəmil Camalov</small></p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <?php if($_SERVER['REMOTE_ADDR'] != '::1'){ ?>

    <script type="text/javascript">
        $(document).on({
            "contextmenu": function(e) {
                console.log("ctx menu button:", e.which);

                // Stop the context menu
                e.preventDefault();
            },
            "mousedown": function(e) {
                console.log("normal mouse down:", e.which);
            },
            "mouseup": function(e) {
                console.log("normal mouse up:", e.which);
            }
        });

    </script>

    <?php } ?>

</body>

</html>
