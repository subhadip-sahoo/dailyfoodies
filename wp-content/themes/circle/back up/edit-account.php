<?php
    /* Template Name: Edit Account Info */
if(!is_user_logged_in()){
    wp_safe_redirect(home_url());
    exit();
}
require_once(ABSPATH . WPINC . '/user.php');
global $wpdb, $user_ID, $current_user;
get_currentuserinfo();
$err_msg = '';
$suc_msg = '';
$war_msg = '';
if ($user_ID) {
if(isset($_POST['df_edit_submit'])){
        $username = esc_sql($_POST['username']);
        if(empty($username)) { 
            $err_msg .= "User name should not be empty.<br/>";
        }
        $email = esc_sql($_POST['email']);
        if(empty($email)) { 
            $err_msg .= "Please enter an email address.<br/>";
        }
        if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) { 
            $err_msg .= "Please enter a valid email.<br/>";
        }		
        $password = esc_sql($_POST['password']);
        if(strlen($password) > 0 && strlen($password) < 7){
            $err_msg .= "Password must be at least seven characters long.<br/>";
        }
        $retype_password = esc_sql($_POST['repeat_password']);
        if($retype_password <> $password){
            $err_msg .= "Password does not match.<br/>";
        }
        $website = esc_sql($_POST['website']);
        $facebook = esc_sql($_POST['facebook']);
        $twitter = esc_sql($_POST['twitter']);
        $pinterest = esc_sql($_POST['pinterest']);
        if($err_msg == '') {
            $userdata = array(
                'ID' => $user_ID,
                'user_email' => $email,
                'user_login' => $username,
                'user_url' => $website
            );
            if($password != '' && strlen($password) >= 7){
                 array_push_associative($userdata, array('user_pass' => $password));
            }
            $meta_val = array(
                'facebook' => $facebook,
                'twitter' => $twitter,
                'pinterest' => $pinterest
            );
            $id = wp_update_user( $userdata );
            if($id){
                foreach ($meta_val as $key => $value) {
                     update_user_meta($user_ID, $key, $value);
                }
                $suc_msg .= 'Account edited successfully.';
            }
            else{
                $err_msg .= 'Account edit failed. Please try again.';
            }
        }
    }
$template_setting = kopa_get_template_setting();
$sidebars = $template_setting['sidebars'];
get_header();
?>
<div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col"> 
                    <div class="article-list-line"></div>
                    
                    <span class="article-bullet"></span>
                    <ul class="article-list clearfix">
                       <div class="entry-list">
                           <h2 class="kp-title"><span data-icon="&#xe014;" aria-hidden="true"></span>Account Info</h2>
                           <div class='tab-container-1 '>
                            <div class="timeline-container clearfix">
                            <div id="time-line"></div>
                                <div class="time-to-filter clearfix" id="Jun-2013">
                                    <p class="timeline-filter"><span><?php echo date("M Y", strtotime(get_userdata(get_current_user_id( ))->user_registered)); ?> </span></p>
                                    <span class="post-quantity-reg">You can edit your account info from here.</span>
                                    <span class="top-ring"></span>
                                    <span class="bottom-ring"></span>
                                </div><!--time-to-filter-->
                                <?php 
                                    if(!empty($err_msg)){$color = 'red';}
                                    else if(!empty($war_msg)){$color = 'orange';}
                                    else{$color = 'green';} 
                                ?>
                                <div id="result" style="text-align: center; margin: 10px 0 20px 10px; font-weight: bold; font-size: 15px; color: <?php echo $color;?>">
                                    <?php
                                        if(!empty($err_msg)){echo $err_msg;}
                                        else if(!empty($war_msg)){echo $war_msg;}
                                        else{echo $suc_msg;}
                                    ?>
                                    
                                </div>
                            <form name="dailyfooties_edit_account" id="dailyfooties_edit_account" action="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" method="post">
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
                                                <label>Username</label>
                                                <input type="text" name="username" id="user_login" readonly class="reg_txt_fldt" value="<?php echo $current_user->user_login;?>" />
                                                Username cannot be changed
                                            </p>
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
                                            <p><label>Email Address</label>
                                            <input type="email" name="email" id="email" class="reg_txt_fldt" value="<?php if(isset($email)){echo $email;}else{echo $current_user->user_email;}?>" /></p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/WWW.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>Website</label>
                                            <input type="text" name="website" id="website" class="reg_txt_fldt" value="<?php if(isset($website)){echo $website;}else{echo $current_user->user_url;}?>" /></p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/03-KEY.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label>Change Password</label>
                                                <input type="password" name="password" class="reg_txt_fldt" id="pass1" value="" />
                                                <a href="#" class="jq_page_tooltip" title="If you want to change your password type a new one. Otherwise leave this blank.">what's this?</a>
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/03-KEY.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>Confirm New Password</label>
                                            <input type="password" name="repeat_password" id="pass2" class="reg_txt_fldt" value="" /></p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/gauge.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label>Strength Indicator</label>
                                                <?php
                                                    do_action_ref_array( 'psm_register_form', array( &$template ) ); //PSM hook
                                                ?>
                                               <a href="#" class="jq_page_tooltip" title="Password should be at least seven characters long. Make password stronger by adding numbers and symbols !@#$%7).">what's this?</a>
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/facebook.png" style="height:50px; width:50px;" /></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label>Facebook</label>
                                                <input type="text" placeholder="Please enter your Facebook URL" name="facebook" id="facebook" class="reg_txt_fldt" value="<?php if(isset($facebook)){echo $facebook;}else{echo $current_user->facebook;}?>" />
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/twitter-bird.png" style="height:50px; width:50px;" /></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p>
                                                <label>Twitter</label>
                                                <input type="text" placeholder="Please enter your Twitter URL" name="twitter" id="twitter" class="reg_txt_fldt" value="<?php if(isset($twitter)){echo $twitter;}else{echo $current_user->twitter;}?>" />
                                            </p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/pinterest.png" style="height:50px; width:50px;" /></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                           <p>
                                                <label>Pinterest</label>
                                                <input type="text" placeholder="Please enter your Pinterest URL" name="pinterest" id="pinterest" class="reg_txt_fldt" value="<?php if(isset($pinterest)){echo $pinterest;}else{echo $current_user->pinterest;}?>" />
                                            </p>
                                        </div>
                                </article><!--timeline-item-->

<article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/caption_icon_1.png" style="height:50px; width:50px;" /></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                           <p>
                                                <label>Caption</label>
  <?php
 $aa= get_current_user_id( ); 
  $key = 'caption';
  $single = true;
  $user_last = get_user_meta( $aa, $key, $single ); 	
?>  
<input type="text" placeholder="Please enter image caption" name="caption" id="website" class="reg_txt_fldt" value="<?php echo $user_last; ?>" />
                                            </p>
                                        </div>
                                </article>
					
								<article class="timeline-item  standard-post  clearfix">
								<div class="timeline-icon"><div>
								<img src="http://dailyfoodies.com/wp-content/uploads/2013/12/01-USER.png" style="height:50px; width:50px;"></div><span class="dotted-horizon"></span><span class="vertical-line"></span><span class="circle-outer"></span><span class="circle-inner"></span></div><div class="kp-thumb hover-effect"><p><label>Upload profile picture</label></p><?php $aa= get_current_user_id( ); ?><p id="user-avatar-display-image"><?php echo user_avatar_get_avatar($aa, 150); ?></p><p style="width:430px; float:right;"><a id="user-avatar-link" class="button-primary thickbox" href="<?php echo admin_url('admin-ajax.php'); ?>?action=user_avatar_add_photo&step=1&uid=<?php echo $aa; ?>&TB_iframe=true&width=720&height=450" title="<?php _e('Upload and Crop an Image to be Displayed','user-avatar'); ?>" ><?php _e('Update Picture','user-avatar'); ?></a></p></div></article>
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/05-ARROW.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>Update</label>
                                            <input name="df_edit_submit" id="df_edit_submit" type="submit" value="UPDATE INFO" class="pop_btn" style="font-weight: bold;">
                                            <input name="df_edit_cancel" id="df_edit_cancel" type="button" value="CANCEL" onClick="window.history.back();" class="pop_btn" style="font-weight: bold;margin-left: 66px;"></p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix long_stem"></article><!--timeline-item-->
                                <span class="load-more kp-tooltip" data-toggle="tooltip" ><i class="icon-plus"></i></span>
                                </form>
				<?php
if(isset($_POST['df_edit_submit'])){
$aa= get_current_user_id( );
$caption=$_POST['caption'];
update_user_meta($aa, 'caption', $_POST['caption']);
}
?>		
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
<?php get_footer(); 
}
else {
	wp_redirect( home_url() ); 
        exit();
}
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/js/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <script>
$(function() {
$( '.jq_page_tooltip' ).tooltip();
});
</script>