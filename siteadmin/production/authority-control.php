<?php 
$userAuthorityRe = $db->prepare("SELECT *  FROM user WHERE user_name = :name");
$userAuthorityRe->execute(array('name' => $user_info_result['user_name']));
$userAuthorityResult = $userAuthorityRe->fetch(PDO::FETCH_ASSOC);

// ($userAuthorityResult['user_authority'] == -1) ? Header("Location:404.php") : print("");

$location = substr($_SERVER['SCRIPT_NAME'], 55);
$user_au = $userAuthorityResult['user_authority'];
$locationToStr = (string) $location;
$locationToStr;

if ($userAuthorityResult['user_authority'] != 1) {


	if (($user_au == -1) and ($locationToStr != "index.php" and $locationToStr != "news.php" and $locationToStr != "read-only.php" and $locationToStr != "logout.php" and $locationToStr != "user-profile.php"
		and $locationToStr != "user-security-detail.php" and $locationToStr != "operations.php")){
		Header("Location:404.php");
} 	else if (($user_au == 0) and ($locationToStr != "index.php" and $locationToStr != "news.php" and $locationToStr != "read-only.php" and $locationToStr != "logout.php" and $locationToStr != "user-profile.php"
	and $locationToStr != "user-security-detail.php" and $locationToStr != "operations.php" 
	and $locationToStr != "news-edit.php" and $locationToStr != "news-add.php")) {
	Header("Location:404.php");
}

}


/*
	if ($userAuthorityResult['user_authority'] != 0) {
		Header("Location:404.php");
	}


$location != "index.php" and $location != "news.php"
		and $location != "read-only.php" and $location != "logout.php" and $location != "user-profile.php"
		and $location != "user-security-detail.php" and $location != "operations.php"

	*/


		?>