<?php
 /* Template Name: My Profile */
if(!is_user_logged_in()){
    wp_safe_redirect(home_url());
    exit();
}
get_header();
$template_setting = kopa_get_template_setting();
$sidebars = $template_setting['sidebars'];
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/lightbox.css">
<script src="<?php echo get_template_directory_uri();?>/js/lightbox-2.6.min.js"></script>
<div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col"> 
                    <div class="article-list-line"></div>
                    
                    <span class="article-bullet"></span>
                    <ul class="article-list clearfix">
                       <div class="entry-list">
                           <h2 class="kp-title"><span data-icon="&#xe014;" aria-hidden="true"></span>Profile Info</h2>
                           <div class="tab-container-1 my_prof_cont ">
                            <div class="timeline-container clearfix">
                            <div id="time-line"></div>
                                <div id="Jun-2013" class="time-to-filter clearfix line_s">
                                    <p class="timeline-filter"><span><?php echo date("M Y", strtotime(get_userdata(get_current_user_id( ))->user_registered)); ?> </span></p>
                                    <span class="post-quantity-reg">Member since</span>
                                    <span class="top-ring"></span>
                                    <span class="bottom-ring"></span>
                                </div><!--time-to-filter-->
                        <div style="text-align: center; margin: 10px 0 20px 10px; font-weight: bold; font-size: 15px; color: green" id="result">
                            
                        </div>
                            <form method="post" action="http://dailyfoodies.com/my-account/edit-account-info/" id="dailyfooties_registration" name="dailyfooties_registration">
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img style="height:50px; width:50px;" src="http://dailyfoodies.com/wp-content/uploads/2013/12/01-USER.png"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label><?php echo $current_user->user_login;?></label>
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img style="height:50px; width:50px;" src="http://dailyfoodies.com/wp-content/uploads/2013/12/02-ENVELOPE.png"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>My Blog</label>
                                            
                                        </div>
										
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img style="height:50px; width:50px;" src="http://dailyfoodies.com/wp-content/uploads/2013/12/WWW.png"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label><?php echo $current_user->user_url; ?></label>
                                           </p>
                                        </div>
                                </article><!--timeline-item-->
                                
                                
                                
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img style="height:50px; width:50px;" src="http://dailyfoodies.com/wp-content/uploads/2013/12/facebook.png"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label><?php echo $current_user->facebook; ?></label>
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img style="height:50px; width:50px;" src="http://dailyfoodies.com/wp-content/uploads/2013/12/twitter.png"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label><?php echo $current_user->twitter; ?></label>
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img style="height:50px; width:50px;" src="http://dailyfoodies.com/wp-content/uploads/2013/12/pinterest.png"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                           <p>
                                                <label><?php echo $current_user->pinterest; ?></label>
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                
                                <article class="timeline-item  standard-post  clearfix long_stem"></article><!--timeline-item-->
								
                                <span data-toggle="tooltip" class="load-more kp-tooltip" data-original-title="" title=""><i class="icon-plus"></i></span>
                                </form>
                    </div><!--timeline-container-->
                    
                    </div><!--tab-container-1-->
                       <div class="rt_image_gal">
                           <ul id="etalage">
                                <li>
                                <a href="<?php echo get_template_directory_uri();?>/images/Chrysanthemum.jpg" data-lightbox="example-set">
                                    <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Chrysanthemum.jpg" />
                                </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Desert.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Desert.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Hydrangeas.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Hydrangeas.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Jellyfish.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Jellyfish.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Koala.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Koala.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Lighthouse.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Lighthouse.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Penguins.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Penguins.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                                <li>
                                    <a href="<?php echo get_template_directory_uri();?>/images/Tulips.jpg" data-lightbox="example-set">
                                        <img class="etalage_thumb_image" src="<?php echo get_template_directory_uri();?>/images/Tulips.jpg" />
                                    </a>
                                    <img class="etalage_source_image" src="#" title="This is an optional description." />
                                </li>
                        </ul>
                       </div>
                    </div><!--entry-list-->  
                    </ul><!--article-list-->
            </div>
            <div class="sidebar widget-area-1">
                <?php
                if (is_active_sidebar($sidebars[0])):
                    dynamic_sidebar($sidebars[0]);
                endif;
                ?>
            </div><!--sidebar-->

            <div class="clear"></div>

        </div><!--span12-->

    </div><!--row-fluid-->  

</div><!--wrapper-->
<?php get_footer(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/etalage.css">
<script src="<?php echo get_template_directory_uri();?>/js/jquery.etalage.min.js"></script>
<script>
	jQuery(document).ready(function($){
            $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 400,
            });
        });
</script>