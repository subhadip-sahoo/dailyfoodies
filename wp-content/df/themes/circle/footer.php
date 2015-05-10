<?php
$template_setting = kopa_get_template_setting();
$sidebars = $template_setting['sidebars'];
$total = count($sidebars);

$footer_sidebar[0] = ($template_setting) ? $sidebars[$total - 4] : 'sidebar_6';
$footer_sidebar[1] = ($template_setting) ? $sidebars[$total - 3] : 'sidebar_7';
$footer_sidebar[2] = ($template_setting) ? $sidebars[$total - 2] : 'sidebar_8';
$footer_sidebar[3] = ($template_setting) ? $sidebars[$total - 1] : 'sidebar_9';
?>
</div><!--main-content-->
<style>
#bottom-sidebar {
    background-color: #FAFAFA !important;
    border-bottom: 1px solid #E9E9E9 !important;
    border-top: 1px solid #E9E9E9 !important;
    padding: 40px 0 30px !important;
}
.dark-footer #page-footer {
    background-color: #FFFFFF !important;
}
.dark-footer #bottom-sidebar .widget .widget-title {
    color: #333333 !important;
}
.dark-footer #bottom-sidebar .widget ul li {
    border-bottom: 1px solid #ECECEC !important;
}
</style>
<div id="bottom-sidebar">

    <div class="wrapper">

        <div class="row-fluid">

            <div class="span3">
                <?php
                    multisite_last_twitter_feed();
                ?>
            </div><!--span3-->

            <div class="span3">
                <?php
                    multisite_flicker_widget();
                ?>
            </div><!--span3-->

            <div class="span3">
                <?php 
                    global $blog_id;
                    if($blog_id == 1){
                        multisite_tag_cloud_widget_main();
                    }else{
                        multisite_tag_cloud_widget();
                    }
                ?>
            </div><!--span3-->

            <div class="span3">
                <?php
                    recent_comments_widget();
                ?>
            </div><!--span3-->

        </div><!--row-fluid-->

    </div><!--wrapper-->

</div><!--bottom-sidebar-->

<footer id="page-footer">
    <div class="wrapper">
        <div class="row-fluid">
            <div class="span12">
                <p id="copyright"><?php echo multisite_footer_copyright_text(); ?></p>
            </div><!--span12-->
        </div><!--row-fluid-->
    </div><!--wrapper-->
</footer><!--page-footer-->

<p id="back-top"><a href="#top"><?php _e('Back to Top', kopa_get_domain()); ?></a></p>
<script type="text/javascript">
    $(document).ready(function(){
        $('.comment-body').append('<?php echo (!is_user_logged_in())? do_shortcode('[wp-modal-login login_text="Log in to Reply"]'):'';?>');
        $('.comment-body a.comment-reply-login').remove();
    });
</script>
<?php
$kopa_theme_options_tracking_code = get_option('kopa_theme_options_tracking_code');
if (!empty($kopa_theme_options_tracking_code)) {
    echo htmlspecialchars_decode(stripslashes($kopa_theme_options_tracking_code));
}
wp_footer();
?>
</body>
</html>