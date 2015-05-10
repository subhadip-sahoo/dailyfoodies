<?php
    /* Template Name: Registration */
get_header();
require_once(ABSPATH . WPINC . '/user.php');
global $wpdb, $user_ID;
//Check whether the user is already logged in
$err_msg = '';
$suc_msg = '';
$war_msg = '';
if (!$user_ID) {
    if(isset($_POST['df_submit'])){
            //We shall SQL esc_sql all inputs
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
            if(empty($password)) { 
                $err_msg .= "Please enter a password.<br/>";
            }
            if(strlen($password) > 0 && strlen($password) < 7){
                $err_msg .= "Password must be at least seven characters long.<br/>";
            }
            $retype_password = esc_sql($_POST['repeat_password']);
            if($retype_password <> $password){
                $err_msg .= "Password does not match.<br/>";
            }
            $recaptcha_code_ok = false;
            $privatekey = "6LfVEOwSAAAAALe6O3f7MHNcBoZ6GXNZToyj3Xd1";
            if (!empty($_POST["recaptcha_response_field"])) {
                require_once(ABSPATH .'wp-content/themes/circle/scripts/recaptchalib.php');
                $recaptcha_resp = recaptcha_check_answer($privatekey,
                                                $_SERVER["REMOTE_ADDR"],
                                                $_POST["recaptcha_challenge_field"],
                                                $_POST["recaptcha_response_field"]);
                $recaptcha_code_ok = $recaptcha_resp->is_valid;
            }

            if (!$recaptcha_code_ok){
                $err_msg .= "Wrong reCaptcha text typed.<br/>";
            }

            if($err_msg == '') {
                $status = wp_create_user( $username, $password, $email );
                if ( is_wp_error($status) ) {
                    $war_msg .= 'Username or Email Address already exists. Please try another one.';
                }
                if($war_msg == ''){
                $userdata = array(
                    'ID' => $status,
                    'user_pass' => $password
                );
                $new_user_id = wp_update_user( $userdata );
                $from = get_option('admin_email');
                $from_name = "Dailyfoodies";
                $headers = "From: Dailyfoodies <$from>\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $subject = "Thank you for registration";
                $msg = "Thank you for registration.<br/>Your login details<br/>Username: $username<br/>Password: $password<br/>";
                $msg .= "<a href='http://" . $_SERVER['HTTP_HOST'] ."/dailyfoodies2/verify-email/?verify_id=$new_user_id'>Click here for verify your email</a><br/><br/>";
                $msg .= "Best regards<br/>Dailyfoodies admin";
                wp_mail( $email, $subject, $msg, $headers );
                $username = '';
                $email = '';
 ?>
<div id="popup_loader" class="popupContact"></div> 
<div id="popup_content" class="popupContact">&nbsp;</div> 
<div id="backgroundPopup"></div>
<script>
gl_popup_id = "#popup_content";
show_loader();
$(gl_popup_id).load("<?php echo get_template_directory_uri();?>/dialog_message.php?posttopage=<?php echo $_SERVER["PHP_SELF"];?>", function() {
                //centering with css
               // alert('loaded');
                centerPopup();
                //load popup
                loadPopup();
});
</script>
<?php
        }
    }
}
$template_setting = kopa_get_template_setting();
$sidebars = $template_setting['sidebars'];
?>
 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
<div class="wrapper">
    <div class="row-fluid">
        <div class="span12">
            <div id="main-col"> 
                    <div class="article-list-line"></div>
                    
                    <span class="article-bullet"></span>
                 <?php 					
			if(get_option('users_can_register')) { //Check whether user registration is enabled by the administrator
                    ?>  
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
                                <div class="dialog-popup" style="display:none;">
                                    <p>Please Check your email for verification code.</p>
                                </div>
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
                                            <p><label>Username</label>
                                            <input type="text" name="username" id="username" class="reg_txt_fldt" value="<?php if(isset($username)){echo $username;}?>" /></p>
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
                                            <input type="text" name="email" id="email" class="reg_txt_fldt" value="<?php if(isset($email)){echo $email;}?>" /></p>
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
                                            <p><label>Password</label>
                                            <input type="password" name="password" class="reg_txt_fldt" id="password" value="" /></p>
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
                                            <p><label>Confirm Password</label>
                                            <input type="password" name="repeat_password" id="repeat_password" class="reg_txt_fldt" value="" /></p>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/04-RECAPTCHA.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>reCaptcha</label></p>
                                            <span class="myCaptcha"><?php myCaptcha ();?></span>
                                        </div>
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix">
                                        <div class="timeline-icon">
                                            <div><img src="http://dailyfoodies.com/wp-content/uploads/2013/12/05-ARROW.png" style="height:50px; width:50px;"></div>
                                            <span class="dotted-horizon"></span>
                                            <span class="vertical-line"></span>
                                            <span class="circle-outer"></span>
                                            <span class="circle-inner"></span>
                                        </div>
                                        <div class="kp-thumb hover-effect">
                                            <p><label>Register</label>
                                            <input name="df_submit" id="df_submit" type="submit" value="SUBMIT" class="pop_btn" style="font-weight: bold;"></p>
                                        </div>
                                    <!--<input type="hidden" name="redirect_to" value="http://localhost/dailyfoodies2/account-setup/" />-->
                                </article><!--timeline-item-->
                                <article class="timeline-item  standard-post  clearfix long_stem"></article><!--timeline-item-->
                                <span class="load-more kp-tooltip" data-toggle="tooltip" ><i class="icon-plus"></i></span>
                                </form>
                    </div><!--timeline-container-->
                    </div><!--tab-container-1--></div><!--entry-list-->  
                    </ul><!--article-list-->
                    <?php 
                    }
                    else {
                        echo "Registration is currently disabled. Please try again later.";
                    }
                    ?>
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