<?php require_once "connection/include.php" ?>
<?php require_once "login.php" ?>
<?php
global $connection , $table_name ,$table_login;
//function getUserBrowser($userAgent){
//    if (strpos($userAgent , "Edg/")){
//        return "مایکروسافت اج";
//    }
//    elseif (strpos($userAgent , "Chrome")){
//        return  "گوگل کروم";
//    }
//    elseif (strpos($userAgent , "Safari")){
//        return "اپل سافاری";
//    }
//    elseif (strpos($userAgent , "Firefox")){
//        return "موزیلا فایرفاکس";
//    }
//    elseif (strpos($userAgent , "MSIE") || strpos($userAgent , "Trident/7")){
//        return "اینترنت اکسپلور";
//    }
//    elseif (strpos($userAgent , "Opera") || strpos($userAgent, "OPR/")){
//        return "اینترنت اکسپلور";
//    }
//    else{
//        return  "سایر مرورگرها";
//    }
//
//}

$sql = "INSERT `$table_login` SET `user_id`= ? ,`user_ip` = ? , `browser` = ? ,`user_name`= ? , `email`= ?  , `details` = ?  " ;
$user_id = $_SESSION["userInfo"]["id"];
$user_ip = $_SERVER["REMOTE_ADDR"];
$browser = getUserBrowser($_SERVER["HTTP_USER_AGENT"]);
$result = $connection->prepare($sql);
$result->bindValue(1,$user_id);
$result->bindValue(2,$user_ip);
$result->bindValue(3,$browser);
$result->bindValue(4,$_SESSION["userInfo"]["user_name"]);
$result->bindValue(5,$_SESSION["userInfo"]["userEmail"]);
$result->bindValue(6,$_SESSION["userInfo"]["خروج"]);

$result->execute();

header("location : index.php");
header("location : index-2.php");
header("location : index-3.php");
header("location : index-4.php");
header("location : index-5.php");
header("location : index-6.php");
header("location : index-7.php");
header("location : index-8.php");
header("location : index-9.php");
