<?php

ob_start();
session_start();
include 'connection.php';

// <user-login>

if (isset($_POST['login'])) {

    //echo $_SERVER['REMOTE_ADDR'];
    //echo var_export(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])));
    //echo "<br>".$_SERVER['HTTP_USER_AGENT'];

    $user_name = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);

    if ($user_name and $user_password) {

        $user_query = $db->prepare("SELECT * FROM user WHERE user_name = :name AND user_password = :password AND user_status = :status");
        $user_query->execute(array('name' => $user_name, 'password' => $user_password, 'status' => '1'));
        $user_num = $user_query->rowCount();

        if ($user_num > '0') {

            $_SESSION['user'] = $user_name;

            Header("Location:../index.php");
        } else {

            Header("Location:../login.php?status=false");
        }
    } else {
        Header("Location:../login.php?status=false");
    }
}

// <Parameters> 

if (isset($_POST['basic_parameters'])) {

    $save = $db->prepare("UPDATE settings SET 

		setting_site_url = :url,
		setting_title = :title,
		setting_description = :description,
		setting_keywords = :keywords,
		setting_author = :author
		WHERE setting_id = :id

		");


    $renewal = $save->execute(array(
        'url' => $_POST['setting_site_url'],
        'title' => $_POST['setting_title'],
        'description' => $_POST['setting_description'],
        'keywords' => $_POST['setting_keywords'],
        'author' => 'Cəmil Camalov',
        'id' => '0'
    ));

    if ($renewal) {

        Header("Location:../basic-parameters.php?status=true");
    } else {

        Header("Location:../basic-parameters.php?status=false");
    }
}

if (isset($_POST['logo_parameters'])) {

    $header_logo_isset = $_FILES['new_logo_header']["size"];
    $footer_logo_isset = $_FILES['new_logo_footer']["size"];

    if ($header_logo_isset > '0' or $footer_logo_isset > '0') {

        if ($header_logo_isset > '0') {

            $old_header_logo_url = $_POST['old_header_logo'];
            $del_old_header_logo = unlink("../../../" . $old_header_logo_url);

            $logo_upload_dir = "../../../csimg/logo/logheader";

            @$tmp_name = $_FILES['new_logo_header']["tmp_name"];
            @$name = $_FILES['new_logo_header']["name"];

            $rand_1 = rand(1, 100);
            $rand_2 = rand(100, 1000);
            $rand_3 = rand(1000, 10000);
            $rand_4 = rand(10000, 100000);
            $rand_5 = rand(100000, 1000000);

            $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
            $header_logo_url = substr($logo_upload_dir, 9) . "/" . $different_name . $name;

            @move_uploaded_file($tmp_name, "$logo_upload_dir/$different_name$name");

            $save = $db->prepare("UPDATE settings SET setting_logo_header = :logo_header WHERE setting_id = :id");
            $renewal = $save->execute(array('logo_header' => $header_logo_url, 'id' => '0'));
        }

        if ($footer_logo_isset > '0') {

            $old_footer_logo_url = $_POST['old_footer_logo'];
            $del_old_footer_logo = unlink("../../../" . $old_footer_logo_url);

            $logo_upload_dir = "../../../csimg/logo/logfooter";

            @$tmp_name = $_FILES['new_logo_footer']["tmp_name"];
            @$name = $_FILES['new_logo_footer']["name"];

            $rand_1 = rand(1, 100);
            $rand_2 = rand(100, 1000);
            $rand_3 = rand(1000, 10000);
            $rand_4 = rand(10000, 100000);
            $rand_5 = rand(100000, 1000000);

            $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
            $footer_logo_url = substr($logo_upload_dir, 9) . "/" . $different_name . $name;

            @move_uploaded_file($tmp_name, "$logo_upload_dir/$different_name$name");

            $save = $db->prepare("UPDATE settings SET setting_logo_footer = :logo_footer WHERE setting_id = :id");
            $renewal = $save->execute(array('logo_footer' => $footer_logo_url, 'id' => '0'));
        }
    }

    if ($renewal) {

        Header("Location:../logo-parameters.php?status=true");
    } else {

        Header("Location:../logo-parameters.php?status=false");
    }
}

if (isset($_POST['contact_parameters'])) {

    $save = $db->prepare("UPDATE settings SET 

		setting_mob = :mob,
		setting_mail = :mail,
		setting_city = :city,
		setting_adress = :adress,
		setting_fax = :fax,
		setting_operating_time = :operating_time
		WHERE setting_id = :id

		");

    $renewal = $save->execute(array(
        'mob' => $_POST['setting_mob'],
        'mail' => $_POST['setting_mail'],
        'city' => $_POST['setting_city'],
        'adress' => $_POST['setting_adress'],
        'fax' => $_POST['setting_fax'],
        'operating_time' => $_POST['setting_operating_time'],
        'id' => '0'
    ));

    if ($renewal) {

        Header("Location:../contact-parameters.php?status=true");
    } else {

        Header("Location:../contact-parameters.php?status=false");
    }
}

if (isset($_POST['social_networking_parameters'])) {

    $save = $db->prepare("UPDATE settings SET

		setting_facebook = :facebook,
		setting_instagram = :instagram,
		setting_twitter = :twitter,
		setting_youtube = :youtube,
		setting_vkontakte = :vk,
		setting_linkedin = :linkedin
		WHERE setting_id = :id

		");

    $renewal = $save->execute(array(
        'facebook' => $_POST['setting_facebook'],
        'instagram' => $_POST['setting_instagram'],
        'twitter' => $_POST['setting_twitter'],
        'youtube' => $_POST['setting_youtube'],
        'vk' => $_POST['setting_vkontakte'],
        'linkedin' => $_POST['setting_linkedin'],
        'id' => '0'
    ));

    if ($renewal) {

        Header("Location:../social-networking-parameters.php?status=true");
    } else {

        Header("Location:../social-networking-parameters.php?status=false");
    }
}

if (isset($_POST['google_api_parameters'])) {

    $save = $db->prepare("UPDATE settings SET

		setting_recapctha = :recapctha,
		setting_googlemap = :map,
		setting_google_analystic = :analystic
		WHERE setting_id = :id

		");

    $renewal = $save->execute(array(
        'recapctha' => $_POST['setting_recapctha'],
        'map' => $_POST['setting_googlemap'],
        'analystic' => $_POST['setting_google_analystic'],
        'id' => '0'
    ));

    if ($renewal) {

        Header("Location:../google-api-parameters.php?status=true");
    } else {

        Header("Location:../google-api-parameters.php?status=false");
    }
}

if (isset($_POST['webmail_parameters'])) {

    $save = $db->prepare("UPDATE settings SET

		setting_smtphost = :host,
		setting_smtpuser = :user,
		setting_smtppassword = :password,
		setting_smtpport = :port
		WHERE setting_id = :id

		");

    $renewal = $save->execute(array(
        'host' => $_POST['setting_smtphost'],
        'user' => $_POST['setting_smtpuser'],
        'password' => $_POST['setting_smtppassword'],
        'port' => $_POST['setting_smtpport'],
        'id' => '0'
    ));

    if ($renewal) {

        Header("Location:../webmail-parameters.php?status=true");
    } else {

        Header("Location:../webmail-parameters.php?status=false");
    }
}

// </Parameters>
// <About-us>

if (isset($_POST['aboutus_save'])) {

    $save = $db->prepare("UPDATE aboutus SET

		aboutus_header = :header,
		aboutus_video = :video,
		aboutus_content = :content,
		aboutus_mission = :mission
		WHERE aboutus_id = :id

		");

    $renewal = $save->execute(array(
        'header' => $_POST['aboutus_header'],
        'video' => $_POST['aboutus_video'],
        'content' => $_POST['aboutus_content'],
        'mission' => $_POST['aboutus_mission'],
        'id' => '0'
    ));

    if ($renewal) {

        Header("Location:../about-us.php?status=true");
    } else {

        Header("Location:../about-us.php?status=false");
    }
}

// </About-us>
// <Slider-parameters>

if (isset($_POST['slider_parameters'])) {

    $uploads_dir = '../../../jpeg/slider';

    @$tmp_name = $_FILES['slider_photo_url']["tmp_name"];
    @$name = $_FILES['slider_photo_url']["name"];

    $rand_1 = rand(1, 100);
    $rand_2 = rand(100, 1000);
    $rand_3 = rand(1000, 10000);
    $rand_4 = rand(10000, 100000);
    $rand_5 = rand(100000, 1000000);

    $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
    $photo_url = substr($uploads_dir, 9) . '/' . $different_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$different_name$name");

    $save = $db->prepare("INSERT INTO slider SET

		slider_photo_url = :url,
		slider_name = :name,
		slider_photo_link = :link,
		slider_number = :slider_number,
		slider_status = :status

		");

    $renewal = $save->execute(array(
        'url' => $photo_url,
        'name' => $_POST['slider_name'],
        'link' => $_POST['slider_photo_link'],
        'slider_number' => $_POST['slider_number'],
        'status' => $_POST['slider_status']
    ));

    if ($renewal) {

        Header("Location:../slider.php?status=true");
    } else {

        Header("Location:../slider.php?status=false");
    }
}

if ($_GET['slider_del'] == 'true') {

    $del = $db->prepare("DELETE FROM slider WHERE slider_id = :id");
    $renewal = $del->execute(array(
        'id' => $_GET['slider_id']
    ));

    $photo_url = $_GET['slider_photo_url'];
    $del_img = unlink('../../../' . $photo_url);

    if ($renewal) {

        Header("Location:../slider.php?status=true");
    } else {

        Header("Location:../slider.php?status=false");
    }
}

if (isset($_POST['slider_edit'])) {

    $slider_id = $_POST['slider_id'];
    $file_isset = $_FILES['slider_photo_url']["size"];
    $photo_isset = '!isset';

    if ($file_isset > '0') {
        $photo_isset = 'isset';
        $old_photo_url = $_POST['old_slider_photo_url'];
        $old_photo_del = unlink('../../../' . $old_photo_url);

        $uploads_dir = '../../../jpeg/slider';

        @$tmp_name = $_FILES['slider_photo_url']["tmp_name"];
        @$name = $_FILES['slider_photo_url']["name"];

        $rand_1 = rand(1, 100);
        $rand_2 = rand(100, 1000);
        $rand_3 = rand(1000, 10000);
        $rand_4 = rand(10000, 100000);
        $rand_5 = rand(100000, 1000000);

        $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
        $photo_url = substr($uploads_dir, 9) . '/' . $different_name . $name;

        @move_uploaded_file($tmp_name, "$uploads_dir/$different_name$name");

        $save = $db->prepare("UPDATE slider SET

			slider_photo_url = :url
			WHERE slider_id = :id

			");

        $renewal = $save->execute(array(
            'url' => $photo_url,
            'id' => $_POST['slider_id']
        ));
    }

    $save = $db->prepare("UPDATE slider SET 

		slider_name = :name,
		slider_photo_link = :link,
		slider_number = :slider_number,
		slider_status = :status
		WHERE slider_id = :id

		");

    $renewal = $save->execute(array(
        'name' => $_POST['slider_name'],
        'link' => $_POST['slider_photo_link'],
        'slider_number' => $_POST['slider_number'],
        'status' => $_POST['slider_status'],
        'id' => $_POST['slider_id']
    ));

    if ($renewal) {

        Header("Location:../slider-edit.php?slider_id=$slider_id&isset_file=$photo_isset&status=true");
    } else {

        Header("Location:../slider-edit.php?slider_id=$slider_id&isset_file=$photo_isset&status=false");
    }
}

// </Slider>
// <News>

if (isset($_POST['news_add'])) {

    $uploads_dir = '../../../jpeg/news_img';

    @$tmp_name = $_FILES['news_img_url']["tmp_name"];
    @$name = $_FILES['news_img_url']["name"];

    $rand_1 = rand(1, 100);
    $rand_2 = rand(100, 1000);
    $rand_3 = rand(1000, 10000);
    $rand_4 = rand(10000, 100000);
    $rand_5 = rand(100000, 1000000);

    $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
    $photo_url = substr($uploads_dir, 9) . '/' . $different_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$different_name$name");

    $save = $db->prepare("INSERT INTO news SET

		news_date = :upload_date,
		news_img_url = :url,
		news_name = :name,
		news_author = :author,
		news_keywords = :keywords,
		news_status = :status,
		news_content = :content

		");

    $renewal = $save->execute(array(
        'upload_date' => $_POST['news_date'],
        'url' => $photo_url,
        'name' => $_POST['news_name'],
        'author' => $_POST['news_author'],
        'keywords' => $_POST['news_keywords'],
        'status' => $_POST['news_status'],
        'content' => $_POST['news_content']
    ));

    if ($renewal) {

        Header("Location:../news.php?status=true");
    } else {

        Header("Location:../news.php?status=false");
    }
}

if (isset($_POST['news_edit'])) {

    $news_id = $_POST['news_id'];
    $isset_file = $_FILES['news_photo_url']["size"];
    $photo_isset = '!isset';

    if ($isset_file > '0') {

        $photo_isset = 'isset';

        $old_photo_url = $_POST['old_news_photo_url'];
        $old_photo_del = unlink("../../../" . $old_photo_url);

        $uploads_dir = '../../../jpeg/news_img';

        @$tmp_name = $_FILES['news_photo_url']["tmp_name"];
        @$name = $_FILES['news_photo_url']["name"];

        $rand_1 = rand(1, 100);
        $rand_2 = rand(100, 1000);
        $rand_3 = rand(1000, 10000);
        $rand_4 = rand(10000, 100000);
        $rand_5 = rand(100000, 1000000);

        $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
        $photo_url = substr($uploads_dir, 9) . '/' . $different_name . $name;

        @move_uploaded_file($tmp_name, "$uploads_dir/$different_name$name");

        $save = $db->prepare("UPDATE news SET

			news_img_url = :url
			WHERE news_id = :id

			");

        $renewal = $save->execute(array(
            'url' => $photo_url,
            'id' => $news_id
        ));
    }

    $save = $db->prepare("UPDATE news SET

		news_name = :name,
		news_author = :author,
		news_keywords = :keywords,
		news_status = :status,
		news_content = :content
		WHERE news_id = :id

		");

    $renewal = $save->execute(array(
        'name' => $_POST['news_name'],
        'author' => $_POST['news_author'],
        'keywords' => $_POST['news_keywords'],
        'status' => $_POST['news_status'],
        'content' => $_POST['news_content'],
        'id' => $news_id
    ));

    if ($renewal) {

        Header("Location:../news-edit.php?&news_id=$news_id&isset_file=$photo_isset&status=true");
    } else {

        Header("Location:../news-edit.php?&news_id=$news_id&isset_file=$photo_isset&status=false");
    }
}

if ($_GET['news_del'] == 'true') {

    $news_img_url = $_GET['news_photo_url'];
    $news_img_del = unlink("../../../" . $news_img_url);

    $del = $db->prepare("DELETE FROM news WHERE  news_id = :id");
    $renewal = $del->execute(array(
        'id' => $_GET['news_id']
    ));

    if ($renewal) {

        Header("Location:../news.php?status=true");
    } else {

        Header("Location:../news.php?status=false");
    }
}

// </News>
// <Menu>

if (isset($_POST['menu_add'])) {

    $save = $db->prepare("INSERT INTO menu SET

		menu_up = :up,
		menu_name = :name,
		menu_url = :url,
		menu_row = :row,
		menu_status = :status,
		menu_detail = :detail

		");

    $renewal = $save->execute(array(
        'up' => $_POST['menu_up'],
        'name' => $_POST['menu_name'],
        'url' => $_POST['menu_url'],
        'row' => $_POST['menu_row'],
        'status' => $_POST['menu_status'],
        'detail' => $_POST['menu_detail']
    ));

    if ($renewal) {

        Header("Location:../menu.php?status=true");
    } else {

        Header("Location:../menu.php?status=false");
    }
}

if (isset($_POST['menu_edit'])) {

    $editing_menu_id = $_POST['editing_menu_id'];

    $save = $db->prepare("UPDATE menu SET

		menu_up = :up,
		menu_name = :name,
		menu_url = :url,
		menu_row = :row,
		menu_status = :status,
		menu_detail = :detail
		WHERE menu_id = :id

		");

    $renewal = $save->execute(array(
        'up' => $_POST['menu_up'],
        'name' => $_POST['menu_name'],
        'url' => $_POST['menu_url'],
        'row' => $_POST['menu_row'],
        'status' => $_POST['menu_status'],
        'detail' => $_POST['menu_detail'],
        'id' => $editing_menu_id
    ));

    if ($renewal) {

        Header("Location:../menu-edit.php?menu_id=$editing_menu_id&status=true");
    } else {

        Header("Location:../menu-edit.php?menu_id=$editing_menu_id&status=false");
    }
}

if ($_GET['menu_del'] == 'true') {

    $menu_id = $_GET['menu_id'];

    $del = $db->prepare("DELETE FROM menu WHERE menu_id = :id");
    $renewal = $del->execute(array('id' => $menu_id));

    if ($renewal) {

        Header("Location:../menu.php?status=true");
    } else {

        Header("Location:../menu.php?status=false");
    }
}

// </Menu>
// <user-detail> 

if (isset($_POST['user_detail'])) {

    $user_id = $_POST['user_id'];
    $new_user_name = $_POST['user_name'];

    if (strlen($new_user_name) > '0') {

        $user_info_query = $db->prepare("SELECT * FROM user WHERE user_name = :name");
        $user_info_query->execute(array('name' => $new_user_name));
        $user_name_num = $user_info_query->rowCount();

        if ($user_name_num >= '1') {

            $user_info_result = $user_info_query->fetch(PDO::FETCH_ASSOC);

            if ($user_id == $user_info_result['user_id']) {

                goto se;
            } else {

                Header("Location:../user-profile.php?new_user_name=available");
            }
        } else {

            goto se;
        }
    } else {

        se:
        $save = $db->prepare("UPDATE user SET

			user_name = :user_name,
			user_namelastname = :name,
			user_email = :email,
			user_mob = :user_mob,
			user_address = :address
			WHERE user_id = :id

			");

        $renewal = $save->execute(array(
            'user_name' => $_POST['user_name'],
            'name' => $_POST['user_namelastname'],
            'email' => $_POST['user_email'],
            'user_mob' => $_POST['user_mob'],
            'address' => $_POST['user_address'],
            'id' => $user_id
        ));

        if ($renewal) {
            $_SESSION['user'] = $_POST['user_name'];
            Header("Location:../user-profile.php?status=true");
        } else {

            Header("Location:../user-profile.php?status=false");
        }
    }
}


if (isset($_POST['user_new_photo'])) {

    $old_photo_url = $_POST['old_user_photo_url'];

    if (strlen($old_photo_url) > '0') {

        $old_photo_del = unlink("../" . $old_photo_url);
    }

    $user_id = $_POST['user_id'];

    $uploads_dir = '../jpeg/user_profile_photo';

    @$tmp_name = $_FILES['user_photo_url']["tmp_name"];
    @$name = $_FILES['user_photo_url']["name"];

    $rand_1 = rand(1, 100);
    $rand_2 = rand(100, 1000);
    $rand_3 = rand(1000, 10000);
    $rand_4 = rand(10000, 100000);
    $rand_5 = rand(100000, 1000000);

    $different_name = $rand_1 . $rand_2 . $rand_3 . $rand_4 . $rand_5;
    $photo_url = substr($uploads_dir, 3) . '/' . $different_name . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$different_name$name");

    $save = $db->prepare("UPDATE user SET 

		user_photo_url = :url
		WHERE user_id = :id

		");

    $renewal = $save->execute(array(
        'url' => $photo_url,
        'id' => $user_id
    ));

    if ($renewal) {

        Header("Location:../user-profile.php?user_id=$user_id&status=true");
    } else {

        Header("Location:../user-profile.php?user_id=$user_id&status=false");
    }
}

if (isset($_POST['user_photo_del']) and strlen($_POST['user_photo_url']) > '0') {

    $user_photo_url = $_POST['user_photo_url'];
    $user_id = $_POST['user_id'];

    if ($user_photo_url == "jpeg/user_profile_photo/admin-male.png" or $user_photo_url == "jpeg/user_profile_photo/admin-female.png") {

        $save = $db->prepare("UPDATE user SET

			user_status = :status
			WHERE user_id = :id

			");

        $renewal = $save->execute(array('status' => "0", 'id' => $user_id));

        session_destroy();

        Header("Location:../login.php?status=systemless_command");
    } else {

        $user_photo_del = unlink("../" . $user_photo_url);

        $save = $db->prepare("UPDATE user SET

			user_photo_url = :url
			WHERE user_id = :id

			");

        $renewal = $save->execute(array('url' => "", 'id' => $user_id));

        if ($renewal) {

            Header("Location:../user-profile.php?status=true");
        } else {

            Header("Location:../user-profile.php?status=false");
        }
    }
}

// </user-detail>
// <user-security-detail>

if (isset($_POST['user_password_change'])) {

    if (isset($_POST['user_password'])) {

        $user_password = md5($_POST['user_password']);

        $user_info_query = $db->prepare("SELECT * FROM user WHERE user_name = :name AND user_password = :password");
        $user_info_query->execute(array('name' => $_SESSION['user'], 'password' => $user_password));
        $user_num = $user_info_query->rowCount();

        if ($user_num == '1') {

            $new_password_1 = $_POST['new_password_1'];
            $new_password_2 = $_POST['new_password_2'];

            if ($new_password_1 == $_POST['user_password']) {
                Header("Location:../user-security-detail.php?status=available");
            } else {

                if ($new_password_1 == $new_password_2) {

                    $new_password_1 = md5($new_password_2);

                    $save = $db->prepare("UPDATE user SET

						user_password = :password
						WHERE user_name = :name

						");

                    $renewal = $save->execute(array('password' => $new_password_1, 'name' => $_SESSION['user']));

                    if ($renewal) {
                        Header("Location:../user-security-detail.php?status=true");
                    } else {
                        Header("Location:../user-security-detail.php?status=false");
                    }
                } else {
                    Header("Location:../user-security-detail.php?status=incorrect_passwords");
                }
            }
        } else {
            Header("Location:../user-security-detail.php?status=false");
        }
    } else {

        Header("Location:../login.php?status=systemless_command");
    }
}

// </user-security-detail>
// <user-register>

if (isset($_POST['user_register'])) {

    if ($_POST['user_register_type'] == '1') {
        $user_auth = $_POST['user_authority'];
        Header("Location:../user-register.php?user_authority=$user_auth");
    } else if ($_POST['user_register_type'] == '0') {
        Header("Location:../user-registe.php");
    }
}

if (isset($_POST['user_add'])) {

    $user_name = $_POST['user_name'];
    $user_name_available_query = $db->prepare("SELECT * FROM user WHERE user_name = :user_name");
    $user_name_available_query->execute(array('user_name' => $user_name));
    $user_num = $user_name_available_query->rowCount();

    if ($user_num == 0) {

        //&user_namelastname=&user_address=&user_gender=
        $user_namelastname = $_POST['user_namelastname'];
        $user_address = $_POST['user_address'];
        $user_gender = $_POST['user_gender'];
        $user_password_1 = $_POST['user_password_1'];
        $user_password_2 = $_POST['user_password_2'];
        $user_mail = $_POST['user_email'];
        $user_auth = $_POST['user_auth'];

        if (strlen($user_name) > 0 and strlen($user_namelastname) > 0 and strlen($user_gender) >= 0 and strlen($user_password_1) > 0 and strlen($user_password_2) > 0 and strlen($user_mail) > 0) {

            if ($_POST['user_password_1'] == $_POST['user_password_2']) {

                $user_password = md5($user_password_1);
                $new_user = $db->prepare("INSERT INTO user SET
					user_name = :name,
					user_namelastname = :lastname,
					user_address = :address,
					user_gender = :gender,
					user_password = :password,
					user_email = :email,
					user_mob = :mob,
					user_authority = :auth
					");

                $renewal = $new_user->execute(array(
                    'name' => $user_name,
                    'lastname' => $user_namelastname,
                    'address' => $user_address,
                    'gender' => $user_gender,
                    'password' => $user_password,
                    'email' => $user_mail,
                    'mob' => $_POST['user_mob'],
                    'auth' => $user_auth
                ));

                if ($renewal) {
                    Header("Location:../users.php?status=true");
                } else {
                    Header("Location:../users.php?status=false");
                }
            } else {
                Header("Location:../user-register.php?status=incrorrect_passwords");
            }
        } else {
            Header("Location:../user-register.php?status=systemless_command");
        }
    } else {
        Header("Location:../user-register.php?status=usernamenotavailable");
    }
}

// </user-register>
// <user-edit>

if (isset($_POST['user_edit'])) {

    $user_auth = $_POST['user_authority'];
    $user_id = $_POST['user_id'];

    $user_edit = $db->prepare("UPDATE user SET
		user_authority = :auth
		WHERE user_id = :id
		");

    $renewal = $user_edit->execute(array(
        'auth' => $user_auth,
        'id' => $user_id
    ));

    if ($renewal) {
        Header("Location:../users.php?status=true");
    } else {
        Header("Location:../users.php?status=false");
    }
}

// </user-edit>
// <user-token>

if ($_GET['user_token'] == 'access-true') {
    session_start();
    ob_start();

    $present_account = $_SESSION['user'];
    echo $_SESSION['user'] = $_GET['user_name'];

    if ($_SESSION['user']) {
        Header("Location:../index.php");
    } else {
        Header("Location:../user-detail-control.php?status=false");
    }
}

// </user-token>
// <user-delete>

if ($_GET['user_del'] == 'true') {

    $user_name = $_GET['user_name'];

    if ($_SESSION['user'] == $user_name) {
        Header("Location:../users.php?status=false");
    } else {

        $user_id = $_GET['user_id'];
        $user_namelastname = $_GET['user_namelastname'];
        $user_del = $db->prepare("DELETE FROM user WHERE user_id = :id");
        $renewal = $user_del->execute(array('id' => $user_id));

        if ($renewal) {
            Header("Location:../users.php?user_del=true&user_name=$user_namelastname");
        } else {
            Header("Location:../users.php?status=false");
        }
    }
}

// </user-delete>
?>