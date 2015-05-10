<?php 
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
                   <p><?php if(!empty($errors)) {echo $errors;}?></p>
                    <ul class="article-list clearfix">
                       <div class="entry-list">
                           <h2 class="kp-title"><span data-icon="&#xe014;" aria-hidden="true"></span>Create Account</h2>
                           <div class='tab-container-1 '>
                            <div class="timeline-container clearfix">
                            <div id="time-line"></div>
                                <div class="time-to-filter clearfix" id="Jun-2013">
                                    <p class="timeline-filter"><span>Jun,2013</span></p>
                                    <span class="post-quantity">Members Benefits: Post Business Listing, Submit Recipes, Review and Rate Postings, more....</span>
                                    <span class="top-ring"></span>
                                    <span class="bottom-ring"></span>
                                </div><!--time-to-filter-->
                            <form name="dailyfooties_registration" id="dailyfooties_registration" action="" method="post">
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <span style="font-size: 15px; margin-left: 10px;">Username</span>
                                            <input type="text" name="user_login" id="user_login" value="" style="margin-left: 103px;"/>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <span style="font-size: 15px; margin-left: 10px;">Email Address</span>
                                            <input type="text" name="user_email" id="user_email" style="margin-left: 77px;"/>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <span style="font-size: 15px; margin-left: 10px;">Password</span>
                                            <input type="text" name="password" id="password" value="" style="margin-left: 109px;"/>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <span style="font-size: 15px; margin-left: 10px;">Confirm Password</span>
                                            <input type="text" name="repeat_password" id="repeat_password" value="" style="margin-left: 50px;"/>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <span style="font-size: 15px; margin-left: 10px;">reCaptcha</span>
                                            <input type="text" name="dailyfooties_username" id="dailyfooties_username" value="" style="margin-left: 108px;"/>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><p class="post-type" data-icon="&#xe034;"></p></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <span style="font-size: 15px; margin-left: 10px;">Register</span>
                                            <input name="df_submit" type="submit" value="SUBMIT" class="pop_btn" style="margin-left: 151px; font-weight: bold;">
                                        </div>
                                    <input type="hidden" name="redirect_to" value="http://localhost/dailyfoodies2/account-setup/" />
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                </article><!--timeline-item-->
                                <span class="load-more kp-tooltip" data-toggle="tooltip" ><i class="icon-plus"></i></span>
                                </form>
                    </div><!--timeline-container-->
                    </div><!--tab-container-1--></div><!--entry-list-->  
                    </ul><!--article-list-->

            </div><!--main-col-->
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