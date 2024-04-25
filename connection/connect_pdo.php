<?php
$Host = "localhost";
$dataBase = "project_cms";
$userName = "root";
$password = "";
$setNames = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

$table_name = "users";
$table_foot = "footer";
$table_login = "login";
$table_cat = "categories";
$table_parts = "all_parts";
$table_comment = "comments";
$table_product = "product" ;
$table_post = "posts" ;
$table_Bond = "post_cats" ;
$table_logout = "logout";


try {
    $connection = new PDO("mysql:host=$Host;dbname=$dataBase;" ,$userName ,$password ,$setNames);
    echo "<div class ='alert alert-success'> موفقیت امیز </div>";
}
catch (PDOException $error){
    echo "<div class='alert alert-danger'>  خطا در اتصال به پایگاه داده ".$error->getMessage()." </div>";
}
