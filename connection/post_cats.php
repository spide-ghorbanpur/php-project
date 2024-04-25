<?php
require_once "include.php";

function getAllByPostId($post_id){
    global $connection , $table_Bond ;
    $sql = "SELECT * FROM `$table_Bond` WHERE `post_id` = $post_id " ;
    $result = $connection->query($sql);
    if ($result->rowCount()){
        $bonds = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $bonds [] = $row ;
        }
        return $bonds ;

    }
    else return false ;

}

//RUN
//$bonds = getAllByPostId(2);
//var_dump($bonds);