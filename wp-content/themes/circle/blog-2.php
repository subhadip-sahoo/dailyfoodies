<?php
get_header();
multisite_custom_css();
$template_setting = kopa_get_template_setting();
$sidebars = $template_setting['sidebars'];
?>
<div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col"> 
                <div class="entry-thumb"> 
                    <?php 
                        global $wpdb;
                        foreach((get_the_category()) as $category) { 
                            $cat_name_custom = $category->cat_name;
                        }
                        $terms = $wpdb->get_results("SELECT * FROM wp_terms WHERE name = '".  $cat_name_custom."'", ARRAY_A);
                        foreach ($terms as $term) {
                            $term_id = $term['term_id'];
                            $term_name = $term['name'];
                        }
                        $post_ID = get_option('_wpfifc_taxonomy_term_'.$term_id, 0);
                        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post_ID), array( 795,413 ), false, '' );
                        ?>
                        <img src="<?php echo $src[0]; ?>" />
                </div>
                <div></div>                    
                    <div class="article-list-line"></div>
                    
                    <span class="article-bullet"></span>
                   
                    <ul class="article-list clearfix">
                       <?php //get_template_part('loop','blog-2');?>
                        <?php multisite_timeline_widget_category($term_name); ?>
                    </ul><!--article-list-->

            </div><!--main-col-->

            <div class="sidebar widget-area-1">
                <?php multisite_popular_posts(); ?>
                <!-- End of Popular Posts -->
                <?php multisite_list_categories() ?>
                <!-- End of Categories -->
                <?php recent_comments_widget(); ?>
            </div><!--sidebar-->

            <div class="clear"></div>

        </div><!--span12-->

    </div><!--row-fluid-->  

</div><!--wrapper-->
<?php get_footer(); ?>