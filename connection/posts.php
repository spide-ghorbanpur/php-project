<?php
require_once "include.php";

function getAllPosts(){
    global $connection , $table_post;
    $sql = "SELECT * FROM `$table_post` " ;
    $result = $connection->query($sql);
    if (($result->rowCount()) > 0){
        $posts = array();
        while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)){
            foreach ($rows as $row){
                $posts [] = $row ;
            }
        }
        return $posts ;
    }
    else return  false;
}
function getPostsById($id){
    global $connection , $table_post ;
    $sql = "SELECT * FROM `$table_post` WHERE `id` = $id ";
    $result = $connection->query($sql);
    if (($result->rowCount()) > 0){
        $posts = array();
        while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)){
            foreach ($rows as $row){
                $post = array(
                    "title" => $row["title"] ,
                    "content" => $row["content"],
                    "post_type" => $row["post_type"],
                    "published" => $row["published"],
                    "allow_comments" => $row["allow_comments"],
                    "creation_time" => $row["creation_time"] ,
                    "last_modify" => $row["last_modify"],
                    "parent_id" => $row["parent_id"],
                    "link" => $row["link"]
                );
                $posts[] = $post ;
            }
        }
        return $posts ;
    }
    else return  false;
}
function getPostsByParentId($parent_id){
    global $connection , $table_post ;
    $sql = "SELECT * FROM `$table_post` WHERE `parent_id` = $parent_id ORDER BY `id`";
    $result = $connection->query($sql);
    if ($result->rowCount()){
        $posts =array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC) ;
        foreach ($rows as $row){
            $post = array(
                "id" => $row["id"],
                "title" => $row["title"] ,
                "content" => $row["content"],
                "post_type" => $row["post_type"],
                "published" => $row["published"],
                "allow_comments" => $row["allow_comments"],
                "creation_time" => $row["creation_time"] ,
                "last_modify" => $row["last_modify"],
            );
            $posts [] = $post ;
        }
        return $posts  ;
    }
    else return  false ;
}



//RUN
//$posts = getAllPosts();
//var_dump($posts);
//
//$posts = getPostsById(1);
//var_dump($posts);
//
//$posts  = getPostsByParentId(2);
//var_dump($posts);
