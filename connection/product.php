<?php
require_once "include.php";

function getAllProduct(){
    global $connection , $table_product ;
    $sql = "SELECT * FROM `$table_product` ORDER BY `id` ";
    $result = $connection->query($sql);
    $result->execute();
    if (($result->rowCount()) ) {
        $products = array();
        while ($rows = $result->fetchAll(PDO::FETCH_ASSOC)) {
            foreach ($rows as $row) {
                $products [] = $row;
            }
        }
        return $products;
    }
    else {
        return false;
    }
}

function getProductById($id){
    global $connection , $table_product ;
    $sql = "SELECT * FROM `$table_product` WHERE `id` = $id ";
    $result = $connection->query($sql);
    if ($result->rowCount()){
        $products = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $product = array(
                "title" => $row["title"] ,
                "brand" => $row["brand"] ,
                "price" => $row["price"] ,
                "content" => $row["content"] ,
                "cat_name" => $row["cat_name"],
                "links" => $row["links"] ,
                "bond_id" => $row["bond_id"]
            );
            $products [] = $product;
        }
        return $products ;
    }
    else return false ;
}


//RUN
//$products = getAllProduct();
//var_dump($products);

//$products = getProductById(1);
//var_dump($products);