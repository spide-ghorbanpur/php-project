<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>پوشاک Reid</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- CSS ========================= -->
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<?php require_once "connection/include.php"?>
<?php

function findUserByEmail($email , $activationKey){
    global $connection, $table_name ;
    $email = sanitize($email);
    $activationKey = sanitize($activationKey);
    $sql = "SELECT `email` , `activationKey` FROM `$table_name` WHERE `email` = ? AND `activationKey` = ? " ;
    $result = $connection->prepare($sql);
    $result->bindValue(1,$email);
    $result->bindValue(2,$activationKey);
    $result->execute();
    if ($result->rowCount()){
        return $result;
    }
        return false;
}

function isEmailExist($email){
    global $connection , $table_name ;
    echo "hello";
    $email = sanitize($email);
    $sql = "SELECT `email` FROM  $table_name WHERE `email` = ? ";
    var_dump($sql);
    $result = $connection->prepare($sql);
    $result->bindValue(1 , $email);
    $result->execute();
    if ($result->rowCount()){
        return $result;
    }
    else{
        return false;
    }

}
function sendMail($current_user_email , $mail_subject , $mail_body){
    require_once "phpmailer/class.phpmailer.php";
    $Mail = new PHPMailer(true);
    try {
        $Mail->IsSMTP();
        $Mail->SMTPDebug = 2;
        $Mail->Host = "smtp.gmail.com";
        $Mail->SMTPAuth = true;
        $Mail->Username = "s.p.ghoorbon@gmail.com";
        $Mail->Password = "afsf pzxu viaf nnwh";
        $Mail->SMTPSecure = "ssl";
        $Mail->Port = "465";
        $Mail->IsHTML(true);
        $Mail->Subject= $mail_subject;
        $Mail->Body = $mail_body;
        $Mail->CharSet = "utf_8";
        $Mail->FromName = "از طرف سپیکو";
        $Mail->ContentType = "text/html;charset=utf-8";
        $Mail->AddAddress($current_user_email , "CUE");
        $Mail->AltBody = "";
        $Mail->Send();
        echo "<div class='alert alert-success'> ایمیل با موفقیت ارسال شد</div>";

    }
    catch (Exception $error){
        echo "ایمیل ارسال نشد" . $Mail->ErrorInfo;
    }
    $Mail->SmtpClose();
    return $Mail ;
}

function changePassword($password){
    global $connection , $table_login;
    $password = sanitize($password);
    $sql = "UPDATE `$table_login` SET `password` = ? WHERE `password` = ?";
    //var_dump($sql);
    $result = $connection->prepare($sql);
    $result->bindValue(1, $password);
    $result->execute();
    return $result;
}
//Run
$findEmail = null;
$hasError = false;
$errors = array();
if (isset($_GET["reset"])){
    if (!empty($_GET["email"]) and filter_var($_GET["email"] , FILTER_VALIDATE_EMAIL)){
        $current_time = microtime(true);
        $token = str_replace("." , " " , $current_time);
        $newToken = $_GET["email"] . $token;
        $activationKey = sha1($newToken);

        $findEmail = findUserByEmail($_GET["email"] , $activationKey);

        $mail_subject = "فعالسازی حساب کاربری";
        $mail_body = '
        <section style="width: 40% ; padding: 50px 50px ; background-color: #2c3034 ; margin: auto ; text-align: center ; line-height: 50px ; font-family: Calibri">
        <h1 style="font-family: Calibri ; text-align: center ; font-size: 30px ; color: #ff8a35 ;  ">این ایمیل حاوی لینک فعالسازی میباشد
             </h1>
            <a href="http://127.0.0.1/project/Reid__7_/changepassword.php?activationkey='.$activationKey.' " 
            style="color: #b6effb ; text-align: center ; font-size: 20px;">برای فعالسازی حساب کاربری کلیک کنید</a>
            <p style=" text-align: center ; color: #F3F3F3">
            در صورت ارسال اشتباه ایمیل آنرا نادیده بگیرد
            </p>
           </section>';
        if ($findEmail){
            echo "لینک به ایمیل شما ارسال شد";
            sendMail($_GET["email"] , $mail_subject , $mail_body);

        }
        else {
           echo "ایمیل شما معتبر نیست";
        }
    }





    else{
        if (empty($_GET["email"])){
            $hasError = true;
            $errors[] = "ایمیل نمیتواند خالی باشد";
        }
        elseif (!filter_var($_GET["email"] , FILTER_VALIDATE_EMAIL)){
            $hasError= true;
            $errors [] = "فرمت ایمیل درست نمیباشد";
        }


    }
}
$resetPassword = null;
if (isset($_GET["reset"])){
    if (!empty($_GET["password"]) and strlen($_GET["password"]) < 8){
        $resetPassword = changePassword($_GET["password"]);
        if ($resetPassword){
            echo "اطلاعات با موفقیت ثبت شد";
            header("location : index.php");
        }
        else {
            echo "رمز عبور معتبر نمیباشد";
        }


    }
}

?>
<body>

<div class="container-fluid" >
    <div class="row align-items-center" id="c-pannel" style=" display: flex ; justify-content: center ;  text-align: center ;  padding: 190px 190px ;  ">
        <div class="col-lg-6 col-md-5 offset-md-6 offset-lg-0 " >
            <div class="card text-center" style="width: 500px">
                <div class="card-header h5 text-white " style="background-color: #ff6a28 ">Password Reset</div>
                <div class="card-body px-5">
                    <p class="card-text py-4">
                        Enter your email address to reset your password.
                    </p>
                    <div class="form-outline">
                        <input type="email" id="typeEmail" class="form-control my-4" name="email" />
                        <label class="form-label" for="typeEmail"></label>
                    </div>
                    <button type="reset" name="reset" class="btn  w-100" style="background-color: #ff6a28" data-reset="true"  >Reset password </button>
                    <div class="d-flex justify-content-between mt-5">
                        <a class="" href="#">Login</a>
                        <a class="" href="#">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" id="f-pannel" style="margin: auto ; padding: 50px 50px ; line-height: 30px">
        <form class="usa-form" >
            <legend class="usa-legend usa-legend--large">Reset password</legend>
            <fieldset class="usa-fieldset">
                <legend style="color: #ff8a35">Please enter your new password</legend>
                <div class="usa-alert usa-alert--info usa-alert--validation">
                    <div class="usa-alert__body">
                    </div>
                </div>
                <label class="usa-label" for="password-reset">New password</label>
                <input
                        class="usa-input"
                        id="password-reset"
                        name="password"
                        type="password"
                />
                <label class="usa-label" for="confirmPassword">Confirm password</label>
                <input
                        class="usa-input"
                        id="confirmPassword"
                        name="confirmPassword"
                        type="password"

                />
                <button
                        title="toggle password"
                        type="button"
                        class="usa-show-password"
                        aria-controls="password-reset confirmPassword"
                        data-show-text="Show my typing"
                        data-hide-text="Hide my typing"
                        data-submit="submit"
                        style="color: #ff8a35"
                >
                    Show my typing
                </button>
                <input class="usa-button" type="submit" value="Reset password" style="color: #ff8a35"  />
            </fieldset>
        </form>
    </div>
</div>



</body>
<script src="assets/js/plugins.js"></script>
</html>
