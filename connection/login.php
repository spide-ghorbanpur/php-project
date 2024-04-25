<?php
require_once "include.php";
function getUserBrowser($userAgent){
    if (strpos($userAgent , "Edg/")){
        return "مایکروسافت اج";
    }
    elseif (strpos($userAgent , "Chrome")){
        return  "گوگل کروم";
    }
    elseif (strpos($userAgent , "Safari")){
        return "اپل سافاری";
    }
    elseif (strpos($userAgent , "Firefox")){
        return "موزیلا فایرفاکس";
    }
    elseif (strpos($userAgent , "MSIE") || strpos($userAgent , "Trident/7")){
        return "اینترنت اکسپلور";
    }
    elseif (strpos($userAgent , "Opera") || strpos($userAgent, "OPR/")){
        return "اینترنت اکسپلور";
    }
    else{
        return  "سایر مرورگرها";
    }

}


//$brows = getUserBrowser("Edg/");
//var_dump($brows);


function doLogin($username , $password )
{
    global $connection, $table_name, $table_login;
    $username = sanitize($username);
    $password = sanitize($password);
    $password = hashData($password);
    $sql = "SELECT `id` , `first_name` , `last_name` , `email` , `mobile` , `activated` , `activationkey`,  `user_name`, `password`  FROM `$table_name` WHERE `user_name` = ? AND `password` = ? ";

    $result = $connection->prepare($sql);
    $result->bindValue(1, $username);
    $result->bindValue(2, $password);
    $result->execute();
    if ($result->rowCount()) {
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $sql = "INSERT `$table_login` SET `user_id`= ? , `user_name`= ? , `user_ip` = ? ,`email` = ? ,  `browser` = ? , `details` = ?  ";
        $userId = $row["id"];
        $userIp = $_SERVER["REMOTE_ADDR"];
        $browser = getUserBrowser($_SERVER["HTTP_USER_AGENT"]);
        $result = $connection->prepare($sql);
        $result->bindValue(1, $userId);
        $result->bindValue(2, $row["user_name"]);
        $result->bindValue(3, $userIp);
        $result->bindValue(4, $row["email"]);
        $result->bindValue(5, $browser);
        $result->bindValue(6, "ورود");


        $userSession = array(
            "signInkey" => true,
            "id" => $row["id"],
            "first_name" => $row["first_name"],
            "last_name" => $row["last_name"],
            "userEmail" => $row["email"],
            "mobile" => $row["mobile"],
            "user_name" => $row["user_name"],
            "password" => $row["password"],
            "expireTime" => time() + 3600
        );

        $_SESSION["userInfo"] = $userSession;

        $result->execute();

        return $result;
    }
    return false;

}
doLogin("spideqb" , "12345");

//Run
$doLogin = null ;
if (isset($_SESSION["userInfo"])){
    echo $_SESSION["userInfo"]["user_name"] ."".$_SESSION["userInfo"]["userEmail"];
}
if (isset($_GET["login"])){
    if (!empty($_GET["user_name"])AND  !empty($_GET["password"])){
        $doLogin = doLogin($_GET["user_name"] , $_GET["password"]);
        if ($doLogin){
            echo $_SESSION["signInkey"]."".$_SESSION["userEmail"];

        }
        else{
            echo "نام کاربری یا رمز عبور معتبر نیست";
        }
    }
}
