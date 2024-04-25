<?php
require_once "include.php";

function getAllFooter(){
    global $connection , $table_foot ;
    $sql = "SELECT * FROM `$table_foot` ";
    $result = $connection->query($sql);
    if ($result->rowCount()){
        $foots = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row){
            $foots [] = $row ;
        }
        return $foots ;
    }
    else return  false ;
}




function getAllFooterByLineId($line_id){
    global $connection, $table_foot;
    $sql = "SELECT * FROM `$table_foot` WHERE `line_id` = $line_id  ";
    $result = $connection->query($sql);
    if ($result->rowCount()){
        $foots = array();
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $foot = array(
                "id" => $row["id"],
                "title" => $row["title"],
                "foot_type" => $row["foot_type"],
                "url" => $row["url"]
            );
            $foots [] = $foot;
        }
        return $foots;
    } else {
        return false;
    }
}
?>
<footer class="footer_widgets">
    <div class="footer_top text-end">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                    <div class="widgets_container">
                        <?php if ($foots = getAllFooterByLineId(1)) {
                            foreach ($foots as $foot) : ?>
                                <ul>
                                    <li><a href="<?php echo $foot["url"]?>"><?php echo $foot["title"]?></a></li>
                                </ul>
                            <?php endforeach; } ?>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                    <div class="widgets_container">
                        <div class="footer_menu">
                            <?php if ($foots = getAllFooterByLineId(2)) {
                            foreach ($foots as $foot) : ?>
                            <ul>
                                <li><a href="<?php echo $foot["url"]?>"><?php echo $foot["title"]?></a></li>
                            </ul>
                            <?php endforeach; } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widgets_container contact_us">
                        <div class="footer_contact">
                            <?php if ($foots = getAllFooterByLineId(3)) {
                            foreach ($foots as $foot) : ?>
                            <p><?php echo $foot["title"]?> <a href="<?php echo $foot["url"]?>"></a> </p>
                            <?php endforeach; } ?>
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
                        <div class="newleter-content">
                            <?php if ($foots = getAllFooterByLineId(4)) {
                            foreach ($foots as $foot) : ?>
                            <p> <?php echo $foot["title"]?></p>
                            <?php endforeach; } ?>
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
                            <?php if ($foots = getAllFooterByLineId(5)) {
                            foreach ($foots as $foot) : ?>
                            <li><a href="<?php echo $foot["url"]?>"><?php echo $foot["title"]?></a></li>
                            <?php endforeach; } ?>
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


<!--//RUN-->
<!---->
<!--$foots = getAllFooter();-->
<!--var_dump($foots);-->
<!---->
<!--$foots = getAllFooterByLineId(1);-->
<!--var_dump($foots);-->





