<?php
    /* Template Name: My Favorite Blogs */
    if(!is_user_logged_in()){
        wp_redirect(site_url());
        exit();
    }
    get_header();
    multisite_custom_css();
    echo '<style>#header-bottom {border-bottom:none;}</style>';
    $template_setting = kopa_get_template_setting();
    $sidebars = $template_setting['sidebars'];
?>
<div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col">
                <div class="elements-box">
                    <?php multisite_fav_blogs_timeline(); ?>
                    <!-- End of Timeline Article -->
                </div>
            </div><!--main-col--> 
            <aside class="sidebar widget-area-1">
                <?php multisite_popular_posts(); ?>
                <!-- End of Popular Posts -->
                <?php multisite_list_categories() ?>
                <!-- End of Categories -->
                <?php recent_comments_widget(); ?>
                <!-- End of Recent Comments -->
            </aside><!--sidebar--> 
            <div class="clear"></div> 
        </div><!--span12-->  
    </div><!--row-fluid--> 
</div><!--wrapper-->
<?php get_footer(); ?>