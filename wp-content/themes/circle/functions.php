<?php
define('KOPA_THEME_NAME', 'Circle');
define('KOPA_DOMAIN', 'circle');
define('KOPA_CPANEL_IMAGE_DIR', get_template_directory_uri() . '/library/images/layout/');
define('KOPA_UPDATE_TIMEOUT', 21600);
define('KOPA_UPDATE_URL', 'http://kopatheme.com/notifier/circle.xml');

require trailingslashit(get_template_directory()) . '/library/kopa.php';
require trailingslashit(get_template_directory()) . '/library/ini.php';
require trailingslashit(get_template_directory()) . '/library/includes/google-fonts.php';
require trailingslashit(get_template_directory()) . '/library/includes/ajax.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/post.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/category.php';
require trailingslashit(get_template_directory()) . '/library/includes/metabox/page.php';
require trailingslashit(get_template_directory()) . '/library/front.php';
require trailingslashit(get_template_directory()) . '/library/posttype/service.php';
require trailingslashit(get_template_directory()) . '/library/posttype/portfolio.php';
require trailingslashit(get_template_directory()) . '/library/posttype/client.php';
require trailingslashit(get_template_directory()) . '/library/posttype/testimonial.php';
require trailingslashit(get_template_directory()) . '/library/posttype/staff.php';
require trailingslashit(get_template_directory()) . '/library/posttype/options_client.php';
require trailingslashit(get_template_directory()) . '/library/posttype/options_testimonial.php';
require trailingslashit(get_template_directory()) . '/library/posttype/options_service.php';
require trailingslashit(get_template_directory()) . '/library/posttype/options_staff.php';

add_filter('wp_trim_excerpt','kopa_wp_trim_excerpt');

function kopa_wp_trim_excerpt($string) {

            $word_limit = 55;

            $words = explode(' ', $string, ($word_limit + 1));

            if (count($words) > $word_limit)

                array_pop($words);

            return implode(' ', $words);

        }



/**

 * Include the TGM_Plugin_Activation class.

 */

require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'kopa_register_required_plugins');

function kopa_register_required_plugins() {

    $plugins = array(

        array(

            'name' => 'Slider Revolution', // The plugin name

            'slug' => 'revslider', // The plugin slug (typically the folder name)

            'source' => get_stylesheet_directory() . '/plugins/revslider.zip', // The plugin source

            'required' => true, // If false, the plugin is only 'recommended' instead of required

            'version' => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented

            'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch

            'force_deactivation' => true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins

            'external_url' => '', // If set, overrides default API URL and points to an external URL

        )

    );

    $theme_text_domain = KOPA_DOMAIN;

    $config = array(

        'domain' => $theme_text_domain, // Text domain - likely want to be the same as your theme.

        'default_path' => '', // Default absolute path to pre-packaged plugins

        'parent_menu_slug' => 'themes.php', // Default parent menu slug

        'parent_url_slug' => 'themes.php', // Default parent URL slug

        'menu' => 'install-required-plugins', // Menu slug

        'has_notices' => true, // Show admin notices or not

        'is_automatic' => false, // Automatically activate plugins after installation or not

        'message' => '', // Message to output right before the plugins table

        'strings' => array(

            'page_title' => __('Install Required Plugins', $theme_text_domain),

            'menu_title' => __('Install Plugins', $theme_text_domain),

            'installing' => __('Installing Plugin: %s', $theme_text_domain), // %1$s = plugin name

            'oops' => __('Something went wrong with the plugin API.', $theme_text_domain),

            'notice_can_install_required' => _n_noop('This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.'), // %1$s = plugin name(s)

            'notice_can_install_recommended' => _n_noop('This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.'), // %1$s = plugin name(s)

            'notice_cannot_install' => _n_noop('Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.'), // %1$s = plugin name(s)

            'notice_can_activate_required' => _n_noop('The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)

            'notice_can_activate_recommended' => _n_noop('The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.'), // %1$s = plugin name(s)

            'notice_cannot_activate' => _n_noop('Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.'), // %1$s = plugin name(s)

            'notice_ask_to_update' => _n_noop('The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.'), // %1$s = plugin name(s)

            'notice_cannot_update' => _n_noop('Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.'), // %1$s = plugin name(s)

            'install_link' => _n_noop('Begin installing plugin', 'Begin installing plugins'),

            'activate_link' => _n_noop('Activate installed plugin', 'Activate installed plugins'),

            'return' => __('Return to Required Plugins Installer', $theme_text_domain),

            'plugin_activated' => __('Plugin activated successfully.', $theme_text_domain),

            'complete' => __('All plugins installed and activated successfully. %s', $theme_text_domain), // %1$s = dashboard link

            'nag_type' => 'updated' // Determines admin notice type - can only be 'updated' or 'error'

        )

    );

    tgmpa($plugins, $config);
}
function rokdom_script() 
{
wp_register_script( 'popup', get_template_directory_uri() . '/popup/jquery-1.8.0.min.js', true );
wp_enqueue_script( 'popup' ); 

} 
add_action( 'wp_enqueue_scripts', 'rokdom_script' );

function myCaptcha() {

  // Include the reCAPTCHA library, this assumes a relative directory.
  require_once(ABSPATH .'wp-content/themes/circle/scripts/recaptchalib.php');

  // Get a key from http://recaptcha.net/api/getkey
  $publickey = "6LfVEOwSAAAAAGTZQcMd32-PCOaVwz_5_ycTgR9d";

  // The response from reCAPTCHA
  $resp = null;
  // The error code from reCAPTCHA, if any
  $error = null;

  echo recaptcha_get_html($publickey, $error);
}

function insert_attachment($file_handler,$post_id,$setthumb='false') {

 // check to make sure its a successful upload
 if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');

    $attach_id = media_handle_upload( $file_handler, $post_id );

    if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}

if ( current_user_can('subscriber') && !current_user_can('upload_files') ){
    add_action('admin_init', 'allow_subscriber_uploads');
}
function allow_subscriber_uploads() {
    $subscriber = get_role('Subscriber');
    $subscriber->add_cap('upload_files');
    $subscriber->add_cap('edit_published_pages');
    $subscriber->add_cap('edit_others_pages');
}
//function create_new_role_for_users(){
//    $result = add_role('blogger',__( 'Blogger' ),
//        array(
//            'read'         => true,
//            'publish_posts'   => true,
//            'upload_files' => true,
//            'edit_published_pages' => true,
//            'edit_others_pages' => true
//        )
//    );
//}
//add_action('admin_init', 'create_new_role_for_users');

add_action('pre_get_posts','ml_restrict_media_library');

function ml_restrict_media_library( $wp_query_obj ) {
    global $current_user, $pagenow;
    if( !is_a( $current_user, 'WP_User') )
    return;
    if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
    return;
    if( !current_user_can('manage_media_library') )
    $wp_query_obj->set('author', $current_user->ID );
    return;
}

function remove_admin_bar() {
    if (!current_user_can('Super Admin')) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar');

function restrict_admin()
{
    if ( !current_user_can('Super Admin')) {
            wp_redirect( site_url() );
            exit;
    }
}
//add_action( 'admin_head', 'restrict_admin');
function multisite_logo(){
    global $wpdb;
    $records = $wpdb->get_results("SELECT * FROM `wp_options` WHERE `option_name` = 'kopa_theme_options_logo_url'", ARRAY_A);
    foreach ($records as $record) {
        $logo_image = $record['option_value'];
    }
    ?>
    <div id="logo-image">        
        <img src="<?php echo $logo_image ?>" alt="" />
    </div>
<?php } 
function multisite_main_menu(){
    //store the current blog_id being viewed
    global $blog_id;
    $current_blog_id = $blog_id;

    //switch to the main blog which will have an id of 1
    switch_to_blog(1);

    //output the WordPress navigation menu
    if (has_nav_menu('main-nav')):
    wp_nav_menu(array('theme_location' => 'main-nav', 'container' => 'nav', 'container_id' => 'main-nav', 'container_class' => 'clearfix', 'menu_id' => 'main-menu', 'menu_class' => 'clearfix')); ?>     
    <nav id="mobile-menu"> 
        <span><?php echo __('Menu', kopa_get_domain()); ?></span>    
         <?php wp_nav_menu(array('theme_location' => 'main-nav', 'container' => false, 'menu_id' => 'toggle-view-menu', 'menu_class' => 'clearfix', 'walker' => new kopa_mobile_menu)); ?>   
    </nav>   
     <?php  
     endif;
     $kopa_theme_options_email_address = get_option('kopa_theme_options_email_address');
     $kopa_theme_options_phone_number = get_option('kopa_theme_options_phone_number');  
     if ($kopa_theme_options_email_address or $kopa_theme_options_phone_number): 
         ?>                                 
    <ul class="contact-top clearfix">  
        <?php if ($kopa_theme_options_phone_number): ?>  
        <li class="clearfix">
            <i class="icon-phone"></i>
            <span><?php echo $kopa_theme_options_phone_number; ?></span>
        </li>  
    <?php     
    endif;    
        if ($kopa_theme_options_email_address):
    ?>               
        <li class="clearfix"><i class="icon-envelope"></i>   
            <a href="mailto:<?php echo $kopa_theme_options_email_address; ?>"><?php echo $kopa_theme_options_email_address; ?></a></li>    
    <?php endif; ?> 
    </ul><!--contact-top-->                                                    
<?php                           
endif;     
    //switch back to the current blog being viewed
    switch_to_blog($current_blog_id);
}

function multisite_custom_css(){
    global $wpdb;
    $records = $wpdb->get_results("SELECT * FROM `wp_options` WHERE `option_name` = 'kopa_theme_options_custom_css'", ARRAY_A);
    foreach ($records as $record) {
        $custom_css = $record['option_value'];
    }
    $kopa_theme_options_custom_css = htmlspecialchars_decode(stripslashes($custom_css));
    if ($kopa_theme_options_custom_css) {
        echo "<style>{$kopa_theme_options_custom_css}</style>";
    }
}
function multisite_social_icons(){ 
    global $wpdb;
    $records = $wpdb->get_results("SELECT * FROM `wp_options` WHERE `option_name` = 'kopa_theme_options_social_links_rss_url'", ARRAY_A);
    foreach ($records as $record) {
        $rss_url = $record['option_value'];
    }
    
?>    
    <div class="social-box clearfix">  
    <?php $social_networks = array('facebook' => array('icon-facebook', __('Facebook', kopa_get_domain())), 'twitter' => array('icon-twitter', __('Twitter', kopa_get_domain())), 'pinterest' => array('icon-pinterest', __('Pinterest', kopa_get_domain())), 'google' => array('icon-google-plus', __('Google', kopa_get_domain())), 'dribbble' => array('icon-dribbble', __('Dribbble', kopa_get_domain())), 'linkedin' => array('icon-linkedin', __('Linkedin', kopa_get_domain())), 'deviantart' => array('icon-deviantart', __('Deviantart', kopa_get_domain())), 'wordpress' => array('icon-wordpress', __('Wordpress', kopa_get_domain())), 'youtube' => array('icon-youtube', __('Youtube', kopa_get_domain())), 'flickr' => array('icon-flickr', __('Flickr', kopa_get_domain())), 'vimeo' => array('icon-vimeo', __('Vimeo', kopa_get_domain()))); ?> 

        <ul class="socials-link clearfix">  
        <?php   
        //$rss_url = get_option("kopa_theme_options_social_links_rss_url", FALSE);    
        if (strtolower($rss_url) != 'hide') {  
            if ($rss_url) {  
                ?>    

            <li class="feed-icon">   
                <a href="<?php echo $rss_url; ?>" target="_blank" title="<?php echo __('RSS', kopa_get_domain()); ?>"><span class="icon-feed-2" aria-hidden="true">  
                    </span></a></li> 
            <?php } else { ?>     
                    <li class="feed-icon">
                        <a href="<?php echo get_bloginfo('rss2_url'); ?>" target="_blank" title="<?php echo __('RSS', kopa_get_domain()); ?>">   
                        <span class="icon-feed-2" aria-hidden="true"></span>
                        </a>
                    </li>   
            <?php      
                }       
            }   
            ?> 
     <?php      
     foreach ($social_networks as $slug => $title):
         $social_options = $wpdb->get_results("SELECT * FROM `wp_options` WHERE `option_name` = 'kopa_theme_options_social_links_{$slug}_url'", ARRAY_A);
            foreach ($social_options as $options) {
                $url = $options['option_value'];
            }
         //$url = get_option("kopa_theme_options_social_links_{$slug}_url", FALSE);     
     if ($url):           
    ?>      
        <li class="<?php echo "{$slug}-icon"; ?>">
            <a href="<?php echo $url; ?>" title="<?php echo $title[1]; ?>" target="_blank">  
                <span class="<?php echo $title[0]; ?>" aria-hidden="true"></span>
            </a>
        </li>
        <?php  
            endif;       
        endforeach;      
        ?>     
    </ul> 
    </div><!--social-box-->  
<?php } ?>
<?php 
   function multisite_footer_copyright_text(){
        global $wpdb;
        $records = $wpdb->get_results("SELECT * FROM `wp_options` WHERE `option_name` = 'kopa_theme_options_copyright'", ARRAY_A);
        foreach ($records as $record) {
            $copyright_text = $record['option_value'];
        }
        echo $copyright_text;
   }
   function recent_comments_widget(){?>
       <div id="kopa_widget_recent_comments-3" class="widget clearfix kopa_widget_recent_comments">
                <h4 class="widget-title clearfix">
                    <span>Recent comment</span>
                </h4>  
 <?php
        $title = 'Recent comment';
        $number = 2;
        $limit = 100;
        $show_avatar = 'true';
        $comments = get_comments(array('number' => $number));

        if ($comments) {
            ?>
            <ul class="kp-latest-comment">
                <?php
                foreach ($comments as $comment):
                    $comment_content = $comment->comment_content;
                    if (strlen($comment_content) > $limit)
                        $comment_content = substr(strip_tags($comment->comment_content), 0, $limit);
                    ?>
                    <li>
                        <article class="clearfix">
                            <?php if ('true' == $show_avatar): ?>
                                <a class="entry-thumb" href="<?php echo get_permalink($comment->comment_post_ID); ?>">
                    <?php echo get_avatar($comment->comment_author_email, 60); ?>                                
                                </a>
                <?php endif; ?>

                            <div class="entry-content clearfix">
                                <a class="comment-name" href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php printf(__('%1$s says:', kopa_get_domain()), $comment->comment_author); ?></a>
                                <p><?php echo $comment_content; ?></p>
                            </div>
                        </article>
                    </li>
                <?php
            endforeach;
            ?>
            </ul>
            <?php
        }

        echo $after_widget;
 
 ?>
                </div>
<?php   } 
function _get_current_taxonomy($instance) {
    if ( !empty($instance['taxonomy']) && taxonomy_exists($instance['taxonomy']) ){
            return $instance['taxonomy'];
    }else{
        return 'post_tag';
    }
}
        
function multisite_tag_cloud_widget_main(){
    $instance['title'] = 'Tags';
    $instance['taxonomy'] = 'post_tag';
    $current_taxonomy = 'post_tag';
    if ( !empty($instance['title']) ) {
            $title = $instance['title'];
    } else {
            if ( 'post_tag' == $current_taxonomy ) {
                    $title = __('Tags');
            } else {
                    $tax = get_taxonomy($current_taxonomy);
                    $title = $tax->labels->name;
            }
    }
    //$title = apply_filters('widget_title', $title, $instance, $this->id_base);
?>
<?php
    echo '<div id="tag_cloud-2" class="widget clearfix widget_tag_cloud">
            <h4 class="widget-title clearfix">
            <span>'.$title.'</span>
            </h4>';
    echo '<div class="tagcloud">';
    $all_blogs = get_blog_list(0, 'all');
    foreach ($all_blogs as $blog) {
        switch_to_blog($blog['blog_id']);
        wp_tag_cloud( apply_filters('widget_tag_cloud_args', array('taxonomy' => $current_taxonomy) ) );
    }
    echo "</div>\n";
    echo "</div>";
}

function multisite_flicker_widget(){
    $title = 'Flickr Feed';
    $account = '78715597@N07';
    $limit = (int) 6;
    ?>
    <div id="kopa_widget_flickr-2" class="widget clearfix kopa_widget_flickr">
        <h4 class="widget-title clearfix">
            <span><?php echo $title; ?></span>
        </h4>
    <div class="flickr-wrap clearfix">       
        <input type='hidden' class='flickr_id' value='<?php echo $account; ?>'>
        <input type='hidden' class='flickr_limit' value='<?php echo $limit; ?>'>
        <ul class="kopa-flickr-widget clearfix"></ul>
    </div>
    </div>
<?php } ?>
<?php 
    function multisite_timeline_widget_category($term_name){   
    $site_tags = array();
    $instance = array(
        'title_1' => 'Blog',
        'display_type_1' => 'blog',
        'relation_1' => 'OR',
        'tags_1' => $site_tags,
        'number_of_article_1' => 5,
        'orderby_1' => 'lastest',
    );

    $article_tabs = array(
        'title' => $instance['title_1'],
        'display_type' => $instance['display_type_1'],
        'relation' => esc_attr($instance['relation_1']),
        'tags' => $instance['tags_1'],
        'number_of_article' => (int) $instance['number_of_article_1'],
        'orderby' => $instance['orderby_1']
    );
$title_class = '';
$tab_content_class = '';
if ($article_tabs['display_type'] == 'portfolio') {
    $tab_content_class = ' portfolio-content';
}
echo '<div class="entry-list">';
echo '<h2 class="kp-title"><span data-icon="';
if ($article_tabs['display_type'] == 'blog') {
    echo '&#xe014;';
} else {
    echo '&#xe02f;';
}
echo '" aria-hidden="true"></span>' . $article_tabs['title'] . '</h2>';

echo "<div class='tab-container-1 {$tab_content_class}'>";
$df_blogs = get_blog_list( 0, 'all' );
$df_post_count = 0;
foreach ($df_blogs as $df_blog) {
    $df_post_count = $df_post_count + $df_blog['postcount'];
}
if($df_post_count != 0){

    switch ($article_tabs['display_type']) {
        case 'blog':
?>
            <input type="hidden" name="df_cat_name" class="df_cat_name" value="<?php echo $term_name;?>">
            <div class="timeline-container clearfix">
                <div id="time-line"></div>
                <?php
                $month_year = array();
                $post_id_array = array();
                foreach ($df_blogs as $df_blog) {
                    switch_to_blog($df_blog['blog_id']);
                    if($df_blog['postcount'] == 0){
                        continue;
                    }
                    $previous_date = '';
                    $term_id = get_cat_ID( $term_name );
                    $site_categories = array($term_id);
                    $article_tabs['categories'] = $site_categories;
                    $query_args['categories'] = $article_tabs['categories'];
                    $query_args['relation'] = $article_tabs['relation'];
                    $query_args['tags'] = $article_tabs['tags'];
                    $query_args['number_of_article'] = $article_tabs['number_of_article'];
                    $query_args['orderby'] = $article_tabs['orderby'];
                    
                    $posts = kopa_widget_article_build_query($query_args);
                    while ($posts->have_posts()):
                        $posts->the_post();
                        $post_id = get_the_ID();
                        array_push($post_id_array, $post_id);
                        $post_url = get_permalink();
                        $post_title = get_the_title();
                        $current_date = get_the_date('M,Y');
                        $_element = array(
                            'month' => get_the_date('m'),
                            'year' => get_the_date('Y'),
                            'month-year' => get_the_date('M') . '-' . get_the_date('Y'),
                            'month-text' => get_the_date('F')
                        );
                    array_push($month_year, $_element); 
                    if ($current_date != $previous_date):
                        $previous_date = $current_date;
                        $total_post_no = kopa_total_post_count_by_month_cat(get_the_date('m'), get_the_date('Y'), $site_categories);
                        ?>
                        <div class="time-to-filter clearfix" id="<?php echo get_the_date('M') . '-' . get_the_date('Y'); ?>">
                            <p class="timeline-filter"><span><?php echo $current_date; ?></span></p>
                            <span class="post-quantity"><?php
                    echo $total_post_no;
                    if ($total_post_no <= 1): _e(' Article', kopa_get_domain());
                    else: _e(' Articles', kopa_get_domain());
                    endif;
                        ?>
                            </span>
                            <span class="top-ring"></span>
                            <span class="bottom-ring"></span>
                        </div><!--time-to-filter-->
                    <?php
                endif;
                switch (get_post_format()) {
                    case 'quote':
                        ?>
                            <article class="timeline-item quote-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe075;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">                                                    
                                    <div class="quote-format"><?php the_excerpt(); ?></div>
                                    <center><span class="quote-name"><?php the_author(); ?></span></center>
                                    <header>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                </div>
                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'video':
                        $video = kopa_content_get_video($post->post_content);
                        ?>
                            <article class="timeline-item video-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe023;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                    <div class="kp-thumb hover-effect">
                                        <div class="mask" onclick="jQuery(this).find('a.link-detail').click();">
                                            <a href="<?php echo $video[0]['url']; ?>" rel="prettyPhoto" class="link-detail" data-icon="&#xe022;"><span></span></a>
                                        </div>
                                        <?php
                                        if (has_post_thumbnail()):
                                            the_post_thumbnail('kopa-image-size-1');
                                        else:
                                            printf('<img src="%1$s" alt="">', kopa_get_video_thumbnails_url($video[0]['type'], $video[0]['url']));
                                        endif;
                                        ?>
                                    </div>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>

                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'gallery':
                        ?>
                            <article class="timeline-item gallery-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe01d;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix"> 
                                    <?php
                                    $gallery = kopa_content_get_gallery($post->post_content);
                                    if ($gallery) {
                                        $shortcode = substr_replace($gallery[0]['shortcode'], ' display_type = 1]', strlen($gallery[0]['shortcode']) - 1, strlen($gallery[0]['shortcode']));
                                        echo do_shortcode($shortcode);
                                    }
                                    ?>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <span class="load-more-gallery" onclick="more_gallery(jQuery(this));"><span></span></span>
                                </div>                                                    

                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'audio':
                        ?>
                            <article class="timeline-item audio-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe020;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <?php
                                    $audio = kopa_content_get_audio($post->post_content);
                                    if ($audio) {
                                        echo do_shortcode($audio[0]['shortcode']);
                                    }
                                    ?>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>

                            </article><!--timeline-item-->
                            <?php
                            break;
                        default:
                            ?>
                            <article class="timeline-item <?php
                        if (has_post_thumbnail())
                            echo ' standard-post ';
                        else
                            echo 'link-post'
                            ?> clearfix">
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                        <?php if (has_post_thumbnail()): ?>
                                        <div class="kp-thumb hover-effect">
                                            <div class="mask" onclick="window.location = '<?php echo $post_url; ?>';">
                                                <a class="link-detail" href="<?php echo $post_url; ?>" data-icon="&#xe0c2;"></a>
                                            </div>
                            <?php the_post_thumbnail('kopa-image-size-1'); ?>
                                        </div>
                        <?php endif; ?>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>
                            </article><!--timeline-item-->
                        <?php
                        break;
                }
                ?>
                <?php endwhile; } ?>  
                <span class="load-more kp-tooltip" data-toggle="tooltip" data-original-title="<?php _e('Load More', kopa_get_domain()); ?>" onclick="loadmore_articles_custom_df(jQuery(this))"><i class="icon-plus"></i></span>
                <span class="kp-loading hidden"></span>                            
            <?php
            wp_nonce_field("load_more_articles_custom_df", "nonce_id_load_more_custom_df");
            $post_id_string = implode(",", $post_id_array);
            ?>
                <input type="hidden" id="post_id_array" value="<?php echo $post_id_string; ?>">
                <div class="kp-filter clearfix">
                    <div onclick="kp_filter_click(jQuery(this))">
                        <span><?php _e('View by:', kopa_get_domain()); ?></span><em><?php _e('All', kopa_get_domain()); ?></em>
                        <a></a>                                    
                        <ul id="ss-links" class="ss-links">
                            <?php
                            $current_month = '';
                            $current_year = '';
                            foreach ($month_year as $k => $v) {
                                if ($v['year'] !== $current_year) {
                                    $current_year = $v['year'];
                                    echo '<li class="year"><span>' . $current_year . '</span></li>';
                                }
                                if ($v['month'] !== $current_month) {
                                    $current_month = $v['month'];
                                    echo '<li><a href="#' . $v['month-year'] . '" onclick="kp_filter_li_click(jQuery(this))">' . $v['month-text'] . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <input type="hidden" id="stored_month_year" value='<?php echo json_encode($month_year); ?>'>
                        <input type="hidden" id="no_post_found" value="0">
                    </div>
                </div><!--kp-filter-->
            </div><!--timeline-container-->
            <?php
            break;        
        default:
            break;
    }
}
else {    
    if(is_user_logged_in()){
        if(get_admin_of_courrent_blog()){
            echo '<p class="df_no_post_msg">You have not posted yet. Click <a href="javascript:void(0)" class="df_add_new_post">here</a> to post your blog.</p>';
        }
        else{
            echo '<p class="df_no_post_msg">No post to display.</p>';
        }
    }
    else{
        echo '<p class="df_no_post_msg">No post to display.</p>';
    }
}
echo '</div><!--tab-container-1-->';
echo '</div><!--entry-list-->';
wp_reset_postdata();
//switch_to_blog(1);
}

function multisite_popular_posts(){ ?>
    <div id="kopa_widget_articlelist_small_thumbnail-2" class="widget clearfix kopa_widget_articlelist_small_thumbnail clearfix">
        <h4 class="widget-title clearfix">
        <span>Popular Posts</span>
    </h4>
<?php
$categories_1 = get_categories();
        $site_categories = array();
        foreach ($categories_1 as $category) {
            $site_categories[] = $category->term_id;
        }
        $tags_1 = get_tags();
        $site_tags = array();
        foreach ($tags_1 as $tag) {
            $site_tags[] = $tag->term_id;
        }      

    $instance = array(
        'title_1' => 'Blog',
        'display_type_1' => 'blog',
        'categories_1' => $site_categories,
        'relation_1' => 'OR',
        'tags_1' => $site_tags,
        'number_of_article_1' => 4,
        'orderby_1' => 'lastest',
    );

    $article_tabs = array(
        'title' => $instance['title_1'],
        'display_type' => $instance['display_type_1'],
        'categories' => $instance['categories_1'],
        'relation' => esc_attr($instance['relation_1']),
        'tags' => $instance['tags_1'],
        'number_of_article' => (int) $instance['number_of_article_1'],
        'orderby' => $instance['orderby_1']
    );
$query_args['categories'] = $article_tabs['categories'];
$query_args['relation'] = $article_tabs['relation'];
$query_args['tags'] = $article_tabs['tags'];
$query_args['number_of_article'] = $article_tabs['number_of_article'];
$query_args['orderby'] = $article_tabs['orderby'];
$posts = kopa_widget_article_build_query($query_args);
if ($posts->post_count > 0):
?>
<ul class="kp-popular-post">                        
    <?php
    while ($posts->have_posts()):
        $posts->the_post();
        $post_url = get_permalink();
        $post_title = get_the_title();
        ?>
        <li>
            <article class="clearfix">
    <?php if (has_post_thumbnail()): ?>
                    <a href="<?php echo $post_url; ?>" class="entry-thumb"><?php the_post_thumbnail('kopa-image-size-0'); ?></a>
    <?php endif; ?>
                <div class="entry-content">
                    <h4 class="entry-title"><a href="<?php echo $post_url; ?>"><?php echo $post_title; ?></a></h4>
                    <span class="entry-date"><span class="icon-clock-4 entry-icon"></span><?php echo get_the_date(); ?></span>
                    <span class="entry-comment"><span class="icon-bubbles-4 entry-icon"></span><?php comments_popup_link(__('0 Comments', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                </div>
            </article>
        </li>       
    <?php
endwhile;
?>
</ul>
<?php
endif;
wp_reset_postdata();
?>
        </div>
<?php }
function multisite_list_categories(){ ?>
    <div id="categories-2" class="widget clearfix widget_categories">
        <h4 class="widget-title clearfix">
            <span>Categories</span>
        </h4>
        <ul>
    <?php
        $cat_args['title_li'] = '';
        wp_list_categories(apply_filters('widget_categories_args', $cat_args));
    ?>
        </ul>

    </div>
<?php }
function multisite_last_twitter_feed(){ 
//    global $wpdb;
//    $records = $wpdb->get_results("SELECT * FROM `wp_options` WHERE `option_name` = 'widget_reallysimpletwitterwidget'", ARRAY_A);
//    foreach ($records as $record) {
//        $twitter_feed_settings = $record['option_value'];
//    }
//    echo '<pre>';
//    print_r(get_option('widget_reallysimpletwitterwidget'));
//    echo '</pre>';
    
?>
    <div id="reallysimpletwitterwidget-2" class="widget clearfix widget_reallysimpletwitterwidget">
        <h4 class="widget-title clearfix">
            <span>Last Tweets</span>
        </h4>
        <?php echo do_shortcode('[really_simple_twitter username="" consumer_key="" consumer_secret="" access_token="" access_token_secret=""]'); ?>
    </div>
<?php }
function multisite_categories(){ ?>
    <select name="df_blog_cat" id="df_blog_cat">
    <?php
        $args = array(
            'type'                     => 'post',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 0,
            'hierarchical'             => 1,
            'exclude'                  => '',
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'category',
            'pad_counts'               => false 

        ); 
        $categories = get_categories($args);
        
        foreach ( $categories as $category ) { ?>
            <option value="<?php echo $category->term_id;?>"><?php echo $category->name;?></option>
   <?php } ?>
    </select>
<?php 
//echo '<pre>';
//print_r($categories);
//echo '</pre>';
}
function __add_global_categories( $term_id )
{
    if ( get_current_blog_id() !== BLOG_ID_CURRENT_SITE || ( !$term = get_term( $term_id, 'category' ) ) )
        return $term_id; // bail

    if ( !$term->parent || ( !$parent = get_term( $term->parent, 'category' ) ) )
        $parent = null;

    global $wpdb;

    $blogs = $wpdb->get_col( "SELECT blog_id FROM {$wpdb->blogs} WHERE site_id = '{$wpdb->siteid}'" );
    foreach ( $blogs as $blog ) {
        $wpdb->set_blog_id( $blog );

        if ( $parent && ( $_parent = get_term_by( 'slug', $parent->slug, 'category' ) ) )
            $_parent_ID = $_parent->term_id;
        else
            $_parent_ID = 0;

        wp_insert_term( $term->name, 'category',  array(
            'slug' => $term->slug,
            'parent' => $_parent_ID,
            'description' => $term->description
        ));
    }

    $wpdb->set_blog_id( BLOG_ID_CURRENT_SITE );
}
add_action( 'created_category', '__add_global_categories' );
$post = get_page_by_path('hello-world',OBJECT,'post');
if ($post) {
 wp_delete_post($post->ID,true);
}
function currentPageURL() {
    $curpageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$curpageURL.= "s";}
    $curpageURL.= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
    $curpageURL.= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
    $curpageURL.= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $curpageURL;
}
function get_admin_of_courrent_blog(){
    global $current_user, $wpdb;
    $blogs = get_blogs_of_user( $current_user->id );
     if($blogs) {
     	 foreach ( $blogs as $blog ) {
           $blog_url = "http://".$blog->domain . $blog->path;
           if(currentPageURL() == $blog_url){
               return TRUE;
           }
        }
     }
     return FALSE;
}   
function multisite_category_import($blog_id){
    $current_blog_id = $blog_id;
    switch_to_blog(1);
        $args = array(
            'type'                     => 'post',
            'child_of'                 => 0,
            'parent'                   => '',
            'orderby'                  => 'name',
            'order'                    => 'ASC',
            'hide_empty'               => 0,
            'hierarchical'             => 1,
            'exclude'                  => '',
            'include'                  => '',
            'number'                   => '',
            'taxonomy'                 => 'category',
            'pad_counts'               => false 

        ); 
        $categories = get_categories($args);
        require_once(ABSPATH . "wp-admin/includes/taxonomy.php");
        switch_to_blog($current_blog_id);
        foreach ($categories as $categorie) {
            $cat_array = array(
                'cat_name'=>$categorie->cat_name, 
                'category_description'=>$categorie->category_description, 
                'category_nicename'=> $categorie->category_nicename, 
                'category_parent' => $categorie->category_parent
            );
            wp_insert_category($cat_array);
        }
        update_option('comment_registration', 1);
}
add_action('wpmu_new_blog','multisite_category_import');

function multisite_fav_blogs_timeline(){
    global $user_ID;
    $fav_posts = get_user_meta($user_ID, 'fav_blogs', true);
    $fav_posts = unserialize($fav_posts);
    $title_class = '';
    $tab_content_class = '';
    $article_tabs['display_type'] = 'blog';
    $article_tabs['title'] = 'Favorite Blogs';
    if ($article_tabs['display_type'] == 'portfolio') {
        $tab_content_class = ' portfolio-content';
    }
    echo '<div class="entry-list">';
    echo '<h2 class="kp-title"><span data-icon="';
    if ($article_tabs['display_type'] == 'blog') {
        echo '&#xe014;';
    } else {
        echo '&#xe02f;';
    }
    echo '" aria-hidden="true"></span>' . $article_tabs['title'] . '</h2>';
    echo "<div class='tab-container-1 {$tab_content_class}'>";
if(!empty($fav_posts)){
    switch ($article_tabs['display_type']) {
        case 'blog':
?>
            <div class="timeline-container clearfix">
                <div id="time-line"></div>
                <?php
                $no_of_posts = 0;
                $month_year = array();
                $post_id_array = array();
                $previous_date = '';
                foreach ($fav_posts as $fav_post) {
                $no_of_posts++;
                switch_to_blog($fav_post['blog_id']);
                $query_args = array(
                    'posts_per_page' => 5,
                    'p' => $fav_post['post_id']
                );
                $posts = new WP_Query($query_args);
                while ($posts->have_posts()):
                    $posts->the_post();
                    $post_id = get_the_ID();
                    array_push($post_id_array, $post_id);
                    $post_url = get_permalink();
                    $post_title = get_the_title();
                    $current_date = get_the_date('M,Y');
                    $_element = array(
                        'month' => get_the_date('m'),
                        'year' => get_the_date('Y'),
                        'month-year' => get_the_date('M') . '-' . get_the_date('Y'),
                        'month-text' => get_the_date('F')
                    );
                    array_push($month_year, $_element);
                    if ($current_date != $previous_date && $no_of_posts == 1):
                        $previous_date = $current_date;
                        $total_post_no = count($fav_posts);
                        ?>
                        <div class="time-to-filter clearfix" id="<?php echo get_the_date('M') . '-' . get_the_date('Y'); ?>">
                            <p class="timeline-filter"><span><?php echo $current_date; ?></span></p>
                            <span class="post-quantity"><?php
                    echo $total_post_no;
                    if ($total_post_no <= 1): _e(' Article', kopa_get_domain());
                    else: _e(' Articles', kopa_get_domain());
                    endif;
                        ?>
                            </span>
                            <span class="top-ring"></span>
                            <span class="bottom-ring"></span>
                        </div><!--time-to-filter-->
                    <?php
                endif;
                switch (get_post_format()) {
                    case 'quote':
                        ?>
                            <article class="timeline-item quote-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe075;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">                                                    
                                    <div class="quote-format"><?php the_excerpt(); ?></div>
                                    <center><span class="quote-name"><?php the_author(); ?></span></center>
                                    <header>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                </div>
                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'video':
                        $video = kopa_content_get_video($post->post_content);
                        ?>
                            <article class="timeline-item video-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe023;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                    <div class="kp-thumb hover-effect">
                                        <div class="mask" onclick="jQuery(this).find('a.link-detail').click();">
                                            <a href="<?php echo $video[0]['url']; ?>" rel="prettyPhoto" class="link-detail" data-icon="&#xe022;"><span></span></a>
                                        </div>
                                        <?php
                                        if (has_post_thumbnail()):
                                            the_post_thumbnail('kopa-image-size-1');
                                        else:
                                            printf('<img src="%1$s" alt="">', kopa_get_video_thumbnails_url($video[0]['type'], $video[0]['url']));
                                        endif;
                                        ?>
                                    </div>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>

                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'gallery':
                        ?>
                            <article class="timeline-item gallery-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe01d;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix"> 
                                    <?php
                                    $gallery = kopa_content_get_gallery($post->post_content);
                                    if ($gallery) {
                                        $shortcode = substr_replace($gallery[0]['shortcode'], ' display_type = 1]', strlen($gallery[0]['shortcode']) - 1, strlen($gallery[0]['shortcode']));
                                        echo do_shortcode($shortcode);
                                    }
                                    ?>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <span class="load-more-gallery" onclick="more_gallery(jQuery(this));"><span></span></span>
                                </div>                                                    

                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'audio':
                        ?>
                            <article class="timeline-item audio-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe020;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <?php
                                    $audio = kopa_content_get_audio($post->post_content);
                                    if ($audio) {
                                        echo do_shortcode($audio[0]['shortcode']);
                                    }
                                    ?>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>

                            </article><!--timeline-item-->
                            <?php
                            break;
                        default:
                            ?>
                            <article class="timeline-item <?php
                        if (has_post_thumbnail())
                            echo ' standard-post ';
                        else
                            echo 'link-post'
                            ?> clearfix">
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                        <?php if (has_post_thumbnail()): ?>
                                        <div class="kp-thumb hover-effect">
                                            <div class="mask" onclick="window.location = '<?php echo $post_url; ?>';">
                                                <a class="link-detail" href="<?php echo $post_url; ?>" data-icon="&#xe0c2;"></a>
                                            </div>
                            <?php the_post_thumbnail('kopa-image-size-1'); ?>
                                        </div>
                        <?php endif; ?>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>
                            </article><!--timeline-item-->
                        <?php
                        break;
                }
                ?>
    <?php endwhile;  } ?>  
                <!--<span class="load-more kp-tooltip" data-toggle="tooltip" data-original-title="<?php //_e('Load More', kopa_get_domain()); ?>" onclick="loadmore_articles_fav_blogs(jQuery(this))"><i class="icon-plus"></i></span>-->
                <span class="kp-loading hidden"></span>                            
            <?php
            wp_nonce_field("load_more_articles_fav_blogs", "nonce_id_load_more_fav_blogs");
            $post_id_string = implode(",", $post_id_array);
            ?>
                <input type="hidden" id="post_id_array" value="<?php echo $post_id_string; ?>">
                <div class="kp-filter clearfix">
                    <div onclick="kp_filter_click(jQuery(this))">
                        <span><?php _e('View by:', kopa_get_domain()); ?></span><em><?php _e('All', kopa_get_domain()); ?></em>
                        <a></a>                                    
                        <ul id="ss-links" class="ss-links">
                            <?php
                            $current_month = '';
                            $current_year = '';
                            foreach ($month_year as $k => $v) {
                                if ($v['year'] !== $current_year) {
                                    $current_year = $v['year'];
                                    echo '<li class="year"><span>' . $current_year . '</span></li>';
                                }
                                if ($v['month'] !== $current_month) {
                                    $current_month = $v['month'];
                                    echo '<li><a href="#' . $v['month-year'] . '" onclick="kp_filter_li_click(jQuery(this))">' . $v['month-text'] . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <input type="hidden" id="stored_month_year" value='<?php echo json_encode($month_year); ?>'>
                        <input type="hidden" id="no_post_found" value="0">
                    </div>
                </div><!--kp-filter-->
            </div><!--timeline-container-->
            <?php
            break;
        default:
            break;
        }
    }
else {
    if(is_user_logged_in()){
        echo '<p class="df_no_post_msg">Your favorite blogs list is empty.</p>';
    }
}
echo '</div><!--tab-container-1-->';
echo '</div><!--entry-list-->';
wp_reset_postdata();
switch_to_blog(1);
}
function array_push_associative(&$arr) {
    $ret = 0;
    $args = func_get_args();
    foreach ($args as $arg) {
       if (is_array($arg)) {
           foreach ($arg as $key => $value) {
               $arr[$key] = $value;
               $ret++;
           }
       }else{
           $arr[$arg] = "";
       }
    }
    return $ret;
}
function multisite_new_user_reg($usre_id){
    global $wpdb;
    update_user_meta($usre_id,'account_status', 0);
    $key = wp_generate_password( 20, false );
    do_action( 'retrieve_password_key', $usre_id, $key );
    $wpdb->update( $wpdb->users, array( 'user_activation_key' => $key ), array( 'ID' => $usre_id ) );
}
add_action('user_register', 'multisite_new_user_reg', 10, 1);

function multisite_login_auth($user, $password){
    if(get_user_meta($user->ID, 'account_status', true) == 1){
        return $user;
    }
    else{
        return FALSE;
    }
}
add_filter('wp_authenticate_user', 'multisite_login_auth',10,2);
remove_filter('the_content', 'wptexturize');
function multisite_tag_cloud_widget(){
    $instance['title'] = 'Tags';
    $instance['taxonomy'] = 'post_tag';
    $current_taxonomy = 'post_tag';
    if ( !empty($instance['title']) ) {
            $title = $instance['title'];
    } else {
            if ( 'post_tag' == $current_taxonomy ) {
                    $title = __('Tags');
            } else {
                    $tax = get_taxonomy($current_taxonomy);
                    $title = $tax->labels->name;
            }
    }
    //$title = apply_filters('widget_title', $title, $instance, $this->id_base);
?>
<?php
    echo '<div id="tag_cloud-2" class="widget clearfix widget_tag_cloud">
            <h4 class="widget-title clearfix">
            <span>'.$title.'</span>
            </h4>';
    echo '<div class="tagcloud">';
    wp_tag_cloud( apply_filters('widget_tag_cloud_args', array('taxonomy' => $current_taxonomy) ) );
    echo "</div>\n";
    echo "</div>";
}
function multisite_timeline_widget(){
        $categories_1 = get_categories();
        $site_categories = array();
        foreach ($categories_1 as $category) {
            $site_categories[] = $category->term_id;
        }
        $tags_1 = get_tags();
        $site_tags = array();
        foreach ($tags_1 as $tag) {
            $site_tags[] = $tag->term_id;
        }      

    $instance = array(
        'title_1' => 'Blog',
        'display_type_1' => 'blog',
        'categories_1' => $site_categories,
        'relation_1' => 'OR',
        'tags_1' => $site_tags,
        'number_of_article_1' => 5,
        'orderby_1' => 'lastest',
    );

    $article_tabs = array(
        'title' => $instance['title_1'],
        'display_type' => $instance['display_type_1'],
        'categories' => $instance['categories_1'],
        'relation' => esc_attr($instance['relation_1']),
        'tags' => $instance['tags_1'],
        'number_of_article' => (int) $instance['number_of_article_1'],
        'orderby' => $instance['orderby_1']
    );
$title_class = '';
$tab_content_class = '';
if ($article_tabs['display_type'] == 'portfolio') {
    $tab_content_class = ' portfolio-content';
}
echo '<div class="entry-list">';
echo '<h2 class="kp-title"><span data-icon="';
if ($article_tabs['display_type'] == 'blog') {
    echo '&#xe014;';
} else {
    echo '&#xe02f;';
}
echo '" aria-hidden="true"></span>' . $article_tabs['title'] . '</h2>';

echo "<div class='tab-container-1 {$tab_content_class}'>";
$query_args['categories'] = $article_tabs['categories'];
$query_args['relation'] = $article_tabs['relation'];
$query_args['tags'] = $article_tabs['tags'];
$query_args['number_of_article'] = $article_tabs['number_of_article'];
$query_args['orderby'] = $article_tabs['orderby'];
$posts = kopa_widget_article_build_query($query_args);


if ($posts->post_count > 0){

    switch ($article_tabs['display_type']) {
        case 'blog':
            if (count($article_tabs['categories']) > 0):
                foreach ($article_tabs['categories'] as $cat_key => $cat_value) {
                    ?>

                    <input type="hidden" class="kopa_categories_arg" value="<?php echo $cat_value; ?>">
                    <?php
                }
            else:
                ?>
                <input type="hidden" class="kopa_categories_arg" value="none">
            <?php
            endif;

            if (count($article_tabs['tags']) > 0):
                foreach ($article_tabs['tags'] as $tag_key => $tag_value) {
                    ?>

                    <input type="hidden" class="kopa_tags_arg" value="<?php echo $tag_value; ?>">
                    <?php
                }
            else:
                ?>
                <input type="hidden" class="kopa_tags_arg" value="none">
            <?php endif; ?>

            <input type="hidden" id="kopa_relation_arg" value="<?php echo $article_tabs['relation']; ?>">
            <input type="hidden" id="kopa_number_of_article_arg" value="<?php echo $article_tabs['number_of_article']; ?>">
            <input type="hidden" id="kopa_orderbye_arg" value="<?php echo $article_tabs['orderby']; ?>">
            <div class="timeline-container clearfix">
                <div id="time-line"></div>
                <?php
                $previous_date = '';
                $month_year = array();
                $post_id_array = array();
                while ($posts->have_posts()):
                    $posts->the_post();
                    $post_id = get_the_ID();
                    array_push($post_id_array, $post_id);
                    $post_url = get_permalink();
                    $post_title = get_the_title();
                    $current_date = get_the_date('M,Y');
                    $_element = array(
                        'month' => get_the_date('m'),
                        'year' => get_the_date('Y'),
                        'month-year' => get_the_date('M') . '-' . get_the_date('Y'),
                        'month-text' => get_the_date('F')
                    );
                    array_push($month_year, $_element);
                    if ($current_date != $previous_date):
                        $previous_date = $current_date;
                        $total_post_no = kopa_total_post_count_by_month(get_the_date('m'), get_the_date('Y'));
                        ?>
                        <div class="time-to-filter clearfix" id="<?php echo get_the_date('M') . '-' . get_the_date('Y'); ?>">
                            <p class="timeline-filter"><span><?php echo $current_date; ?></span></p>
                            <span class="post-quantity"><?php
                    echo $total_post_no;
                    if ($total_post_no <= 1): _e(' Article', kopa_get_domain());
                    else: _e(' Articles', kopa_get_domain());
                    endif;
                        ?>
                            </span>
                            <span class="top-ring"></span>
                            <span class="bottom-ring"></span>
                        </div><!--time-to-filter-->
                    <?php
                endif;
                switch (get_post_format()) {
                    case 'quote':
                        ?>
                            <article class="timeline-item quote-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe075;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">                                                    
                                    <div class="quote-format"><?php the_excerpt(); ?></div>
                                    <center><span class="quote-name"><?php the_author(); ?></span></center>
                                    <header>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                </div>
                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'video':
                        $video = kopa_content_get_video($post->post_content);
                        ?>
                            <article class="timeline-item video-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe023;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                    <div class="kp-thumb hover-effect">
                                        <div class="mask" onclick="jQuery(this).find('a.link-detail').click();">
                                            <a href="<?php echo $video[0]['url']; ?>" rel="prettyPhoto" class="link-detail" data-icon="&#xe022;"><span></span></a>
                                        </div>
                                        <?php
                                        if (has_post_thumbnail()):
                                            the_post_thumbnail('kopa-image-size-1');
                                        else:
                                            printf('<img src="%1$s" alt="">', kopa_get_video_thumbnails_url($video[0]['type'], $video[0]['url']));
                                        endif;
                                        ?>
                                    </div>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>

                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'gallery':
                        ?>
                            <article class="timeline-item gallery-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe01d;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix"> 
                                    <?php
                                    $gallery = kopa_content_get_gallery($post->post_content);
                                    if ($gallery) {
                                        $shortcode = substr_replace($gallery[0]['shortcode'], ' display_type = 1]', strlen($gallery[0]['shortcode']) - 1, strlen($gallery[0]['shortcode']));
                                        echo do_shortcode($shortcode);
                                    }
                                    ?>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <span class="load-more-gallery" onclick="more_gallery(jQuery(this));"><span></span></span>
                                </div>                                                    

                            </article><!--timeline-item-->
                        <?php
                        break;
                    case 'audio':
                        ?>
                            <article class="timeline-item audio-post clearfix">                                                    
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe020;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <?php
                                    $audio = kopa_content_get_audio($post->post_content);
                                    if ($audio) {
                                        echo do_shortcode($audio[0]['shortcode']);
                                    }
                                    ?>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>

                            </article><!--timeline-item-->
                            <?php
                            break;
                        default:
                            ?>
                            <article class="timeline-item <?php
                        if (has_post_thumbnail())
                            echo ' standard-post ';
                        else
                            echo 'link-post'
                            ?> clearfix">
                                <div class="timeline-icon">
                                    <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                    <span class="dotted-horizon"></span>
                                    <span class="vertical-line"></span>
                                    <span class="circle-outer"></span>
                                    <span class="circle-inner"></span>
                                </div>
                                <div class="entry-body clearfix">
                                        <?php if (has_post_thumbnail()): ?>
                                        <div class="kp-thumb hover-effect">
                                            <div class="mask" onclick="window.location = '<?php echo $post_url; ?>';">
                                                <a class="link-detail" href="<?php echo $post_url; ?>" data-icon="&#xe0c2;"></a>
                                            </div>
                            <?php the_post_thumbnail('kopa-image-size-1'); ?>
                                        </div>
                        <?php endif; ?>
                                    <header>
                                        <h2 class="entry-title"><a href="<?php echo $post_url; ?>"><?php the_title(); ?></a></h2>
                                        <span class="entry-date"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php echo get_the_date(); ?></span></span>
                                        <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                    </header>
                                    <p><?php the_excerpt(); ?></p>
                                    <a href="<?php echo $post_url; ?>" class="more-link"><?php _e('Continue Reading &raquo;', kopa_get_domain()); ?></a>
                                </div>
                            </article><!--timeline-item-->
                        <?php
                        break;
                }
                ?>
                <?php endwhile; ?>  
                <span class="load-more kp-tooltip" data-toggle="tooltip" data-original-title="<?php _e('Load More', kopa_get_domain()); ?>" onclick="loadmore_articles(jQuery(this))"><i class="icon-plus"></i></span>
                <span class="kp-loading hidden"></span>                            
            <?php
            wp_nonce_field("load_more_articles", "nonce_id_load_more");
            $post_id_string = implode(",", $post_id_array);
            ?>
                <input type="hidden" id="post_id_array" value="<?php echo $post_id_string; ?>">
                <div class="kp-filter clearfix">
                    <div onclick="kp_filter_click(jQuery(this))">
                        <span><?php _e('View by:', kopa_get_domain()); ?></span><em><?php _e('All', kopa_get_domain()); ?></em>
                        <a></a>                                    
                        <ul id="ss-links" class="ss-links">
                            <?php
                            $current_month = '';
                            $current_year = '';
                            foreach ($month_year as $k => $v) {
                                if ($v['year'] !== $current_year) {
                                    $current_year = $v['year'];
                                    echo '<li class="year"><span>' . $current_year . '</span></li>';
                                }
                                if ($v['month'] !== $current_month) {
                                    $current_month = $v['month'];
                                    echo '<li><a href="#' . $v['month-year'] . '" onclick="kp_filter_li_click(jQuery(this))">' . $v['month-text'] . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        <input type="hidden" id="stored_month_year" value='<?php echo json_encode($month_year); ?>'>
                        <input type="hidden" id="no_post_found" value="0">
                    </div>
                </div><!--kp-filter-->
            </div><!--timeline-container-->
            <?php
            break;

        case 'portfolio':
            ?>
            <div id="isotop-container">
                <header id ="options" class="isotop-header clearfix">
                    <em><?php echo __('Sort by:', kopa_get_domain()); ?></em><span><?php echo __('All', kopa_get_domain()); ?></span>
                    <a></a>
                    <ul id="filters" class="option-set clearfix" data-option-key="filter">   
                        <li><a href="#filter"  data-option-value="*"><?php echo __('View All', kopa_get_domain()); ?></a></li>                                 
                        <?php
                        $projects = get_terms('portfolio_project');
                        foreach ($projects as $project):
                            ?>                        
                            <li><a data-option-value="<?php echo ".kopa-portfolio-{$project->slug}"; ?>" href="#filter"><?php echo $project->name; ?></a></li>                                    
                        <?php
                    endforeach;
                    ?>
                    </ul><!-- end #portfolio-items-filter -->      
                </header><!-- end .page-header -->
                <div id="portfolio-items">
                    <?php
                    $pf_args['post_type'] = 'portfolio';
                    $pf_args['posts_per_page'] = -1;
                    $query = new WP_Query($pf_args);
                    while ($query->have_posts()) : $query->the_post();
                        $post_id = get_the_ID();
                        $post_url = get_permalink();
                        $post_title = get_the_title();

                        $portfolio_project_links = array();
                        $portfolio_tag_links = array();

                        $portfolio_projects = wp_get_post_terms($post_id, 'portfolio_project');

                        $classes = array();
                        if ($portfolio_projects) {
                            foreach ($portfolio_projects as $project) {
                                $classes[] = "kopa-portfolio-{$project->slug}";
                            }
                        }
                        $classes = implode(' ', $classes);

                        $full_size_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $thumbnails_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'kopa-image-size-6');
                        ?>

                        <article class="element <?php echo $classes; ?>" data-category="<?php echo $classes; ?>">
                            <div class="mask">
                                <a rel="prettyPhoto[kopa-gallery]" href="<?php echo $full_size_image[0]; ?>" class="kp-pf-gallery" data-icon="&#xe07e;"></a>
                                <a href="<?php the_permalink(); ?>" class="kp-pf-detail" data-icon="&#xe0c2;"></a>
                                <div class="portfolio-caption">
                                    <h3><?php echo $post_title; ?></h3>
                            <?php the_excerpt(); ?>
                                </div>
                            </div>
                            <?php
                            if ($thumbnails_image):
                                $size = getimagesize($thumbnails_image[0]);
                                ?>
                                <img src="<?php echo $thumbnails_image[0]; ?>" <?php echo $size[3]; ?> alt="" />
                        <?php endif; ?>
                        </article><!--element-->
                <?php
            endwhile;
            wp_reset_query();
            ?>
                </div><!--portfolio-items-->
            </div><!--isotop-container-->
            <?php
            break;
        default:
            break;
    }
}
else {
    if(is_user_logged_in()){
        if(get_admin_of_courrent_blog()){
            echo '<p class="df_no_post_msg">You have not posted yet. Click <a href="javascript:void(0)" class="df_add_new_post">here</a> to post your blog.</p>';
        }
        else{
            echo '<p class="df_no_post_msg">No post to display.</p>';
        }
    }
    else{
        echo '<p class="df_no_post_msg">No post to display.</p>';
    }
}
echo '</div><!--tab-container-1-->';
echo '</div><!--entry-list-->';
wp_reset_postdata();
}

function multisite_latest_posts_carousel_front() {
        $df_blogs = get_blog_list( 0, 'all' );
        $title = 'All Posts';
        ?>
            <div id="kopa_widget_carousel_posts-3" class="widget clearfix kp-our-work">
        <span class="bottom-circle"></span>
        <span class="bottom-bullet"></span>

        <div class="wrapper">

            <div class="row-fluid">

                <div class="span12">
                    <h4 class="widget-title clearfix">
                        <span>
                            <?php
                                if (!empty($title))
                                    echo $title;
                            ?>
                        </span>
                    </h4>
                    

                    <div class="list-carousel responsive" >

                        <ul class="our-work-widget">

                        <?php
                            foreach($df_blogs as $blogs) {
                                switch_to_blog($blogs['blog_id']);
                                    $categories_1 = get_categories();
                                    $site_categories = array();
                                    foreach ($categories_1 as $category) {
                                        $site_categories[] = $category->term_id;
                                    }
                                    $tags_1 = get_tags();
                                    $site_tags = array();
                                    foreach ($tags_1 as $tag) {
                                        $site_tags[] = $tag->term_id;
                                    }      

                                $instance = array(
                                    'categories' => $site_categories,
                                    'categories_1' => $site_categories,
                                    'relation' => 'OR',
                                    'tags' => $site_tags,
                                    'number_of_article' => 8,
                                    'orderby' => 'lastest',
                                );
                                $query_args['categories'] = $instance['categories'];
                                $query_args['relation'] = esc_attr($instance['relation']);
                                $query_args['tags'] = $instance['tags'];
                                $query_args['number_of_article'] = (int) $instance['number_of_article'];
                                $query_args['orderby'] = $instance['orderby'];

                                $posts = kopa_widget_article_build_query($query_args);
                                while ($posts->have_posts()) : $posts->the_post();
                                $post_id = get_the_ID();

                                if (has_post_thumbnail($post_id)):
                                    $feature_image = get_post_thumbnail_id($post_id);
                                    $thumbnail = wp_get_attachment_image_src($feature_image, 'kopa-image-size-1');
                                endif;
                                ?>                                    
                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb hover-effect">

                                            <div class="mask">
                                                <a class="link-detail" data-icon="&#xe0c2;" href="<?php the_permalink(); ?>"></a>
                                            </div>

            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php echo $thumbnail[0]; ?>" alt="">
            <?php endif; ?>

                                        </div>
                                        <div class="entry-content">
                                            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p class="entry-meta">
                                                <span class="entry-category"><span class="icon-clock-4 entry-icon" aria-hidden="true"></span><span><?php the_time('F j, Y'); ?></span></span>
                                                <span class="entry-comment"><span class="icon-bubbles-4 entry-icon" aria-hidden="true"></span><?php comments_popup_link(__('No Comment', kopa_get_domain()), __('1 Comment', kopa_get_domain()), __('% Comments', kopa_get_domain()), '', __('Comments Off', kopa_get_domain())); ?></span>
                                            </p>
                                            <p><?php echo strip_tags(get_the_excerpt()); ?></p>
                                            <a class="more-link" href="<?php the_permalink(); ?>">
            <?php _e('Read more &raquo;', kopa_get_domain()); ?>
                                            </a>
                                        </div><!--entry-content-->
                                    </article><!--entry-item-->
                                </li>

        <?php endwhile;  }?>
                        </ul>

                        <div class="clearfix"></div>

                        <div class="carousel-nav clearfix">
                            <a id="widget-kopa_widget_carousel_posts-3-prev" class="carousel-prev" href="#">&lt;</a>
                            <a id="widget-kopa_widget_carousel_posts-3-next" class="carousel-next" href="#">&gt;</a>
                        </div><!--end:carousel-nav-->

                    </div><!--end:list-carousel-->

                </div><!--span12-->

            </div><!--row-fluid-->

        </div><!--wrapper-->
</div>
<?php
    }
?>