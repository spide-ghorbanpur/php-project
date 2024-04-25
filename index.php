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
?>
<body>
<!-- Mirrored from template.hasthemes.com/reid/reid/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 09:01:06 GMT -->

<!--Offcanvas menu area start-->
<!--header area start-->
<?php require_once "connection/categories.php" ; ?>
    <!--header area end-->

<!--slider area start-->
<div class="slider_area slider_style owl-carousel">
    <?php if ($posts = getPostsById(1)) {
    foreach ($posts as $post) :?>
    <div class="single_slider" data-bgimg="assets/img/slider/slidehph.jpg">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_contentu content_one">
                                <h1><?php echo $post["title"] ; ?></h1>
                                <h5 class="textslider1 mt-4"><?php echo $post["content"] ; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; } ?>
    <div class="single_slider" data-bgimg="assets/img/slider/slope.jpg">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_contentu content_one">
                        <?php if ($posts = getPostsById(1)) {
                            foreach ($posts as $post) :?>
                                <h1><?php echo $post["title"] ; ?></h1>
                                <h5 class="textslider1 mt-4"><?php echo $post["content"] ; ?></h5>
                            <?php endforeach; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single_slider" data-bgimg="assets/img/slider/slide3.png">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="slider_content content_three">
                        <?php if ($posts = getPostsById(1)) {
                            foreach ($posts as $post) :?>
                                <h1 class="gota"><?php echo $post["title"] ; ?></h1>
                                <p class="mt-1"><?php echo $post["content"] ; ?>  </p>
                            <?php endforeach; } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--slider area end-->

<!--product section area start-->
<section class="product_section womens_product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="section_title">
                    <?php if ($posts = getPostsById(2)) {
                        foreach ($posts as $post) : ?>
                            <h2><?php echo $post["title"] ; ?></h2>
                            <h4><?php echo $post["content"] ; ?></h4>
                        <?php endforeach; } ?>
                </div>
                <div class="product_area">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <?php if ($posts  = getPostsByParentId(2) ){
                                foreach ($posts as $post) :?>
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#clothing" role="tab"
                                           aria-controls="clothing" aria-selected="true"> <?php echo $post["title"];?></a>
                                    </li>
                                <?php endforeach; } ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="handbag" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="shoes" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accessories" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                                <li><a href="compare.php" title="مقایسه محصول"><i
                                                                                class="fa fa-sliders"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-12">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a href="shop.php"><img src="assets/img/bg/banner2.jpg" alt="#"></a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!--product section area end-->

<!--banner area start-->
<section class="banner_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-end">
                <div class="banner_conteiner">
                    <div class="banner_text">
                        <?php if ($posts = getPostsById(3)) {
                            foreach ($posts as $post) : ?>
                                <h1 class="p-5"><?php echo $post["title"] ; ?><br> <?php echo $post["content"] ;?></h1>
                            <?php endforeach; } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--product section area start-->
<section class="product_section mens_product">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="banner_area">
                    <div class="banner_thumb">
                        <a href="shop.php"><img src="assets/img/bg/banner4.jpg" alt="#"></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="section_title">
                    <?php if ($posts = getPostsById(4)) {
                        foreach ($posts as $post) : ?>
                            <h2><?php echo $post["title"] ; ?></h2>
                            <h4><?php echo $post["content"] ; ?></h4>
                        <?php endforeach; } ?>
                </div>
                <div class="product_area">
                    <div class="product_tab_button">
                        <ul class="nav" role="tablist">
                            <?php if ($posts  = getPostsByParentId(4) ){
                                foreach ($posts as $post) :?>
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#clothing" role="tab"
                                           aria-controls="clothing" aria-selected="true"> <?php echo $post["title"];?></a>
                                    </li>
                                <?php endforeach; } ?>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale text-end">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul class="text-left">

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="handbag" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="shoes" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accessories" role="tabpanel">
                            <div class="product_container">
                                <div class="row product_column3">
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product1.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product2.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product4.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product3.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product6.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product5.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product7.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product8.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product9.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product10.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product11.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product13.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product14.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product15.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product16.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product18.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product17.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>
                                                <div class="label_product text-end">
                                                    <span>جدید</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="single_product">
                                            <div class="product_thumb">
                                                <a class="primary_img" href="product-details.php"><img
                                                            src="assets/img/product/product19.jpg" alt=""></a>
                                                <a class="secondary_img" href="product-details.php"><img
                                                            src="assets/img/product/product20.jpg" alt=""></a>
                                                <div class="product_action">
                                                    <div class="hover_action">
                                                        <a href="#"><i class="fa fa-plus"></i></a>
                                                        <div class="action_button">
                                                            <ul>

                                                                <li><a title="اضافه به سبد خرید" href="cart.php"><i
                                                                                class="fa fa-shopping-basket"
                                                                                aria-hidden="true"></i></a></li>
                                                                <li><a href="wishlist.php"
                                                                       title="اضافه به علاقه مندی"><i
                                                                                class="fa fa-heart-o"
                                                                                aria-hidden="true"></i></a></li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="quick_button">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                                       title="نمایش سریع">+ نمایش سریع</a>
                                                </div>

                                                <div class="product_sale">
                                                    <span>-۷%</span>
                                                </div>
                                            </div>
                                            <div class="product_content text-end">
                                                <h3><a href="product-details.php">بلوتوث قابل حمل مارشال</a>
                                                </h3>
                                                <span class="current_price">۶۰٬۰۰۰</span>
                                                <span class="old_price">۸۰٬۰۰۰</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <?php if ($posts = getPostsById(5)) {
                        foreach ($posts as $post) : ?>
                            <h2><?php echo $post["title"] ; ?> </h2>
                            <p><?php echo $post["content"] ; ?></p>
                        <?php endforeach; } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog_wrapper blog_column3 owl-carousel">
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.php"><img src="assets/img/blog/blog1.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.php"></a>
                            </div>
                        </div>
                        <div class="blog_content text-end">
                            <?php if ($posts = getPostsById(16)) {
                                foreach ($posts as $post) : ?>
                                    <h3><a href="blog-details.php"><?php echo $post["title"] ; ?> </a></h3>
                                    <div class="author_name">
                                        <p>
                                            <span class="post_by">توسط</span>
                                            <span class="themes">تم های تجارت الکترونیک</span>
                                            ۷ مرداد ۱۴۰۲
                                        </p>

                                    </div>
                                    <div class="post_desc">
                                        <p><?php echo $post["content"] ; ?>
                                        </p>
                                    </div>
                                <?php endforeach; } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.php"><img src="assets/img/blog/blog2.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.php"></a>
                            </div>
                        </div>
                        <div class="blog_content text-end">
                            <?php if ($posts = getPostsById(17)) {
                                foreach ($posts as $post) : ?>
                                    <h3><a href="blog-details.php"><?php echo $post["title"] ; ?> </a>
                                    </h3>
                                    <div class="author_name">
                                        <p>
                                            <span class="post_by">توسط</span>
                                            <span class="themes">تم های تجارت الکترونیک</span>
                                            ۷ مرداد ۱۴۰۲
                                        </p>

                                    </div>
                                    <div class="post_desc">
                                        <p><?php echo $post["content"] ; ?>
                                        </p>
                                    </div>
                                <?php endforeach; } ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single_blog">
                        <div class="blog_thumb">
                            <a href="blog-details.php"><img src="assets/img/blog/blog3.jpg" alt=""></a>
                            <div class="blog_icon">
                                <a href="blog-details.php"></a>
                            </div>
                        </div>
                        <div class="blog_content text-end">
                            <?php if ($posts = getPostsById(15)) {
                                foreach ($posts as $post) : ?>
                                    <h3><a href="blog-details.php"><?php echo $post["title"] ; ?></a></h3>
                                    <div class="author_name">
                                        <p>
                                            <span class="post_by">توسط</span>
                                            <span class="themes">تم های تجارت الکترونیک</span>
                                            ۷ مرداد ۱۴۰۲
                                        </p>

                                    </div>
                                    <div class="post_desc">
                                        <p><?php echo $post["content"] ; ?></p>
                                    </div>
                                <?php endforeach; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--blog section area end-->

<!--Instagram area start-->
<section class="instagram_area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <?php if ($posts = getPostsById(6)) {
                        foreach ($posts as $post) : ?>
                            <h2><?php echo $post["title"] ;?></h2>
                            <p><?php echo $post["content"] ;?></p>
                        <?php endforeach; } ?>
                </div>
            </div>
        </div>
        <div class="instagram_home_block">
            <div class="row">
                <div class="instagram_wrapper instagram_column5 owl-carousel">
                    <div class="col-lg-3">
                        <div class="single_instagram">
                            <a href="#"><img src="assets/img/about/intagram.png" alt=""></a>
                            <div class="instagram_icone">
                                <a class="instagram_pupop" href="assets/img/about/intagram.png"><i
                                            class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_instagram">
                            <a href="#"><img src="assets/img/about/intagram1.png" alt=""></a>
                            <div class="instagram_icone">
                                <a class="instagram_pupop" href="assets/img/about/intagram1.png"><i
                                            class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_instagram">
                            <a href="#"><img src="assets/img/about/intagram2.png" alt=""></a>
                            <div class="instagram_icone">
                                <a class="instagram_pupop" href="assets/img/about/intagram2.png"><i
                                            class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_instagram">
                            <a href="#"><img src="assets/img/about/intagram3(1).png" alt=""></a>
                            <div class="instagram_icone">
                                <a class="instagram_pupop" href="assets/img/about/intagram3(1).png"><i
                                            class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_instagram">
                            <a href="#"><img src="assets/img/about/intagram4(1).png" alt=""></a>
                            <div class="instagram_icone">
                                <a class="instagram_pupop" href="assets/img/about/intagram4(1).png"><i
                                            class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single_instagram">
                            <a href="#"><img src="assets/img/about/intagram1.png" alt=""></a>
                            <div class="instagram_icone">
                                <a class="instagram_pupop" href="assets/img/about/intagram1.png"><i
                                            class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text_follow">
                        <a href="#">#ما را در اینستاگرام دنبال کنید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- modal area start-->
 <?php require_once "connection/footer.php"  ; ?>
    <!-- modal area start-->
    <!-- JS
============================================ -->
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

</body>

<!-- Mirrored from template.hasthemes.com/reid/reid/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 09:04:55 GMT -->

</html>