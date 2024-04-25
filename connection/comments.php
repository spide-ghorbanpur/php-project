<?php
require_once "include.php";

function getCommentsById($id){
    global $connection , $table_comment ;
    $sql = "SELECT * FROM `$table_comment` WHERE `id` = $id ORDER BY `comment_time`";
    $result = $connection->query($sql);
    if ($result->rowCount() ){
        $comments = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $comment = array(
                "full_name" => $row["full_name"],
                "user_name" => $row["user_name"],
                "email" => $row["email"],
                "website" => $row["website"],
                "activated" => $row["activated"],
                "comment" => $row["comment"] ,
                "comment_time" => $row["comment_time"] ,
                "hour" => $row["hour"]
            );
            $comments [] = $comment;
        }
        return $comments ;
    }
    else return false ;
}

function insertComments($comment, $full_name , $email , $website){
    global $connection , $table_comment ;
    $comment = sanitize($comment);
    $full_name = sanitize($full_name);
    $email = sanitize($email);
    $website = sanitize($website);
    $sql = "INSERT `$table_comment` SET `comment`= $comment , `full_name` = $full_name , `email` = $email , `website` = $website";
    $result = $connection->prepare($sql);
    $result->execute();
    return $result ;
}
?>
 <!--blog body area start-->
    <div class="blog_area blog_details portfolio_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--blog sidebar start-->
                    <aside class="blog_sidebar">
                        <!--search form start-->
                        <div class="sidebar_widget search_form">
                            <form action="#">
                                <input class="text-end" placeholder="...جستجو کنید" type="text">
                                <button type="submit"><i class="fa fa-search p-1"></i></button>
                            </form>
                        </div>
                        <!--search form end-->

                        <!--categories start-->
                        <div class="sidebar_widget widget_categories text-end p-3">
                            <h3 class="widget_title p-0 mb-4">دسته بندی ها</h3>
                            <ul>
                                <li><a href="#">خلاق</a> (۲)</li>

                                <li><a href="#">روش</a> (۳)</li>
                                <li><a href="#">تصویر</a> (۱)</li>
                                <li><a href="#">عکاسی</a> (۴)</li>
                                <li><a href="#">مسافرت رفتن</a> (۶)</li>
                                <li><a href="#">فیلم های</a> (۲)</li>
                                <li><a href="#">وردپرس</a> (۴)</li>
                            </ul>
                        </div>
                        <!--categories end-->

                        <!--recent post start-->
                        <div class="sidebar_widget recent_post">
                            <h3 class="widget_title text-end">پستهای اخیر</h3>
                            <div class="sidebar_post">
                                <div class="post_text text-end">
                                    <h3></h3>
                                    <a href="blog-details.php">قالب پست تصویر وبلاگ</a>
                                    <span>3 مارس 2022</span>
                                </div>
                                <div class="post_img">
                                    <a href="blog-details.php"><img src="assets/img/blog/post1.jpg" alt=""></a>
                                </div>

                            </div>
                            <div class="sidebar_post">
                                <div class="post_text text-end">
                                    <h3></h3>
                                    <a href="blog-details.php">قالب پست تصویر وبلاگ</a>
                                    <span>3 مارس 2022</span>
                                </div>
                                <div class="post_img">
                                    <a href="blog-details.php"><img src="assets/img/blog/post1.jpg" alt=""></a>
                                </div>
                            </div>

                            <div class="sidebar_post">
                                <div class="post_text text-end">
                                    <h3></h3>
                                    <a href="blog-details.php">قالب پست تصویر وبلاگ</a>
                                    <span>3 مارس 2022</span>
                                </div>
                                <div class="post_img">
                                    <a href="blog-details.php"><img src="assets/img/blog/post1.jpg" alt=""></a>
                                </div>


                            </div>
                            <div class="sidebar_post">
                                <div class="post_text text-end">
                                    <h3></h3>
                                    <a href="blog-details.php">قالب پست تصویر وبلاگ</a>
                                    <span>3 مارس 2022</span>
                                </div>
                                <div class="post_img">
                                    <a href="blog-details.php"><img src="assets/img/blog/post1.jpg" alt=""></a>
                                </div>


                            </div>
                        </div>
                        <!--recent post end-->

                        <!--recent post start-->
                        <div class="sidebar_widget recent_post ">
                            <h3 class="widget_title text-end">نظرات</h3>
                            <div class="sidebar_post">

                                <div class="col-lg-8">
                                    <div class="textson1 text-end">
                                        <h3 class=""><a href="blog-details.php">قالب پست تصویر وبلاگ</a></h3>
                                    </div>
                                    <div class="textson2 text-end">
                                        <span">3 مارس 2022</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <a href="blog-details.php"><img src="assets/img/blog/comment.png.jpg" alt=""></a>
                                </div>

                            </div>
                            <div class="sidebar_post">
                                <div class="col-lg-8">
                                    <div class="textson1 text-end">
                                        <h3 class=""><a href="blog-details.php">قالب پست تصویر وبلاگ</a></h3>
                                    </div>
                                    <div class="textson2 text-end">
                                        <span">3 مارس 2022</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <a href="blog-details.php"><img src="assets/img/blog/comment.png.jpg" alt=""></a>
                                </div>


                            </div>
                            <div class="sidebar_post">
                                <div class="col-lg-8">
                                    <div class="textson1 text-end">
                                        <h3 class=""><a href="blog-details.php">قالب پست تصویر وبلاگ</a></h3>
                                    </div>
                                    <div class="textson2 text-end">
                                        <span">3 مارس 2022</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <a href="blog-details.php"><img src="assets/img/blog/comment.png.jpg" alt=""></a>
                                </div>


                            </div>
                            <div class="sidebar_post">
                                <div class="col-lg-8">
                                    <div class="textson1 text-end">
                                        <h3 class=""><a href="blog-details.php">قالب پست تصویر وبلاگ</a></h3>
                                    </div>
                                    <div class="textson2 text-end">
                                        <span">3 مارس 2022</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end">
                                    <a href="blog-details.php"><img src="assets/img/blog/comment.png.jpg" alt=""></a>
                                </div>


                            </div>
                        </div>
                        <!--recent post end-->


                        <div class="sidebar_widget tags_widget text-end">
                            <h3 class="widget_title">ابر برچسب</h3>
                            <ul>
                                <li><a href="#">تجارت الکترونیک</a></li>
                                <li><a href="#">خلاق</a></li>
                                <li><a href="#">فروشگاه</a></li>
                                <li><a href="#">ایده ها</a></li>
                                <li><a href="#">کسب و کار</a></li>
                                <li><a href="#">شرکت های بزرگ</a></li>
                                <li><a href="#">هوشمندانه</a></li>
                            </ul>
                        </div>

                    </aside>

                    <!--blog sidebar start-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_details_wrapper">
                        <div class="blog__thumb">
                            <a href="#"><img src="assets/img/blog/blog6.jpg" alt=""></a>
                        </div>
                        <div class="blog_info_wrapper">
                            <div class="blog_info_inner">
                                <div class="post__info">
                                    <div class="post_header text-end mb-4">
                                        <h3>فرمت پست تصویر وبلاگ</h3>
                                    </div>
                                    <div class="post_meta text-end">
                                        <span>مدیر</span>

                                        <span><a href="#">/ وردپرس</a></span>
                                    </div>
                                    <div class="post_content text-end">
                                        <p>...لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                            صنعت چاپ و با استفاده از طراحان گرافیک است.لورم ایپسوم متن ساختگی با تولید
                                            سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون
                                            بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است.</p>
                                        <blockquote>
                                            <p>لورم ایوم متن ساختگی با تولید آسان نامفهوم از صنعت چاپ با استفاده از
                                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و در ستون و سطرآنان است
                                                که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با
                                                هدف بهبود ابزارهای کاربردی می باشد. لورم ایوم متن ساختگی با تولید آسان
                                                نامفهوم از صنعت چاپ با استفاده از طراحان گرافیک است.</p>
                                        </blockquote>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                            صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                            کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم ایپسوم متن
                                            ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                            شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                            کاربردی می باشد.

                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                            لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                            ابزارهای کاربردی می باشد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از
                                            صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و
                                            مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                            کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. لورم ایپسوم متن
                                            ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای
                                            شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                            کاربردی می باشد. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                            با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون
                                            و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                            متنوع با هدف بهبود ابزارهای کاربردی می باش</p>
                                        <p></p>
                                    </div>
                                    <div class="post_meta text-end">
                                        <span><a href="#">3 نظر</a></span>
                                        <span> / برچسب ها: </span>
                                        <span><a href="#">، روش</a></span>
                                        <span><a href="#">، تی شرت</a></span>
                                        <span><a href="#">، سفید</a></span>
                                    </div>
                                    <div class="social_sharing">
                                        <h3>این اعلان را به اشتراک گذارید</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>

                                    </div>

                                    <div class="author_box">
                                        <div class="author_desc">
                                            <?php if ($comments = getCommentsById(1)) {
                                                foreach ($comments as $comment) : ?>
                                            <h3> <?php echo $comment["comment_time"]?> در ساعت  <?php echo $comment["hour"] ?>  و تاریخ<a href="#"><?php echo $comment["user_name"]?></a> : <?php echo $comment["full_name"] ?> </h3>
                                            <p><?php echo $comment["comment"] ?></p>
                                            <?php endforeach; } ?>
                                        </div>
                                        <div class="author_img mx-3 mt-3">
                                            <img src="assets/img/blog/admin_avatar.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="author_box">
                                        <div class="author_desc">
                                            <?php if ($comments = getCommentsById(2)) {
                                                foreach ($comments as $comment) : ?>
                                                    <h3><?php echo $comment["comment_time"]?>  در ساعت  <?php echo $comment["hour"] ?>  و تاریخ<a href="#"><?php echo $comment["user_name"]?></a> : <?php echo $comment["full_name"] ?> </h3>
                                                    <p><?php echo $comment["comment"] ?></p>
                                                <?php endforeach; } ?>
                                        </div>
                                        <div class="author_img mx-3 mt-3">
                                            <img src="assets/img/blog/admin_avatar.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="author_box">
                                        <div class="author_desc">
                                            <?php if ($comments = getCommentsById(3)) {
                                                foreach ($comments as $comment) : ?>
                                                    <h3><?php echo $comment["comment_time"]?> در ساعت  <?php echo $comment["hour"] ?>  و تاریخ<a href="#"><?php echo $comment["user_name"]?></a> : <?php echo $comment["full_name"] ?> </h3>
                                                    <p><?php echo $comment["comment"] ?></p>
                                                <?php endforeach; } ?>
                                        </div>
                                        <div class="author_img mx-3 mt-3">
                                            <img src="assets/img/blog/admin_avatar.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="post__date">
                                    <span class="day">10</span>
                                    <span class="month">مارس</span>
                                </div>

                            </div>

                            <div class="comments_form text-end">
                                <h3>پاسخ دهید</h3>
                                <p>آدرس ایمیل شما منتشر نخواهد شد.</p>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="review_comment">اظهار نظر </label>
                                            <textarea name="comment" id="review_comment"></textarea>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="author">نام</label>
                                            <input id="author" type="text" name="full_name">

                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="email">پست الکترونیک </label>
                                            <input id="email" type="text" name="email">
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <label for="website">سایت اینترنتی </label>
                                            <input id="website" type="text" name="website">
                                        </div>
                                    </div>
                                    <button class="button" type="submit" name="submit">ارسال نظر</button>
                                </form>
                            </div>
                            <?php if ($hasError) :?>
                            <div class="col-6 mt-5" id="box" style="direction: rtl ; text-align: center ;">
                            <?php foreach ($errors as $error) :?>
                            <div class="alert alert-danger">
                                <p class="text-center"><?php echo $error ;?> <span class="close float-left">&times;</span> </p>
                            </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif;?>
                            <?php if ($msgError) : ?>
                            <div class="col-6 mt-5" >
                                <div class="alert alert-danger">
                                    <p><?php echo $msg ;?></p>
                                </div>
                            </div>
                            <?php endif;?>
                            <?php if($msgSuccess) : ?>
                            <div class="col-6 mt-5">
                                <div class="alert alert-success">
                                    <p><?php echo $msg ;?></p>
                                </div>
                            </div>
                            <?php   endif;?>

                        </div>
                    </div>
                    <!--blog grid area start-->
                </div>
            </div>
        </div>
    </div>
    <!--blog section area end-->

<?php
//Run
//$commons = getAllComments();
//var_dump($commons);


//$comments = getCommentsById(2);
//var_dump($comments);

$queryComment = null ;
$errors = array();
$hasError = false;
$msgSuccess = false ;
$msg = "";
if (isset($_GET["submit"])){
    if (!empty($_GET["comment"]) and !empty($_GET["full_name"]) and !empty($_GET["email"]) and filter_var($_GET["email"] , FILTER_VALIDATE_EMAIL) and !empty($_GET["website"])) {
        $queryComment = insertComments($_GET["comment"] , $_GET["full_name"] , $_GET["email"] ,$_GET["website"]);
        var_dump($queryComment);
        if ($queryComment){
            $msgSuccess = true;
            $msg = "با تشکر نظر شما ثبت شد";
        }
    }
    else {
        if (empty($_GET["comment"])){
            $hasError = true ;
            $errors [] = "نظر نمیتواند خالی باشد";
        }
        if (empty($_GET["full_name"])){
            $hasError = true ;
            $errors[] = "نام نمیتواند خالی باشد" ;
        }
        if (empty($_GET["email"])){
            $hasError =true ;
            $errors [] = "ایمیل نمیتواند خالی باشد";
        }
        elseif (!filter_var($_GET["email"] , FILTER_VALIDATE_EMAIL)){
            $hasError = true ;
            $errors[] = "فرمت ایمیل صحیح نمیباشذ" ;
        }
        if (empty($_GET["website"])){
            $hasError = true;
            $errors[] = "وبسایت نمیتواند خالی باشد";
        }
    }
}
?>