<?php
require_once "include.php";

function getCategories( ){
    global $connection , $table_cat ;
    $sql = "SELECT * FROM `$table_cat` ORDER BY `id` " ;
    $result = $connection->query($sql);
    $result->execute();
    if (($result->rowCount() ) ){
        $categories = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $categories [] = $row;

        }
        return $categories;
    }
    else {
        return false;

    }
}
function getCategoriByParentId($parent_id){
    global $connection , $table_cat ;
    $sql = "SELECT * FROM `$table_cat` WHERE `parent_id` = $parent_id  ORDER BY `id` ASC" ;
    $result = $connection->query($sql);
    if ($result->rowCount()) {
        $cats = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $cat = array(
                "id" => $row["id"] ,
                "categori_name" => $row["categori_name"]
            );
            $cats[] = $cat;
        }
        return $cats;
    }
    else{
        return  false ;
    }

}
function  getAllPartsByParentId($parent_id){
    global $connection , $table_parts ;
    $sql = "SELECT * FROM `$table_parts` WHERE `parent_id` = $parent_id ORDER BY `id` ";
    $result = $connection->query($sql);
    if ($result->rowCount()){
        $parts = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $part = array(
                "id" => $row["id"],
                "name_parts" => $row["name_parts"]
            );
            $parts[] = $part ;
        }
        return $parts;
    }
    else{
        return false ;
    }

}
?>
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
                    <div class="search_bar text-end">
                        <form action="#">
                            <select class="select_option text-end" name="select">
                                <?php if ($parts = getAllPartsByParentId(0)) {
                                    foreach ($parts as $part) : ?>
                                        <option selected value="<?php echo $part["id"]?>"><?php echo $part["name_parts"]?></option>
                                        <?php if ($childparts = getAllPartsByParentId($part["id"])){
                                            foreach ($childparts as $childpart) : ?>
                                                <option value="<?php echo $childpart["id"]?> "><?php echo $childpart["name_parts"]?></option>
                                            <?php endforeach; } ?>

                                    <?php endforeach; } ?>
                            </select>
                            <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            <input class="text-end" placeholder="جستجو کنید" type="text">
                        </form>
                    </div>
                    <div class="cart_area">
                        <div class="cart_link">
                            <a href="#"><i class="fa fa-shopping-basket"></i>2 مورد</a>
                            <!--mini cart-->
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
                            <?php if ($cats = getCategoriByParentId(0)) {
                                foreach ($cats as $cat) : ?>
                                    <li class="active"><a href="./?cat=<?php echo $cat["id"] ?> ">
                                            <i class="fa fa-angle-down"></i>
                                            <?php echo $cat["categori_name"] ?>
                                            <ul class="sub_menu text-end">
                                                <?php if ($childCats = getCategoriByParentId($cat["id"])){
                                                    foreach ($childCats as $childCat) : ?>
                                                        <li><a href="./?cat=<?php echo $childCat["id"]?>  "><?php echo $childCat["categori_name"]?></a></li>
                                                    <?php endforeach; } ?>

                                            </ul>
                                    </li>
                                <?php endforeach; } ?>
                            <li class="menu-item-has-children text-end">
                                <a href="my-account.php">حساب من</a>
                            </li>
                            <?php if ($posts = getPostsById(18)) {
                                foreach ($posts as $post) : ?>
                            <li class="menu-item-has-children text-end">
                                <a href="<?php echo $post["link"]; ?>"><?php echo $post["title"]; ?></a>
                            </li>
                            <?php endforeach; } ?>
                            <?php if ($posts = getPostsById(19)) {
                                foreach ($posts as $post) : ?>
                                    <li class="menu-item-has-children text-end">
                                        <a href="<?php echo $post["link"]; ?>"><?php echo $post["title"]; ?></a>
                                    </li>
                                <?php endforeach; } ?>
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
                                <?php if ($parts = getAllPartsByParentId(0)) {
                                    foreach ($parts as $part) : ?>
                                <option selected value="<?php echo $part["id"]?>"><?php echo $part["name_parts"]?></option>
                                    <?php if ($childparts = getAllPartsByParentId($part["id"])){
                                        foreach ($childparts as $childpart) : ?>
                                            <option value="<?php echo $childpart["id"]?> "><?php echo $childpart["name_parts"]?></option>
                                    <?php endforeach; } ?>

                                <?php endforeach; } ?>
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
    <!--header bottom satrt-->
    <div class="header_bottom sticky-header ">
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


                                        <?php if ($cats = getCategoriByParentId(0)) {
                                            foreach ($cats as $cat) : ?>
                                        <li class="active"><a href="./?cat=<?php echo $cat["id"] ?> ">
                                                <i class="fa fa-angle-down"></i>
                                                <?php echo $cat["categori_name"] ?>
                                                <ul class="sub_menu text-end">
                                                    <?php if ($childCats = getCategoriByParentId($cat["id"])){
                                                        foreach ($childCats as $childCat) : ?>
                                                            <li><a href="./?cat=<?php echo $childCat["id"]?>  "><?php echo $childCat["categori_name"]?></a></li>
                                                        <?php endforeach; } ?>

                                                </ul>
                                        </li>
                                        <?php endforeach; } ?>

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
    <!--header area end-->








<!--//Run-->
<!--$categories = getCategories();-->
<!--var_dump($categories);-->
<!---->
<!---->
<!--$cats = getCategoriByParentId(1);-->
<!--var_dump($cats);-->
<!---->
<!--$parts = getAllPartsByParentId(0);-->
<!--var_dump($parts);-->

