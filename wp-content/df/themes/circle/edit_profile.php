<?php
    /* Template Name: Post Submit */
    get_header();
?>
<?php //echo do_shortcode('[wpuf_addpost]'); ?>
    <div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col"> 
                    <div class="article-list-line"></div>
                    
                    <span class="article-bullet"></span>
                    <ul class="article-list clearfix">
                       <div class="entry-list">
                           <h2 class="kp-title"><span data-icon="&#xe014;" aria-hidden="true"></span>Create Account</h2>
                           <div class='tab-container-1 '>
                            <div class="timeline-container clearfix">
                            <div id="time-line"></div>
                                <div class="time-to-filter clearfix" id="Jun-2013">
                                    <p class="timeline-filter"><span>Jun,2013</span></p>
                                    <span class="post-quantity-reg">Members Benefits: Post Business Listing, Submit Recipes, Review and Rate Postings, more....</span>
                                    <span class="top-ring"></span>
                                    <span class="bottom-ring"></span>
                                </div><!--time-to-filter-->
                            <form name="dailyfooties_registration" id="dailyfooties_registration" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" method="post">
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/01-USER.png" style="height:50px; width:50px;" /></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <!--<label>Username</label>-->
                                            <input type="text" name="username" id="username" class="reg_txt_fldt" value="" /></p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/02-ENVELOPE.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <?php wp_editor('', 'description', $settings = array('media_buttons' => TRUE));?>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix long_stem"></article><!--timeline-item-->
                                <span class="load-more kp-tooltip" data-toggle="tooltip" ><i class="icon-plus"></i></span>
                                </form>
                    </div><!--timeline-container-->
                    </div><!--tab-container-1--></div><!--entry-list-->  
                    </ul><!--article-list-->
            </div><!--main-col-->
                <div class="sidebar widget-area-1">
                    
                </div><!--sidebar-->

                    <div class="clear"></div>

                </div><!--span12-->

        </div><!--row-fluid-->  

    </div><!--wrapper-->
<?php get_footer(); ?>
