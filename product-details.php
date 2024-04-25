<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/reid/reid/product-details.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 09:06:31 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Reid - جزئیات محصول</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS 
    ========================= -->


    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/css/plugins.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <?php require_once "connection/include.php"?>

</head>
<?php
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
?>

<body>

    <!--Offcanvas menu area start-->

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
                                                <li><a href="product-details.html">جزئیات محصول</a></li>
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
                                                                <li><a href="product-details.html">جزئیات محصول</a>
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
    <div class="breadcrumbs_area product_bread text-end">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">خانه</a></li>
                            <li>/</li>
                            <li>جزئیات محصول</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="product-details-tab">
 
                         <div id="img-1" class="zoomWrapper single-zoom">
                             <a href="#">
                                 <img id="zoom1" src="assets/img/product/product5.jpg" data-zoom-image="assets/img/product/product5.jpg" alt="big-1">
                             </a>
                         </div>
 
                         <div class="single-zoom-thumb">
                             <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                 <li>
                                     <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product4.jpg" data-zoom-image="assets/img/product/product4.jpg">
                                         <img src="assets/img/s-product/product3.jpg" alt="zo-th-1"/>
                                     </a>
 
                                 </li>
                                 <li >
                                     <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product6.jpg" data-zoom-image="assets/img/product/product6.jpg">
                                         <img src="assets/img/s-product/product.jpg" alt="zo-th-1"/>
                                     </a>
 
                                 </li>
                                 <li >
                                     <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product8.jpg" data-zoom-image="assets/img/product/product8.jpg">
                                         <img src="assets/img/s-product/product2.jpg" alt="zo-th-1"/>
                                     </a>
 
                                 </li>
                                 <li >
                                     <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product2.jpg" data-zoom-image="assets/img/product/product2.jpg">
                                         <img src="assets/img/s-product/product4.jpg" alt="zo-th-1"/>
                                     </a>
 
                                 </li>
                             </ul>
                         </div>
                     </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="product_d_right">
                        <form action="#">
                            <?php if ($products = getProductById(1)) {
                                foreach ($products as $product) : ?>
                            <h1 class="text-end"><?php echo $product["title"] ; ?></h1>
                            <div class=" product_ratting">
                                <ul class="text-end">
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> 1 بررسی </a></li>
                                    <li class="review"><a href="#"> یک بررسی بنویسید </a></li>
                                </ul>
                            </div>
                            <div class="product_price text-end">
                                <span class="current_price"><?php echo $product["price"] ; ?></span>
                            </div>
                            <div class="product_desc text-end">
                                <p><?php echo $product["content"] ; ?></p>
                            </div>
                                <?php endforeach; } ?>

                            <div class="product_variant size">
                                <h3>رنگ</h3>

                                <select class="niceselect_option" id="color1" name="produc_color">
                                    <option selected value="1">رنگ</option>
                                    <option value="2">زرشکی</option>
                                    <option value="2"> آبی</option>
                                    <option value="3">سبز</option>
                                </select>
                            </div>
                            <div class="product_variant size">
                                <h3>سایز</h3>

                                <select class="niceselect_option" id="color1" name="produc_color">
                                    <option selected value="1">سایز</option>
                                    <option value="2">ایکس</option>
                                    <option value="2">ایکس لارج</option>
                                    <option value="3">مدیوم</option>
                                </select>
                            </div>
                            <div class="product_variant size quantity mb-4">
                                <h3>تعداد</h3>
                                <input min="1" max="100" value="1" type="number">
                                <button class="button text-end" type="submit">به سبد خرید اضافه کنید</button>
                            </div>


                            <div class=" product_d_action text-end">
                                <ul>
                                    <li><a href="#" title="اضافه به علاقه مندی"> <i class="fa fa-heart-o"
                                                aria-hidden="true"></i>به لیست آرزوها اضافه کنید</a></li>
                                    <li><a href="#" title="مقایسه محصول"><i class="fa fa-sliders"
                                                aria-hidden="true"></i></i>این محصول را مقایسه کنید</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
           
            </div>
        </div>
    </div>
    <!--product details end-->

    <!--product info start-->
    <div class="product_d_info text-end">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button text-end">
                            <ul class="nav" role="tablist content-right">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">اطلاعات بیشتر</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">برگه داده</a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                        aria-selected="false">بررسی ها</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>مد از سال 2010 مجموعه‌هایی با طراحی خوب ایجاد کرده است. این برند طرح‌های زنانه
                                        ارائه می‌دهد که لباس‌های مجزا و شیک ارائه می‌کنند که از آن زمان به یک مجموعه
                                        کاملاً آماده تبدیل شده‌اند که در آن هر کالا بخشی حیاتی از کمد لباس زنان است.
                                        نتیجه؟ ظاهری زیبا، آسان، شیک با ظرافت جوان پسند و استایل امضایی غیرقابل انکار.
                                        تمام قطعات زیبا در ایتالیا ساخته شده و با بیشترین توجه ساخته شده است. اکنون مد
                                        به طیف وسیعی از لوازم جانبی از جمله کفش، کلاه، کمربند و موارد دیگر گسترش یافته
                                        است!</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">ترکیبات</td>
                                                    <td>پلی استر</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">سبک ها</td>
                                                    <td>دخترانه</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">خواص</td>
                                                    <td>لباس کوتاه</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>مد از سال 2010 مجموعه‌هایی با طراحی خوب ایجاد کرده است. این برند طرح‌های زنانه
                                        ارائه می‌دهد که لباس‌های مجزا و شیک ارائه می‌کنند که از آن زمان به یک مجموعه
                                        کاملاً آماده تبدیل شده‌اند که در آن هر کالا بخشی حیاتی از کمد لباس زنان است.
                                        نتیجه؟ ظاهری زیبا، آسان، شیک با ظرافت جوان پسند و استایل امضایی غیرقابل انکار.
                                        تمام قطعات زیبا در ایتالیا ساخته شده و با بیشترین توجه ساخته شده است. اکنون مد
                                        به طیف وسیعی از لوازم جانبی از جمله کفش، کلاه، کمربند و موارد دیگر گسترش یافته
                                        است!</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="product_info_content">
                                    <p>مد از سال 2010 مجموعه‌هایی با طراحی خوب ایجاد کرده است. این برند طرح‌های زنانه
                                        ارائه می‌دهد که لباس‌های مجزا و شیک ارائه می‌کنند که از آن زمان به یک مجموعه
                                        کاملاً آماده تبدیل شده‌اند که در آن هر کالا بخشی حیاتی از کمد لباس زنان است.
                                        نتیجه؟ ظاهری زیبا، آسان، شیک با ظرافت جوان پسند و استایل امضایی غیرقابل انکار.
                                        تمام قطعات زیبا در ایتالیا ساخته شده و با بیشترین توجه ساخته شده است. اکنون مد
                                        به طیف وسیعی از لوازم جانبی از جمله کفش، کلاه، کمربند و موارد دیگر گسترش یافته
                                        است!</p>
                                </div>
                                <div class="product_info_inner">
                                    <div class="product_ratting">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                        <strong>پست‌ها</strong>
                                        <p>09/07/2022</p>
                                    </div>
                                    <div class="product_demo me-4">
                                        <strong>نسخه ی نمایشی</strong>
                                        <p>اشکالی ندارد!</p>
                                    </div>
                                </div>
                                <div class="product_review_form">
                                    <form action="#">
                                        <h2>یک بررسی اضافه کنید</h2>
                                        <p>آدرس ایمیل شما منتشر نخواهد شد. فیلدهای الزامی مشخص شده اند</p>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="review_comment">بررسی شما</label>
                                                <textarea name="comment" id="review_comment"></textarea>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="author">نام</label>
                                                <input id="author" type="text">

                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <label for="email">ایمیل</label>
                                                <input id="email" type="text">
                                            </div>
                                        </div>
                                        <button type="submit">ارسال</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>محصولات مرتبط</h2>
                        <p>طرح های معاصر، مینیمال و مدرن، دستخط آلیس را مجسم می کند</p>
                    </div>
                </div>
            </div>
            <div class="product_area mt-4">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product21.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product22.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                    <span class="old_price">۹۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product27.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product28.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product6.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product5.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product7.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product8.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                    <span class="old_price">۹۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product24.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product25.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="quick_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                            title="نمایش سریع">+ نمایش سریع</a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product10.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product11.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product23.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product24.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="quick_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                            title="نمایش سریع">+ نمایش سریع</a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--product section area start-->
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>فروش محصولات</h2>
                        <p>طرح های معاصر، مینیمال و مدرن، دستخط آلیس را مجسم می کند</p>
                    </div>
                </div>
            </div>
            <div class="product_area mt-4">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product21.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product22.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                    <span class="old_price">۹۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product27.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product28.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product6.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product5.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product7.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product8.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                    <span class="old_price">۹۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product24.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product25.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="quick_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                            title="نمایش سریع">+ نمایش سریع</a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product10.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product11.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

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
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <div class="single_product">
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img
                                            src="assets/img/product/product23.jpg" alt=""></a>
                                    <a class="secondary_img" href="product-details.html"><img
                                            src="assets/img/product/product24.jpg" alt=""></a>
                                    <div class="product_action">
                                        <div class="hover_action">
                                            <a href="#"><i class="fa fa-plus"></i></a>
                                            <div class="action_button">
                                                <ul>

                                                    <li><a title="به سبد خرید اضافه کنید" href="cart.php"><i
                                                                class="fa fa-shopping-basket"
                                                                aria-hidden="true"></i></a></li>
                                                    <li><a href="wishlist.php" title="اضافه به علاقه مندی"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>

                                                    <li><a href="compare.php" title="مقایسه محصول"><i
                                                                class="fa fa-sliders" aria-hidden="true"></i></a></li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="quick_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"
                                            title="نمایش سریع">+ نمایش سریع</a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <h3><a href="product-details.html">بلوتوث قابل حمل مارشال</a></h3>
                                    <span class="current_price">۶۰٬۰۰۰</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
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
    <!--footer area end-->

    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close m" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-12 text-end">
                                <div class="modal_right">
                                    <div class="modal_title mt-4">
                                        <h2>کیف دستی فژیات</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">64.99 دلار</span>
                                        <span class="old_price">78.99 دلار</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد.</p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>سایز</h2>
                                            <select class="select_option">
                                                <option selected value="1">ایکس</option>
                                                <option value="1">ایکس لارج</option>
                                                <option value="1">مدیوم</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>رنگ</h2>
                                            <select class="select_option">
                                                <option selected value="1">رنگ بنفش</option>
                                                <option value="1">بنفش</option>
                                                <option value="1">سیاه</option>
                                                <option value="1">رنگ صورتی</option>
                                                <option value="1">نارنجی</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="0" max="100" step="2" value="1" type="number">
                                                <button type="submit">افزودن به سبد خرید</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>این محصول را به اشتراک بگذارید</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product4.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product6.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product8.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab5" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product12.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab"
                                                    aria-controls="tab1" aria-selected="false"><img
                                                        src="assets/img/s-product/product3.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab"
                                                    aria-controls="tab2" aria-selected="false"><img
                                                        src="assets/img/s-product/product.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-bs-toggle="tab" href="#tab3"
                                                    role="tab" aria-controls="tab3" aria-selected="false"><img
                                                        src="assets/img/s-product/product2.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab"
                                                    aria-controls="tab4" aria-selected="false"><img
                                                        src="assets/img/s-product/product4.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab5" role="tab"
                                                    aria-controls="tab5" aria-selected="false"><img
                                                        src="assets/img/s-product/product5.jpg" alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal area start-->


    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>



</body>


<!-- Mirrored from template.hasthemes.com/reid/reid/product-details.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 May 2023 09:06:31 GMT -->

</html>