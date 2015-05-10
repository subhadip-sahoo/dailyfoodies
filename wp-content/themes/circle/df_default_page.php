<?php
    /* Template Name: Inner Page */
get_header();
$template_setting = kopa_get_template_setting();
$sidebars = $template_setting['sidebars'];
?>
<div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col"> 
                    <div class="article-list-line"></div>
                    <span class="article-bullet"></span>
                    <ul class="article-list clearfix">
                       <div class="entry-list">
                        <?php
                         if(have_posts()){
                             while(have_posts()){
                                 the_post();

                        ?>
                           <h2 class="kp-title"><span data-icon="&#xe014;" aria-hidden="true"></span><?php echo the_title();?></h2>
                           <div class='tab-container-1 '>
                            <div class="timeline-container clearfix">
                            <div id="time-line"></div>
                                <div class="time-to-filter clearfix" id="Jun-2013">
                                    <p class="timeline-filter"><span>Jan,2014</span></p>
                                    <span class="post-quantity-reg">Last Update on</span>
                                    <span class="top-ring"></span>
                                    <span class="bottom-ring"></span>
                                </div><!--time-to-filter-->
                        
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/01-USER.png" style="height:50px; width:50px;" /></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>Username</label></p>
                                        </div>
                                </article><!--timeline-item-->
                            <?php
                                      }
                            }
                            ?>
                                <article class="timeline-item  standard-post  clearfix long_stem"></article><!--timeline-item-->
                                <span class="load-more kp-tooltip" data-toggle="tooltip" ><i class="icon-plus"></i></span>
                    </div><!--timeline-container-->
                    </div><!--tab-container-1--></div><!--entry-list-->  
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