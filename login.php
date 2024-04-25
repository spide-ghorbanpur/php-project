<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/reid/reid/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 09:10:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reid - ورود</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--    <script src="-->
<!--https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js-->
<!--"></script>-->
<!--    <link href="-->
<!--https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.min.css-->
<!--" rel="stylesheet">-->

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <?php require_once "connection/include.php"?>

</head>
<?php

function createUser($email ,$password , $activationkey){
    global $connection, $table_name;
    $email = sanitize($email);
    $password = sanitize($password);
    $password =hashData($password);
    $activationkey = sanitize($activationkey);
    $sql = ("INSERT `$table_name` SET `email` = ? , `password` = ? , `activationkey` = ?");
    $result = $connection->prepare($sql);
    $result->bindValue(1, $email);
    $result->bindValue(2, $password);
    $result->bindValue(3,$activationkey);
    $result->execute();
    return $result;
}
function isEmailExist($email){
    global $connection , $table_name;
    $email = sanitize($email);
    $sql ="SELECT `email` FROM `$table_name` WHERE `email` = ? ";
    $result = $connection->prepare($sql);
    $result->bindValue(1,$email);
    $result->execute();
    if ($result->rowCount()){
        return $result;
    }
    return false;
}
/*Send Mail*/
function sendMail($current_user_email , $mail_subject,$mail_body ){
    require_once "phpmailer/class.phpmailer.php";
    $Mail = new PHPMailer(true);
    try {
        $Mail->IsSMTP();
        $Mail->SMTPDebug = 2;
        $Mail->Host = "smtp.gmail.com";
        $Mail->SMTPAuth = true;
        $Mail->Username="s.p.ghoorbon@gmail.com";
        $Mail->Password = "afsf pzxu viaf nnwh";
        $Mail->SMTPSecure = "ssl";
        $Mail->Port="465";
        $Mail->IsHTML(true);
        $Mail->Subject =$mail_subject ;
        $Mail->Body = $mail_body;
        $Mail->CharSet = "utf-8";
        $Mail->FromName ="از طرف سپیکو";
        $Mail->ContentType = "text/html;charset=utf-8";
        $Mail->AddAddress($current_user_email , "CUE");
        $Mail->AltBody ="";
        $Mail->Send();
        echo "<div class='alert alert-success'>ایمیل با موفقیت ارسال شد </div>";

    }
    catch (Exception $error){
        echo "ایمیل ارسال نشد". $Mail->ErrorInfo;

    }
    $Mail->SmtpClose();
    return $Mail;
}
function isActivationkey($activationkey){
    global $connection , $table_name;
    $activationkey = sanitize($activationkey);
    $sql ="SELECT `activationkey` FROM `$table_name` WHERE `activationkey` = ? ";
    $result = $connection->prepare($sql);
    $result->bindValue(1,$activationkey);
    $result->execute();
    if($result->rowCount()){
        return $result;
    }
    return false;

}
function activateUserAccount($activationkey){
    global $connection , $table_name;
    $activationkey = sanitize($activationkey);
    $sql =" UPDATE `$table_name` SET `activated`= ? WHERE `activationkey` = ?";
    $result = $connection->prepare($sql);
    $result->bindValue(1,1);
    $result->bindValue(2,$activationkey);
    $result->execute();
    return $result;


}

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
function doLogin($username , $password ){
    global $connection , $table_name, $table_login;
    $username = sanitize($username);
    $password = sanitize($password);
    $password = hashData($password);
    $sql = "SELECT `id` , `first_name` , `last_name` , `email` , `mobile` , `activated` , `activationkey`,  `user_name`, `password`  FROM `$table_name` WHERE `user_name` = ? AND `password` = ? ";
    $result = $connection->prepare($sql);
    $result->bindValue(1,$username);
    $result->bindValue(2 , $password);
    $result->execute();
    if ($result->rowCount()){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $sql = "INSERT `$table_login` SET `user_id`= ? , `user_name`= ? , `user_ip` = ? ,`email` = ? ,  `browser` = ? , `details` = ?  " ;
        $userId = $row["id"];
        $userIp = $_SERVER["REMOTE_ADDR"];
        $browser = getUserBrowser($_SERVER["HTTP_USER_AGENT"]);
        $result = $connection->prepare($sql);
        $result->bindValue(1,$userId);
        $result->bindValue(2, $row["user_name"]);
        $result->bindValue(3, $userIp);
        $result->bindValue(4, $row["email"]);
        $result->bindValue(5,$browser);
        $result->bindValue(6,"ورود");


        $userSession = array(
            "signInkey" => true ,
            "id" => $row["id"] ,
            "first_name" =>$row["first_name"],
            "last_name" => $row["last_name"],
            "userEmail" => $row["email"] ,
            "mobile" => $row["mobile"],
            "user_name"=>$row["user_name"],
            "password" => $row["password"],
            "expireTime" => time() + 3600
        );

        $_SESSION["userInfo"] = $userSession;

        $result->execute();

        return $result;
    }
    return false;

}


//Run
$query = null;
$queryExist =null;
$errors = array();
$hasError = false;
$msgSuccess= false;
$msgError = false;
$myQuery = null;
$msg = "";
if (isset($_GET["submit"])) {
    if (!empty($_GET["email"]) and filter_var($_GET["email"], FILTER_VALIDATE_EMAIL) and !empty($_GET["password"])) {
        $queryExist = isEmailExist($_GET["email"]);
        if ($queryExist) {
            //var_dump($queryExist);
            //echo '<script>$(()=>{swal({title:"خطا", text:"کاربری با ایمیل ثبت شده است" , icon:"danger",button:"بستن" })})</script>';
            $msgError = true ;
            $msg = "کاربری با این ایمیل ثبت شده است";
        }

        else {
            $current_time = microtime(true);
            $token = str_replace("." , "" , $current_time);
            $newToken = $_GET["email"]. $token;
            $activationKey = sha1($newToken);



            $query = createUser($_GET["email"], $_GET["password"] , $activationKey);

            $mail_subject = "فعالسازی حساب کاربری";
            $mail_body = '<section style="width: 40% ; background-color: #f6fafb ; padding: 60px 40px ; margin: auto ; text-align: center ; font-family: Calibri ; line-height: 50px ; ">
            <h1 style="font-family: Calibri ; text-align: center ; font-size: 30px ; color: #2c3034 ;  ">این ایمیل حاوی لینک فعالسازی میباشد
             </h1>
            <a href="http://127.0.0.1/project/Reid__7_/index.php?activationkey='.$activationKey.' "
            style="color: plum ; text-align: center ; font-size: 20px;">برای فعالسازی حساب کاربری کلیک کنید</a>
            <p style=" text-align: center ; color: hotpink">
            در صورت ارسال اشتباه ایمیل آنرا نادیده بگیرد
            </p>
            </section>';


            if ($query) {
                // var_dump($query);
                //echo '<script>$(()=>{swal({title:"با تشکر",text:"اطلاعات با موفقیت ثبت شد",icon:"success",button:"بستن"})}) </script>';
                $msgSuccess = true;
                $msg = "اطلاعات با موفقیت ثبت شد";


                sendMail($_GET["email"] , $mail_subject , $mail_body);
            }
        }

    }
    else {
        if(empty($_GET["email"])){
            $hasError = true;
            $errors[] = "ایمیل نمیتواند خالی باشد";
        }
        else if (!filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)){
            $hasError = true;
            $errors[] = "فرمت ایمیل معتبر نمیباشد ";
        }
        if (empty($_GET["password"])){
            $hasError = true;
            $errors[]="رمز عبور نمیتواند خالی باشد";
        }
    }
}


if (isset($_GET["activationkey"]) and !empty($_GET["activationkey"])){
    $myQuery = isActivationkey($_GET["activationkey"]);
    if(!$myQuery){
        $msgError = true;
        $msg = "کلید امنیتی معتبر نیست";

    }
    else{
        $temp = activateUserAccount($_GET["activationkey"]);
        if($temp){
            echo "<script>$(function (){swal.fire({title:'اکانت شما فعال گردید' , icon:'success' , button:'رد کردن'});});</script>";
        }

    }
}

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

?>
<body>

    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">
    </div>
    <div class="offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="welcome_text">
                            <ul>
                                <li><span>تحویل رایگان:</span> از زمان ما برای صرفه جویی در رویداد استفاده کنید</li>
                                <li><span>بازگشت رایگان *</span> رضایت تضمین شده است</li>
                            </ul>
                        </div>

                        <div class="top_right">
                            <ul>
                                <li class="top_links"><a href="#">حساب من<i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="wishlist.php">لیست علاقه مندی های من</a></li>
                                        <li><a href="my-account.php">حساب من</a></li>
                                        <li><a href="#">ورود</a></li>
                                        <li><a href="compare.php">مقایسه محصولات </a></li>
                                    </ul>
                                </li>
                                <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt="">انگلیسی
                                        <i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#"><img src="assets/img/logo/cigar.jpg" alt=""> فرانسوی</a></li>
                                        <li><a href="#"><img src="assets/img/logo/language2.png" alt="">المانی</a></li>
                                    </ul>
                                </li>
                                <li class="currency"><a href="#">دلار امریکا <i class="ion-chevron-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#">یورو</a></li>
                                        <li><a href="#">ریال</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="search_bar text-end">
                            <form action="#">
                                <select class="select_option text-end" name="select">
                                    <option selected value="1">همه دسته بندی ها</option>
                                    <option value="2" class="select_option text-end">تجهیزات جانبی</option>
                                    <option value="3">پل</option>
                                    <option value="4">هاب</option>
                                    <option value="5">تکرار کننده</option>
                                    <option value="6">تعویض</option>
                                    <option value="7">بازی های ویدیویی</option>
                                    <option value="8">پلی استیشن 3</option>
                                    <option value="9">پلی استیشن 4</option>
                                    <option value="10">ایکس باکس 360</option>
                                    <option value="11">ایکس باکس وان</option>
                                </select>
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                <input class="text-end" placeholder="جستجو کنید" type="text">
                            </form>
                        </div>
                        <div class="cart_area">
                            <div class="cart_link">
                                <a href="#"><i class="fa fa-shopping-basket"></i>2 مورد</a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_item top text-end">
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">اپل آیفون ۱۴</a>

                                            <span>1×60.00 دلار</span>

                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item bottom text-end">
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">اپل آیفون ۱۴ بلوتوث</a>

                                            <span>1×60.00 دلار</span>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart__table text-end">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">جمع فرعی:</td>
                                                    <td class="text-right">150.00 دلار</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-left">جمع</td>
                                                    <td class="text-right">184.00 دلار</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="cart_button view_cart">
                                        <a href="cart.php">مشاهده سبد خرید</a>
                                    </div>
                                    <div class="cart_button checkout">
                                        <a href="checkout.php">وارسی</a>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                            <div class="middel_links">
                                <ul>
                                    <li><a href="login.php">وارد شدن</a></li>
                                    <li>/</li>
                                    <li><a href="login.php">ثبت نام</a></li>
                                </ul>

                            </div>

                        </div>
                        <div class="contact_phone">
                            <p>تماس با پشتیبانی رایگان: <a href="tel:01234567890">01234567890</a></p>
                        </div>
                        <div id="menu" class="text-left">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a class="text-end" href="#">خانه</a>
                                    <ul class="sub-menu text-end">
                                        <li><a href="index.php">۱ خانه</a></li>
                                        <li><a href="index-2.php">۲ خانه</a></li>
                                        <li><a href="index-3.php">۳ خانه</a></li>
                                        <li><a href="index-4.php">۴ خانه</a></li>
                                        <li><a href="index-5.php">۵ خانه</a></li>
                                        <li><a href="index-6.php">۶ خانه</a></li>
                                        <li><a href="index-7.php">۷ خانه</a></li>
                                        <li><a href="index-8.php">۸ خانه</a></li>
                                        <li><a href="index-9.php">۹ خانه</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="text-end" href="#">خرید کنید</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a class="text-end" href="#">چیدمان فروشگاه</a>
                                            <ul class="sub-menu text-end">
                                                <li><a href="shop.php">فروشگاه</a></li>
                                                <li><a href="shop-fullwidth.php">تمام عرض</a></li>
                                                <li><a href="shop-fullwidth-list.php">لیست عرض کامل</a></li>
                                                <li><a href="shop-right-sidebar.php">نوار کناری سمت راست </a></li>
                                                <li><a href="shop-right-sidebar-list.php"> لیست نوار کناری سمت راست</a>
                                                </li>
                                                <li><a href="shop-list.php">نمایش لیست</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a class="text-end" href="#">صفحات دیگر</a>
                                            <ul class="sub-menu text-end">
                                                <li><a href="portfolio.php">نمونه کارها</a></li>
                                                <li><a href="portfolio-details.php">جزئیات نمونه کارها</a></li>
                                                <li><a href="cart.php">سبد خرید</a></li>
                                                <li><a href="checkout.php">وارسی</a></li>
                                                <li><a href="my-account.php">حساب من</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a class="text-end" href="#">حساب من</a>
                                            <ul class="sub-menu text-end">
                                                <li><a href="product-details.php">جزئیات محصول</a></li>
                                                <li><a href="product-sidebar.php">نوار کناری محصول</a></li>
                                                <li><a href="product-grouped.php">محصول گروه بندی شده</a></li>
                                                <li><a href="variable-product.php">متغیر محصول</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a class="text-end" href="#">بلاگ</a>
                                    <ul class="sub-menu text-end">
                                        <li><a href="blog.php">بلاگ</a></li>
                                        <li><a href="blog-details.php">جزئیات وبلاگ</a></li>
                                        <li><a href="blog-sidebar.php">نوار کناری وبلاگ</a></li>
                                        <li><a href="blog-fullwidth.php">پهنای کامل وبلاگ</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item-has-children">
                                    <a class="text-end" href="#">صفحات</a>
                                    <ul class="sub-menu text-end">
                                        <li><a href="about.php">درباره ما</a></li>
                                        <li><a href="services.php">خدمات</a></li>
                                        <li><a href="faq.php">سوالات متداول</a></li>
                                        <li><a href="contact.php">مخاطب</a></li>
                                        <li><a href="login.php">وارد شدن</a></li>
                                        <li><a href="wishlist.php">لیست علاقه مندیها</a></li>
                                        <li><a href="404.php">خطای 404</a></li>
                                        <li><a href="compare.php">مقایسه کنید</a></li>
                                        <li><a href="privacy-policy.php">سیاست حفظ حریم خصوصی</a></li>
                                        <li><a href="coming-soon.php">به زودی</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children text-end">
                                    <a href="my-account.php">حساب من</a>
                                </li>
                                <li class="menu-item-has-children text-end">
                                    <a href="about.php">درباره ما</a>
                                </li>
                                <li class="menu-item-has-children text-end">
                                    <a href="contact.php">تماس با ما</a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header area start-->
    <header class="header_area">
        <!--header middel start-->
        <div class="header_middel">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 offset-md-6 offset-lg-0">
                        <div class="cart_area">
                            <div class="cart_link">
                                <a href="#"><i class="fa fa-shopping-basket"></i>سبد خرید</a>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_item top">
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                        <div class="cart_info text-end mt-4 me-3">
                                            <h4 href="#">تیشرت تابستانه</h4>
                                            <span class="#">قیمت: ۲۵۵ </span>
                                        </div>
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="cart_item bottom">
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                        <div class="cart_info text-end mt-4 me-3">
                                            <h4 href="#">کاپشن زمستونه</h4>
                                            <span>قیمت: ۸۹۰</span>
                                        </div>
                                        <div class="cart_img">
                                            <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                    <div class="cart__table">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">۱۵۰</td>
                                                    <td class="text-end">:جمع فرعی</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-left">۱۸۴</td>
                                                    <td class="text-end">:جمع</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="cart_button view_cart">
                                        <a href="cart.php">مشاهده سبد خرید</a>
                                    </div>
                                    <div class="cart_button checkout">
                                        <a href="checkout.php">وارسی</a>
                                    </div>
                                </div>
                                <!--mini cart end-->
                            </div>
                            <div class="middel_links">

                                <ul>
                                    <li><a href="login.php">ورود</a></li>
                                    <li>/</li>
                                    <li><a href="login.php">ثبت نام</a></li>
                                </ul>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 col-md-4">
                        <div class="search_bar text-end">
                            <form action="#">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>

                                <input class="text-end" placeholder="جستجو کنید" type="text">
                                <select class="select_option" name="select">
                                    <option selected value="1 ">دسته بندی ها</option>
                                    <option value="2" class=" text-end">تهجیزات جانبی</option>
                                    <option value="3">پل</option>
                                    <option value="4">هاب</option>
                                    <option value="5">تکرار کننده</option>
                                    <option value="6">تعویض</option>
                                    <option value="7">بازی های ویدیویی</option>
                                    <option value="8">پلی استیشن ۳</option>
                                    <option value="9">پلی استیشن ۴</option>
                                    <option value="10">ایکس باکس ۲</option>
                                    <option value="11">ایکس باکس ۱</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-8">
                        <div class="logon">
                            <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="header_static">
                            <div class="contact_phone">
                                <p>با پشتیبانی رایگان تماس بگیرید <a href="tel:01234567890">۰۹۱۲۱۲۳۳۲۴۵</a></p>
                            </div>
                            <div class="main_menu_inner">
                                <div class="main_menu">
                                    <nav>
                                        <ul>
                                            <li><a href="contact.php">با ما تماس بگیرید</a></li>

                                            <li><a href="about.php">درباره ما</a></li>

                                            <li><a href="blog.php">
                                                    <i class="fa fa-angle-down"></i>
                                                    وبلاگ
                                                    <ul class="sub_menu pages text-end">
                                                        <li><a href="blog-details.php">جزئیات وبلاگ</a></li>
                                                        <li><a href="blog-sidebar.php">نوار کناری وبلاگ</a></li>
                                                        <li><a href="blog-fullwidth.php">پهنای کامل وبلاگ</a></li>
                                                    </ul>
                                            </li>

                                            <li><a href="">
                                                    <i class="fa fa-angle-down"></i>
                                                    صفحات
                                                    <ul class="sub_menu pages text-end">
                                                        <li><a href="about.php">درباره ما</a></li>
                                                        <li><a href="services.php">خدمات</a></li>
                                                        <li><a href="faq.php">سوالات متداول</a></li>
                                                        <li><a href="login.php">وارد شدن</a></li>
                                                        <li><a href="my-account.php">حساب من</a></li>
                                                        <li><a href="wishlist.php">لیست علاقه مندیها</a></li>
                                                        <li><a href="404.php">خطای 404</a></li>
                                                        <li><a href="compare.php">مقایسه کنید</a></li>
                                                        <li><a href="privacy-policy.php">سیاست حفظ حریم خصوصی</a></li>
                                                        <li><a href="coming-soon.php">به زودی</a></li>
                                                    </ul>
                                            </li>

                                            <li class="mega_items"><a href="shop.php">
                                                    <i class="fa fa-angle-down"></i>
                                                    خرید کنید
                                                    <ul class="mega_menu text-end">
                                                        <li>
                                                            <a href="#">چیدمان فروشگاه</a>
                                                            <ul>
                                                                <li><a href="shop-fullwidth.php">تمام عرض</a></li>
                                                                <li><a href="shop-fullwidth-list.php">فهرست عرض کامل
                                                                    </a>
                                                                </li>
                                                                <li><a href="shop-right-sidebar.php">نوار کناری سمت
                                                                        راست</a>
                                                                </li>
                                                                <li><a href="shop-right-sidebar-list.php">
                                                                        لیست نوار کناری سمت راست
                                                                    </a></li>
                                                                <li><a href="shop-list.php">نمایش لیست</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">صفحات دیگر</a>
                                                            <ul>
                                                                <li><a href="portfolio.php">نمونه کار ها</a></li>
                                                                <li><a href="portfolio-details.php">
                                                                        جزئیات</a>
                                                                </li>
                                                                <li><a href="cart.php">سبد خرید</a></li>
                                                                <li><a href="checkout.php">وارسی</a></li>
                                                                <li><a href="my-account.php">حساب من</a></li>


                                                            </ul>
                                                        </li>
                                                        <li><a href="#">انواع محصول</a>
                                                            <ul>
                                                                <li><a href="product-details.php">جزئیات محصول</a>
                                                                </li>
                                                                <li><a href="product-sidebar.php">نوار کناری محصول</a>
                                                                </li>
                                                                <li><a href="product-gallery.php">گالری محصولات</a>
                                                                </li>
                                                                <li><a href="product-grouped.php">محصول گروه بندی
                                                                        شده</a>
                                                                </li>
                                                                <li><a href="variable-product.php">متغیر محصول</a>
                                                                </li>

                                                            </ul>
                                                        </li>
                                                        <li><a href="#">مجموعه</a>
                                                            <ul>
                                                                <li><a href="shop.php">کیف دستی</a></li>
                                                                <li><a href="shop.php">تجهیزات جانبی</a></li>
                                                                <li><a href="shop.php">تن پوش</a></li>
                                                                <li><a href="shop.php">کفش</a></li>
                                                                <li><a href="shop.php">شلوار را چک کنید</a></li>

                                                            </ul>
                                                        </li>
                                                        <li class="banner_menu"><a href="#">
                                                                <img src="assets/img/bg/banner1.jpg" alt=""></a></li>
                                                    </ul>
                                            </li>

                                            <li class="active"><a href="index.php">
                                                    <i class="fa fa-angle-down"></i>
                                                    صفحه اصلی
                                                    <ul class="sub_menu text-end">
                                                        <li><a href="index.php">۱ خانه</a></li>
                                                        <li><a href="index-2.php">۲ خانه</a></li>
                                                        <li><a href="index-3.php">۳ خانه</a></li>
                                                        <li><a href="index-4.php">۴ خانه</a></li>
                                                        <li><a href="index-5.php">۵ خانه</a></li>
                                                        <li><a href="index-6.php">۶ خانه</a></li>
                                                        <li><a href="index-7.php">۷ خانه</a></li>
                                                        <li><a href="index-8.php">۸ خانه</a></li>
                                                        <li><a href="index-9.php">۹ خانه</a></li>
                                                    </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>

    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area other_bread">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-end">
                        <ul>
                            <li><a href="index.php">خانه</a></li>
                            <li>/</li>
                            <li>ورود</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!-- customer login start -->
    <div class="customer_login">
        <div class="container">
            <div class="row">
                <!--register area start-->
                <div class="col-lg-6 col-md-6 text-end">
                    <div class="account_form">
                        <h2>ورود</h2>
                        <form action="#">
                            <p>
                                <label>نام کاربری یا پست الکترونیک<span>*</span></label>
                                <input type="text" name="user_name">
                            </p>
                            <p>
                                <label>رمزهای عبور <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <label for="remember">
                                    <button class="me-4" type="submit" name="login">وارد شدن</button>
                                    مرا به خاطر بسپار
                                    <input id="remember" type="checkbox">
                 
                                </label>
                                <a href="forgetpassword.php" >رمز عبور خود را فراموش کرده اید؟</a>

       
                            </div>

                        </form>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 text-end">
                    <div class="account_form register">
                        <h2>ثبت نام</h2>
                        <form action="#">
                            <p>
                                <label>آدرس ایمیل<span>*</span></label>
                                <input type="email" name="email">
                            </p>
                            <p>
                                <label>رمزهای عبور <span>*</span></label>
                                <input type="password" name="password">
                            </p>
                            <div class="login_submit">
                                <button type="submit" name="submit">ثبت نام</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php if ($hasError) : ?>
                <div class="col-6 mt-5" id="box" style="direction: rtl ; text-align: center ;">
                    <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger">
                        <p class="text-center"><?php echo $error; ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($msgError) :?>
                <div class="col-6 mt-5">
                    <div class="alert alert-danger">
                        <p><?php echo  $msg ;?></p>
                    </div>
                </div>
                <?php endif;?>
                <?php if ($msgSuccess) : ?>
                <div class="col-6 mt-5">
                    <div class="alert alert-success">
                        <p><?php echo  $msg ;?></p>
                    </div>
                </div>
                <?php endif; ?>

             

         
            </div>
        </div>
    </div>
    <footer class="footer_widgets">
        <div class="footer_top text-end">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                        <div class="widgets_container">
                            <h3>موارد اضافی</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="#">برندها</a></li>
                                    <li><a href="#">گواهی های هدیه</a></li>
                                    <li><a href="#">وابسته</a></li>
                                    <li><a href="#">ویژه</a></li>
                                    <li><a href="contact.php">نقشه سایت</a></li>
                                    <li><a href="my-account.php">حساب من</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                        <div class="widgets_container">
                            <h3>اطلاعات</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.php">درباره ما</a></li>
                                    <li><a href="#">اطلاعات تحویل</a></li>
                                    <li><a href="privacy-policy.php">سیاست حفظ حریم خصوصی</a></li>
                                    <li><a href="#">شرایط و ضوابط</a></li>
                                    <li><a href="contact.php">با ما تماس بگیرید</a></li>
                                    <li><a href="#">برمی گرداند</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widgets_container contact_us">
                            <h3>با ما تماس بگیرید</h3>
                            <div class="footer_contact">
                                <p>آدرس: آدرس شما اینجاست.</p>
                                <p>تلفن: <a href="tel:01234567890">۰۹۱۲۱۲۳۳۲۴۵</a> </p>
                                <p>ایمیل: demo@example.com</p>
                                <ul>
                                    <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" title="youtube"><i class="fa fa-youtube"></i></a></li>
                                </ul>

                            </div>
                        </div>
                    </div>
           
                    <div class="col-lg-5 col-md-6">
                        <div class="widgets_container newsletter">
                            <h3>اکنون به خبرنامه ما بپیوندید</h3>
                            <div class="newleter-content">
                                <p>کیفیت استثنایی. کارخانه های اخلاقی ثبت نام کنید تا از ارسال رایگان ایالات متحده و
                                    بازگشت در اولین سفارش خود لذت ببرید.</p>
                                <div class="subscribe_form">
                                    <form id="mc-form" class="mc-form footer-newsletter">
                                        <input class="text-end" id="mc-email" type="email" autocomplete="off"
                                            placeholder="آدرس ایمیل خود را اینجا وارد کنید..."/>
                                        <button id="mc-submit">اشتراک در !</button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                    </div><!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_custom_links">
                            <ul>
                                <li><a href="#">تاریخچه سفارش ها</a></li>
                                <li><a href="wishlist.php">لیست علاقه مندیها</a></li>
                                <li><a href="#">خبرنامه</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>تمامی حقوق برای این قالب محفوظ است</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
        
    </footer>
    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



</body>


<!-- Mirrored from template.hasthemes.com/reid/reid/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 09:10:43 GMT -->

</html>