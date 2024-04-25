<?php
require_once "include.php";


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

