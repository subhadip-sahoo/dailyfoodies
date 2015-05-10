<?php global $interim_login;
?>
<div id="popupContactClose"></div>
<div class="popup_main">
    <div class="popup_body">
        <div class="pup_head_bg"><h2>PLEASE LOGIN</h2></div>
        <form name="df_loginform" id="df_loginform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" method="post">
            <div class="pup_user">
                <p><input name="log" id="user_login" value="<?php echo esc_attr($user_login); ?>" type="text" placeholder="Username" class="popup_txtfld"></p>
            </div>
            <div class="pup_pass">
            <p><input name="pwd" id="user_pass" value="" type="password" placeholder="Password" class="popup_txtfld"></p>
            </div>
            <?php do_action( 'login_form' ); ?>
            <div class="test">
            <div class="pup_ck_on">
                <input name="rememberme" type="checkbox" id="rememberme" value="forever" <?php checked( $rememberme ); ?> class="pup_cheak_box">
                <div class="pup_ck_off" ><img src="<?php echo get_template_directory_uri();?>/images/icons/pup_ck_off.png" /></div>          
            </div>
            </div>
                <div class="pup_re"><p>Remember me</p><a href="<?php echo esc_url( wp_lostpassword_url() ); ?>">Forgot password</a></div>
            <div class="pop_btn_bg_div">
                <input name="df_submit" type="submit" value="LOGIN" class="pop_btn">
                <?php	if ( $interim_login ) { ?>
                            <input type="hidden" name="interim-login" value="1" />
                <?php	} else { ?>
                            <input type="hidden" name="redirect_to" value="<?php echo $_REQUEST['redirect']; ?>" />
                <?php 	} ?>
                <?php   if (isset( $customize_login )) : ?>
                            <input type="hidden" name="customize-login" value="1" />
                <?php   endif; ?>
                            <input type="hidden" name="testcookie" value="1" />
            </div>
        </form>
    </div>
</div>
