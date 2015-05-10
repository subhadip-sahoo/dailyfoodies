<?php
if (!function_exists('load_more_articles_custom_df')) {

    function load_more_articles_custom_df() {
        if (!wp_verify_nonce($_POST['wpnonce'], 'load_more_articles_custom_df'))
            exit();
        if (!empty($_POST)) {
            if (isset($_POST['kopa_categories_arg'])) {
                $cat_name = $_POST['kopa_categories_arg'];
            }           
            echo kopa_get_articles_custom_df($cat_name);
        }

        die();
    }

    add_action('wp_ajax_load_more_articles_custom_df', 'load_more_articles_custom_df');
    add_action('wp_ajax_nopriv_load_more_articles_custom_df', 'load_more_articles_custom_df');
}

function kopa_get_articles_custom_df($term_name) {
$df_blogs = get_blog_list( 0, 'all' );
$df_post_count = 0;
foreach ($df_blogs as $df_blog) {
    $df_post_count = $df_post_count + $df_blog['postcount'];
}
if($df_post_count != 0){
                $posts_not_in = array();
                $previous_post_ids = explode(',', $_POST['kopa_post_id_string']);
                foreach ($previous_post_ids as $id) {
                    $posts_not_in[] = $id;
                }
                $previous_date = '';
                $month_year = array();                               
                foreach ($df_blogs as $df_blog) {
                    switch_to_blog($df_blog['blog_id']);
                    if($df_blog['postcount'] == 0){
                        continue;
                    }
                    $term_id = get_cat_ID( $term_name );
                    $site_categories = array($term_id);
                    $article_tabs['categories'] = $site_categories;
                    $query_args['categories'] = $article_tabs['categories'];
                    $query_args['relation'] = 'OR';                   
                    $query_args['number_of_article'] = 5;
                    $query_args['orderby'] = 'lastest';
                    $query_args['post__not_in'] = $posts_not_in;
                    $posts = kopa_widget_article_build_query($query_args);
                    while ($posts->have_posts()):
                        $posts->the_post();
                        $post_id = get_the_ID();
                        array_push($posts_not_in, $post_id);
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
					endwhile; 
				}
				$post_ids_str = implode(',', $posts_not_in);

}
?>
     <input type="hidden" name="post_id_array" id="post_id_array" value="<?php if(isset($post_ids_str)) { echo $post_ids_str; }?>">
<?php                            
    wp_reset_postdata();
}
?>